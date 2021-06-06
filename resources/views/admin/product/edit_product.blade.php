@extends('layout.admin_layout')
@push('title')
<title>Sửa sản phẩm</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Sửa sản phẩm</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Sửa sản phẩm</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">Sửa sản phẩm</h3>
	</div>
	<div class="card-body">
		<form action="{{ route('update_product',$product->id) }}" method="POST" enctype= multipart/form-data>
			@csrf
			<label for="">Tên sản phẩm</label>
			<input class="form-control" type="text" placeholder="tên sản phẩm" name="name" value="{{ old('name',$product->name) }}">
			@error('name')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
             <label for="">Danh mục sản phẩm</label>
             <select class="form-control" name="category_product_id" >
             	<option value="" >---chọn---</option>
             	@foreach ($category as $value)
             		<option value="{{ $value->id }}" {{ $value->id==$product->category_product_id||$value->id==old('category_product_id')?'selected':'' }}>{{ $value->name}}</option>
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
             		<option value="{{ $value->id }}" {{ $value->id==old('vendor_id',$product->vendor_id)?'selected':'' }}>{{ $value->vendor_name}}</option>
             	@endforeach
             </select>
            @error('vendor_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Ảnh minh họa</label>
			<input type="file" name="image" class="form-control">
			<input type="hidden" name="img_old" class="form-control" value="{{ $product->image }}">
			@error('image')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Giá sản phẩm</label>
			{{-- <input type="text" name="price" placeholder="Nhập giá sản phẩm" class="form-control" value="{{ old('price',$product->price) }}">
			@error('price')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br> --}}
			{{-- <input type="number" name="price" list="cars" class="form-control" autocomplete="off"/>
			<datalist id="cars" aria-autocomplete="none">
				@foreach($product->price_product as $item)
				<option value="{{$item->price}}">{{$item->price}}</option>
				@endforeach
			</datalist> --}}

				<select id="test" class="form-control" name="price_old">
					@foreach($product->price_product as $item)
					<option class="non" value="{{$item->price}}" {{$item->price==$product->price?'selected':''}}>{{$item->price}}</option>
					@endforeach
				  <option class="editable" value="0">Nhập giá khác</option>
				</select>
				<input name=price class="editOption form-control" placeholder="Nhập giá khác" style="display:none;"/>
		
			<br>
		
			<label for="">Đơn vị tính</label>
			<input type="text" name="unit" placeholder="Nhập đơn vị tính" value="{{ $product->unit }}" class="form-control">
			@error('unit')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<label for="">Giảm giá (%)</label>
			<input type="number" min="0" max="100" name="persent_discount" value="{{ $product->persent_discount }}" placeholder="Nhập phần trăm giảm giá" class="form-control">
			<label for="">Mô tả sản phẩm</label>
			<textarea class="form-control" id="ck" name="desc">{{ old('desc',$product->desc) }}</textarea>
			@error('desc')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Meta_keyword</label>
			<textarea class="form-control" name="meta_keywords">{{ old('meta_keywords',$product->meta_keywords) }}</textarea>
			@error('meta_keywords')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<label for="">Meta_title</label>
			<textarea class="form-control" name="meta_title">{{ old('meta_title',$product->meta_title) }}</textarea>
          <div class="card-footer">
          	@error('meta_title')
			<p class="text-danger">{{ $message }}</p>
			@enderror
          	<button type="submit" class="btn btn-success">Lưu sản phẩm</button>
          </div>
		</form>
	</div>
	<!-- /.card-body -->
</div>
@section('script')
<script>
	var initialText = $('.editable').val();
$('.editOption').val(initialText);

$('#test').change(function(){
var selected = $('option:selected', this).attr('class');
var optionText = $('.editable').text();

if(selected == "editable"){
  $('.editOption').show();


  $('.editOption').keyup(function(){
      var editText = $('.editOption').val();
      $('.editable').val(editText);
      $('.editable').html(editText);
  });

}else{
  $('.editOption').hide();
}
});
	CKEDITOR.replace( 'ck', {
		filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

	} );
	</script>	
@endsection
<style>



.editOption {
    position: relative;
    top: -38px;
    width: 90%;
    border-right: 0px;
}
</style>
@include('ckfinder::setup')
@stop
