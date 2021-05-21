@extends('layout.admin_layout')
@push('title')
<title>Quản lý vận chuyển</title>
@endpush
@section('content')
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Quản lý vận chuyển</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="{{ route('trangchu_admin') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active">Thêm phí vận chuyển</li>
			</ol>
		</div>
	</div>
</div>
<div class="card card-success" style="padding: 20px">
	<div class="card-header">
		<h3 class="card-title">Thêm phí vận chuyển</h3>
	</div>
	<div class="card-body">
		<form>
			@csrf
			<div class="form-group">
				<label for="">Chọn thành phố</label>
				<select class="form-control input-sm m-bot15 choose" name="name_tp" id="thanhpho">
					<option value="" class="reset_op">---chọn thành phố---</option>
					@foreach ($city as $value)
					<option value="{{ $value->matp }}">{{ $value->name }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="">Chọn quận huyện</label>
				<select class="form-control input-sm m-bot15 choose" name="name_qh" id="quanhuyen">
					<option value="" class="reset_op">---chọn quận huyện---</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Chọn xã phường</label>
				<select class="form-control input-sm m-bot15 choose" name="name_xp" id="xaphuong">
					<option value="" class="reset_op">---chọn xã phường---</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Phí vận chuyển</label>
				<input type="text" class="form-control phiship" id="exampleInputEmail1" placeholder="Phí ship" name="feeship">
			</div>
			<button type="button" class="btn btn-outline-success add_delivery" name="add_delivery">Thêm phí vận chuyển</button>
		</form>
	</div>
	<div class="card-header">
		<h3 class="card-title">Danh sách phí vận chuyển</h3>
		<div class="card-tools">
			<div class="input-group input-group-sm" style="width: 150px;">
				<label style="margin: 3px -27px;transform: translateX(-37px);">Tìm kiếm</label>
				<select class="form-control" id="search-feeship">
					<option value="">Chọn thành phố</option>
					@foreach ($city as $value)
					<option value="{{ $value->matp }}">{{ $value->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<div class="table-responsive" id="table_data">
		@include('admin.delivery.get_feeship_more')   
	</div>
</div>
<!-- /.card-body -->
@stop
