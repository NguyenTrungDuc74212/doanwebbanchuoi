@extends('layout.admin_layout')
@push('title')
<title>Danh sách đơn hàng</title>
@endpush
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title"><b>Danh sách đơn hàng</b></h3>
			<br>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
			<p>Trạng thái đơn hàng</p>
			<select class="form-control get-by-product" id="filter-status">
				<option value="-1" {{ $status==-1?'selected':'' }}>---Tất cả---</option>
				<option value="1" {{ $status==1?'selected':'' }}>Chờ xác nhận</option>
				<option value="2" {{ $status==2?'selected':'' }}>Chờ lấy hàng</option>
				<option value="3" {{ $status==3?'selected':'' }}>Đang giao</option>
				<option value="4" {{ $status==4?'selected':'' }}>Đã giao</option>
				<option value="5" {{ $status==5?'selected':'' }}>Đã hủy</option>
				<option value="6" {{ $status==6?'selected':'' }}>Trả hàng</option>
			</select>
		</div>
		<div class="col-md-6">
			<p>Trạng thái thanh toán</p>
			<select class="form-control get-by-product" id="filter-status-pay">
				<option value="-1" {{ $status_pay==-1?'selected':'' }}>---Tất cả---</option>
				<option value="0" {{ $status_pay==0?'selected':'' }}>Chưa thanh toán</option>
				<option value="1" {{ $status_pay==1?'selected':'' }}>Đã thanh toán</option>
	
			</select>
		</div>
		</div>
		</div>
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
			<table class="table table-hover text-center">
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
						<td class="text-warning">Chờ xác nhận</td>
						@elseif($value->status==2)
						<td>Chờ lấy hàng</td>
						@elseif($value->status==3)
						<td>Đang giao</td>
						@elseif($value->status==4)
						<td class="text-success">Đã giao</td>
						@elseif($value->status==5)
						<td class="text-danger">Đã hủy</td>
						@elseif($value->status==6)
						<td class="text-danger">Trả hàng</td>
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
