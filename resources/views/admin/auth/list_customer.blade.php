@extends('layout.admin_layout')
@push('title')
<title>Liệt kê khách hàng</title>
@endpush
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title">Liệt kê khách hàng</h3>
			@if (session('thongbao'))
			<p class="text-success">{{ session('thongbao') }}</p>
			@elseif(session('error'))
			<p class="text-danger">{{ session('error') }}</p>
			@endif
			{{-- <div class="card-tools">
				<div class="input-group input-group-sm" style="width: 150px;">
					<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
					<div class="input-group-append">
						<button type="submit" class="btn btn-default">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</div> --}}
		</div>
		<!-- /.card-header -->
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-nowrap text-center" id="table_customer">
				<thead>
					<tr>
						<th>Tên user</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Số đơn hàng đã đặt</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach ($customer as $key=> $value)
					<tr>
						<td>{{ $value->name }}</td>
						<td>{{ $value->email }}</td>
						<td>{{ $value->phone }}</td>
						<td>{{ $value->SoDonHang }}</td>
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
