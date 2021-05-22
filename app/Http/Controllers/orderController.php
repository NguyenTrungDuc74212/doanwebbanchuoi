<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Coupon;
<<<<<<< HEAD
use App\Models\WarehouseOrder;
=======
>>>>>>> c540d5bb6168e8ab5d1d711e9f433b0d4b02b399
use Session;
use DB;

class orderController extends Controller
{
    public function getListOrder()
    {
        $status=-1;
        $status_pay=-1;
        $orders=Order::orderBy('order_date', 'DESC')->paginate(10);
        return view('admin.order.list_order',compact('orders','status','status_pay'));
    }
    public function getByStatus($status,$status_pay)
    {
        $orders=null;
        if($status!=-1&&$status_pay!=-1)
        {
            $orders=Order::where('status',$status)->where('status_pay',$status_pay)->orderBy('order_date', 'DESC')->paginate(10);
        }
        if($status!=-1&&$status_pay==-1)
      {
        $orders=Order::where('status',$status)->orderBy('order_date', 'DESC')->paginate(10);
      }
      if($status==-1&&$status_pay!=-1)
      {
        $orders=Order::where('status_pay',$status_pay)->orderBy('order_date', 'DESC')->paginate(10);
      }
      return view('admin.order.list_order',compact('orders','status','status_pay'));
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

    //lịch sử đơn hàng
    public function history()
    {
        if (!Session::get('id_customer')) {
            return redirect()->route('login_customer')->with('thongbao_login_thatbai','Hãy đăng nhập để em lịch sử đơn hàng');
        }else{
            $orders = Order::where('customer_id',Session::get('id_customer'))->orderBy('id','DESC')->paginate(10);
            if($orders){
               return view('website.history.history',compact('orders')); 
            }
            
        }
    }
    public function view_history_order($id)
    {
        if (!Session::get('id_customer')) {
            return redirect()->route('login_customer')->with('thongbao_login_thatbai','Hãy đăng nhập để em lịch sử đơn hàng');
        }else{
            /*xem lịch sử đơn hàng*/
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
           return view('website.history.view_history_order',compact('order','coupon','amountArray')); 
        }
    }
<<<<<<< HEAD
    public function cancelOrder(Request $req)
    {
        DB::beginTransaction();
        try{
        $order=Order::find($req->id_order);
        if($order->status!=1)
        {
            return redirect()->route('order_history')->with('thongbao_loi','Đơn hàng đã xử lý không thể hủy!');
        }
        if($order->status_pay!=0)
        {
            return redirect()->route('order_history')->with('thongbao_loi','Đơn hàng đã thanh toán!');
        }
        $order->status=5;
        $order->cancel_order=$req->cancle_notes;
        $order->save();
        foreach($order->orderDetails as $orderDetail)
        {
            $orderDetail->product->quantity=$orderDetail->soluong+$orderDetail->product->quantity;
            $orderDetail->product->save();
            $warehouseOrder=WarehouseOrder::where('order_detail_id',$orderDetail->id)->get();
            foreach($warehouseOrder as $item)
            {
                $item->warehouse_product->quantity= $item->warehouse_product->quantity+$item->quantity;
                $item->warehouse_product->save();
                $item->warehouse_product->warehouse->quantity_now=$item->warehouse_product->warehouse->quantity_now+$item->quantity;
                $item->warehouse_product->warehouse->save();
                $item->delete();
               
            }
        }
        DB::commit();
        return redirect()->route('order_history')->with('thanhcong','Hủy đơn hàng thành công!');
    }catch(Exception $ex)
    {
        DB::rollBack();
        throw new Exception($ex->getMessage());
    }
    }
=======
>>>>>>> c540d5bb6168e8ab5d1d711e9f433b0d4b02b399
}
