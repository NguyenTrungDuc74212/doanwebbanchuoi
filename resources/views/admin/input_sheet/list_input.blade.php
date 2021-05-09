@extends('layout.admin_layout')
@push('title')
<title>Danh sách phiếu nhập</title>
@endpush
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title">Danh sách phiếu nhập</h3>
			@if (session('thongbao'))
			<p class="text-success">{{ session('thongbao') }}</p>
			@endif

		</div>
		<!-- /.card-header -->
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-nowrap text-center" id="table_input">
				<thead>
					<tr>
						<th>Người nhập</th>
						<th>Nhà cung cấp</th>
						<th>Tên kho</th>
						<th>Tổng số lượng nhập</th>
						<th>Tổng tiền nhập</th>
						<th>Thay đổi trạng thái</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($input as $value)
					<tr>
						<td>{{ $value->user->name }}</td>
						<td>{{ $value->vendor->vendor_name }}</td>
						<td>{{ $value->warehouse->warehouse_name }}</td>
						<td>{{ $value->total_quanlity }}</td>
						<td>{{ currency_format($value->total_amount) }}</td>
						<td>
							<form>
								@csrf
								<select class="form-control" id="status">
									<option value="">---Chọn---</option>
									<option value="0" {{ $value->status==0?'selected':'hidden' }}>Chưa về kho</option>
									<option value="1" {{ $value->status==1?'selected':'' }}>Đã về kho</option>
								</select>
								<input type="hidden" name="" class="input_id" value="{{ $value->id }}">
							</form>
						</td>
						<td>
							@can('admin')
							<a onclick="return confirm('Bạn có chắc xóa danh mục này không?')" href="{{ route('delete_input',$value->id) }}" class="btn-sm btn-danger" {{ $value->status==1?'hidden':'' }} ><i class="fas fa-trash-alt"></i></a>
							@endcan
							<a href="{{ route('edit_input',$value->id) }}" class="btn-sm btn-success" {{ $value->status==1?'hidden':'' }}><i class="fas fa-edit"></i></a>
							<a href="{{ route('view_input',$value->id) }}" class="btn-sm btn-primary"><i class="fas fa-eye"></i></a>
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

@stop
