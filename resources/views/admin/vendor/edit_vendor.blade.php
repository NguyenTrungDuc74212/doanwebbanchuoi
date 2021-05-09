@extends('layout.admin_layout')
@push('title')
<title>Sửa nhà cung cấp</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Sửa nhà cung cấp</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Sửa nhà cung cấp</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success" style="padding: 20px">
	<div class="card-header">
		<h3 class="card-title">Sửa nhà cung cấp</h3>
	</div>
	<div class="card-body">
		<form action="{{ route('update_vendor',$vendor->id) }}" method="POST">
			@csrf
			<label for="">Tên nhà cung cấp</label>
			<input class="form-control" type="text" placeholder="tên nhà cung cấp" name="vendor_name" value="{{ old('vendor_name',$vendor->vendor_name) }}">
			@error('vendor_name')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Địa chỉ</label>
			<input class="form-control" type="text" placeholder="nhập địa chỉ" name="address" value="{{ old('address',$vendor->address) }}">
			@error('address')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Số điện thoại</label>
			<input class="form-control" type="number" placeholder="nhập số phone" name="phone" value="{{ old('phone',$vendor->phone) }}" >
			@error('phone')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<label for="">Mã số thuế</label>
			<input class="form-control" type="number" placeholder="nhập tax code" name="tax_code" value="{{ old('tax_code',$vendor->tax_code) }}">
			@error('tax_code')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<div class="card" style="margin: 10px;">
				<button type="submit" class="btn btn-success">Cập nhật nhà cung cấp</button>
			</div>
		</form>
	</div>
	<!-- /.card-body -->
</div>
@stop
