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
    public function getHomePage()
    {
        $productCategory=CategoryProduct::all();
        $slides=Slider::where('status',1)->get();
        $product_query = Product::query();
        $product_query->limit(10);
        $postIntro= DB::table('tbl_post')
        ->join('tbl_category_post', 'tbl_category_post.id', '=', 'tbl_post.category_id')
        ->where('tbl_category_post.name','Giới thiệu')->select('tbl_post.*')->limit(3)->get();
        $productLatest = $product_query->latest()->get();
        $product_all = $product_query->latest()->paginate(8);
        $postTop=DB::table('tbl_post')->orderByDesc("created_at")->limit(3)->get();
        $product_top_sale=Product::orderBy('product_sold','DESC')->limit(10)->get();
        return view("website.home_page",compact('productCategory','slides','productLatest','product_all','product_top_sale','postTop','postIntro'));

    }
}
