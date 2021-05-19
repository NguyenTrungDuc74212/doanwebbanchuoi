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
}
