@extends('layout.admin_layout')
@push('title')
<title>Quản lý phiếu đổi trả</title>
@endpush
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title">Liệt kê phiếu đổi trả</h3>
			@if (session('thongbao'))
			<p class="text-success">{{ session('thongbao') }}</p>
			@endif
		</div>
		<!-- /.card-header -->
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-nowrap text-center" id="table_return">
				<thead>
					<tr class="tr-admin">
						<th>Mã phiếu đổi trả</th>
						<th>Mã đơn hàng</th>
						<th>Ngày đổi trả</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($return as $value)
					<tr>
						<td>{{ $value->voucher_code }}</td>
						<td>{{ $value->order_code }}</td>
						<td>{{ $value->voucher_date }}</td>
						<td>
							<a href="{{ route('view_detail_return',$value->order_code) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
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
