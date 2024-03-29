@extends('layout.admin_layout')
@push('title')
<title>Chi tiết đơn hàng</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Chi tiết đơn hàng</h1>
			@if (session('error'))
			<p class="text-danger">{{ session('error') }}</p>
			@endif
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Chi tiết đơn hàng</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success" style="padding: 20px">
	<div class="card-header">
		<h3 class="card-title">Đơn hàng : <b>{{$order->order_code}}</b> chi tiết</h3>
	</div>
	<div class="card-body">
        <div class="container">
            <div class="row my-row">
				<div class="col-md-6">
					<h5><b>Thông tin đơn hàng</b></h5>
					<form action="">
						@csrf
					<p style="display:blog"><b>Ngày tạo:</b> {{$order->order_date}}</p>
					<p style="display:blog"><b>Mã giảm giá :</b>
						@if($coupon!=null)
						{{$coupon->code}}
						@if($coupon->value_sale<=100)
						({{$coupon->rate}}%)
						@else
						({{currency_format($coupon->value_sale)}})
						@endif
						@else
						Không có
						@endif
					</p>
					<p><b>Phương thức thanh toán:</b> @if($order->shipping->method==1) Chuyển khoản @else Thanh toán khi nhận hàng @endif</p>
					</form>
				</div>
				<div class="col-md-6">
					<p><b>Trạng thái:</b></p>
					<select class="form-control" id="status-order" @if($order->status==4||$order->status==5||$order->status==6) disabled @endif>
						<option value="">---Chọn---</option>
						<option value="1" {{ $order->status==1?'selected':'' }}>Chờ xác nhận</option>
						<option value="2" {{ $order->status==2?'selected':'' }}>Chờ lấy hàng</option>
						<option value="3" {{ $order->status==3?'selected':'' }}>Đang giao</option>
						<option value="4" {{ $order->status==4?'selected':'' }}>Đã giao</option>
						<option value="5" {{ $order->status==5?'selected':'' }}>Đã hủy</option>
						<option value="6" {{ $order->status==6?'selected':'' }}>Trả hàng</option>
					</select>
						<p><b>Trạng thái thanh toán:</b></p>
					<select class="form-control" id="status-pay-order" @if($order->status_pay==1) disabled @endif>
						<option value="">---Chọn---</option>
						<option value="0" {{ $order->status_pay==0?'selected':'' }}>Chưa thanh toán</option>
						<option value="1" {{ $order->status_pay==1?'selected':'' }}>Đã thanh toán</option>
					</select>
				</div>
			</div>
			<div class="row my-row">
				<div class="col-md-12">
					<h5><b>Thông tin khách hàng</b></h5>
					<div class="infor-order">
					@if($order->customer!=null)
					<p style="display:blog"><b>Khách hàng</b> : {{$order->customer->name}}</p>
					<p style="display:blog"><b>Email</b>      : {{$order->customer->email}}</p>
					<p style="display:blog"><b>Phone</b>      : {{$order->customer->phone}}</p>
					@else
					<p> Khách hàng không có tài khoản.</p>
					@endif
					</div>
				</div>
			</div>
			<div class="row my-row">
				<div class="col-md-6">
					<h5><b>Thông tin giao hàng</b></h5>
					<div class="infor-order">
					<p style="display:blog"><b>Người nhận</b> : {{$order->shipping->name}}</p>
					<p style="display:blog"><b>Phone</b>      : {{$order->shipping->phone}}</p>
					<p style="display:blog"><b>Email</b>      : {{$order->shipping->email}}</p>
					</div>
				</div>
				<div class="col-md-6">
					<p style="display:blog"><b>Địa chỉ</b>    : {{$order->shipping->address}}</p>
					<p style="display:blog"><b>Ghi chú</b>    : {{$order->shipping->notes}}</p>
				</div>
			</div>
            </div>
			<br>
		<div class="row">
				
<table id="customers">
	<tr>
	  <th>Mã sản phẩm</th>
	  <th>Tên sản phẩm</th>
	  <th>Giá</th>
	  <th>Số lượng</th>
	  <th>Giảm giá</th>
	  <th>Thành tiền</th>
	  <th colspan="3">Lấy hàng (Kho|Sản phẩm|Lô hết hạn)</th>
	</tr>

	@foreach ($order->orderDetails as $item)
	<tr>
		<td rowspan="{{count($item->warehouse_order)+1}}">SP{{$item->product->id}}</td>
		<td rowspan="{{count($item->warehouse_order)+1}}">{{$item->product->name}}</td>
		<td rowspan="{{count($item->warehouse_order)+1}}">{{currency_format($item->product->price)}}</td>
		<td rowspan="{{count($item->warehouse_order)+1}}">{{$item->soluong}}</td>
		<td rowspan="{{count($item->warehouse_order)+1}}">{{$item->coupon}}%</td>
		<td rowspan="{{count($item->warehouse_order)+1}}">{{currency_format(($item->price_current)*($item->soluong)*((100-$item->coupon)/100))}}</td>

		@foreach ($item->warehouse_order as $value)
		<tr>
				<td>{{$value->warehouse_product->warehouse->warehouse_name}}</td>
				<td>{{$value->quantity}}</td>
				<td>{{$value->warehouse_product->expiration_date}}</td>
			</tr>
		@endforeach

		@if(count($item->warehouse_order)==0)
			<td>Đã hủy đơn</td>
		@endif
	</tr>
	@endforeach

  </table>
			</div>
        </div>
		@if($order->cancel_order!='')
		<div class="">
			<div class="float-left mt-3 ml-2">
			<h4 class="text-danger">Đơn hàng đã bị hủy do khách hàng</h4>
			<p>Lý do:</p>
			<p>{{$order->cancel_order}}</p>
		</div>
	</div>
		@endif
	
			<div class="card-footer">
				<div class="float-left">
				<p class="money"><b class="text-primary ">Tổng số lượng sản phẩm: </b>{{$amountArray['tongSanPham']}}</p>
				<p class="money"><b class="text-primary">Tổng tiền hàng: </b>{{currency_format($amountArray['tongTienHang'])}}</p>
				</div>
				<div class="float-right">	
				<p  class="money"><b class="text-primary">Tiền trừ giảm giá: </b>{{currency_format($amountArray['tienTruGiamGia'])}}</p>
				<p class="money"><b class="text-danger">Tổng tiền thanh toán: </b>{{currency_format($amountArray['tongTienThanhToan'])}}</p>
			</div>
			</div>
	</div>
	<!-- /.card-body -->
</div>
<style>
	select.form-control {
    width: 54%;
    height: 35px;
}
	#customers {
	  font-family: Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
	}
	
	#customers td, #customers th {
	  border: 1px solid #ddd;
	  padding: 8px;
	}
	
	#customers tr:nth-child(even){background-color: #f2f2f2;}
	
	#customers tr:hover {background-color: #ddd;}
	
	#customers th {
	  padding-top: 12px;
	  padding-bottom: 12px;
	  text-align: left;
	  background-color: #bf8e34;
	  color: white;
	}

	element.style {
}
#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}
table, th, td {
    border: 1px solid #00000045 !important;
    border-collapse: collapse !important;
}
.my-row {
	border: 0.1px solid #80808075;
    position: relative;
    margin-top: 3%;
    padding: 10px;
}
h5 {
    position: absolute;
    top: -27px;
    background-color: white;
}

p.money {
    border: 1px solid;
    padding: 16px;
    text-align: center;
}

.float-left {
    width: 50%;
}

.float-right {
    width: 49%;
}
	</style>
	{{-- thay đổi trạng thái của đơn hàng --}}
@stop
