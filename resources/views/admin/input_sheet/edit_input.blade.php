@extends('layout.admin_layout')
@push('title')
<title>Sửa phiếu nhập</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Sửa phiếu nhập</h1>
			@if (session('error'))
			<p class="text-danger">{{ session('error') }}</p>
			@endif
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Sửa phiếu nhập</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success" style="padding: 20px">
	<div class="card-header">
		<h3 class="card-title">Sửa phiếu nhập</h3>
	</div>
	<div class="card-body">
		<form action="{{ route('update_input',$input->id) }}" method="POST">
			@csrf
			<label for="">Nhà cung cấp</label>
			<select class="form-control" name="vendor_id" id="nhacungcap_edit">
				<option value="">---chọn nhà cấp---</option>
				@foreach ($vendor as $value)
				<option value="{{ $value->id }}" {{ $value->id==old('vendor_id',$input->vendor_id)?'selected':'' }}>{{ $value->vendor_name}}</option>
				@endforeach
			</select>
			@error('vendor_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label for="">Kho</label>
			<select class="form-control" name="warehouse_id">
				<option value="">---chọn kho---</option>
				@foreach ($warehouse as $value)
				<option value="{{ $value->id }}" {{ $value->id==old('warehouse_id',$input->warehouse_id)?'selected':'' }}>{{ $value->warehouse_name}}</option>
				@endforeach
			</select>
			@error('warehouse_id')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<label>Ngày nhập</label>
			<input type="text" name="date_input" id="datepicker2" class="form-control" value="{{$input->date_input }}">
			@error('date_input')
			<p class="text-danger">{{ $message }}</p>
			@enderror
			<br>
			<div class="table">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Tên sản phẩm <button class="btn btn-success btn-sm" type="button" id="add_product">Thêm sản phẩm <i class="fas fa-plus"></i></button></th>
							<th>Số lượng</th>
							<th>Đơn vị</th>
							<th>Giá nhập</th>
							<th>Tổng tiền</th>
							<th class="text-center">Thao tác</th>
						</tr>
					</thead>
					<tbody class="load_input_sheet_edit">
						@foreach ($input_detail as $key => $value)
						<tr>
							<td>
								<select class="form-control select2 product_input_edit" name="product_id[]" id="product_input" data-live-search='true'>
									@foreach ($product as $key2=> $value2)
										<option value="{{ $value2->id }}" class="product_edit" id="product_{{  $value2->id}}" {{ $value2->id==$value->product_id?'selected':'' }}>{{ $value2->name }}</option>
									@endforeach
								</select>
								<input type="hidden" name="" value="{{ $value->id }}" class="input_id">
							</td>
							<td><input type="number" name="quantity[]" class="quantity_input" min="0" value="{{ $value->quantity }}"></td>
							<td><input type="text" name="unit[]" class="unit" min="0" value="{{ $value->unit }}"></td>
							<td><input type="number" name="price_import[]" class="price_import" min="0" value="{{ $value->price_import }}"></td>
							<td class="total_amount text-center" name="total_amount">{{ currency_format($value->quantity*$value->price_import) }}</td>
							<td class="text-center"><a data-href="" class="delete-input" style="cursor:pointer;"><i class="fa fa-times text-danger"></i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				@error('meta_title')
				<p class="text-danger">{{ $message }}</p>
				@enderror
				<button type="submit" class="btn btn-success">Update phiếu nhập</button>
			</div>
		</form>
	</div>
	<!-- /.card-body -->
</div>
@stop
