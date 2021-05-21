@extends('layout.admin_layout')
@push('title')
<title>Thêm mã giảm giá</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Thêm  mã giảm giá</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Thêm mã giảm giá</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success" style="padding: 20px">
	<div class="card-header">
		<h3 class="card-title">Thêm mã giảm giá</h3>
	</div>
	<div class="card-body">
		<form action="{{ route('save_coupon') }}" method="POST">
			@csrf
			<label for="">Tên mã giảm giá</label>
			<input class="form-control" type="text" placeholder="tên mã giảm giá" name="name" value="{{ old('name') }}">
			@error('name')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<label for="">Mã giảm giá</label>
			<input class="form-control" type="text" placeholder="nhập code" name="code" value="{{ old('code') }}">
			@error('code')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<label for="">Số lượng mã</label>
			<input class="form-control" type="number" placeholder="nhập số lượng" name="quanlity" value="{{ old('quanlity') }}" min=0>
			@error('quanlity')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<label for="">Tính năng mã</label>
			<select class="form-control" name="method">
				<option value="">---chọn tính năng mã---</option>
				<option value="1">giảm theo tiền</option>
				<option value="2">giảm theo phần trăm</option>
			</select>
			@error('method')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<label for="">Ngày bắt đầu giảm giá</label>
			<input class="form-control" id="coupon_date_start" type="text" placeholder="nhập ngày bắt đầu" name="coupon_date_start" value="{{ old('coupon_date_start') }}">
			@error('coupon_date_start')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<label for="">Ngày hết hạn giảm giá</label>
			<input class="form-control" id="coupon_date_end" type="text" placeholder="nhập ngày kết thúc" name="coupon_date_end" value="{{ old('coupon_date_end') }}">
			@error('coupon_date_end')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<label for="">Nhập số % hoặc số tiền giảm</label>
			<input class="form-control" type="text" placeholder="nhập code" name="value_sale" value="{{ old('value_sale') }}">
			<div class="card-footer">
				@error('value_sale')
				<p class="text-danger">{{ $message }}</p>
				@enderror
				<button type="submit" class="btn btn-success">Thêm mã giảm giá</button>
			</div>
		</form>
	</div>
	<!-- /.card-body -->
</div>
@stop
