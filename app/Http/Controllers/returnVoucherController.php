<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\return_voucher;
use App\Models\return_voucher_detail;
use App\Models\Order;

class returnVoucherController extends Controller
{
	public function get_list_return(Request $req)
	{
		$return = return_voucher::all();
		return view('admin.return_voucher.list_return',compact('return'));
	}
	public function view_detail_return($order_code,Request $req)
	{
		$order = Order::where('order_code',$order_code)->first();
		$voucher = return_voucher::where('order_code',$order_code)->first();
		$voucher_detail = return_voucher_detail::where('voucher_id',$voucher->id)->first();
		return view('admin.return_voucher.view_detail_return',compact('order','order_code','voucher_detail','voucher'));
	}
}
