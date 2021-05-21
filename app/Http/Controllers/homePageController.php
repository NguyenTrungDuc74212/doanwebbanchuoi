<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\Vendors;
use App\Models\Slider;
use App\Models\Post;
use DB;

class homePageController extends Controller
{
    public function getHomePage(Request $req)
    {
        $key = $req->input('key');

        $productCategory=CategoryProduct::all();
        $slides=Slider::where('status',1)->get();
        $product_query = Product::query();
        $product_query->limit(10);
        // $postIntro= DB::table('tbl_post')
        // ->join('tbl_category_post', 'tbl_category_post.id', '=', 'tbl_post.category_id')
        // ->where('tbl_category_post.name','Giới thiệu')->select('tbl_post.*')->limit(3)->get();
        $postIntro=DB::table('tbl_post')->orderByDesc("created_at")->limit(3)->get();
        $productLatest = $product_query->latest()->get();
        $product_all = $product_query->latest()->paginate(8);
        $postTop=DB::table('tbl_post')->orderByDesc("created_at")->limit(4)->get();
        $product_top_sale=Product::orderBy('product_sold','DESC')->limit(10)->get();
        if ($key) {
         $product_search = Product::where('name','like',"%{$key}%")->paginate(6);
         return view("website.search_home_page",compact('product_search','productCategory'));
     }
     return view("website.home_page",compact('productCategory','slides','productLatest','product_all','product_top_sale','postTop','postIntro'));

 }
 public function auto_search(Request $req)
 {
     $key = $req->key;
     if ($key) {
        $product = Product::where('name','like',"%{$key}%")->get();
        $output = '<ul class="dropdown-menu" style="display: block;position:relative;left: -89px;
        bottom: -33px;">';
        foreach ($product as $value) {
           $output.='<li class="value_search"><a href="">'.$value->name.'</a></li>';
       }
       $output.='</ul>';
       echo $output;
   }

}
}
