@extends('layout.admin_layout')
@push('title')
<title>Liệt kê sản phẩm</title>
@endpush
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title">Liệt kê sản phẩm</h3>
			@if (session('thongbao'))
			<p class="text-success">{{ session('thongbao') }}</p>
			@endif
			<div class="card-tools">
				<div class="input-group input-group-sm" style="width: 150px;">
					<input type="text" name="table_search" class="form-control float-right" placeholder="Search" id="search">
					<div class="input-group-append">
						<button type="button" class="btn btn-default click-search">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-nowrap text-center">
				<thead>
					<tr>
						<th>ảnh minh họa</th>
						<th>Tên sản phẩm</th>
						<th>danh mục sản phẩm</th>
						<th>Giá sản phẩm</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody class="wrap-product">
					
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>      
<div class="card-footer-ajax" style="padding:10px 20px">
	{{-- {{   $data->appends(Request()->all()) }} --}}
</div>
@stop


