<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\CategoryProduct;
use App\Models\Post;
use DB;
use Session;

class productSiteController extends Controller
{
    //
    public function getProductDetail($slug)
    {
        $product=Product::where('slug',$slug)->first();
        $postTop3=DB::table('tbl_post')->orderByDesc("created_at")->limit(3)->get();
        $product_related = Product::where('category_product_id',$product->category_product_id)
        ->where('id','!=',$product->id)->limit(4)->get();
        $gallery_all = Gallery::where('product_id',$product->id)->get();
        $product_watched=null;
        if(Session::has('product_watched'))
        {
            $product_watched=Session::get('product_watched');
        }
        Session::put('product_watched', $product);
        return view("website.product_details",compact('product','product_related','gallery_all','postTop3','product_watched'));
    }
    public function getProductByCategory($slug)
    {
        $category=CategoryProduct::where('slug',$slug)->first();
        $product= DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.id', '=', 'tbl_product.category_product_id')
        ->join('tbl_warehouse_product', 'tbl_warehouse_product.product_id', '=', 'tbl_product.id')
        ->where('tbl_category_product.slug',$slug)->select('tbl_product.*','tbl_category_product.name as category_name')->paginate(8);
        foreach($product as $item)
        {
            $total_quantity=DB::table('tbl_warehouse_product')->where('status',0)->where('product_id',$item->id)->sum('quantity');
            $item->total_quantity=$total_quantity;
        }
        $product_watched=null;
        if(Session::has('product_watched'))
        {
            $product_watched=Session::get('product_watched');
        }
        return view("website.list_product_category",compact('product','product_watched','category'));
    }
}
