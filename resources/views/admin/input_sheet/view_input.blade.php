@extends('layout.admin_layout')
@push('title')
<title>Chi tiết phiếu nhập</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Chi tiết  phiếu nhập</h1>
			@if (session('error'))
			<p class="text-danger">{{ session('error') }}</p>
			@endif
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Chi tiết phiếu nhập</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success" style="padding: 20px">
	<div class="card-header">
		<h3 class="card-title">Chi tiết phiếu nhập</h3>
	</div>
	<div class="card-body">
		<form>
			@csrf
			<div class="row">
				<div class="col-lg-6">
					<label for="">Nhà cung cấp</label>
					<select class="form-control" name="vendor_id" id="nhacungcap_edit">
						<option value="{{ $input->vendor_id }}">{{ $input->vendor->vendor_name }}</option>
					</select>
					<br>
					<label for="">Kho</label>
					<select class="form-control" name="warehouse_id">
						<option value="{{ $input->warehouse_id }}">{{ $input->warehouse->warehouse_name }}</option>
					</select>
					<br>
				</div>
				<div class="col-lg-6">
					<label>Ngày nhập</label>
					<input type="text" name="date_input" id="datepicker2" class="form-control" value="{{$input->date_input }}" readonly="true">
					<br>
					<label for="">Trạng thái</label>
					<select class="form-control" name="status">
						<option value="{{ $input->status }}">{{ $input->status==0?'Chưa về kho':'Đã về kho' }}</option>
					</select>
				</div>
			</div>
			<div class="table">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Đơn vị</th>
							<th>Giá nhập</th>
							<th>Tổng tiền</th>
						</tr>
					</thead>
					<tbody class="load_input_sheet_edit">
						@foreach ($input_detail as $key => $value)
						<tr>
							<td>
								<select class="form-control select2 product_input_edit" name="product_id[]" id="product_input" data-live-search='true' disabled>
									<option value="{{ $value->product_id }}">{{ $value->product->name }}</option>
								</select>
								<input type="hidden" name="" value="{{ $value->id }}" class="input_id">
							</td>
							<td><input type="number" name="quantity[]" class="quantity_input" min="0" value="{{ $value->quantity }}" readonly="true"></td>
							<td><input type="text" name="unit[]" class="unit" min="0" value="{{ $value->unit }}" readonly="true"></td>
							<td><input type="number" name="price_import[]" class="price_import" min="0" value="{{ $value->price_import }}" readonly="true"></td>
							<td class="total_amount text-center" name="total_amount" readonly="true">{{ currency_format($value->quantity*$value->price_import) }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				<p class="text-primary"><b>Tổng tiền phiếu nhập: {{ currency_format($input->total_amount) }}</b></p>
				<p class="text-primary"><b>Tổng số lượng phiếu nhập: {{ $input->total_quanlity }}</b></p>
				<p class="text-danger"><b>Người lập phiếu: {{ $input->user->name }}</b></p>
			</div>
		</form>
	</div>
	<!-- /.card-body -->
</div>
@stop
