@extends('layout.admin_layout')
@push('title')
<title>Liệt kê bài viết</title>
@endpush
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title">Liệt kê bài viết</h3>
			@if (session('thongbao'))
				<p class="text-success">{{ session('thongbao') }}</p>
			@endif
			{{-- <div class="card-tools">
				<div class="input-group input-group-sm" style="width: 150px;">
					<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
					<div class="input-group-append">
						<button type="submit" class="btn btn-default">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</div> --}}
		</div>
		<!-- /.card-header -->
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-center" id="table_post">
				<thead  class="text-nowrap">
					<tr>
						<th>ảnh minh họa</th>
						<th>Tên bài viết</th>
						<th>danh mục bài viết</th>
						<th>Nội dung bài viết</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($post as $value)
					<tr>
						<td>
							<img src="{{asset('public/upload/post/'.$value->image)}}" height="100" width="100">
						</td>
						<td>{{ $value->title }}</td>
						<td>{{ $value->category_post->name }}</td>
						<td>{!!substr ($value->content,0,400) !!}...</td>
						<td  class="text-nowrap">
							@can('admin')
							<a onclick="return confirm('Bạn có chắc xóa bài viết này không?')" href="{{ route('delete_post',$value->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
							@endcan
							<a href="{{ route('edit_post',$value->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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
	{{ $post->appends(Request()->all())}}
</div>
@stop
