<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Vendors;
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
		$product->quantity = $req->input('quantity');
		$product->desc = $req->input('desc');
		$product->meta_keywords = $req->input('meta_keywords');
		$product->meta_title = $req->input('meta_title');
		$product->save();
		event(new \App\Events\CategoryProductCreated($product));
		return redirect()->route('list_product')->with('thongbao','Thêm sản phẩm thành công');

	}
	public function list_product()
	{
		$product_query = Product::query();
		$product_query->latest();
		$product = $product_query->paginate(5);
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
		$product->save();
		event(new \App\Events\CategoryProductCreated($product));
		return redirect()->route('search-product')->with('thongbao','lưu sản phẩm thành công');
	}
	public function delete_product($id)
	{
		$product = Product::find($id);
		$product->delete();
		return redirect()->back()->with('thongbao','Xóa sản phẩm thành công');
	}

	public function index()
	{
		$data = Product::orderBy('id','DESC')->paginate(5);
		return view('admin.product.search_ajax',compact('data'));
	}
	public function action(Request $req)
	{
		$query = $req['query'];
		if ($query!=null) {
			$data = Product::orderBy('id','DESC')->where('name','like',"%{$query}%")->get();
		}
		else {
			$data = Product::orderBy('id','DESC')->get();
		}
		$total = $data->count();
		$output="";
		if ($total>0) {
			foreach ($data as $value) {
				$output.='<tr>';
				$output.='
				<td><img src='.asset('public/upload/product/'.$value->image).' height="100" width="100"></td>';
				$output.='<td>'.$value->name.'</td>';
				$output.='<td>'.$value->category_product->name.'</td>';
				$output.='<td>'.currency_format($value->price).'</td>';
				$output.='<td>';
				$output.='<a href="" class="btn btn-danger xoa-product" data-id='.$value->id.'><i class="fas fa-trash-alt"></i></a>
				<a href='.route('edit_product',$value->id).' class="btn btn-success"><i class="fas fa-edit"></i></a>';
				$output.='</td>';
				$output.='</tr>';
			}
		}
		else {
			$output ='<tr>
			<td>No data found</td>
			</tr>';
		}
		$ketqua= response()->json([
			'table_data' => $output,
		]);
		return $ketqua;
	}
	public function xoa_ajax(Request $req)
	{
		$product = Product::find($req->id);
		$product->delete();
	}
	// public function get_more_product(Request $req)
	// {
	// 	if ($req->ajax()) {
	// 		$data = Product::orderBy('id','DESC')->paginate(5);
	// 		return view('admin.product.pagination',compact('data'));
	// 	}
	// }
}
