@extends('layout.admin_layout')
@push('title')
<title>Update kho</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Update kho</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Update kho</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success" style="padding: 20px">
	<div class="card-header">
		<h3 class="card-title">Update kho</h3>
	</div>
	<div class="card-body">
		<form action="{{ route('update_warehouse',$warehouse->id) }}" method="POST">
			@csrf
			<label for="">Tên kho</label>
			<input class="form-control" type="text" placeholder="Tên kho" name="warehouse_name" value="{{ old('warehouse_name',$warehouse->warehouse_name) }}">
			@error('warehouse_name')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Sức chứa</label>
			<input class="form-control" type="number" placeholder="Số lượng chứa" name="quantity_contain" value="{{ old('quantity_contain',$warehouse->quantity_contain) }}" min="0">
			@error('quantity_contain')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>

			<div class="card" style="margin: 10px;">
				<button type="submit" class="btn btn-success">Update kho</button>
			</div>
		</form>
	</div>
	<!-- /.card-body -->
</div>
@stop
