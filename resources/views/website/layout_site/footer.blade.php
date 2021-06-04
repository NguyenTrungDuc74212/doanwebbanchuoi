	<!-- footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="title">Chính sách</div>
					<ul class="list-unstyled">
						<li><a href="#" onclick="return false;">Chính sách bảo mật thông
								tin</a></li>
						<li><a href="#" onclick="return false;">Quy định và hình thức
								thanh toán</a></li>
		
						<li><a href="#" onclick="return false;">Chính sách đổi trả</a></li>
						<li><a href="#" onclick="return false;">Chính sách vận chuyển</a></li>
						<li><a href="#" onclick="return false;">Câu hỏi thường gặp</a></li>
						<li><a href="#" onclick="return false;">Liên hệ</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div class="title">Hỗ trợ mua hàng</div>
					<ul class="list-unstyled">
						<li><a href="#" onclick="return false;">Chính sách vận chuyển</a></li>
						<li><a href="#" onclick="return false;">Chính sách bảo mật</a></li>
					</ul>
				
				</div>
				<div class="col-md-4">
					<div class="title">CÔNG TY CHUỐI VIỆT NAM</div>
					<p>Trụ sở:  Số 180 Trung Hành, Đằng Lâm, Hải An, Hải Phòng</p>
					<p>Hotline: 0373.163.163</p>
					<p>Email: giangvmu@gmail.com</p>
					<p>Tổng đài hỗ trợ miễn phí di động 18008168</p>
				</div>
			</div>
		</div>
	</footer>

	<div class="copy-right py-3">

		<div class="container">

			<div class="row align-items-center">

				<div class="col-md-6">© Nhóm đồ án VMU</div>

				<div class="col-md-6 text-right">

					<a href="https://www.facebook.com/Chu%E1%BB%91i-Vi%E1%BB%87t-Nam-105017725128905" class="btn-social hvr-grow"><i class="fab fa-facebook-f"></i></a>

					<a href="https://www.youtube.com/channel/UCNbhyqkD-tGYZhb9rpL4Ghg" class="btn-social hvr-grow"><i class="fab fa-youtube"></i></a>
					<a href="#!" class="btn-social hvr-grow"><i class="fab fa-google-plus-g"></i></i></a>

					<a href="#!" class="btn-social hvr-grow"><i class="fab fa-twitter"></i></a>

				

				</div>

			</div>

		</div>

	</div>

	<a href="tel:0329294747">
		<div class="animation">
			<span class="icon ring"></span>
			<div class="cercle one"></div>
			<div class="cercle two"></div>
		</div>
	</a>

	<style type="text/css">
		.animation {
			cursor: pointer;
			margin: 0;
			padding: 0;
			z-index: 9999999999;
			position: fixed;
			opacity: 0.8;
			width: 80px;
			height: 80px;
			bottom: 0;
			left: 84px;
			transform: translate(-50%, -70%);
			border-radius: 50%;
			background-color: #ff9600;
		}

		.ring {
			z-index: 3;
			display: block;
			position: absolute;
			width: 100%;
			height: 100%;
			background: url('{{asset('public/public_site/image/circle-01-1.png')}}') no-repeat center center;
			-webkit-animation: ring 0.6s infinite;
			-o-animation: ring 0.6s infinite;
			animation: ring 0.6s infinite;
		}

		@keyframes ring {
			0% {
				transform: rotate(0deg);
			}

			20% {
				transform: rotate(-20deg);
			}

			21% {
				transform: rotate(0deg);
			}

			40% {
				transform: rotate(-20deg);
			}

			41% {
				transform: rotate(0deg);
			}

			60% {
				transform: rotate(-20deg);
			}

			80% {
				transform: rotate(-10deg);
			}

			100% {
				transform: rotate(0deg);
			}
		}

		.cercle {
			z-index: 2;
			position: absolute;
			width: 100px;
			height: 100px;
			transform: translate(-12px, -12px);
			border-radius: 50%;
			border: 2px solid #ff9600;
			background-color: transparent;
			-webkit-animation: wave 1.4s infinite linear;
			-o-animation: wave 1.4s infinite linear;
			animation: wave 1.4s infinite linear;
		}

		.two {
			animation-delay: 0.35s;
			opacity: 0;
		}

		.three {
			animation-delay: 0.7s;
			opacity: 0;
		}

		@keyframes wave {
			0% {
				width: 80px;
				height: 80px;
				background-color: #ff9600;
				z-index: 1;
				transform: translate(-2px, -2px);
				opacity: 1;
				border-width: 2px;
			}

			100% {
				width: 150px;
				height: 150px;
				transform: translate(-35px, -35px);
				opacity: 0.2;
				border-width: 2px;
			}
		}

		@keyframes opacity {
			0% {
				opacity: 1;
			}

			50% {
				opacity: 0.2;
			}

			100% {
				opacity: 1;
			}
		}

		@media only screen and (max-width: 768px) {
			.animation {
				width: 60px;
				height: 60px;
				bottom: -25px;
				left: 55px;
			}

			.cercle {
				display: none;
			}

			.icon.ring {
				background-size: 70%;
			}
		}

		/* ================================================== */
	</style>
	<!-- Scripts -->

	<script src="{{asset('public/public_site/js/jquery-3.3.1.min.js')}}"></script>

	<script src="{{asset('public/public_site/js/popper.min.js')}}"></script>

	<script src="{{asset('public/public_site/js/bootstrap.min.js')}}"></script>

	<script src="{{asset('public/public_site/js/swiper.min.js')}}"></script>

	<script src="{{asset('public/public_site/js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="{{asset('public/public_site/js/framework.combined-min.js')}}"></script>
	<link rel="stylesheet" property="stylesheet" href=" {{asset('public/public_site/css/framework.extras-min.css')}}">

	<script type="text/javascript" async="async" src="{{asset('public/public_site/js/menu.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/public_site/js/jquery.meanmenu.min.js')}}"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>  
	<script type="text/javascript">
		jQuery(document).ready(function () {
			jQuery('header nav').meanmenu({
				meanMenuContainer: '.menu-mobile',
				meanScreenWidth: "992"
			});
		});
	</script>
	@if (session('errors_login')||session('thongbao_login'))

		<script type="text/javascript">
			$(document).ready(function() {
					$('#signupModal').modal('show');
					$(function () {
					$('[data-toggle="tooltip"]').tooltip()
				})
			});
		</script>
	@endif
	@if (session('thongbao_login_thatbai'))
	<script type="text/javascript">
			$(document).ready(function() {
					$('#loginModal').modal('show');
			});
		</script>
	@endif
	@if (session('thongbao_quenmatkhau'))
		<script type="text/javascript">
			$(document).ready(function() {
					$('#quenModal').modal('show');
			});
		</script>
	@endif
	@yield('script')
	@include('website.checkout.sign_up_modal')
	@include('website.checkout.login_modal')
	@include('website.checkout.quenmk_modal')
	<script type="text/javascript">
		function click_navbar(id){
		$(document).ready(function () {
			localStorage.setItem("nav-active", id);
		});
		}
	</script>
<script type="text/javascript">
	$(document).ready(function () {
		$(".nav-head").removeClass("active");
		var id="#"+localStorage.getItem("nav-active");
		$(id).addClass( "active" );
	});
</script>
<script>
	var chatbox = document.getElementById('fb-customer-chat');
	chatbox.setAttribute("page_id", "105017725128905");
	chatbox.setAttribute("attribution", "biz_inbox");
	window.fbAsyncInit = function() {
	  FB.init({
		xfbml            : true,
		version          : 'v10.0'
	  });
	};

	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
  </script>
  

</body>

</html>