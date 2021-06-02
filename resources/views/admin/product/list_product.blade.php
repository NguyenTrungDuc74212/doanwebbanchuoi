@extends('layout.admin_layout')
@push('title')
<title>Liệt kê sản phẩm</title>
@endpush
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title">Liệt kê sản phẩm</h3>
			@if (session('thongbao'))
			<p class="text-success">{{ session('thongbao') }}</p>
			@endif
			<div class="container">
				<div class="row">
					<div class="col-md-6">
				<p>Kho</p>
			<select class="form-control get-by-product" id="filter-warehouse">
				<option value="-1">---Tất cả---</option>
				<option value="-1">---Tất cả---</option>
				<option value="-1">---Tất cả---</option>
			</select>
		</div>
		<div class="col-md-6">
			<p>Danh mục sản phẩm</p>
			<select class="form-control get-by-product" id="filter-category">
				<option value="-1">---Tất cả---</option>
				@foreach($category_product as $item)
				<option value="{{$item->id}}">{{$item->name}}</option>
				@endforeach
			</select>
		</div>
		</div>
		</div>
		</div>

		<!-- /.card-header -->
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-nowrap text-center" id="table_product">
				<thead>
					<tr class="tr-admin">
						<th>Hình minh họa</th>
						<th>Tên sản phẩm</th>
						<th>Danh mục sản phẩm</th>
						<th>Tổng số lượng</th>
						<th>Giá sản phẩm</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($product as $value)
					<tr>
						<td>
							<img src="{{asset('public/upload/product/'.$value->image)}}" height="100" width="100">
						</td>
						<td>{{ $value->name }}</td>
						<td>{{   $value->category_product->name }}</td>
						<td>{{$value->quantity ." ".$value->unit}}</td>
						<td>{{currency_format($value->price) }}</td>
						<td>
							@can('admin')
							<a onclick="return confirm('Bạn có chắc xóa sản phẩm này không?')" href="{{ route('delete_product',$value->id) }}" class="btn btn-danger" data-toggle="tooltip" title="Xóa"><i class="fas fa-trash-alt"></i></a>
							@endcan
							<a href="{{ route('edit_product',$value->id) }}" class="btn btn-success" data-toggle="tooltip" title="Sửa"><i class="fas fa-edit"></i></a>
							<a href="{{ route('add_gallery',$value->id) }}" data-toggle="tooltip" title="Thêm thư viện ảnh"><button class="btn btn-warning"><i class="far fa-images"></i></button></a>
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>      

@stop
