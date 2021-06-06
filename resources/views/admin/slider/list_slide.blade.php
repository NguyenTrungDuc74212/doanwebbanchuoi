@extends('layout.admin_layout')
@push('title')
<title>Liệt kê banner</title>
@endpush
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title">Liệt kê banner</h3>
			@if (session('thongbao'))
			<p class="text-success">{{ session('thongbao') }}</p>
			@endif
			<div class="card-tools" id="header-search">
				<a href="{{ route('add_slide') }}" class="btn btn-success btn-sm">Thêm Slide</a>
			</div>
		</div>
		<!-- /.card-header -->
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-center">
				<thead>
					<tr class="text-nowrap tr-admin">
						<th>Hình ảnh</th>
						<th>Tên slide</th>
						<th>Trạng thái</th>
						<th>Mô tả</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($slide as $value)
					<tr>
						<td><img src="{{asset('public/upload/slide/'.$value->image)}}" height="100" width="300"></td>
						<td>{{ $value->name }}</td>
						@if ($value->status==0)
						<td><a href="{{ route('hien_slide',$value->id) }}"><span class="text-ellipsis">Ẩn</span></a></td>
						@elseif($value->status==1)
						<td><a href="{{ route('an_slide',$value->id) }}"><span class="text-ellipsis">Hiển thị</span></a></td>
						@endif
						<td>{!! $value->desc !!}</td>
						<td>
							@can('admin')
							<a onclick="return confirm('Bạn có chắc xóa slide này không?')" href="{{ route('delete_slide',$value->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
							@endcan
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
	{{ $slide->appends(Request()->all())}}
</div>

@stop
