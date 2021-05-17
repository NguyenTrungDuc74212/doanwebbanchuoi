<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Tinhthanhpho;
use App\Models\Customer;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\addCustomerRequest;

class checkoutController extends Controller
{
	public function get_checkout()
	{
		$city = Tinhthanhpho::orderby('matp','DESC')->get();
		return view("website.checkout.checkout",compact('city'));
	}
	public function login_customer(Request $req)
	{
		// $req->validate([
		// 	"g-recaptcha-response" => new captcha_rule()

		// ]);
		$customer = new Customer;
		$email = $req->input('email');
		$password = $req->input('password');
		$kq = $customer->where('email',$email)->first();
		if (!$kq) {
			return redirect()->back()->with('thongbao_thatbai','Đăng nhập thất bại');
		}
		if (Hash::check($password, $kq->password)) {
			Session::put('name_customer',$kq->name);
			Session::put('id_customer',$kq->id);
			if (Session::get('cart')) {
				return redirect()->route('view_checkout');
			}
			return redirect()->route('get_home_page');
		}
		return redirect()->back()->with('thongbao_thatbai','Đăng nhập thất bại');	
	}
	public function add_customer(addCustomerRequest $req)
	{
		$customer = new Customer;
		$customer->name = $req->input('name');
		$customer->email = $req->input('email');
		$customer->address = $req->input('address');
		$customer->password = bcrypt($req->input('password'));
		$customer->phone = $req->input('phone');
		$customer->save();
		return redirect()->back()->with('thongbao','Bạn đã đăng ký thành công');

	}
	public function logout_customer(Request $req)
	{
		$req->session()->forget('name_customer');
		$req->session()->forget('id_customer');
		Session::flush();
		return redirect()->route('get_home_page');
	}
}
