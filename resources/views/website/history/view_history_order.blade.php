@extends('website.layout_site.index')
@section('content')
<div class="card card-success" style="padding: 20px">
	<div class="card-header" style="background: #269300;
	color: white;">
	<h3 class="card-title">Đơn hàng : <b>{{$order->order_code}}</b> chi tiết</h3>
</div>
<div class="card-body">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h5><b>Thông tin đơn hàng</b></h5>
				<p style="display:blog"><b>Ngày tạo:</b> {{$order->order_date}}</p>
				<p><b>Trạng thái:</b></p>
				<select class="form-control" id="status-order" disabled="" @if($order->status==4||$order->status==5||$order->status==6) disabled @endif>
					<option value="">---Chọn---</option>
					<option value="1" {{ $order->status==1?'selected':'' }}>Chờ xác nhận</option>
					<option value="2" {{ $order->status==2?'selected':'' }}>Chờ lấy hàng</option>
					<option value="3" {{ $order->status==3?'selected':'' }}>Đang giao</option>
					<option value="4" {{ $order->status==4?'selected':'' }}>Đã giao</option>
					<option value="5" {{ $order->status==5?'selected':'' }}>Đã hủy</option>
					<option value="6" {{ $order->status==6?'selected':'' }}>Trả hàng</option>
				</select>
				<br>
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
				<p><b>Trạng thái thanh toán:</b></p>
				<select class="form-control" id="status-pay-order" disabled="" @if($order->status_pay==1) disabled @endif>
					<option value="">---Chọn---</option>
					<option value="0" {{ $order->status_pay==0?'selected':'' }}>Chưa thanh toán</option>
					<option value="1" {{ $order->status_pay==1?'selected':'' }}>Đã thanh toán</option>
				</select>
				<br>
			</div>
			<div class="col-md-4">
				<h5><b>Thông tin khách hàng</b></h5>
				<p style="display:blog"><b>Khách hàng</b> : {{$order->customer->name}}</p>
				<p style="display:blog"><b>Email</b>      : {{$order->customer->email}}</p>
				<p style="display:blog"><b>Phone</b>      : {{$order->customer->phone}}</p>
			</div>
			<div class="col-md-4">
				<h5><b>Thông tin giao hàng</b></h5>
				<p style="display:blog"><b>Người nhận</b> : {{$order->shipping->name}}</p>
				<p style="display:blog"><b>Phone</b>      : {{$order->shipping->phone}}</p>
				<p style="display:blog"><b>Email</b>      : {{$order->shipping->email}}</p>
				<p style="display:blog"><b>Địa chỉ</b>    : {{$order->shipping->address}}</p>
			</div>
		</div>
		<div class="row">
			
			<table id="customers">
				<tr>
					<th>Mã sản phẩm</th>
					<th>Tên sản phẩm</th>
					<th>Giá</th>
					<th>Số lượng</th>
					<th>Giảm giá</th>
					<th>Thành tiền</th>
				</tr>
				@foreach ($order->orderDetails as $item)
				<tr>
					<td>SP{{$item->product->id}}</td>
					<td>{{$item->product->name}}</td>
					<td>{{currency_format($item->product->price)}}</td>
					<td>{{$item->soluong}}</td>
					<td>{{$item->coupon}}%</td>
					<td>{{currency_format(($item->price_current)*($item->soluong)*((100-$item->coupon)/100))}}</td>
				</tr>
				@endforeach

			</table>
			<form>
				@csrf
				{{-- <div class="card-footer"> --}}
					<div class="float-right" style="margin: 12px 0px;">
						<p><b class="text-primary">Tổng số lượng sản phẩm: </b>{{$amountArray['tongSanPham']}}</p>
						<p><b class="text-primary">Tổng tiền hàng: </b>{{currency_format($amountArray['tongTienHang'])}}</p>
						<p><b class="text-primary">Tiền trừ giảm giá: </b>{{currency_format($amountArray['tienTruGiamGia'])}}</p>
						<p><b class="text-danger">Tổng tiền thanh toán: </b>{{currency_format($amountArray['tongTienThanhToan'])}}</p>
					</div>
				{{-- </div> --}}
			</form>
		</div>
	</div>
</div>
<!-- /.card-body -->
</div>
<style>
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
</style>
{{-- thay đổi trạng thái của đơn hàng --}}
<script>
	$(document).ready(function() {
		$(document).on('change','#status-order',function(){
			var status = $(this).val();
			var order_id = if(){{$order->id}};
			var token =$('input[name="_token"]').val();
			if (status) {
				swal({
					title: 'Bạn có muốn thay đổi trạng thái không?!!!',
					icon: "warning",
					buttons:['không','ok'],
				}).then((ok)=>{
					if (ok) {
						$.ajax({
							url: '{{ route('change_status_order') }}',
							type: 'POST',
							data:{_token:token,order_id:order_id,status:status},
							success:function(data) /*dữ liệu(data) trả về bên function*/
							{   
								swal({
									title: 'Thay đổi trạng thái thành công!!!',
									icon: "success",
									button:"quay lại",
								}).then((ok)=>{
									window.location.reload();
								});
							}
						}); 
					}
					else {
						window.location.reload();
					}
				}); 
			} 
		});
	});
	$(document).ready(function() {
		$(document).on('change','#status-pay-order',function(){
			var status = $(this).val();
			var order_id = {{$order->id}};
			var token =$('input[name="_token"]').val();
			if (status) {
				swal({
					title: 'Bạn có muốn thay đổi trạng thái không?!!!',
					icon: "warning",
					buttons:['không','ok'],
				}).then((ok)=>{
					if (ok) {
						$.ajax({
							url: '{{ route('change_status_pay_order') }}',
							type: 'POST',
							data:{_token:token,order_id:order_id,status:status},
							success:function(data) /*dữ liệu(data) trả về bên function*/
							{   
								swal({
									title: 'Thay đổi trạng thái thành công!!!',
									icon: "success",
									button:"quay lại",
								}).then((ok)=>{
									window.location.reload();
								});
							}
						}); 
					}
					else {
						window.location.reload();
					}
				}); 
			} 
		});
	});
</script>
@stop
