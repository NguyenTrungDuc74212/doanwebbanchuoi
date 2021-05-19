<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addPostRequest;
use App\Http\Requests\editPostRequest;
use App\Models\CategoryPost;
use App\Models\Post;
use App\Events\CategorypostCreated;
use Str;

class PostController extends Controller
{
	public function view_add_post()
	{
		$category_post = CategoryPost::all();
		return view('admin.post.add_post',compact('category_post'));
	}
	public function add_post(addPostRequest $req)
	{
		$post = new post;
		/*xử lý image*/
		$file = $req->file('image');
		$name_offical = $file->getClientOriginalName();
		$name_jpg = explode(".", $name_offical);
		$file_name =$name_jpg[0].rand(0,99).".".$file->getClientOriginalExtension();
		$url = $file->move('public/upload/post',$file_name);
		$post->image = $file_name;
		/*end*/
		$post->title = $req->input('title');
		$post->category_id = $req->input('category_id');
		$post->content = $req->input('content');
		$post->desc = $req->input('desc');
		$post->slug=convert_vi_to_en($req->input('title'));
		$post->meta_keywords = $req->input('meta_keywords');
		$post->meta_title = $req->input('meta_title');
		$post->save();
		event(new \App\Events\CategoryproductCreated($post));
		return redirect()->route('list_post')->with('thongbao','Thêm bài viết thành công');
	}
	public function list_post()
	{
		$post_query = Post::query();
		$post_query->latest();
		$post = $post_query->paginate(5);
		return view('admin.post.list_post',compact('post'));
	}
	public function delete_post($id)
	{
		$post = Post::find($id);
		$post->delete();
		return redirect()->back()->with('thongbao','Xóa sản phẩm thành công');
	}
	public function edit_post($id)
	{
		$category_post = CategoryPost::all();
		$post = Post::find($id);
		return view('admin.post.edit_post',compact('post','category_post'));
	}
	public function update_post(editPostRequest $req,$id)
	{
		$post = Post::find($id);
		/*xử lý image*/
		$file = $req->file('image');
		if ($file) {
		$name_offical = $file->getClientOriginalName();
		$name_jpg = explode(".", $name_offical);
		$file_name =$name_jpg[0].rand(0,99).".".$file->getClientOriginalExtension();
		$url = $file->move('public/upload/post',$file_name);
		$post->image = $file_name;
		/*end*/
		}
		else{
			$post->image = $req->input('img_old');
		}
		$post->title = $req->input('title');
		$post->category_id = $req->input('category_id');
		$post->content = $req->input('content');
		$post->desc = $req->input('desc');
		$post->meta_keywords = $req->input('meta_keywords');
		$post->meta_title = $req->input('meta_title');
		$post->save();
		event(new \App\Events\CategoryproductCreated($post));
		return redirect()->route('list_post')->with('thongbao','Sửa bài viết thành công');
	}
}
