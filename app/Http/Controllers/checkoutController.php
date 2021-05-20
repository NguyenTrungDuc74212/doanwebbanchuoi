<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Tinhthanhpho;
use App\Models\Customer;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Order_detail;
use Carbon\carbon;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\addCustomerRequest;
use App\Http\Requests\shippingRequest;

class checkoutController extends Controller
{
	public function get_checkout()
	{
		$city = Tinhthanhpho::orderby('matp','DESC')->get();
		if (Session::get('id_customer')) {
			$customer = Customer::find(Session::get('id_customer'));
			return view("website.checkout.checkout",compact('city','customer'));
		}
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
			return redirect()->back()->with('thongbao_login_thatbai','Đăng nhập thất bại');
		}
		if (Hash::check($password, $kq->password)) {
			Session::put('name_customer',$kq->name);
			Session::put('id_customer',$kq->id);
			if (Session::get('cart')) {
				return redirect()->route('view_checkout');
			}
			return redirect()->route('get_home_page');
		}
		return redirect()->back()->with('thongbao_login_thatbai','Đăng nhập thất bại');	
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
		return redirect()->back()->with('thongbao_login','Bạn đã đăng ký thành công');

	}
	public function logout_customer(Request $req)
	{
		$req->session()->forget('name_customer');
		$req->session()->forget('id_customer');
		Session::flush();
		return redirect()->route('get_home_page');
	}
	public function save_shipping(Request $req)
	{
		$validatedData = $req->validate([
			"method"=>"required",
			"notes"=>"required",
			"city"=>"required",
		],
		[
			"notes.required"=>"ghi chú không được bỏ trống",
			"method.required"=>"hình thức thanh toán không được bỏ trống",
			"city.required"=>"Bạn phải nhập thành phố của mình hiện đang sống"]
		);
		$code_random = substr(md5(microtime()),rand(0,20),6);
		$coupon = Session::get('coupon_ss');
		$mytime = Carbon::now();
		$soluong =0;


		if (Session::get('id_customer')) {
			$customer = Customer::find(Session::get('id_customer'));
			if ($req->samecheck==1) {
				$shipping = new Shipping;
				$shipping->name = $req->input('name');
				$shipping->email = $req->input('email');
				$shipping->city = $req->input('city');
				$shipping->customer_id = Session::get('id_customer');
				$shipping->address = $req->input('address');
				$shipping->phone = $req->input('phone');
				$shipping->notes = $req->input('notes');
				$shipping->method = $req->input('method');
				$shipping->status = 1; /*mặc định là đang xử lý*/
				$shipping->save();
				$shipping_id = $shipping->id;
				Session::put('id_shipping',$shipping_id);
				$cart = Session::get('cart');
				foreach ($cart as $value) {
					$soluong += $value['product_qty'];
				}
				$order = new Order;
				$order->customer_id = Session::get('id_customer');
				$order->shipping_id = $shipping_id;
				$order->total = Session::get('total');
				$order->status =1 ;/*mặc định là đang xử lý*/
				$order->order_code = $code_random;
				$order->quantity = $soluong;
				$order->order_date = $mytime->toDateString();
				if ($coupon) {
					$order->coupon = $coupon[0]['coupon_code'];
				}
				$order->save();
				$order_id = $order->id;

				foreach ($cart as $value) {
					$product = Product::find($value['product_id']);
					$order_detail = new Order_detail;
					$order_detail->order_id = $order_id;
					$order_detail->order_code = $code_random;
					$order_detail->product_id = $value['product_id'];
					$order_detail->unit = $value['product_unit'];
					$order_detail->soluong = $value['product_qty'];
					if ($product->persent_discount) {
						$order_detail->coupon = $product->persent_discount;
					}
					$order_detail->save();
				}
				if ($req->input('method')==1) {
					return redirect()->route('thanh_cong_atm');
				}
				elseif($req->input('method')==2) {
					echo 'thanh toán bằng tiền mặt';
				}
			}
			else{
				$validatedData = $req->validate([
					"email_2"=>"required|Email",
					"name_2"=>"required",
					"phone_2"=>"required|numeric",
					"address_2"=>"required",
					"method"=>"required",
					"notes"=>"required",
					"city"=>"required",
				],
				["email_2.required"=>"email không được để trống",
				"notes.required"=>"ghi chú không được bỏ trống",
				"email_2.Email"=>"email không hợp lệ",
				"name_2.required"=>"tên không được để trống",
				"phone_2.required"=>"số điện thoại không được để trống",
				"phone_2.numeric"=>"số điện thoại phải là số",
				"address_2.required"=>"địa chỉ không được để trống",
				"method.required"=>"hình thức thanh toán không được bỏ trống",
				"city.required"=>"Bạn phải nhập thành phố của mình hiện đang sống"]
			);
				$shipping = new Shipping;
				$shipping->name = $req->input('name_2');
				$shipping->email = $req->input('email_2');
				$shipping->city = $req->input('city');
				$shipping->customer_id = Session::get('id_customer');
				$shipping->address = $req->input('address_2');
				$shipping->phone = $req->input('phone_2');
				$shipping->notes = $req->input('notes');
				$shipping->method = $req->input('method');
				$shipping->status = 1; /*mặc định là đang xử lý*/
				$shipping->save();
				$shipping_id = $shipping->id;
				Session::put('id_shipping',$shipping_id);
				$cart = Session::get('cart');
				foreach ($cart as $value) {
					$soluong += $value['product_qty'];
				}
				$order = new Order;
				$order->customer_id = Session::get('id_customer');
				$order->shipping_id = $shipping_id;
				$order->total = Session::get('total');
				$order->status =1 ;/*mặc định là đang xử lý*/
				$order->order_code = $code_random;
				$order->quantity = $soluong;
				$order->order_date = $mytime->toDateString();
				if ($coupon) {
					$order->coupon = $coupon[0]['coupon_code'];
				}
				$order->save();
				$order_id = $order->id;

				foreach ($cart as $value) {
					$product = Product::find($value['product_id']);
					$order_detail = new Order_detail;
					$order_detail->order_id = $order_id;
					$order_detail->order_code = $code_random;
					$order_detail->product_id = $value['product_id'];
					$order_detail->unit = $value['product_unit'];
					if ($product->persent_discount) {
						$order_detail->coupon = $product->persent_discount;
					}
					$order_detail->soluong = $value['product_qty'];
					$order_detail->save();
				}
				if ($req->input('method')==1) {
					return redirect()->route('thanh_cong_atm');
				}
				elseif($req->input('method')==2) {
					return redirect()->route('thanh_cong_cash');
				}
			}
		}
		else{
			return redirect()->route('get_home_page')->with('thongbao_login_thatbai','Bạn phải đăng nhập để thanh toán!!!');
		}
		
	}
	public function checkout_success_atm(Request $req)
	{
		$cart = Session::get('cart');
		if ($cart) {
			foreach ($cart as $key => $value) {
			$product = Product::find($value['product_id']);
			$product->quantity = $product->quantity-$value['product_qty'];
			$product->save();
		}
		}

		$req->session()->forget('cart');
		$req->session()->forget('total');
		$req->session()->forget('fee');
		if (Session::get('coupon_ss')) {
			foreach (Session::get('coupon_ss') as $value) {
				$coupon = Coupon::where('code',$value['coupon_code'])->first();
				$coupon->quanlity = $coupon->quanlity-1;
				$coupon->save();
			}
		}
		$req->session()->forget('coupon_ss');
		if (Session::get('id_shipping')) {
			$customer = Customer::find(Session::get('id_customer'));
			$shipping = Shipping::find(Session::get('id_shipping'));
			$order = Order::where('shipping_id',$shipping->id)->first();
			$order_detail = Order_detail::where('order_id',$order->id)->get();
			$req->session()->forget('id_shipping');
			return view('website.checkout.checkout_success_atm',compact('customer','shipping','order','order_detail'));
		}
		return redirect()->route('get_home_page');

		
	}
	public function checkout_success_cash(Request $req)
	{
		$cart = Session::get('cart');
		if ($cart) {
			foreach ($cart as $key => $value) {
			$product = Product::find($value['product_id']);
			$product->quantity = $product->quantity-$value['product_qty'];
			$product->save();
		}
		}

		$req->session()->forget('cart');
		$req->session()->forget('total');
		$req->session()->forget('fee');
		if (Session::get('coupon_ss')) {
			foreach (Session::get('coupon_ss') as $value) {
				$coupon = Coupon::where('code',$value['coupon_code'])->first();
				$coupon->quanlity = $coupon->quanlity-1;
				$coupon->save();
			}
		}
		$req->session()->forget('coupon_ss');
		if (Session::get('id_shipping')) {
			$customer = Customer::find(Session::get('id_customer'));
			$shipping = Shipping::find(Session::get('id_shipping'));
			$order = Order::where('shipping_id',$shipping->id)->first();
			$order_detail = Order_detail::where('order_id',$order->id)->get();
			$req->session()->forget('id_shipping');
			return view('website.checkout.checkout_success_cash',compact('customer','shipping','order','order_detail'));
		}
		return redirect()->route('get_home_page');
	}
}
