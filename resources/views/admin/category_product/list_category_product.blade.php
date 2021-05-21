@extends('layout.admin_layout')
@push('title')
<title>Danh mục sản phẩm</title>
@endpush
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title">Liệt kê danh mục sản phẩm</h3>
			@if (session('thongbao'))
			<p class="text-success">{{ session('thongbao') }}</p>
			@endif
			<div class="card-tools">
				<div class="input-group input-group-sm" style="width: 150px;">
					<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
					<div class="input-group-append">
						<button type="submit" class="btn btn-default">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-nowrap text-center">
				<thead>
					<tr class="tr-admin">
						<th>Tên danh mục</th>
						<th>Mô tả danh mục</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($category_product as $value)
					<tr>
						<td>{{ $value->name }}</td>
						<td>{!! $value->desc !!}</td>
						<td>
							@can('admin')
							<a onclick="return confirm('Bạn có chắc xóa danh mục này không?')" href="{{ route('delete_category_product',$value->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
							@endcan
							<a href="{{ route('edit_category_product',$value->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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
<div class="card-footer">
	{{ $category_product->appends(Request()->all())}}
</div>

@stop
