@extends('layout.admin_layout')
@push('title')
<title>Liệt kê users</title>
@endpush
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title">Liệt kê users</h3>
			@if (session('thongbao'))
			<p class="text-success">{{ session('thongbao') }}</p>
			@elseif(session('error'))
			<p class="text-danger">{{ session('error') }}</p>
			@endif
			<div class="card-tools">
				<div class="input-group input-group-sm" style="width: 150px;">
					<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
					<div class="input-group-append">
						<button type="submit" class="btn btn-default">
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
						<th>Tên user</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Admin</th>
						<th>Người post bài</th>
						<th>Thủ Kho</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach ($admin as $value)
					<form action="{{ route('assign_role') }}" method="POST">
						@csrf
						<tr>
							<td>{{ $value->name }}</td>
							<td>{{ $value->email }}</td>
							<input type="hidden" name="email" value="{{ $value->email }}">
							<td>{{ $value->phone }}</td>
							<td><input type="checkbox" name="admin_role" {{ $value->hasRole('admin')?'checked':'' }}></td>
							<td><input type="checkbox" name="author_role" {{ $value->hasRole('author')?'checked':'' }}></td>
							<td><input type="checkbox" name="user_role" {{ $value->hasRole('user')?'checked':'' }}></td>
							<td>
								<input type="submit" value="Assign roles" class="btn btn-primary">
							</td>

						</tr>
					</form>
					@endforeach
					

				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>
<div class="card-footer">
	{{ $admin->appends(Request()->all())}}
</div>

@stop
