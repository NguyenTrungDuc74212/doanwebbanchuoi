<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Captcha;
use Session;

class check_login extends FormRequest
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
            "password"=>"required",
            "g-recaptcha-response" => new Captcha(),
        ];
    }
    public function messages()
    {
        return [
            "password.required"=>"password không được để trống",
        ];
    }
}
