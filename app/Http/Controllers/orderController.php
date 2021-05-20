<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Coupon;


class orderController extends Controller
{
    public function getListOrder()
    {
        $orders=Order::paginate(10);
        return view('admin.order.list_order',compact('orders'));
    }
    public function getOrderDetail($id)
    {
        $order=Order::find($id);
        $coupon=Coupon::where('code',$order->coupon)->first();
        
        $amountArray= array();
        $tongTienHang=0;
        $tongSanPham=0;
        foreach($order->orderDetails as $item)
        {
            $tongSanPham+=$item->soluong;
            $tongTienHang+=($item->product->price)*($item->soluong)*((100-$item->coupon)/100);
        }
        $amountArray['tongTienHang']=$tongTienHang;
        $amountArray['tongSanPham']=$tongSanPham;
        $amountArray['tienTruGiamGia']=0;
        if($coupon!=null)
        {
            if($coupon->value_sale<=100)
            {
                $amountArray['tienTruGiamGia']=$tongTienHang*($coupon->value_sale);
            }else
            {
                $amountArray['tienTruGiamGia']=$tongTienHang-$coupon->value_sale;
            }
        }
        $amountArray['tongTienThanhToan']=$tongTienHang-$amountArray['tienTruGiamGia'];
        return view('admin.order.order_detail',compact('order','coupon','amountArray'));
    }
    public function changeStatus(Request $req)
    {
   
        $order=Order::find($req->order_id);
        if($order->status==4||$order->status==5||$order->status==6)
        {
            return redirect()->back()->with('error','Đơn hàng đã kết thúc không thể thay đổi trạng thái!!!');
        }
        $order->status=$req->status;
        $order->save();
    }
    public function changeStatusPay(Request $req)
    {
    
        $order=Order::find($req->order_id);
        if($order->status_pay==1)
        {
            return redirect()->back()->with('error','Đơn hàng đã thanh toán không thể thay đổi!!!');
        }
        $order->status_pay=$req->status;
        $order->save();
    }
}
