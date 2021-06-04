@extends('layout.admin_layout')
@push('title')
<title>Lọc sản phẩm</title>
@endpush
@section('content')
<form action="{{route('cancel_product')}}" method="post">
	@csrf
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title">Liệt kê sản phẩm theo kho</h3>
			@if (session('thongbao'))
			<p class="text-success">{{ session('thongbao') }}</p>
			@endif	
            <div class="my-filter">
				<div class="filter-status">
				Trạng thái hàng
				<select class="form-control filter-product" id="filter-status" name="status">
					<option value="-1" {{ $status==-1?'selected':''}}>---Tất cả---</option>
					<option value="0" {{ $status==0?'selected':'' }}>Đang bán</option>
					<option value="1" {{ $status==1?'selected':'' }}>Đang chờ hủy bỏ</option>
					<option value="2" {{ $status==2?'selected':'' }}>Đã hủy bỏ</option>
				</select>
			</div>
			<div class="filter-warehouse">
			    Kho
			<select class="form-control filter-product" id="filter-warehouse" name="id_warehouse">
				<option value="-1" {{ $id_warehouse==-1?'selected':''}}>---Tất cả---</option>
				@foreach($warehouse as $item)
				<option value="{{$item->id}}" {{ $id_warehouse==$item->id?'selected':'' }}>{{$item->warehouse_name}}</option>
				@endforeach
			</select>
		</div>
        </div>
		</div>

		<!-- /.card-header -->
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-nowrap text-center" id="table_product">
				<thead>
					<tr class="tr-admin">
                        <th>Chọn</th>
						<th>Hình minh họa</th>
						<th>Tên sản phẩm</th>
						<th>Tổng số lượng</th>
						<th>Giá sản phẩm</th>
                        <th>Hạn sử dụng</th>
						<th>Trạng thái</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($product as $value)
					<tr>
                        <td><input type="checkbox" name="id_pw[]"  value="{{$value->id_wp}}" {{$value->status==2?'disabled':''}}></td>
						<td>
							<img src="{{asset('public/upload/product/'.$value->image)}}" height="100" width="100">
						</td>
						<td>{{ $value->name }}</td>
						<td>{{$value->soluong ." ".$value->unit}}</td>
						<td>{{currency_format($value->price) }}</td>
                        <td>
                            @if(strtotime($value->expiration_date)<=getDayExpirationComing(1)&&strtotime($value->expiration_date)>getDayExpirationComing(2))
                            <span class="badge badge-warning"> Sắp hết hạn</span>
                            @elseif(strtotime($value->expiration_date)<=getDayExpirationComing(2))
                            <span class="badge badge-danger"> Hết hạn</span>
							@elseif(strtotime($value->expiration_date)>getDayExpirationComing(1))
                            <span class="badge badge-success"> Còn hạn</span>
                            @endif
                            <br>
                            {{$value->expiration_date}}
                        </td>
						<td>@if($value->status==0)
							<span class="badge badge-success"> Đang bán</span>
							@elseif($value->status==1)
							<span class="badge badge-warning"> Đang chờ hủy bỏ</span>
							@else
							<span class="badge badge-danger"> Đã hủy bỏ</span>
							@endif
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	<button class="btn btn-danger" type="submit">Hủy các sản phẩm đã chọn</button>   

	</div>
	<!-- /.card -->
</div>  
</form>
<style>
    .my-filter {
    width: 30%;
    text-align: center;
    /* float: right; */
    font-size: 21px;
    font-weight: 500;
}

select#filter-warehouse {
    height: 37px;
}
.filter-status {
    position: absolute;
    top: 21px;
    right: 217px;
}

.filter-warehouse {
    position: absolute;
    top: 21px;
    right: 33px;
}

.card-header.text-center {
    height: 100px;
}

select#filter-status {
    height: auto;
}
</style>
@stop
