@extends('website.layout_site.index')
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center" style="background: #269300;
		color: white;">
		<h3 class="card-title"><i class="fas fa-history"></i>
		Lịch sử đơn hàng</h3>
		@if (session('thongbao'))
		<p class="text-success">{{ session('thongbao') }}</p>
		@endif
	</div>
	@if(session('thongbao_loi'))
	<div class="alert alert-danger">
		<h3 class="text-center">{{session('thongbao_loi')}}</h3>
	</div>
	@endif
	@if(session('thongbao'))
	<div class="alert alert-danger">
		<h3 class="text-center">{{session('thanhcong')}}</h3>
	</div>
	@endif
	<div class="card-body table-responsive p-0">
		<table class="table table-hover text-center" id="">
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
					<td>{{ $value->customer->name}}</td>
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
						<a href="{{ route('view_history_order',$value->id) }}" class="btn btn-success">Xem đơn hàng</a>
						<button value="{{$value->id}}" onclick=click_cancel_order($(this).val()) type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" @if($value->status!=1&&$value->status!=2||$value->status_pay!=0) disabled @endif>
							Hủy
						  </button>
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
@include('website.history.modan_cancel_order')
<style type="text/css">
	a.page-link {
		border: 0;
		background: #269300;
		color: white;
	}
	a.page-link:hover {
		border: 0;
		background: #269300;
		color: white;
	}
	span.page-link {
		border: 0;
		background: #269300 !important;
		color: white !important;
	}
	span.page-link:hover {
		border: 0;
		background: #269300 !important;
		color: white !important;
	}
</style>
<div class="card-footer">
	{{ $orders->appends(Request()->all())}}
</div>
@stop
