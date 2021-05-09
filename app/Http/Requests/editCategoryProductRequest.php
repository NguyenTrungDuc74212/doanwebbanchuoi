<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editCategoryProductRequest extends FormRequest
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
            "name"=>"required|unique:tbl_category_product,name",
            "desc"=>"required",
            "meta_title"=>"required",
            "meta_keywords"=>"required",

        ];
    }
    public function messages()
    {
        return [
            "name.required"=>"tên danh mục không được bỏ trống",
            "name.unique"=>"danh mục đã tồn tại",
            "desc.required"=>"mô tả danh mục không được bỏ trống",
            "meta_title.required"=>"thẻ meta danh mục không được bỏ trống",
            "meta_keywords.required"=>"thẻ meta danh mục không được bỏ trống",
        ];
    }
}
