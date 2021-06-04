<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Session;
class addCustomerRequest extends FormRequest
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
            "name"=>"required|unique:tbl_customer,name|max:50",
            "email"=>"required|unique:tbl_customer,email",
            "password"=>"required",
            "re_password"=>"required|same:password",    
            "phone"=>"required",
            "address"=>"required",
            
        ];
    }
    public function messages()
    {
          Session::flash('errors_login','Erros!!!');
        return [
            "name.required"=>"Bạn phải nhập tên",
            "email.required"=>"Bạn phải nhập email",
            "address.required"=>"Bạn phải nhập địa chỉ",
            "password.required"=>"Bạn phải nhập password",
            "re_password.required"=>"Bạn phải nhập password",
            "phone.required"=>"Bạn phải nhập số điện thoại",
            "re_password.same"=>"Mật khẩu không trùng khớp",
            "name.max"=>"Tên phải nhỏ hơn 12 ký tự",


        ];
    }
}
