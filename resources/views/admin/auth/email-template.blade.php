<div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header" style="color: #fe980f">Xin chào quý khách đã quan tâm đến Công ty của chúng tôi!!!</div>
                   <div class="card-body">
                    @if (session('resent'))
                         <div class="alert alert-success" role="alert">
                            {{ __('A fresh mail has been sent to your email address.') }}
                        </div>
                    @endif
                    {!! $content !!}
                </div>
            </div>
        </div>
    </div>
</div>