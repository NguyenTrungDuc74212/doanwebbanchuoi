<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\WarehouseOrder;
use App\Models\Repost;
use App\Models\Notification;
use App\Models\return_voucher;
use App\Models\Order_detail;
use App\Models\return_voucher_detail;
use App\Models\WarehouseProduct;
use Session;
use DB;
use Auth;
use Carbon\carbon;

class orderController extends Controller
{
  public function getListOrder()
  {
    $status=-1;
    $status_pay=-1;
    $orders=Order::orderBy('created_at', 'DESC')->paginate(10);
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
  public function getOrderDetail($id,$notification_id=null)
  {
    if($notification_id!=null)
    {
      $notification=Notification::find($notification_id);
      if($notification==null)
      {
       return redirect()->route('order_get_detail',$id);
     }
     $notification->delete();
   }
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
  DB::beginTransaction();
  try{
    $order=Order::find($req->order_id);
    if($order->status==4||$order->status==5||$order->status==6)
    {
      return redirect()->back()->with('error','Đơn hàng đã kết thúc không thể thay đổi trạng thái!!!');
    }
    $order->status=$req->status;
    $order->status_pay=1;
    $order->save();

    if($req->status==4)
    {
      $repost=Repost::where('date_repost',$order->order_date)->first();
      $coupon=Coupon::where('code',$order->coupon)->first();
      $old_total_revenue=0;
      $old_total_quantity=0;
      if($repost==null)
      {
        $repost=new Repost();
        $repost->date_repost=$order->order_date;
        $repost->total_order=0;
        $repost->mouth_repost=Carbon::parse($order->order_date)->format('m-Y');
      }else{
        $old_total_revenue=  $repost->total_revenue;
        $old_total_quantity= $repost->total_quantity;
      }
      $tongTienHang=0;
      $tongSanPham=0;
      foreach($order->orderDetails as $item)
      {
        $item->product->product_sold+=$item->soluong;
        $item->product->save();
        $tongSanPham+=$item->soluong;
        $tongTienHang+=($item->product->price)*($item->soluong)*((100-$item->coupon)/100);
      }
      $repost->total_quantity=$tongSanPham+$old_total_quantity;
      $tienGiamGia=0;
      if($coupon!=null)
      {
        if($coupon->value_sale<=100)
        {
          $tienGiamGia=$tongTienHang*($coupon->value_sale);
        }else
        {
          $tienGiamGia=$tongTienHang-$coupon->value_sale;
        }
      }
      $repost->total_revenue=($tongTienHang-$tienGiamGia)+$old_total_revenue;

      $repost->save();
      DB::commit();
    }
  }catch(Exception $ex)
  {
    DB::rollback();
    throw new Exception("Lỗi:", $ex->getMessage());

  }
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
public function cancelOrder(Request $req)
{
  DB::beginTransaction();
  try{
    $order=Order::find($req->id_order);
    if($order->status!=1&&$order->status!=-1)
    {
      return redirect()->route('order_history')->with('thongbao_loi','Đơn hàng đã xử lý không thể hủy!');
    }
    if($order->status_pay!=0)
    {
      return redirect()->route('order_history')->with('thongbao_loi','Đơn hàng đã thanh toán!');
    }
    $order->status=5;
    if($order->cancel_order){
      $order->cancel_order=$req->cancle_notes;
    }
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
public function deleteNotifications()
{
  DB::beginTransaction();
  try{
    Auth::user()->notifications()->delete();
    DB::commit();
    return redirect()->back();
  }catch(Exception $ex)
  {
    DB::rollback();
    throw new Exception($ex->getMessage());

  }
}
public function get_view_exchange($order_code)
{
  $order = Order::where('order_code',$order_code)->first();
  return view('admin.order.view_exchange',compact('order','order_code'));
}
public function save_exchange(Request $req,$order_code)
{
  DB::beginTransaction();
  try{
   $voucher = new return_voucher();
   $voucher->order_code = $order_code;
   $voucher->voucher_date = $req->voucher_date;
   $voucher->voucher_code = 'oidoioi';
   $voucher->save();
   $voucher->voucher_code = get_code($voucher->id,'RV');
   $voucher->save();


   $product_id = $req->product_id;
   $quantity = $req->quantity;
   $order_detail_id = $req->order_detail;

foreach ($order_detail_id as $value) {
    $order_detail = Order_detail::find($value);
foreach ($order_detail->warehouse_order as $item) {
    $voucher_detail = new return_voucher_detail();
    $voucher_detail->product_id = $order_detail->product_id;
    $voucher_detail->quantity = $order_detail->soluong;
    $voucher_detail->voucher_id = $voucher->id;
    $voucher_detail->return_quantity = $order_detail->soluong;
    $voucher_detail->return_warehouse_id = $item->warehouse_product_id;
    $voucher_detail->save();
}    
}
         

   for ($i = 0; $i < count($product_id) ; $i++) {

    $order_detail_quantity =  Order_detail::find($order_detail_id[$i]);
    do{              
     /*khi số lượng đổi < số lượng hiện tại trong kho*/
     $warehouseProduct=WarehouseProduct::where('product_id',$product_id[$i])->where('quantity','>',0)->where('status',0)->orderBy('expiration_date','ASC')->first(); /*kho lấy ra*/

     if ($warehouseProduct) {

       if ($quantity[$i]<$order_detail_quantity->soluong) {
         $warehouse_order = WarehouseOrder::where('order_detail_id',$order_detail_id[$i])->first();
         $warehouse_order->quantity = $order_detail_quantity->soluong-$quantity[$i];
         $warehouse_order->save();
       }

       if ($quantity[$i]<$warehouseProduct->quantity) {
         $warehouseProduct->quantity = $warehouseProduct->quantity-$quantity[$i];
         $warehouseProduct->save();


        $quantity[$i] = $quantity[$i]-$warehouseProduct->quantity;

       }
       else {
        $warehouseProduct->quantity = $quantity[$i]-$warehouseProduct->quantity;
        $warehouseProduct->save();


        $warehouseOrder_new = new WarehouseOrder();
        $warehouseOrder_new->quantity = $quantity[$i]; 
        $warehouseOrder_new->warehouse_product_id = $warehouseProduct->id;
        $warehouseOrder_new->order_detail_id = $order_detail_id[$i];
        $warehouseOrder_new->save();

        $quantity[$i] = $quantity[$i]-$warehouseProduct->quantity;
      }
    }
    else {

     $warehouseProduct_new=WarehouseProduct::where('quantity','>',0)->where('status',0)->orderBy('expiration_date','ASC')->where('product_id',$product_id[$i])->first(); /*kho lấy ra*/

     if ($quantity[$i]<$warehouseProduct_new->quantity) {
       $warehouseProduct_new->quantity = $warehouseProduct_new->quantity-$quantity[$i];

       $warehouseProduct_new->save();


       $warehouseOrder_new = new WarehouseOrder();
       $warehouseOrder_new->quantity = $quantity[$i];
       $warehouseOrder_new->warehouse_product_id = $warehouseProduct_new->id;
       $warehouseOrder_new->order_detail_id = $order_detail_id[$i];
       $warehouseOrder_new->save(); 

       $quantity[$i] = $quantity[$i]-$warehouseProduct_new->quantity; 
     }
     else {

       $warehouseProduct_new->quantity = $quantity[$i]-$warehouseProduct_new->quantity;
       $warehouseProduct_new->save();

       $warehouseOrder_new = new WarehouseOrder();
       $warehouseOrder_new->quantity = $quantity[$i];
       $warehouseOrder_new->warehouse_product_id = $warehouseProduct_new->id;
       $warehouseOrder_new->order_detail_id = $order_detail_id[$i];
       $warehouseOrder_new->save();

       $quantity[$i] = $warehouseProduct_new->quantity-$quantity[$i];
     }
   }

 }while($quantity[$i]>0);

}
 $voucher_detail = return_voucher_detail::where('voucher_id',$voucher->id)->get();
  foreach ($voucher_detail as $value) {
    $value->warehouse_product->quantity += $value->return_quantity;
    $value->warehouse_product->save(); 
  }

  return redirect()->route('get_list_return')->with('thongbao','Lập phiếu nhập thành công!!!');


DB::commit();
}catch(Exception $ex)
{
  DB::rollBack();
  throw new Exception($ex->getMessage());
}
}
}
