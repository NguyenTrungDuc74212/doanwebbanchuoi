@extends('layout.admin_layout')
@push('title')
<title>Lập phiếu nhập</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Lập phiếu nhập</h1>
			@if (session('error'))
			<p class="text-danger">{{ session('error') }}</p>
			@endif
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Lập phiếu nhập</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success" style="padding: 20px">
	<div class="card-header">
		<h3 class="card-title">Thêm phiếu nhập</h3>
	</div>
	<div class="card-body">
		<form action="{{ route('save_input') }}" method="POST">
			@csrf
			<div class="row">
				<div class="col-lg-6">
					<label for="">Nhà cung cấp</label>
					<select class="form-control" name="vendor_id" id="nhacungcap">
						<option value="">---chọn nhà cấp---</option>
						@foreach ($vendor as $value)
						<option value="{{ $value->id }}" {{ $value->id==old('vendor_id')?'selected':'' }}>{{ $value->vendor_name}}</option>
						@endforeach
					</select>
					@error('vendor_id')
					<p class="text-danger">{{ $message }}</p>
					@enderror
					<br>
					<label>Ngày nhập</label>
					<input type="text" name="date_input" id="datepicker" placeholder="YYYY/DD/MM" class="form-control">
					@error('date_input')
					<p class="text-danger">{{ $message }}</p>
					@enderror
					<br>
				</div>
				<div class="col-lg-6">
					<label for="">Kho</label>
					<select class="form-control" name="warehouse_id">
						<option value="">---chọn kho---</option>
						@foreach ($warehouse as $value)
						<option value="{{ $value->id }}" {{ $value->id==old('warehouse_id')?'selected':'' }}>{{ $value->warehouse_name}}</option>
						@endforeach
					</select>
					@error('warehouse_id')
					<p class="text-danger">{{ $message }}</p>
					@enderror
					<br>
					<label for="">Trạng thái</label>
					<select class="form-control" name="status">
						<option value="">---trạng thái---</option>
						<option value="0">Chưa về kho</option>
						<option value="1">Đã nhập kho</option>
					</select>
					@error('vendor_id')
					<p class="text-danger">{{ $message }}</p>
					@enderror
					<br>
				</div>
			</div>
			<div class="table">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Đơn vị</th>
							<th>Ngày hết hạn</th>
							<th>Giá nhập</th>
							<th>Tổng tiền</th>
							<th class="text-center">Thao tác</th>
						</tr>
					</thead>
					<tbody class="load_input_sheet">
						<tr>
							<td>
								<select class="form-control select2 product_input" name="product_id[]" id="product_input" data-live-search='true'>
									
								</select>
							</td>
							<td>
								<input type="number" name="quantity[]" class="quantity_input" min="0">
							</td>
							<td>
								<input type="text" name="unit[]" class="unit" min="0">
							</td>
							<td>
								<input type="text" name="expiration_date[]"  placeholder="YYYY/DD/MM" class="form-control my-datepicker">
							</td>
							<td><input type="number" name="price_import[]" class="price_import" min="0"></td>
							<td class="total_amount text-center" name="total_amount"></td>
							<td class="text-center"><a data-href="" class="delete-input" style="cursor:pointer;"><i class="fa fa-times text-danger"></i></a></td>
						</tr>
					</tbody>
				</table>
				@error('product_id')
				<p class="text-danger">{{ $message }}</p>
				@enderror
			</div>
			<div class="card-footer">
				@error('meta_title')
				<p class="text-danger">{{ $message }}</p>
				@enderror
				<button type="submit" class="btn btn-success">Thêm phiếu nhập</button>
			</div>
		</form>
	</div>
	<!-- /.card-body -->
</div>
@stop
