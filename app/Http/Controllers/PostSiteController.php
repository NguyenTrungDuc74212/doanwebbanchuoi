<?php

namespace App\Http\Controllers;
use App\Models\CategoryProduct;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use DB;
use App\Models\Slider;


class PostSiteController extends Controller
{
    public function getViewBlog()
    {
        $productCategory=CategoryProduct::all();
        $postCategory=CategoryPost::all();
        $postTop3=DB::table('tbl_post')->orderByDesc("created_at")->limit(3)->get();
        $postAll = Post::paginate(6);
        return view("website.blog_page",compact('productCategory','postCategory','postTop3','postAll'));
    }
    public function getPostByCategory($slug)
    {
        $posts= DB::table('tbl_post')
        ->join('tbl_category_post', 'tbl_category_post.id', '=', 'tbl_post.category_id')
        ->where('tbl_category_post.slug',$slug)->select('tbl_post.*','tbl_category_post.name as name_category')->paginate(8);
        $postTop3=DB::table('tbl_post')->orderByDesc("created_at")->limit(3)->get();
        $product_related = Product::orderBy('product_sold','DESC')->limit(4)->get();
        $product_watched=null;
        if(Session::has('product_watched'))
        {
            $product_watched=Session::get('product_watched');
        }
        return view('website.blog_category',compact('posts','postTop3','product_related','product_watched'));
    }
    public function getBlogDetail($slug)
    {
        $postTop3=DB::table('tbl_post')->orderByDesc('view')->limit(3)->get();
        $productCategory=CategoryProduct::all();
        $postDetails=Post::where('slug',$slug)->first();
        $postDetails->view+=1;
        $postDetails->save();
        $product_watched=null;
        if(Session::has('product_watched'))
        {
            $product_watched=Session::get('product_watched');
        }
        $product_related = Product::orderBy('product_sold','DESC')->limit(4)->get();
        $slides=Slider::where('status',1)->get();
        return view("website.blog_detail",compact('productCategory','postTop3','postDetails','product_watched','slides','product_related'));
    }
}
