<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use ReCaptcha\ReCaptcha;
use Session;
class Captcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {


    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
     $recaptcha = new ReCaptcha(env('CAPTCHA_SECRET'));
     $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);
     return $response->isSuccess();
   }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
      Session::flash('thongbao_login_thatbai','Đăng nhập thất bại');
               return 'Làm ơn click vào mã captcha';  //trả về thông báo khi lỗi không xác nhận captcha
             }
           }
