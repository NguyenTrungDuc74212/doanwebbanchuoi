<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addInputRequest extends FormRequest
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
            "vendor_id"=>"required",
            "warehouse_id"=>"required",
            "product_id"=>"required",
            "date_input"=>"required"
        ];
    }
    public function messages()
    {
        return [
            "vendor_id.required"=>"tên nhà cung cấp không được bỏ trống",
            "warehouse_id.required"=>"tên kho không được bỏ trống",
            "product_id.required"=>"tên sản phẩm không được bỏ trống",
            "date_input.required"=>"Ngày nhập không được bỏ trống"
        ];
    }
}
