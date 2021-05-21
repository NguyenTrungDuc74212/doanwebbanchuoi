<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
           'name'=>'required',
           'email'=>'required|unique:users,email',
           'gender'=>'required|numeric|in:1,2',
           'phone'=>'required|numeric',
           'password'=>'required|min:8',
           're-password'=>'required|same:password',
        ];
    }
    public function messages()
    {
        return [
             'name.required'=>'Bạn phải nhập tên',
             'email.required'=>'Bạn phải nhập email',
             'email.unique'=>'email đã tồn tại',
             'gender.required'=>'Giới tính không được để trống',
             'password.required'=>'Bạn phải nhập pass',
             're-password.required'=>'Bạn phải nhập lại pass',
             'gender.numeric'=>'giới tính không hợp lệ',
             'password.min'=>'pass không hợp lệ',
        ];
    }
}
