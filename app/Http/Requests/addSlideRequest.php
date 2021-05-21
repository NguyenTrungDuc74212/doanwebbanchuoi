<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addSlideRequest extends FormRequest
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
            'image' => 'required|mimes:pdf,xlx,csv,jpg',
            'name'=>'required',
            'desc'=>'required',
            'status'=>'required',
        ];
    }
    public function messages()
    { 
        return[
           'name.required'=>'Tên sản phẩm không được bỏ trống',
           'desc.required'=>'Mô tả không được bỏ trống',
           'image.required'=>'hình ảnh không được bỏ trống',
            "status.required"=>"trạng thái không được bỏ trống",   
       ];
   }
}
