@extends('layout.admin_layout')
@push('title')
<title>Mã giảm giá</title>
@endpush
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title">Liệt kê mã giảm giá</h3>
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
			<table class="table table-hover text-center">
				<thead>
					<tr class="text-nowrap tr-admin">
						<th>Tên mã giảm giá</th>
						<th>Mã giảm giá</th>
						<th>Số lượng mã</th>
						<th>Tính năng mã</th>
						<th>Số % hoặc số tiền giảm</th>
						<th>Ngày thêm</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($coupon as $value)
					<tr>
						<td>{{ $value->name }}</td>
						<td>{{ $value->code }}</td>
						<td>{{ $value->quanlity }}</td>
						<td>{{ $value->method==1?'giảm theo tiền':'giảm theo phần trăm' }}</td>
						<td>{{ $value->method==1?currency_format($value->value_sale):$value->value_sale."%"}}</td>
						<td>{{ $value->created_at }}</td>
						<td>
							@can('admin')
							<a onclick="return confirm('Bạn có chắc xóa danh mục này không?')" href="{{ route('delete_coupon',$value->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
							@endcan
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
	{{ $coupon->appends(Request()->all())}}
</div>

@stop
