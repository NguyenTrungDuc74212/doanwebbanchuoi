@extends('layout.admin_layout')
@push('title')
<title>Danh sách kho</title>
@endpush
<style type="text/css">
	#search-suggest{
		list-style-type: none;
		padding: 0;
		margin: 0;
		position: absolute;
		box-shadow: 1px 2px 3px #272727;
	}
	#search-suggest li {
		margin-top: -1px; /* Prevent double borders */
		background-color: white;
		padding: 12px;
		border-radius: 3px;
		text-decoration: none;
		font-size: 15px;
		color: black;
		display: block;
	}
	#search-suggest li:hover:not(.header) {
		background-color: #eee;
	}
</style>
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title">Liệt kê danh sách kho</h3>
			@if (session('thongbao'))
			<p class="text-success">{{ session('thongbao') }}</p>
			@elseif(session('error'))
			<p class="text-danger">{{ session('error') }}</p>
			@endif
			<div class="card-tools" id="header-search">
				<a href="{{ route('view_insert_warehouse') }}" class="btn btn-success btn-sm">Thêm kho</a>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-nowrap text-center" id="table_warehouse">
				<thead>
					<tr class="tr-admin">
						<th>Tên kho</th>
						<th>Sức chứa</th>
						<th>Số lượng hiện tại</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($warehouse as $value)
					<tr class="wrap-category">
						<td>{{ $value->warehouse_name }}</td>
						<td>{{ $value->quantity_contain }}</td>						
						<td>{{ $value->quantity_now }}</td>						
						<td>
							@can('admin')
							<a onclick="return confirm('Bạn có chắc xóa kho này không?')" href="{{ route('delete_warehouse',$value->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
							@endcan
							<a href="{{ route('edit_warehouse',$value->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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
