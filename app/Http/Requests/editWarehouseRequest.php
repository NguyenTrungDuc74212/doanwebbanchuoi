<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editWarehouseRequest extends FormRequest
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
            "warehouse_name"=>"required",
            "quantity_contain"=>"required|numeric",

        ];
    }
    public function messages()
    {
        return [
            "warehouse_name.required"=>"tên kho không được bỏ trống",
            "quantity_contain.numeric"=>"số lượng chứa phải là số",
            "quantity_contain.required"=>"số lượng chứa không được bỏ trống",

        ];
    }
}
