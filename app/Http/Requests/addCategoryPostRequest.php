<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addCategoryPostRequest extends FormRequest
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
            "name"=>"required|unique:tbl_category_post,name",
            "desc"=>"required",
            "meta_title"=>"required",
            "meta_keywords"=>"required",

        ];
    }
    public function messages()
    {
        return [
            "name.required"=>"tên danh mục bài viết không được bỏ trống",
            "name.unique"=>"danh mục bài viết đã tồn tại",
            "desc.required"=>"mô tả danh mục bài viết không được bỏ trống",
            "meta_title.required"=>"thẻ meta danh mục bài viết không được bỏ trống",
            "meta_keywords.required"=>"thẻ meta danh mục bài viết không được bỏ trống",
        ];
    }
}
