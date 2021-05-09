<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addCouponRequest extends FormRequest
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
            "name"=>"required|max:50",
            "code"=>"required|max:50|unique:tbl_coupon,code",
            "quanlity"=>"required|numeric",
            "method"=>"required|numeric|in:1,2",
            "value_sale"=>"required|numeric"
            
        ];
    }
    public function messages()
    { 
        return[
           "name.required"=>"Bạn chưa nhập tên mã",
           "name.max"=>"Tên mã không được quá 50 chữ số",
           "code.required"=>"Bạn chưa nhập mã code",
           "code.unique"=>"Mã code này đã tồn tại",
           "code.max"=>"mã code không được quá 50 chữ số",
           "quanlity.required"=>"Bạn chưa nhập số lượng",
           "quanlity.numeric"=>"phải là số",
           "method.required"=>"Bạn chưa chọn tính năng",
           "value_sale.required"=>"Bạn chưa nhập số giảm giá",
           "value_sale.numeric"=>"phải là số"
           
       ];
   }
}
