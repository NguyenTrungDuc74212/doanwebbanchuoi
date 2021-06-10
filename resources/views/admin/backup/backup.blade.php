@extends('layout.admin_layout')
@push('title')
<title>Restore data</title>
@endpush
@section('content')
<div class="col-12">
	<div class="card" style="padding: 20px">
		<div class="card-header text-center">
			<h3 class="card-title"><b>Danh sách file backup</b></h3>
			<br>
                <form action="">
                    <input class="form-control my-datepicker-2" id="my_search" type="text" placeholder="dd-mm-yyyy" name="date" >
                    <button class="btn btn-warning" type="submit" id="my_btn">Tìm file theo ngày</button>
                </form>
		
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
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
		<div class="card-body table-responsive p-0">
			<table class="table table-hover text-center">
				<thead  class="text-nowrap">
					<tr class="tr-admin">
						<th>*</th>
						<th>Tên file</th>
						<th>Ngày backup</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($backupFile as $value)
					<tr>
						<td>{{$value->id}}</td>
						<td>{{ $value->file_name }}</td>
				
						<td>{{$value->day}}</td>
						<td  class="text-nowrap">
							<a href="backup/{{$value->file_name}}" class="btn btn-success"><i class="fas fa-download"></i></a>
							<a href="{{route('restore',$value->id)}}" class="btn btn-danger"><i class="fas fa-history"></i></a>
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
<style>
    nav.main-header.navbar.navbar-expand.navbar-white.navbar-light {
    z-index: 1;
}

#my_search {
    float: right;
    width: 142px;
}

#my_btn {
    position: absolute;
    right: 167px;
}


</style>
@stop
