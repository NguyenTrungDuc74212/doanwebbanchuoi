<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Vendors;
use App\Models\Gallery;
use App\Models\Warehouse;
use App\Models\WarehouseProduct;
use App\Models\PriceProduct;
use App\Models\CancelProduct;
use Carbon\Carbon;
use App\Http\Requests\addProductRequest;
use App\Http\Requests\editProductRequest;
use Str;
use Gate;
use DB;
use App\Events\CategoryProductCreated;
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
		$product->persent_discount=$req->persent_discount;
		$product->unit=$req->unit;
		event(new \App\Events\CategoryProductCreated($product));
		$product->save();
		$priceProduct=new PriceProduct();
		$priceProduct->id_product=$product->id;
		$priceProduct->price=$product->price;
		$priceProduct->save();
		DB::commit();
		return redirect()->route('list_product')->with('thongbao','Thêm sản phẩm thành công');
		}catch(Exception $ex)
		{
			DB::rollback();
			throw new Exception($ex->getMessage());
		}

	}
	public function list_product()
	{
		$product_query = Product::query();
		$product_query->latest();
		$product = $product_query->get();
		$category_product=CategoryProduct::all();
		$warehouse=Warehouse::all();
		return view('admin.product.list_product',compact('product','category_product','warehouse'));
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
		DB::beginTransaction();
		try{
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
		if($req->input('price')==0)
		{
			$product->price = $req->input('price_old');
		}else{
			$product->price = $req->input('price');
		}
	
		$product->name = $req->input('name');
		$product->desc = $req->input('desc');
		$product->meta_keywords = $req->input('meta_keywords');
		$product->meta_title = $req->input('meta_title');
		$product->slug=convert_vi_to_en($product->name);
		$product->persent_discount=$req->persent_discount;
		$product->unit=$req->unit;
		event(new \App\Events\CategoryProductCreated($product));
		$product->save();
		$check_price=PriceProduct::where('id_product',$product->id)->where('price',$product->price)->get();
		if(count($check_price)==0)
		{
			$price_product=new PriceProduct();
			$price_product->id_product=$product->id;
			$price_product->price=$product->price;
			$price_product->save();
		}

		DB::commit();
		return redirect()->route('list_product')->with('thongbao','lưu sản phẩm thành công');
	}catch(Exception $ex)
	{
		DB::rollback();
		throw new Exception($ex->getMessage());
		
	}
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

	public function filter_product($id_warehouse,$status)
	{
		
		$warehouse=Warehouse::all();
		if($status==-1)
		{
			$product=DB::table('tbl_warehouse_product')
			->join('tbl_product as p', 'p.id', '=', 'tbl_warehouse_product.product_id')
			->join('tbl_warehouse as tw', 'tw.id', '=', 'tbl_warehouse_product.warehouse_id')
			->select('p.*','tbl_warehouse_product.expiration_date','tbl_warehouse_product.quantity as soluong','tbl_warehouse_product.id as id_wp','tbl_warehouse_product.status')->where('warehouse_id',$id_warehouse)->get();
		}else{
			$product=DB::table('tbl_warehouse_product')
			->join('tbl_product as p', 'p.id', '=', 'tbl_warehouse_product.product_id')
			->join('tbl_warehouse as tw', 'tw.id', '=', 'tbl_warehouse_product.warehouse_id')
			->select('p.*','tbl_warehouse_product.expiration_date','tbl_warehouse_product.quantity as soluong','tbl_warehouse_product.id as id_wp','tbl_warehouse_product.status')->where('warehouse_id',$id_warehouse)->where('status',$status)->get();
		}
		return view('admin.product.filter_product_by_warehouse',compact('product','id_warehouse','status','warehouse'));
	}
	public function cancel_product(Request $req)
	{
		$id=$req->id_pw;
		$quantity=$req->quantity;
		
		for($i=0;$i<count($id);$i++)
		{
			$warehouse_product=WarehouseProduct::find($id[$i]);
			if($warehouse_product->status!=2){
				$productCancel=CancelProduct::where('cancel_date',Carbon::now()->format('d-m-Y'))->where('warehouse_product_id',$id[$i])->first();
				if($productCancel!=null)
				{
				$productCancel->quantity_cancel+=$quantity[$i];
				$productCancel->save();
				}else{
					$productCancel=new CancelProduct();
					$productCancel->cancel_date=Carbon::now()->format('d-m-Y');
					$productCancel->warehouse_product_id=$id[$i];
					$productCancel->quantity_cancel=$quantity[$i];
					$productCancel->save();
				}
				if($quantity[$i]<$warehouse_product->quantity)
				{
					$warehouse_product->product->quantity-=$quantity[$i];
					$warehouse_product->warehouse->quantity_now-=$quantity[$i];
					$warehouse_product->quantity_cancel=$quantity[$i];
					$warehouse_product->quantity-=$quantity[$i];
					$warehouse_product->product->save();
					$warehouse_product->warehouse->save();
					$warehouse_product->save();
				}
				if($quantity[$i]==$warehouse_product->quantity){
					$warehouse_product->status=2;
					$warehouse_product->product->quantity-=$warehouse_product->quantity;
					$warehouse_product->warehouse->quantity_now-=$warehouse_product->quantity;
					$warehouse_product->product->save();
					$warehouse_product->warehouse->save();
					$warehouse_product->save();
				}
			}
		
		}
		return redirect()->back();
	}
	
}
