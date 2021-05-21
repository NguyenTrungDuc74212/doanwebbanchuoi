@extends('layout.admin_layout')
@push('title')
<title>Sửa danh mục bài viết</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Sửa danh mục bài viết</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Sửa danh mục bài viết</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">Thêm danh mục bài viết</h3>
	</div>
	<div class="card-body">
		<form action="{{ route('update_category_post',$category_post->id) }}" method="POST">
			@csrf
			<label for="">Tên danh mục</label>
			<input class="form-control" type="text" placeholder="tên danh mục" name="name" value="{{ old('name',$category_post->name) }}">
			@error('name')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Mô tả danh mục</label>
			<textarea class="form-control" id="ck" name="desc">{{ old('desc',$category_post->desc) }}</textarea>
			@error('desc')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Meta_keyword</label>
			<textarea class="form-control" name="meta_keywords">{{ old('meta_keywords',$category_post->meta_keywords) }}</textarea>
			@error('meta_keywords')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<label for="">Meta_title</label>
			<textarea class="form-control" name="meta_title">{{ old('meta_title',$category_post->meta_title) }}</textarea>
          <div class="card-footer">
          	@error('meta_title')
			<p class="text-danger">{{ $message }}</p>
			@enderror
          	<button type="submit" class="btn btn-success">Lưu danh mục</button>
          </div>
		</form>
	</div>
	<!-- /.card-body -->
</div>
@stop
