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
			<div class="card-tools" id="header-search">
				<a href="{{ route('view_insert_coupon') }}" class="btn btn-success btn-sm">Thêm mã giảm giá</a>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-center" id="table_coupon">
				<thead>
					<tr class="text-nowrap tr-admin">
						<th>Tên mã giảm giá</th>
						<th>Mã giảm giá</th>
						<th>Số lượng mã</th>
						<th>Tính năng mã</th>
						<th>Số % hoặc số tiền giảm</th>
						<th>Ngày bắt đầu</th>
						<th>Ngày kết thúc</th>
						<th>Tình trạng</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($coupon as $value)
					<tr>
						<td>{{ $value->name }} 
							@php
							@endphp
							@if ($value->coupon_date_end>=$today)
							<span class="text-success bg-success text-nowrap">Còn hạn</span>
							@else
							<span class="text-danger bg-danger text-nowrap">Hết hạn</span>
							@endif
						</td>
						<td>{{ $value->code }}</td>
						<td>{{ $value->quanlity }}</td>
						<td>{{ $value->method==1?'giảm theo tiền':'giảm theo phần trăm' }}</td>
						<td>{{ $value->method==1?currency_format($value->value_sale):$value->value_sale."%"}}</td>
						<td>{{ $value->coupon_date_start }}</td>
						<td>{{ $value->coupon_date_end }}</td>
						<td>
							@if ($value->coupon_status==1)
							<a href="{{ route('khoa_coupon',$value->id) }}"><span class="text-success">Đang kích hoạt</span></a>
							@else
							<a href="{{ route('kichhoat_coupon',$value->id) }}"><span class="text-danger">Đã khóa</span></a>
							@endif
						</td>
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
