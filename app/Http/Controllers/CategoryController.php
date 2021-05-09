<?php

namespace App\Http\Controllers;
use App\Http\Requests\addCategoryProductRequest;
use App\Http\Requests\addCategoryPostRequest;
use App\Http\Requests\editCategoryProductRequest;
use App\Http\Requests\editCategoryPostRequest;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\CategoryPost;
use Str;

class CategoryController extends Controller
{
    /*category product*/
    public function view_add_category_product()
    {
    	return view('admin.category_product.add_category_product');
    }
    public function add_category(addCategoryProductRequest $req)
    {
        $category_product = new CategoryProduct;
        $category_product->name = $req->input('name');
        $category_product->desc = $req->input('desc');
        $category_product->meta_keywords = $req->input('meta_keywords');
        $category_product->meta_title = $req->input('meta_title');
        $category_product->save();
        event(new \App\Events\CategoryProductCreated($category_product));
        return redirect()->route('list_category_product')->with('thongbao','Thêm danh mục thành công');

    }
    public function list_category_product()
    {
    	$category_query =CategoryProduct::query();
        $category_query->latest();
        $category_product=$category_query->paginate(5);
        return view('admin.category_product.list_category_product',compact('category_product'));
    }
    public function edit_category_product($id)
    {
    	$category_product =CategoryProduct::find($id);
    	return view('admin.category_product.edit_category_product',compact('category_product'));
    }
    public function update_category_product(editCategoryProductRequest$req,$id)
    {
    	$category_product =CategoryProduct::find($id);
    	$category_product->name = $req->input('name');
        $category_product->desc = $req->input('desc');
        $category_product->meta_keywords = $req->input('meta_keywords');
        $category_product->meta_title = $req->input('meta_title');
        $category_product->save();
        event(new \App\Events\CategoryProductCreated($category_product));
        return redirect()->route('list_category_product')->with('thongbao','Sửa danh mục thành công');

    }
    public function delete_category_product($id)
    {
        $category_product =CategoryProduct::find($id);
        $category_product->delete();
        return redirect()->back()->with('thongbao','Xóa danh mục thành công');

    }
    /*end category_product*/


    /*category_post*/
    public function view_add_category_post()
    {
      return view('admin.category_post.add_category_post');
  }
  public function save_category_post(addCategoryPostRequest $req)
  {
    $category_post = new CategoryPost;
    $category_post->name = $req->input('name');
    $category_post->desc = $req->input('desc');
    $category_post->meta_keywords = $req->input('meta_keywords');
    $category_post->meta_title = $req->input('meta_title');
    $category_post->save();
    event(new \App\Events\CategoryProductCreated($category_post));
    return redirect()->route('list_category_post')->with('thongbao','Thêm danh mục thành công');
}
public function list_category_post(Request $req)
{
    $key = $req->input('search_category_post');
    $category_query =CategoryPost::query();
    if ($key) {
        $category_query->where('name','like',"%{$key}%");
    }
    $category_query->latest();
    $category_post=$category_query->paginate(5);

    return view('admin.category_post.list_category_post',compact('category_post'));
}
public function delete_category_post($id)
{
    $category_post =CategoryPost::find($id);
    $category_post->delete();
    return redirect()->back()->with('thongbao','Xóa danh mục thành công');

}
public function edit_category_post($id)
{
    $category_post =CategoryPost::find($id);
    return view('admin.category_post.edit_category_post',compact('category_post'));
}
public function update_category_post(editCategoryPostRequest $req,$id)
{
    $category_post =CategoryPost::find($id);
    $category_post->name = $req->input('name');
    $category_post->desc = $req->input('desc');
    $category_post->meta_keywords = $req->input('meta_keywords');
    $category_post->meta_title = $req->input('meta_title');
    $category_post->save();
    event(new \App\Events\CategoryProductCreated($category_post));
    return redirect()->route('list_category_post')->with('thongbao','Sửa danh mục thành công');
}
public function searchFullText(Request $req)
{
    $category_query =CategoryPost::query();
    if ($req->search_category_post!='') {
      $key =substr($req->search_category_post,21);
      $category_query->where('name','LIKE','%'.$key.'%');
      $data = $category_query->get();
      $result='';
      foreach ($data as $value) {
         $result.= '<li class="value_search">'.$value->name.'</li>';
     }
     echo $result;
 }
}


/*end category_post*/
}
