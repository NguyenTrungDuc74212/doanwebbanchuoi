@extends('website.layout_site.index')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="text-center card-header" style="    background: #269300;
			color: white;">Điền mật khẩu mới</h3>
			<div class="form-group" style="margin: 20px 0px;">
				@php
					$token = $_GET['token'];

				@endphp
				<form action="{{ route('update_pass') }}" method="POST">
					@csrf
					<input type="hidden" name="token_2" value="{{ $token }}">
					<label>Email</label>
					<input type="email" class="form-control" placeholder="Email" name="email" />
					<br>
					<label>Nhập mật khẩu mới</label>
					<input type="password" class="form-control" placeholder="password" name="password" />
					<br>
					<button type="submit" class="btn btn-block btn-round check_sign_up" style="background-color:#269300!important;color: white;">Lấy mật khẩu</button>
				</form>
			</div>
		</div>
	</div>
</div>
@stop