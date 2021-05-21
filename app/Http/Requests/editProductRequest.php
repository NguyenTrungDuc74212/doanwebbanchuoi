<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editProductRequest extends FormRequest
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
            'name'=>'required',
            'category_product_id'=>'required',
            'desc'=>'required',
            'price'=>'required',
            "meta_title"=>"required",
            "meta_keywords"=>"required",
        ];
    }
    public function messages()
    { 
        return[
           'name.required'=>'Tên sản phẩm không được bỏ trống',
           'desc.required'=>'Mô tả không được bỏ trống',
           'category_product_id.required'=>'danh mục không được bỏ trống',
           'vendor_id.required'=>'nhà cung cấp không được bỏ trống',
           'price.required'=>'Giá sản phẩm không được bỏ trống',
            "meta_title.required"=>"thẻ meta sản phẩm không được bỏ trống",
            "meta_keywords.required"=>"thẻ meta sản phẩm không được bỏ trống",     
       ];
   }
}
