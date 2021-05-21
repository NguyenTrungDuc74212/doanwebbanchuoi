@extends('layout.admin_layout')
@push('title')
<title>Thêm thư viện ảnh</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Thêm thư viện ảnh</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Thêm thư viện ảnh</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success" style="padding: 20px">
	<div class="card-header">
		<h3 class="card-title">Thêm thư viện ảnh</h3>
	</div>
	@if (session('thongbao'))
	<p class="text-success text-center">{{ session('thongbao') }}</p>
	@else
	<p class="text-danger text-center">{{ session('error') }}</p>
	@endif
	<div class="card-body">
		<form action="{{ route('insert_gallery',$product_id) }}" method="POST" enctype="multipart/form-data" style="margin: 20px">
			@csrf
			<div class="row">
				<div class="col-lg-3" align="right">

				</div>
				<div class="col-lg-6">
					<input type="file" name="image[]" class="form-control" multiple id="file">
					<span id="error_image"></span>
				</div>
				<div class="col-lg-3">
					<input type="submit" name="upload" value="Tải ảnh" class="btn btn-success">
				</div>
			</div>
		</form>
		<input type="hidden" name="" value="{{ $product_id }}" class="product_id">
		<div id="load_image">
			<table class="table table-hover">
				<thead>
					<tr  class="text-nowrap">
						<th>Tên hình ảnh</th>
						<th>Hình ảnh</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					<tr>

					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
</div>
@stop
