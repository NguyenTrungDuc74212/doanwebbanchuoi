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
		</div>
		<!-- /.card-header -->
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-nowrap text-center" id="table_product">
				<thead>
					<tr class="tr-admin">
						<th>ảnh minh họa</th>
						<th>Thư viện ảnh</th>
						<th>Tên sản phẩm</th>
						<th>danh mục sản phẩm</th>
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
						<td><a href="{{ route('add_gallery',$value->id) }}">Thêm thư viện ảnh</a></td>
						<td>{{ $value->name }}</td>
						<td>{{   $value->category_product->name }}</td>
						<td>{{currency_format($value->price) }}</td>
						<td>
							@can('admin')
							<a onclick="return confirm('Bạn có chắc xóa sản phẩm này không?')" href="{{ route('delete_product',$value->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
							@endcan
							<a href="{{ route('edit_product',$value->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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
