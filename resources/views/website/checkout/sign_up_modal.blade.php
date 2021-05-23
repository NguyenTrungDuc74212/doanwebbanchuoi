{{-- <div class="container">
  <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#loginModal">
    Login
  </button>  
</div>
 --}}
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4 class="text-uppercase">Đăng ký</h4>
          <p class="desc">Cùng nhau hợp tác và phát triển</p>
          @if (session('thongbao_login'))
            <p class="text-success">{{ session('thongbao_login') }}</p>
          @endif
        </div>
        <div class="d-flex flex-column text-center">
          <form action="{{ route('add_customer') }}" method="POST">
           @csrf
            <input type="text" class="form-control" placeholder="Họ và tên" name="name" />
            @error('name')
            <p class="text-danger text-left">{{ $message }}</p>
            @enderror
            <br>
            <input type="email" class="form-control" placeholder="email" name="email" />
            @error('email')
            <p class="text-danger text-left">{{ $message }}</p>
            @enderror
            <br>
            <input type="number" class="form-control" placeholder="nhập số điện thoại" name="phone" />
             @error('phone')
            <p class="text-danger text-left">{{ $message }}</p>
            @enderror
            <br>
            <input type="text" class="form-control" placeholder="nhập địa chỉ" name="address" />
             @error('address')
            <p class="text-danger text-left">{{ $message }}</p>
            @enderror
            <br>
            <input type="password" class="form-control" placeholder="nhập mật khẩu" name="password" />
            @error('password')
            <p class="text-danger text-left">{{ $message }}</p>
            @enderror
            <br>
            <input type="password" class="form-control" name="re_password" placeholder="Nhập lại mật khẩu"/>
            @error('re_password')
            <p class="text-danger text-left">{{ $message }}</p>
            @enderror
            <br>
            <button type="submit" class="btn btn-block btn-round check_sign_up" style="background-color:#269300!important;color: white;">Đăng ký</button>
          </form>
          <div class="text-center text-muted delimiter">Đăng nhập bằng ứng dụng khác</div>
          <div class="social-buttons">
            <a href="">
              <img width="10%" alt="Đăng nhập tài khoản google" src="{{ asset('public/public_site/image/gg.png') }}">
            </a>
            <a href="">
              <img width="10%" alt="Đăng nhập tài khoản facebook" src="{{ asset('public/public_site/image/fb.png') }}">
            </a>
        </div>
      </div>
    </div>
    @if (!Session::get('id_customer'))
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Bạn đã có tài khoản? <a data-href="" class="text-info dangnhap_customer" style="cursor: pointer;"> Đăng nhập</a>.</div>
      </div>
    @endif
  </div>
</div>
</div>