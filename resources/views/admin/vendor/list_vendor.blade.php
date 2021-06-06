@extends('layout.admin_layout')
@push('title')
<title>Danh sách nhà cung cấp</title>
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
			<h3 class="card-title">Liệt kê danh sách nhà cung cấp</h3>
			@if (session('thongbao'))
			<p class="text-success">{{ session('thongbao') }}</p>
			@elseif(session('error'))
			<p class="text-danger">{{ session('error') }}</p>
			@endif
			<div class="card-tools" id="header-search">
				<a href="{{ route('view_insert_vendor') }}" class="btn btn-success btn-sm">Thêm nhà cung cấp</a>
			</div>
		</div>
		
		<!-- /.card-header -->
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-nowrap text-center" id="table_vendors">
				<thead>
					<tr class="tr-admin">
						<th>Tên nhà cung cấp</th>
						<th>Địa chỉ</th>
						<th>Số điện thoại</th>
						<th>Mã số thuế</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($vendor as $value)
					<tr class="wrap-category">
						<td>{{ $value->vendor_name }}</td>
						<td>{{ $value->address }}</td>
						<td>{{ $value->phone }}</td>
						<td>{{ $value->tax_code }}</td>
						<td>
							@can('admin')
							<a onclick="return confirm('Bạn có chắc xóa danh mục này không?')" href="{{ route('delete_vendor',$value->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
							@endcan
							<a href="{{ route('edit_vendor',$value->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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
