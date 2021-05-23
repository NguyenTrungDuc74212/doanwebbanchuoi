<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Vendors;
use App\Models\Gallery;
use App\Http\Requests\addProductRequest;
use App\Http\Requests\editProductRequest;
use Str;
use Gate;

class ProductController extends Controller
{
	public function view_add_product()
	{
		$category_product = CategoryProduct::all();
		$vendor = Vendors::all();
		return view('admin.product.add_product',compact('category_product','vendor'));
	}
	public function add_product(addProductRequest $req)
	{
		DB::beginTransaction();
		try{
		$product = new Product;
		/*xử lý image*/
		$file = $req->file('image');
		$name_offical = $file->getClientOriginalName();
		$name_jpg = explode(".", $name_offical);
		$file_name =$name_jpg[0].rand(0,99).".".$file->getClientOriginalExtension();
		$url = $file->move('public/upload/product',$file_name);
		$product->image = $file_name;
		/*end*/
		$product->name = $req->input('name');
		$product->vendor_id = $req->input('vendor_id');
		$product->category_product_id = $req->input('category_product_id');
		$product->price = $req->input('price');
		$product->content = $req->input('content');
		$product->quantity = 0;
		$product->desc = $req->input('desc');
		$product->meta_keywords = $req->input('meta_keywords');
		$product->meta_title = $req->input('meta_title');
		$product->product_sold=0;
		$product->slug=convert_vi_to_en($product->name);
		$product->persent_discount=0;
		event(new \App\Events\CategoryProductCreated($product));
		$product->save();
		DB::commit();
		return redirect()->route('list_product')->with('thongbao','Thêm sản phẩm thành công');
		}catch(Exception $ex)
		{
			DB::rollback();
			throw new Exception("Lỗi", $ex);
			
		}

	}
	public function list_product()
	{
		$product_query = Product::query();
		$product_query->latest();
		$product = $product_query->get();
		return view('admin.product.list_product',compact('product'));
	}
	public function edit_product($id)
	{
		$category = CategoryProduct::all();
		$vendor = Vendors::all();
		$product = Product::find($id);
		return view('admin.product.edit_product',compact('product','category','vendor'));
	}
	public function update_product(editProductRequest $req,$id)
	{
		$product = Product::find($id);
		/*xử lý image*/

		$file = $req->file('image');
		if ($file) {
			$name_offical = $file->getClientOriginalName();
			$name_jpg = explode(".", $name_offical);
			$file_name =$name_jpg[0].rand(0,99).".".$file->getClientOriginalExtension();
			$url = $file->move('public/upload/product',$file_name);
			$product->image = $file_name;
		}
		else{
			$product->image = $req->input('img_old');
		}
		
		/*end*/
		$product->name = $req->input('name');
		$product->category_product_id = $req->input('category_product_id');
		$product->vendor_id = $req->input('vendor_id');
		$product->price = $req->input('price');
		$product->name = $req->input('name');
		$product->desc = $req->input('desc');
		$product->meta_keywords = $req->input('meta_keywords');
		$product->meta_title = $req->input('meta_title');
		$product->slug=convert_vi_to_en($product->name);
		event(new \App\Events\CategoryProductCreated($product));
		$product->save();
		return redirect()->route('search-product')->with('thongbao','lưu sản phẩm thành công');
	}
	public function delete_product($id)
	{
		$product = Product::find($id);
		$product->delete();
		return redirect()->back()->with('thongbao','Xóa sản phẩm thành công');
	}
	/*thêm nhiều ảnh*/
	public function add_gallery($product_id)
	{
		return view('admin.product.add_gallery',compact('product_id'));
	}
	public function select_gallery(Request $req)
	{
		$product_id =  $req->product_id;
		$gallery = Gallery::where('product_id',$product_id)->get();
		$data = '';
		$data .= '<table class="table table-hover">
		<thead>
		<tr class="text-nowrap">
		<th>Tên hình ảnh</th>
		<th>Hình ảnh</th>
		<th>Thao tác</th>
		</tr>
		</thead>
		 <tbody>';
		$data.='<form>';
		$data.=''.csrf_field().'';
		foreach ($gallery as $value) {
		    $data .='<tr>
                        <td contenteditable class="edit_gallery_name" data-gallery_id="'.$value->id.'">'.$value->name.'</td>
                        <td><img src="'.asset('public/upload/gallery/'.$value->image).'" alt="" style="width:30%;">
                          <input type="file" class="file_name" style="width:40%" name="file" data-image_id="'.$value->id.'" id="file_name_'.$value->id.'">
                        </td>

                        <td><button data-id="'.$value->id.'" class="btn btn-xs btn-danger delete-image">Xóa</button></td>
                    </tr>';
                
		}
		    $data.='</form>';
		$data.='</tbody>';
		$data.='</table>';
		echo $data;


	}
	public function insert_gallery(Request $req,$product_id)
	{
         $image = $req->file('image');
         if ($image) {
         	foreach ($image as $value) {
            $name_offical = $value->getClientOriginalName();
			$name_jpg = explode(".", $name_offical);
			$file_name =$name_jpg[0].rand(0,99).".".$value->getClientOriginalExtension();
			$value->move('public/upload/gallery',$file_name);
			$gallery = new Gallery();
			$gallery->name = $file_name;
			$gallery->image =$file_name;
			$gallery->product_id =$product_id;
			$gallery->save();
         }
         }
         else {
         	return redirect()->back()->with('error','Bạn phải chọn ảnh!!!');
         }
          return redirect()->back()->with('thongbao','Thêm thư viện ảnh thành công');

         
	}
	public function update_gallery(Request $req)
	{
            $gallery = Gallery::find($req->gallery_id);
			$gallery->name = $req->gallery_text;
			$gallery->save();
	}
	public function delete_gallery(Request $req)
	{
		$gallery = Gallery::find($req->gallery_id);
		$gallery->delete();
		unlink('public/upload/gallery/'.$gallery->name);
	}
	public function update_image(Request $req)
	{
       $file_image = $req->file('file');
       $id_image =$req->image_id;
        if ($file_image) {
            $name_offical = $file_image->getClientOriginalName();
			$name_jpg = explode(".", $name_offical);
			$file_name =$name_jpg[0].rand(0,99).".".$file_image->getClientOriginalExtension();
			$file_image->move('public/upload/gallery',$file_name);
			$gallery = Gallery::find($id_image);
			unlink('public/upload/gallery/'.$gallery->image);
			$gallery->image =$file_name;
			$gallery->save();

         }
   

	}
	/*end thêm nhiều ảnh*/
	
}
