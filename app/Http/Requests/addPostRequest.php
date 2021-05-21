<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required',
            'title'=>'required|unique:tbl_post,title',
            'category_id'=>'required',
            'desc'=>'required',
            'content'=>'required',
            "meta_title"=>"required",
            "meta_keywords"=>"required",
        ];
    }
    public function messages()
    { 
        return[
           'title.required'=>'Tiêu đề bài viết không được bỏ trống',
           'title.unique'=>'Tiêu đề bài viết đã có!!!',
           'image.required'=>'hình ảnh không được bỏ trống',
           'desc.required'=>'Mô tả không được bỏ trống',
           'category_id.required'=>'danh mục không được bỏ trống',
           'content.required'=>'Nội dung bài viết không được bỏ trống',
            "meta_title.required"=>"thẻ meta bài viết không được bỏ trống",
            "meta_keywords.required"=>"thẻ meta bài viết không được bỏ trống",     
       ];
   }
}
