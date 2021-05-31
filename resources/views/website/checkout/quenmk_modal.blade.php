{{-- <div class="container">
  <button type="button" class="btn btn-info btn-round" data-toggle="modal" data-target="#loginModal">
    Login
  </button>  
</div>
 --}}
<div class="modal fade" id="quenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-title text-center">
          <h4 class="text-uppercase">Quên mật khẩu?</h4>
          <p class="desc">Hãy nhập mail để lấy lại mật khẩu ❤️</p>
          @if (session('thongbao_quenmatkhau'))
            <p class="text-danger">{{ session('thongbao_quenmatkhau') }}</p>
          @endif
        </div>
        <div class="d-flex flex-column text-center">
          <form action="{{ route('recover_password') }}" method="POST">
           @csrf
            <input type="email" class="form-control" placeholder="nhập email" name="email" />
            <br>
            <button type="submit" class="btn btn-block btn-round check_sign_up" style="background-color:#269300!important;color: white;cursor: pointer;">Lấy mật khẩu</button>
          </form>
      </div>
    </div>
  </div>
</div>
</div>