{{-- <div class="container">
  <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#loginModal">
    Login
  </button>  
</div>
 --}}
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4 class="text-uppercase">Đăng nhập</h4>
          <p class="desc">Hãy đăng nhập để mua hàng</p>
          @if (session('thongbao_login_thatbai'))
            <p class="text-danger">{{ session('thongbao_login_thatbai') }}</p>
          @endif
        </div>
        <div class="d-flex flex-column text-center">
          <form action="{{ route('login_customer') }}" method="POST">
           @csrf
            <input type="email" class="form-control" placeholder="Email" name="email" />
            <br>
            <input type="password" class="form-control" placeholder="password" name="password" />
            <br>
            <button type="submit" class="btn btn-block btn-round check_sign_up" style="background-color:#269300!important;color: white;">Đăng nhập</button>
          </form>
          
          <div class="text-center text-muted delimiter">Đăng nhập bằng ứng dụng khác</div>
          <div class="social-buttons">
            <a href="{{ route('login_customer_google') }}">
              <img width="10%" alt="Đăng nhập tài khoản google" src="{{ asset('public/public_site/image/gg.png') }}">
            </a>
            <a href="">
              <img width="10%" alt="Đăng nhập tài khoản facebook" src="{{ asset('public/public_site/image/fb.png') }}">
            </a>
        </div>
      </div>
    </div>
      <div class="modal-footer d-flex justify-content-center">
        <div class="signup-section">Bạn chưa có tài khoản? <a data-href="" class="text-info dangky_customer" style="cursor: pointer;"> Đăng ký</a>.</div>
      </div>
      <div class="signup-section text-center" style="margin:-15px 0px 17px 0px;">Bạn quên mật khẩu? <a data-href="" class="text-info quenmk_customer" style="cursor: pointer;">Lấy lại mật khẩu</a>.</div>
  </div>
</div>
</div>