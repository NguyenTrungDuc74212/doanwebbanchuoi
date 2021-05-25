<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Customer;
use App\Models\ProductCustomer;
use Session;

class likeProductController extends Controller
{
    public function view_like_product()
    {
    	$productCategory=CategoryProduct::all();
    	$product_top_sale=Product::orderBy('product_sold','DESC')->limit(10)->get();
    	$like_product_customer = ProductCustomer::where('customer_id',Session::get('id_customer'))->get();
    	if ($like_product_customer) {
    		$product_id = [];
    		foreach ($like_product_customer as $value) {
    			$product_id[]=$value->product_id;
    		}
    		$product_like = Product::whereIn('id',$product_id)->get();
    		return view('website.like.like_product',compact('productCategory','product_top_sale','product_like'));

    	}   	
    	
    	return view('website.like.like_product',compact('productCategory','product_top_sale'));
    }
    public function like_product_ajax(Request $req)
    {
    	$like_product_customer =  ProductCustomer::where('product_id',$req->id)->Where('customer_id',$req->customer)->first();
    	if ($like_product_customer!=null) {
    		echo 'error';
    	}
    	else {
    	 $like_product = new ProductCustomer;
         $like_product->customer_id = $req->customer;
         $like_product->product_id = $req->id;
         $like_product->save();
    	}  
    }
    public function delete_product_like(Request $req)
    {
       $product_like = ProductCustomer::where('product_id',$req->id)->where('customer_id',Session::get('id_customer'))->first();
       $product_like->delete();	
    }
}
