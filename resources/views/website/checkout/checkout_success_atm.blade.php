@extends('website.layout_site.index')
@section('content')
<section id="layout-content">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('get_home_page') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active" aria-current="page">Gửi đơn hàng thành công</li>
			</ol>
		</nav>
		<div class="view-cart">
			<h4 class="alert alert-danger mb-5" role="alert">
				Bạn đã đặt hàng thành công. <span class="font-weight-bold">Mã đơn hàng: {{ $order->order_code }}</span>
			</h4>
			<div class="row">
				@if ($customer)
				<div class="col-md-6">
					<h5 class="text-danger">Thông tin người đặt hàng</h5>
					<p>Tên người đặt hàng: <span class="text-primary">{{ $customer->name }}</span></p>
					<p>Số điện thoại: <span class="text-primary">{{ $customer->phone }}</span></p>
					<p>Email: <span class="text-primary">{{ $customer->email }}</span></p>
					<p>Địa chỉ: <span class="text-primary">{{ $customer->address }}</span></p>
				</div>
				@endif
				@if ($customer)
				<div class="col-md-6">
					<h5 class="text-danger">Thông tin người nhận hàng</h5>
					<p>Tên người nhận hàng: <span class="text-primary">{{ $shipping->name }}</span></p>
					<p>Số điện thoại: <span class="text-primary">{{ $shipping->phone }}</span></p>
					<p>Email: <span class="text-primary">{{ $shipping->email }}</span></p>
					<p>Địa chỉ: <span class="text-primary">{{ $shipping->address }}</span></p>
				</div>
				@else
                  <div class="col-md-12">
					<h5 class="text-danger">Thông tin người nhận hàng</h5>
					<p>Tên người nhận hàng: <span class="text-primary">{{ $shipping->name }}</span></p>
					<p>Số điện thoại: <span class="text-primary">{{ $shipping->phone }}</span></p>
					<p>Email: <span class="text-primary">{{ $shipping->email }}</span></p>
					<p>Địa chỉ: <span class="text-primary">{{ $shipping->address }}</span></p>
				</div>
				@endif
			</div>
			<h5 class="text-success">Danh sách sản phẩm:</h5>

			<table class="table">
				<thead>
					<tr>
						<th scope="col">STT</th>
						<th scope="col">Tên sản phẩm</th>
						<th scope="col">Hình ảnh</th>
						<th scope="col">Giá</th>
						<th scope="col">Số lượng</th>
						<th scope="col">Thành tiền</th>
					</tr>
				</thead>
				@php
					$i = 1;
				@endphp
				<tbody>
					@foreach ($order_detail as $value)
						<tr>
						<th scope="row">{{ $i++ }}</th>
						<td>{{ $value->product->name }}</td>
						<td><img src="{{asset('public/upload/product/'.$value->product->image)}}" alt="{{ $value->product->name }}" width="100px"></td>
						<td>{{ currency_format($value->product->price) }}</td>
						<td>{{ $value->soluong }}</td>
						<td>{{ currency_format($value->product->price*$value->soluong) }}</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="5" class="text-right">Tổng giá trị đơn hàng: <span class="font-weight-bold text-danger">{{ currency_format($order->total) }}</td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<p class="text-danger">Mọi thắc mắc cũng như thay đổi thông tin đơn hàng. Bạn vui lòng gọi đến hotline: 0989.96.69.96</p>
			<div class="text-center mb-5"><a href="{{ route('get_home_page') }}" class="btn btn-primary">Quay lại trang chủ</a></div>
		</div>
	</div>
</section>
@stop