<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use App\Http\Requests\addCouponRequest;

class CouponController extends Controller
{
	public function insert_coupon()
	{
		return view('admin.coupon.add_coupon');
	}
<<<<<<< HEAD
=======
	public function khoa_coupon($id)
	{
		$coupon = Coupon::find($id);
		$coupon->coupon_status = 0;
		$coupon->save();
		return redirect()->back()->with('thongbao','khóa mã giảm giá sản phẩm thành công');
	}
	public function kichhoat_coupon($id){
       $coupon = Coupon::find($id);
		$coupon->coupon_status = 1;
		$coupon->save();
		return redirect()->back()->with('thongbao','kích hoạt mã giảm giá sản phẩm thành công');
	}
>>>>>>> c540d5bb6168e8ab5d1d711e9f433b0d4b02b399
	public function save_coupon(addCouponRequest $req)
	{
		$coupon = new Coupon;
		$coupon->name = $req->input('name');
		$coupon->code = $req->input('code');
		$coupon->coupon_date_start = $req->input('coupon_date_start');
		$coupon->coupon_date_end = $req->input('coupon_date_end');
		$coupon->quanlity = $req->input('quanlity');
		$coupon->method = $req->input('method');
		$coupon->value_sale = $req->input('value_sale');
		$coupon->save();
		return redirect()->route('list_coupon')->with('thongbao','Thêm mã giảm giá thành công');
	}
	public function list_coupon()
	{
<<<<<<< HEAD
		$today = Carbon::now()->format('d/m/Y');
		
=======
		$today = Carbon::now()->format('Y-m-d');
>>>>>>> c540d5bb6168e8ab5d1d711e9f433b0d4b02b399
		$coupon_query =Coupon::query();
        $coupon_query->latest();
        $coupon=$coupon_query->paginate(5);
		return view('admin.coupon.list_coupon',compact('coupon','today'));
	}
}
