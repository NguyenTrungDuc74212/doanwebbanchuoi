<?php

namespace App\Http\Controllers;
use App\Models\CategoryProduct;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;
use DB;


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
    public function getBlogDetail($slug)
    {
        $postCategory=CategoryPost::all();
        $postTop3=DB::table('tbl_post')->orderByDesc("created_at")->limit(3)->get();
        $postTopView=DB::table('tbl_post')->orderByDesc('view')->limit(3)->get();
        $productCategory=CategoryProduct::all();
        $postDetails=Post::where('slug',$slug)->first();
        $postDetails->view+=1;
        $postDetails->save();
        return view("website.blog_detail",compact('productCategory','postCategory','postTop3','postDetails','postTopView'));
    }
}
