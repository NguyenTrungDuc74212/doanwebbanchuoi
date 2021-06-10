@extends('layout.admin_layout')
@push('title')
<title>Phiếu đổi hàng</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Phiếu đổi hàng</h1>
			@if (session('error'))
			<p class="text-danger">{{ session('error') }}</p>
			@endif
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Phiếu đổi hàng</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success" style="padding: 20px">
	<div class="card-header">
		<h3 class="card-title">Đơn hàng : <b>{{$order->order_code}}</b></h3>
	</div>
	<div class="card-body">
		<form action="{{ route('save_exchange',$order_code) }}" method="POST">
			@csrf
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
				<div class="col-md-12">
					<h5><b>Thông tin phiếu đổi trả</b></h5>
					<label>Mã đơn hàng</label>
					<input type="text" name="order_code" class="form-control" value="{{ $order_code }}" readonly>
					@error('date_input')
					<p class="text-danger">{{ $message }}</p>
					@enderror
					<br>
					<label>Ngày đổi</label>
					<input type="text" name="voucher_date" id="datepicker_5" placeholder="Nhập ngày đổi" class="form-control" autocomplete="off" required="">
					@error('date_input')
					<p class="text-danger">{{ $message }}</p>
					@enderror
				</div>
			</div>
		<br>
		<div class="row">
			<table id="customers">
				<tr>
					<th>Chọn</th>
					<th>Mã sản phẩm</th>
					<th>Tên sản phẩm</th>
					<th>Giá</th>
					<th>Số lượng</th>
					<th>Giảm giá</th>
					<th>Thành tiền</th>
					<th colspan="2">Lấy hàng (Kho|Sản phẩm)</th>
				</tr>
				@foreach ($order->orderDetails as $item)
				<tr>
					<td rowspan="{{count($item->warehouse_order)+1}}">
					<input type="checkbox" class="my-checkbox-exchange" value="{{ $item->product_id }}" class="form-control" name="product_id[]">
					</td>
					<td rowspan="{{count($item->warehouse_order)+1}}">SP{{$item->product->id}}</td>
					<input type="hidden" value="{{ $item->id }}" disabled name="order_detail[]" class="input{{$item->product_id}}">
					<td rowspan="{{count($item->warehouse_order)+1}}">{{$item->product->name}}</td>
					<td rowspan="{{count($item->warehouse_order)+1}}">{{currency_format($item->product->price)}}</td>
					<td rowspan="{{count($item->warehouse_order)+1}}"><input type="number" value="{{$item->soluong}}" disabled name="quantity[]" class="text-center input{{$item->product_id}}" min="1" required="" max="{{ $item->soluong }}"></td>
					<td rowspan="{{count($item->warehouse_order)+1}}">{{$item->coupon}}%</td>
					<td rowspan="{{count($item->warehouse_order)+1}}">{{currency_format(($item->price_current)*($item->soluong)*((100-$item->coupon)/100))}}</td>

					@foreach ($item->warehouse_order as $value)
					<tr>
						<td>{{$value->warehouse_product->warehouse->warehouse_name}}</td>
						<td>{{$value->quantity}}</td>
			            <input type="hidden" value="{{ $value->warehouse_product_id }}" name="warehouse_product_id[]">
					</tr>
					@endforeach
					@if(count($item->warehouse_order)==0)
					<td>Đã hủy đơn</td>
					@endif
				</tr>
				@endforeach

			</table>
		</div>
		<input type="submit" name="" class="btn btn-success form-control" style="margin: 10px 0px" value="Lập phiếu">
	</form>
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
@section('script')
	<script>
		$(".my-checkbox-exchange").click(function()
		{
			if($(this).is(':checked'))
			{
				var id='.input'+$(this).val();
				$(id).removeAttr("disabled");
				
			}else{
				var id='.input'+$(this).val();
				$(id).attr("disabled", 'disabled');
				
			}
			
		})
	</script>
@endsection
