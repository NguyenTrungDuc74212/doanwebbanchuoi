	<!-- footer -->

	<footer>

		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="title">Chính sách</div>
					<ul class="list-unstyled">
						<li><a href="https://hoaquafuji.com/chinh-sach-bao-mat-thong-tin">Chính sách bảo mật thông
								tin</a></li>
						<li><a href="https://hoaquafuji.com/quy-dinh-va-hinh-thuc-thanh-toan">Quy định và hình thức
								thanh toán</a></li>
						<li><a href="https://hoaquafuji.com/chinh-sach-thanh-vien-fuji">Chính sách thành viên Fuji</a>
						</li>
						<li><a href="https://hoaquafuji.com/chinh-sach-doi-tra">Chính sách đổi trả</a></li>
						<li><a href="https://hoaquafuji.com/chinh-sach-van-chuyen">Chính sách vận chuyển</a></li>
						<li><a href="https://hoaquafuji.com/cau-hoi-thuong-gap">Câu hỏi thường gặp</a></li>
						<li><a href="https://hoaquafuji.com/lien-he">Liên hệ</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div class="title">Hỗ trợ mua hàng</div>
					<ul class="list-unstyled">
						<li><a href="https://hoaquafuji.com/danh-sach-cua-hang-fuji-fruit">Hệ thống cửa hàng</a></li>
						<li><a href="https://hoaquafuji.com/huong-dan-mua-hang">Hướng dẫn mua hàng</a></li>
						<li><a href="https://hoaquafuji.com/hoa-don-vat">Hóa đơn VAT</a></li>
					</ul>
					<a href='http://online.gov.vn/Home/WebDetails/69210'
						title="Hoa quả Fuji đã đăng ký với Bộ công thương"><img width='170px' alt='Bộ công thương'
							title='Bộ công thương'
							src="https://hoaquafuji.com/themes/hoaquafuji/assets/images/logoSaleNoti.png" /></a>
				</div>
				<div class="col-md-4">
					<div class="title">CÔNG TY CP XUẤT NHẬP KHẨU FUJI</div>
					<p>Trụ sở: Số nhà 24 D7, KĐT Đại Kim - Định Công, P.Đại Kim, Q.Hoàng Mai, TP.HN</p>
					<p>Hotline: 1900 2268 - 0988 444 123</p>
					<p>Website: www.hoaquafuji.com</p>
					<p>Giấy CNĐKKD: 0107875928 do Sở Kế hoạch và Đầu tư TP Hà Nội cấp ngày 09/06/2017</p>
				</div>
			</div>
		</div>
	</footer>

	<div class="copy-right py-3">

		<div class="container">

			<div class="row align-items-center">

				<div class="col-md-6">© 2018 Hệ thống hoa quả sạch Fuji Fruit</div>

				<div class="col-md-6 text-right">

					<a href="#!" class="btn-social hvr-grow"><i class="fab fa-facebook-f"></i></a>

					<a href="#!" class="btn-social hvr-grow"><i class="fab fa-google-plus-g"></i></i></a>

					<a href="#!" class="btn-social hvr-grow"><i class="fab fa-twitter"></i></a>

					<a href="#!" class="btn-social hvr-grow"><i class="fab fa-youtube"></i></a>

				</div>

			</div>

		</div>

	</div>

	<a href="tel:19002268">
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
			background: url('/themes/hoaquafuji/assets/img/circle-01-1.png') no-repeat center center;
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
   
	<script src="{{asset('public/public_site/js/framework.combined-min.js')}}"></script>
	<link rel="stylesheet" property="stylesheet" href=" {{asset('public/public_site/css/framework.extras-min.css')}}">

	<script type="text/javascript" async="async" src="{{asset('public/public_site/js/menu.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/public_site/js/jquery.meanmenu.min.js')}}"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function () {
			jQuery('header nav').meanmenu({
				meanMenuContainer: '.menu-mobile',
				meanScreenWidth: "992"
			});
		});
	</script>
</body>

</html>