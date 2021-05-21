<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\Coupon;
use Session;

class cartController extends Controller
{
	public function add_cart_ajax(Request $req)
	{
        // $req->session()->flush();
		$data = $req->all(); /*mảng product trả về*/
		$soluong = 0;
		$session_id = substr(md5(microtime()), rand(0,26),5); /*tạo ra chuỗi ngẫu nhiên có 5 số*/
		$cart = Session::get('cart');
		if ($cart==true) {
			$is_avaiable = 0;
			foreach ($cart as $key=> $value) {
				if ($value['product_id']==$data['cart_product_id']) {
					$is_avaiable ++;
					$cart[$key] = array(
						'session_id' =>$value['session_id'],
						'product_id' =>$value['product_id'],
						'product_name'=>$value['product_name'],
						'product_image'=>$value['product_image'],
						'product_price'=>$value['product_price'],
						'product_unit'=>$value['product_unit'],
						'product_qty'=>$value['product_qty']+1,
						'quantity_storage'=>$data['quantity_storage'],
					);
					Session::put('cart',$cart);
				}
			}
			if ($is_avaiable==0) {
				$cart[] = array(
					'session_id' =>$session_id,
					'product_id' =>$data['cart_product_id'],
					'product_name'=>$data['cart_product_name'],
					'product_image'=>$data['cart_product_image'],
					'product_price'=>$data['cart_product_price'],
					'product_unit'=>$data['cart_product_unit'],
					'product_qty'=>($data['cart_product_qty']),
					'quantity_storage'=>$data['quantity_storage'],
				);
				Session::put('cart',$cart);
			}
		}
		else {
			$cart[] = array(
				'session_id' =>$session_id,
				'product_id' =>$data['cart_product_id'],
				'product_name'=>$data['cart_product_name'],
				'product_image'=>$data['cart_product_image'],
				'product_price'=>$data['cart_product_price'],
				'product_unit'=>$data['cart_product_unit'],
				'product_qty'=> ($data['cart_product_qty']),
				'quantity_storage'=>$data['quantity_storage'],
			);
			Session::put('cart',$cart);
		}
		foreach ($cart as $value) {
				$soluong = $soluong + $value['product_qty'];
			}
			echo $soluong;

	}
	public function get_cart()
	{
		$product_top_sale=Product::orderBy('product_sold','DESC')->limit(4)->get();
		return view('website.cart.cart_ajax',compact('product_top_sale'));
	}
	public function delete_cart_ajax(Request $req)
	{
		$data = $req->all();
		$cart = Session::get('cart');
		if ($cart==true) {
			foreach ($cart as $key=> $value) {
				if ($value['session_id']==$data['session_id']) {
					unset($cart[$key]);
				}
			}
		}
		Session::put('cart',$cart);
	}
	public function cancel_cart(Request $req){
		$req->session()->forget('cart');
		return redirect()->back();
	}
	public function update_cart_ajax(Request $req)
	{
		$data = $req->all();
		$cart = Session::get('cart');
		if ($cart==true) {
			foreach ($cart as $key=> $value) {
				if ($value['quantity_storage']>$data['soluong']) {
					if ($value['session_id']==$data['session_id']) {
						$cart[$key]=array(
							'session_id' =>$value['session_id'],
							'product_id' =>$value['product_id'],
							'product_name'=>$value['product_name'],
							'product_image'=>$value['product_image'],
							'product_price'=>$value['product_price'],
							'product_unit'=>$value['product_unit'],
							'quantity_storage'=>$value['quantity_storage'],
							'product_qty'=>$data['soluong'],
						);
					}
				}
				else {
					return response()->json(['error' => 'error', 'product' =>$req->cart_product_name ]);
				}

			}
		}
		Session::put('cart',$cart);
	}
	public function check_coupon(Request $req)
	{
		$coupon = Coupon::where('code',$req->code)->first();
		if ($coupon) {
			if ($coupon->quanlity>0) {
				$coupon_ss = Session::get('coupon_ss');
				if ($coupon_ss==true) {
					$coupon_array[] = array(
						'coupon_code'=>$coupon->code,
						'coupon_tinhnang'=>$coupon->method,
						'coupon_value'=>$coupon->value_sale
					);
					Session::put('coupon_ss',$coupon_array);
				}
				else {
					$coupon_array[] = array(
						'coupon_code'=>$coupon->code,
						'coupon_tinhnang'=>$coupon->method,
						'coupon_value'=>$coupon->value_sale
					);
					Session::put('coupon_ss',$coupon_array);
				}
				Session::save();
				return redirect()->back()->with('thongbao','Nhập mã giảm giá thành công');

			}
			else{
				$req->session()->forget('coupon_ss');
				return redirect()->back()->with('error','Mã giảm giá đã hết');
			}
		}
		else {
			$req->session()->forget('coupon_ss');
			return redirect()->back()->with('error','Mã giảm giá không tồn tại');
		}
	}
}
