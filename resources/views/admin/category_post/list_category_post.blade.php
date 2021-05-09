@extends('layout.admin_layout')
@push('title')
<title>danh mục bài viết</title>
@endpush
<style type="text/css">
	#search-suggest{
		list-style-type: none;
		padding: 0;
		margin: 0;
		position: absolute;
		box-shadow: 1px 2px 3px #272727;
	}
	#search-suggest li {
		margin-top: -1px; /* Prevent double borders */
		background-color: white;
		padding: 12px;
		border-radius: 3px;
		text-decoration: none;
		font-size: 15px;
		color: black;
		display: block;
	}
	#search-suggest li:hover:not(.header) {
		background-color: #eee;
	}
</style>
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title">Liệt kê danh mục bài viết</h3>
			@if (session('thongbao'))
			<p class="text-success">{{ session('thongbao') }}</p>
			@endif
			{{-- <div class="card-tools" id="header-search">
				<form method="" action="">
					<div class="input-group input-group-sm " style="width: 150px;">
						<input type="text" name="search_category_post" class="form-control float-right s-input" placeholder="Search">
						<div class="input-group-append">
							<button type="submit" class="btn btn-default">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>
				<ul id="search-suggest" class="s-suggest">

				</ul>
			</div> --}}
			
		</div>
		<!-- /.card-header -->
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-nowrap text-center" id="table_category_post">
				<thead>
					<tr>
						<th>Tên danh mục</th>
						<th>Mô tả danh mục</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($category_post as $value)
					<tr class="wrap-category">
						<td>{{ $value->name }}</td>
						<td>{!! $value->desc !!}</td>
						<td>
							@can('admin')
							<a onclick="return confirm('Bạn có chắc xóa danh mục này không?')" href="{{ route('delete_category_post',$value->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
							@endcan
							<a href="{{ route('edit_category_post',$value->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
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
	{{ $category_post->appends(Request()->all())}}
</div>

@stop
