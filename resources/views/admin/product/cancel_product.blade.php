@extends('layout.admin_layout')
@push('title')
<title>Sản phẩm lỗi</title>
@endpush
@section('content')
	@csrf
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title">Sản phẩm lỗi</h3>
			@if (session('thongbao'))
			<p class="text-success">{{ session('thongbao') }}</p>
			@endif
            <form action="{{route('get_view_product_cancel_search')}}" method="GET">	
            <div class="my-filter">
                <p class="txt-top">Ngày hủy bỏ </p>
                    <input type="text" id="datepicker3" name="date" class="form-control filter-date">
			<div class="filter-warehouse">
                Kho
			<select class="form-control" name="warehouse_id">
				<option value="-1" {{ $id_warehouse==-1?'selected':''}}>---Tất cả---</option>
				@foreach($warehouse as $item)
				<option value="{{$item->id}}" {{ $id_warehouse==$item->id?'selected':'' }}>{{$item->warehouse_name}}</option>
				@endforeach
			</select>
		</div>
        <button class="btn btn-success my-btn" type="submit">Lọc</button>
        </div>
		</div>

		<!-- /.card-header -->
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-nowrap text-center" id="table_product">
				<thead>
					<tr class="tr-admin">
						<th>Hình minh họa</th>
						<th>Tên sản phẩm</th>
						<th>Tổng số lượng</th>
						<th>Giá sản phẩm</th>
                        <th>Hạn sử dụng</th>
						<th>Ngày hủy bỏ</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($cancelProduct as $value)
					<tr>
						<td>
							<img src="{{asset('public/upload/product/'.$value->warehouse_product->product->image)}}" height="100" width="100">
						</td>
						<td>{{ $value->warehouse_product->product->name }}</td>
						<td><input disabled class="form-control my-input-quantity" name="quantity[]" min="1" max="{{$value->quantity_cancel}}" type="number" value="{{$value->quantity_cancel}}"></td>
						<td>{{currency_format($value->warehouse_product->product->price) }}</td>
                        <td>
                            @if(strtotime($value->warehouse_product->expiration_date)<=getDayExpirationComing(1)&&strtotime($value->expiration_date)>getDayExpirationComing(2))
                            <span class="badge badge-warning"> Sắp hết hạn</span>
                            @elseif(strtotime($value->warehouse_product->expiration_date)<=getDayExpirationComing(2))
                            <span class="badge badge-danger"> Hết hạn</span>
							@elseif(strtotime($value->warehouse_product->expiration_date)>getDayExpirationComing(1))
                            <span class="badge badge-success"> Còn hạn</span>
                            @endif
                            <br>
                            {{$value->expiration_date}}
                        </td>
                        <td>{{$value->cancel_date}}</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
		<!-- /.card-body -->  

	</div>
	<!-- /.card -->
</div>  
</form>
<style>
	input.form-control.my-input-quantity {
    width: 50px;
    margin: auto;
}
    .my-filter {
    width: 30%;
    text-align: center;
    /* float: right; */
    font-size: 21px;
    font-weight: 500;
}
input#datepicker3 {
    width: 185px;
    position: absolute;
    right: 211px;
    top: 51px;
}

button.btn.btn-success.my-btn {
    position: absolute;
    right: 412px;
    bottom: 10px;
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
p.txt-top {
    position: absolute;
    right: 0px;
    top: 21px;
    right: 247px;
}

nav.main-header.navbar.navbar-expand.navbar-white.navbar-light {
    z-index: 1;
}
</style>
@stop