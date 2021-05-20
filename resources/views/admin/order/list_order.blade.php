@extends('layout.admin_layout')
@push('title')
<title>Danh sách đơn hàng</title>
@endpush
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title">Danh sách đơn hàng</h3>
			@if (session('thongbao'))
				<p class="text-success">{{ session('thongbao') }}</p>
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
			<table class="table table-hover text-center" id="table_post">
				<thead  class="text-nowrap">
					<tr class="tr-admin">
						<th>Đơn hàng</th>
						<th>Khách hàng</th>
						<th>Ngày</th>
						<th>Tình trạng</th>
						<th>Tổng tiền</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($orders as $value)
					<tr>
						<td>{{$value->order_code}}</td>
						@if ($value->customer)
							<td>{{ $value->customer->name}}</td>
						@else
							<td>User</td>				
						@endif
						<td>{{ $value->order_date }}</td>
						@if($value->status==1)
						<td>Chờ xác nhận</td>
						@elseif($value->status==2)
						<td>Chờ lấy hàng</td>
						@elseif($value->status==3)
						<td>Đang giao</td>
						@elseif($value->status==4)
						<td>Đã giao</td>
						@elseif($value->status==5)
						<td>Đã hủy</td>
						@elseif($value->status==6)
						<td>Trả hàng</td>
						@endif
						<td>{{currency_format($value->total)}}</td>
						<td  class="text-nowrap">
							<a href="{{ route('order_get_detail',$value->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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
	{{ $orders->appends(Request()->all())}}
</div>
@stop
