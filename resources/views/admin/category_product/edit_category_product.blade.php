@extends('layout.admin_layout')
@push('title')
<title>Sửa danh mục sản phẩm</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Sửa danh mục sản phẩm</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Sửa danh mục sản phẩm</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">Thêm danh mục sản phẩm</h3>
	</div>
	<div class="card-body">
		<form action="{{ route('update_category_product',$category_product->id) }}" method="POST" enctype="multipart/form-data">
			@csrf
			<label for="">Tên danh mục</label>
			<input class="form-control" type="text" placeholder="tên danh mục" name="name" value="{{ old('name',$category_product->name) }}">
			@error('name')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Mô tả danh mục</label>
			<textarea class="form-control" id="ck" name="desc">{{ old('desc',$category_product->desc) }}</textarea>
			@error('desc')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Ảnh minh họa</label>
			<input type="file" name="image" class="form-control">
			<input type="hidden" name="img_old" class="form-control" value="{{ $category_product->image }}">
			@error('image')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Meta_keyword</label>
			<textarea class="form-control" name="meta_keywords">{{ old('meta_keywords',$category_product->meta_keywords) }}</textarea>
			@error('meta_keywords')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<label for="">Meta_title</label>
			<textarea class="form-control" name="meta_title">{{ old('meta_title',$category_product->meta_title) }}</textarea>
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
