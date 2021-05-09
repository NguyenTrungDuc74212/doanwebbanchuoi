@extends('layout.admin_layout')
@push('title')
<title>Thêm Slide</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Thêm Slide</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Thêm Slide</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success" style="padding: 20px">
	<div class="card-header">
		<h3 class="card-title">Thêm slide</h3>
	</div>
	<div class="card-body">
		<form action="{{ route('insert_slide') }}" method="POST" enctype= multipart/form-data>
			@csrf
			<label for="">Tên Slide</label>
			<input class="form-control" type="text" placeholder="tên slide" name="name" value="{{ old('name') }}">
			@error('name')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<label for="">Ảnh Slide</label>
			<input type="file" name="image" class="form-control" value="{{ old('imgae') }}">
			@error('image')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<label for="">Mô tả Slide</label>
			<textarea class="form-control" id="ck" name="desc">{{ old('desc') }}</textarea>
			@error('desc')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<label for=""></label>
			<select class="form-control input-sm m-bot15" name="status">
				<option value="0" {{ old('status')==0?'selected':''}}>Ẩn</option>
				<option value="1" {{ old('status')==1?'selected':''}}>Hiển thị</option>
			</select>
			<div class="card-footer">
				<button type="submit" class="btn btn-success">Thêm sản phẩm</button>
			</div>
		</form>
	</div>
	<!-- /.card-body -->
</div>
@stop
