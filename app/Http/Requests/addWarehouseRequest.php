<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addWarehouseRequest extends FormRequest
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
            "warehouse_name"=>"required|unique:tbl_warehouse,warehouse_name",
            "quantity_contain"=>"required|numeric",

        ];
    }
    public function messages()
    {
        return [
            "warehouse_name.required"=>"tên kho không được bỏ trống",
            "warehouse_name.unique"=>"tên kho này đã có rồi",
            "quantity_contain.numeric"=>"số lượng chứa phải là số",
            "quantity_contain.required"=>"số lượng chứa không được bỏ trống",

        ];
    }
}
