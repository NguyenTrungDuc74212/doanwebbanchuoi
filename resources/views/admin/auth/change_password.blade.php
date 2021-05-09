<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thay đổi mật khẩu</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a data-href="../../index2.html"><b>Thay đổi mật khẩu</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Thay đổi password của bạn</p>
        @if (session('error'))
        <p class="text-danger">{{ session('error') }}</p>
        @elseif(session('thongbao'))
        {
          <p class="text-danger">{{ session('thongbao') }}</p>
        }
        @endif
        <form action="{{ route('change_password')}}" method="POST">
          @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('email')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="mật khẩu mới" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="nhập lại mật khẩu" name="re-password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
           @error('re-password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Thay đổi mật khẩu</button>
            </div>
            <div class="col-12 text-center">
              <a href="{{ route('login') }}">Đăng nhập</a>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- /.social-auth-links -->
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
