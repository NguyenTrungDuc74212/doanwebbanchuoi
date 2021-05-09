@extends('layout.admin_layout')
@push('title')
<title>Đăng ký users</title>
@endpush
@section('content')
<div class="register" style="padding: 20px">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-2" style="background: white;padding: 30px">
				<div class="text-center">
					<h3 class="heading">Admin đăng ký</h3>
					<p class="desc">Cùng nhau hợp tác và phát triển ❤️</p>
				</div>
				<form action="{{ route('save-user') }}" method="POST" class="form">
					@csrf
					<fieldset class="form-group">
						<label>Name</label>
						<input type="text" name="name" placeholder="VD: Đức Nguyễn" class="form-control {{ $errors->first('name')!=null?'is-invalid':''}}"  value="{{ old('name') }}">
						@error('name')
						<p class="text-danger">{{ $message }}</p>
						@enderror
					</fieldset>
					<fieldset class="form-group">
						<label>Phone</label>
						<input type="text" name="phone" placeholder="nhập số điện thoại" class="form-control {{ $errors->first('phone')!=null?'is-invalid':''}}"  value="{{ old('phone') }}">
						@error('name')
						<p class="text-danger">{{ $message }}</p>
						@enderror
					</fieldset>
					<fieldset class="form-group">
						<label>Email</label>
						<input type="email" name="email" placeholder="nhập email" class="form-control {{ $errors->first('email')!=null?'is-invalid':''}}" value="{{ old('email') }}">
						@error('email')
						<p class="text-danger">{{ $message }}</p>
						@enderror
					</fieldset>
					<fieldset class="form-group">
						<label>Gender</label>
						<div class="form-check">
							<input type="radio" name="gender" value="1" {{ old('gender')==1 ? 'checked':''}}>
							<label class="form-check-label">Male</label>
						</div>
						<div class="form-check">
							<input type="radio" name="gender" value="2" {{ old('gender')==2?'checked':''}}>
							<label class="form-check-label">Female</label>
						</div>
						@error('gender')
						<p class="text-danger">{{ $message }}</p>
						@enderror
					</fieldset>
					<fieldset class="form-group">
						<label>Password</label>
						<input type="Password" name="password" placeholder="" class="form-control {{ $errors->first('password')!=null?'is-invalid':''}}">
						@error('password')
						<p class="text-danger">{{ $message }}</p>
						@enderror
					</fieldset>
					<fieldset class="form-group">
						<label>Re-password</label>
						<input type="Password" name="re-password" placeholder="" class="form-control {{ $errors->first('re-password')!=null?'is-invalid':''}}">
						@error('re-password')
						<p class="text-danger">{{ $message }}</p>
						@enderror
					</fieldset>
					<fieldset class="form-group">
						<input type="submit" name="" class="form-control btn btn-success" value="Đăng ký" style="background: #1dbfaf">
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
