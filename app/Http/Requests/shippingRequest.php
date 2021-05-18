<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class shippingRequest extends FormRequest
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
            "email_2"=>"required|Email",
            "name_2"=>"required",
            "phone_2"=>"required|numeric",
            "address_2"=>"required",
            "method"=>"required",
            "notes"=>"required",
            "city"=>"required",
        ];
    }
    public function messages()
    {
        return [
            "email_2.required"=>"email không được để trống",
            "notes.required"=>"ghi chú không được bỏ trống",
            "email_2.Email"=>"email không hợp lệ",
            "name_2.required"=>"tên không được để trống",
            "phone_2.required"=>"số điện thoại không được để trống",
            "phone_2.numeric"=>"số điện thoại phải là số",
            "address_2.required"=>"địa chỉ không được để trống",
            "method.required"=>"hình thức thanh toán không được bỏ trống",
            "city.required"=>"Bạn phải nhập thành phố của mình hiện đang sống",
        ];
    }
}
