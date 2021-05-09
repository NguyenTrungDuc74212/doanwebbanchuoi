<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class changeRequest extends FormRequest
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
            "email"=>"required",
            "password"=>"required",
            "re-password"=>"required|same:password",
        ];
    }
    public function messages()
    {
          return[
             "email.required"=>"email không được bỏ trống",
             "password.required"=>"password không được bỏ trống",
             "re-password.required"=>"re-password không được bỏ trống",
             "re-password.same"=>"password không khớp",
             // "email.required"=>"email không được bỏ trống",
          ];
    }
}
