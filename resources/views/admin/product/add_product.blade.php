@extends('layout.admin_layout')
@push('title')
<title>Thêm sản phẩm</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Thêm sản phẩm</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Thêm sản phẩm</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success" style="padding: 20px">
	<div class="card-header">
		<h3 class="card-title">Thêm sản phẩm</h3>
	</div>
	<div class="card-body">
		<form action="{{ route('insert_product') }}" method="POST" enctype= multipart/form-data>
			@csrf
			<label for="">Tên sản phẩm</label>
			<input class="form-control" type="text" placeholder="tên sản phẩm" name="name" value="{{ old('name') }}">
			@error('name')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
             <label for="">Danh mục sản phẩm</label>
             <select class="form-control" name="category_product_id">
             	<option value="">---chọn---</option>
             	@foreach ($category_product as $value)
             		<option value="{{ $value->id }}" {{ $value->id==old('category_product_id')?'selected':'' }}>{{ $value->name}}</option>
             	@endforeach
             </select>
            @error('category_product_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Nhà cung cấp</label>
             <select class="form-control" name="vendor_id">
             	<option value="">---chọn nhà cung cấp---</option>
             	@foreach ($vendor as $value)
             		<option value="{{ $value->id }}" {{ $value->id==old('vendor_id')?'selected':'' }}>{{ $value->vendor_name}}</option>
             	@endforeach
             </select>
            @error('vendor_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Ảnh minh họa</label>
			<input type="file" name="image" class="form-control" value="{{ old('image') }}">
			@error('image')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Giá phản phẩm</label>
			<input type="text" name="price" placeholder="Nhập giá sản phẩm" class="form-control" value="{{ old('price') }}">
			@error('price')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			{{-- <br>
			<label for="">Số lượng</label>
			<input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" min="0">
			@error('quantity')
			<p class="text-danger">{{ $message }}</p>
			@enderror --}}
			<br>
			<label for="">Nội dung</label>
			<textarea class="form-control" id="ck_1" name="content">{{ old('content') }}</textarea>
			@error('content')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Mô tả sản phẩm</label>
			<textarea class="form-control" id="ck" name="desc">{{ old('desc') }}</textarea>
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
          	<button type="submit" class="btn btn-success">Thêm sản phẩm</button>
          </div>
		</form>
	</div>
	<!-- /.card-body -->
</div>
@section('script')
<script>
	CKEDITOR.replace( 'ck', {
		filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

	} );
	</script>	
@endsection
@include('ckfinder::setup')
@stop
