@extends('layout.admin_layout')
@push('title')
<title>Thêm bài viết</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Thêm bài viết</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Thêm bài viết</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success" style="padding: 20px">
	<div class="card-header">
		<h3 class="card-title">Thêm bài viết</h3>
	</div>
	<div class="card-body">
		<form action="{{ route('insert_post') }}" method="POST" enctype= multipart/form-data>
			@csrf
			<label for="">Tiêu đề bài viết</label>
			<input class="form-control" type="text" placeholder="tên bài viết" name="title" value="{{ old('title') }}">
			@error('title')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Danh mục bài viết</label>
			<select class="form-control" name="category_id">
				<option value="">---chọn---</option>
				@foreach ($category_post as $value)
				<option value="{{ $value->id }}" {{ $value->id==old('category_id')?'selected':'' }}>{{ $value->name}}</option>
				@endforeach
			</select>
			@error('category_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Ảnh minh họa</label>
			<input type="file" name="image" class="form-control" value="{{ old('imgae') }}">
			@error('image')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Nội dung bài viết</label>
			<textarea class="form-control" id="ck" name="content">{{ old('content') }}</textarea>
			@error('desc')
			<p class="text-danger">{{ $message }}</p>
			@enderror    
			<br>
			<label for="">Mô tả bài viết</label>
			<textarea class="form-control" id="ck_1" name="desc">{{ old('desc') }}</textarea>
			@error('desc')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Meta_keyword</label>
			<textarea class="form-control" name="meta_keywords">{{ old('meta_keywords') }}</textarea>
			@error('meta_keywords')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<label for="">Meta_title</label>
			<textarea class="form-control" name="meta_title">{{ old('meta_title') }}</textarea>
			<div class="card-footer">
				@error('meta_title')
				<p class="text-danger">{{ $message }}</p>
				@enderror
				<button type="submit" class="btn btn-success">Thêm bài viết</button>
			</div>
		</form>
	</div>
	<!-- /.card-body -->
</div>
@stop
