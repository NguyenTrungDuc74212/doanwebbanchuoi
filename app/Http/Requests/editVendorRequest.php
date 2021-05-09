<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editVendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            "vendor_name"=>"required",
            "address"=>"required",
            "phone"=>"required|numeric",
            "tax_code"=>"required|numeric",
            
        ];
    }
    public function messages()
    { 
        return[
           "vendor_name.required"=>"Bạn chưa nhập tên nhà cung cấp",
           "address.required"=>"Bạn chưa nhập địa chỉ",
           "phone.required"=>"Bạn chưa nhập số điện thoại",
           "phone.numeric"=>"Số điện thoại phải là số",
           "tax_code.required"=>"Bạn chưa chọn tính năng",
           "tax_code.numeric"=>"mã số thuế phải là số",
           "tax_code.unique"=>"mã số thuế chỉ có 1 mã",
       ];
   }
}
