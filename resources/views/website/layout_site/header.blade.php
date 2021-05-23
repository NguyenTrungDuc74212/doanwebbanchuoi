<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Chuối Việt Nam | Chuối sạch 100%</title>
	<meta name="description"
	content="Chuối Việt Nam, Presh Banana cung ứng các sản phẩm từ chuối, cam kết 100% chuối sạch!" />
	<link rel="canonical" href="https://hoaquafuji.com">
	<meta name="robots" content="index, follow" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Chuối Việt Nam | Chuối sạch 100%" />
	<meta property="og:description"
	content="Chuối Việt Nam, Presh Banana cung ứng các sản phẩm từ chuối, cam kết 100% chuối sạch!" />
	<meta property="og:image"
	content="https://hoaquafuji.com/storage/app/media/mua-gio-trai-cay-dep-gia-re-o-dau-000.jpg" />
	<meta property="og:url" content="https://muachuoi.xyz" />
	<meta property="og:locale" content="vi_VN" />
	<meta property="fb:app_id" content="3205375276187307" />
	<meta name="twitter:title" content="Chuối Việt Nam | Chuối sạch 100%">
	<meta name="twitter:description"
	content="Chuối Việt Nam, Presh Banana cung ứng các sản phẩm từ chuối, cam kết 100% chuối sạch!">
	<meta name="twitter:image"
	content="https://hoaquafuji.com/storage/app/media/mua-gio-trai-cay-dep-gia-re-o-dau-000.jpg" />
	<!-- Additional meta tags -->
	<meta name="google-site-verification" content="WXsKJfp0gesXTn2YHVyXTDWxlfNM-OyjHWgflGz4PRE" />

	<meta name="author" content="QuangtrongOnline">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="generator" content="QuangtrongOnline">

	<link rel="icon" href="{{asset('public/upload/slide/logo_chuoi.png')}}" sizes="50x50">
	<link rel="stylesheet" href="{{asset('public/public_site/css/fonts.css')}}">

	<link href="{{asset('public/public_site/css/app.css')}}" rel="stylesheet">

	<link href="{{asset('public/public_site/css/fontawesome-all.min.css')}}" rel="stylesheet">

	<link href="{{asset('public/public_site/css/meanmenu.min.css')}}" rel="stylesheet" />

	<!-- Load Facebook SDK for JavaScript -->

	<div id="fb-root"></div>

	<script>(function (d, s, id) {

		var js, fjs = d.getElementsByTagName(s)[0];

		if (d.getElementById(id)) return;

		js = d.createElement(s); js.id = id;

		js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';

		fjs.parentNode.insertBefore(js, fjs);

	}(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>
	<div class="clearfix"></div>
	<!-- Header -->
	<header id="header">

		<div class="clearfix"></div>
		<div class="d-none d-md-block">
			<div class="top-header py-3 font-weight-bold">
				<div class="container">
					<div class="row">
						<div class="col-md-6"><i class="fas fa-phone-square mr-2"></i>Chuối Việt Nam: <a
							href="tel:0329294747">0329294747</a></div>
							<div class="col-md-6 text-right">
								<a href="{{ route('get_cart') }}" class="text-dark giohang_show">
									<i class="fas fa-shopping-cart align-middle text-primar"></i>
									@php
									$cart = Session::get('cart');
									@endphp
									@if ($cart)
									@php
									$quantity = 0;
									foreach ($cart as $value) {
										$quantity = $quantity + $value['product_qty'];
									}
									@endphp
									<span id="cart-info"> Có {{$quantity}} sản phẩm</span>
									@else
									<span id="cart-info"> Giỏ hàng trống</span>
									@endif
								</a>
							</div>
						</div>
					</div>
					<script>
						(function (i, s, o, g, r, a, m) {
							i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
								(i[r].q = i[r].q || []).push(arguments)
							}, i[r].l = 1 * new Date(); a = s.createElement(o),
							m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
						})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

						ga('create', 'UA-145372992-1', 'auto');
						ga('send', 'pageview');

					</script>
				</div>
				<div class="middle-header bg-primary py-4 text-light">
					<div class="container">
						<div class="row align-content-center">
							<div class="col-md-5 col-lg-4">
								<form action="{{ route('timkiem') }}" method="get" class="form-inline w-75" autocomplete="off">
									@csrf
									<div class="input-group">
										<input name="key" type="text" class="form-control" placeholder="Tìm kiếm" id="keywords">
										<div id="search_ajax" style="position: absolute;right: 0;">
										</ul>
									</div>
									<div class="input-group-prepend">
										<button class="input-group-text bg-light" id="search-box" type="submit"><i
											class="fas fa-search text-dark"></i></button>
										</div>
									</div>
								</form>
							</div>
							<div class="col-md-2 col-lg-4 text-center">
								<a href="/"><img class="bg-light logo"
									src="{{asset('public/upload/slide/logo_chuoi.png')}}"
									alt="Hoa quả fuji"></a>
								</div>
								<div class="col-md-5 col-lg-4">
									<div class="cart bg-light w-75 ml-auto text-dark text-center py-2 rounded">
										<a href="{{route('get_address')}}" class="text-second"><i
											class="fas fa-map-marked-alt align-middle fa-17 mr-3"></i>Hệ thống cửa hàng</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="menu-mobile"></div>
					<div class="clearfix"></div>
					<div class="nav-desktop">
						<nav class="bg-light">
							<div class="container">
								<ul class="d-lg-flex flex-row justify-content-center align-items-center">
									<li class="sub-logo mr-auto"><a href="https://hoaquafuji.com"><img
										src="{{asset('public/upload/slide/logo_chuoi.png')}}"
										alt="Fresh Banana"></a></li>
										<li role="presentation" class="py-lg-2 nav-head" id='trangchu' onclick="click_navbar($(this).attr('id'))">
											<a href="{{route('get_home_page')}}">
												Trang chủ
											</a>
										</li>
										<li role="presentation" class="py-lg-2 nav-head" id='gioithieu' onclick="click_navbar($(this).attr('id'))">
											<a href="{{route('get_intro')}}">Giới thiệu</a>
										</li>
										<li role="presentation" class="py-lg-2 nav-head" id="tintuc" onclick="click_navbar($(this).attr('id'))">
											<a href="#">Tin tức</a>
											<ul class="sub-menu">
												@foreach ($postCategoryHeader as $item)
												<li role="presentation" class="py-lg-2">
													<a href="{{route('get_post_by_category',$item->slug)}}">{{$item->name}}</a>
												</li>
												@endforeach
											</ul>
										</li>
										<li role="presentation" class="py-lg-2 nav-head" id="sanxuat" onclick="click_navbar($(this).attr('id'))">
											<a href="#">Sản xuất</a>
										</li>
										<li role="presentation" class="py-lg-2 nav-head" id="dichvu" onclick="click_navbar($(this).attr('id'))">
											<a href="#">Dịch vụ</a>
										</li>
										<li role="presentation" class="py-lg-2 nav-head" id="muahang" onclick="click_navbar($(this).attr('id'))">
											<a href="#">Mua hàng online</a>
											<ul class="sub-menu">
												@foreach ($productCategoryHeader as $item)
												<li role="presentation" class="py-lg-2">
													<a href="{{route('get_product_by_category',$item->slug)}}">{{$item->name}}</a>
												</li>
												@endforeach
											</ul>
										</li>
										<li role="presentation" class="py-lg-2 nav-head" id="gocchiase" onclick="click_navbar($(this).attr('id'))">
											<a href="#">Góc chia sẻ</a>
										</li>
										<li role="presentation" class="py-lg-2 nav-head" id="lienhe" onclick="click_navbar($(this).attr('id'))">
											<a href="{{route('get_address')}}">Liên hệ</a>
										</li>
										<li class="btn-cart" id="btn-cart-navbar">
											<a href="" class="giohang_show_2">
												<i class="fas fa-shopping-cart align-middle text-primary fa-2x"></i>
												@if ($cart)
												<span>{{ $quantity }}</span>
												@else
												<span>0</span>
												@endif
											</a>
										</li>
										<li role="presentation" class="py-lg-2">
											@if (Session::get('id_customer'))
											<a href="">Xin chào {{ Session::get('name_customer') }}</a>
											<ul class="sub-menu">
												<li role="presentation" class="py-lg-2">
													<a href="#" data-toggle="modal" data-target="#signupModal"><i class="fas fa-user-plus dangky"></i>
													Đăng ký</a>

												</li>
												<li role="presentation" class="py-lg-2">
													<a href="{{ route('order_history') }}"><i class="fas fa-history"></i>
													Lịch sử đơn hàng</a>

												</li>
												<form action="{{ route('logout_customer') }}" method="POST">
													@csrf
													<li role="presentation" class="py-lg-2">
														<button class="btn-custom" type="submit" style="padding: .5rem 1rem;
														font-weight: 700;
														transition: all .2s ease-in;
														display: block;border: 0;background: #269300;color: white;cursor: pointer;"><i class="fas fa-sign-out-alt"></i>
													Đăng xuất</button>
													<style type="text/css">
														.btn-custom:hover{
															background: #ff9600 !important; 
														}
														.btn-custom:focus{
															background: #ff9600 !important;
															border: 0  !important; 
															outline:none;
														}
														.btn-custom:active{
															outline:none;
														}
													</style>
												</li>
											</form>
										</ul>
										@else
										<a href="">Tài khoản</a>
										<ul class="sub-menu">
											<li role="presentation" class="py-lg-2">
												<a href="#" data-toggle="modal" data-target="#signupModal"><i class="fas fa-user-plus dangky"></i>
												Đăng ký</a>

											</li>
											<li role="presentation" class="py-lg-2">
												<a href="#" data-toggle="modal" data-target="#loginModal"><i class="fas fa-sign-in-alt dangnhap"></i>
												Đăng nhập</a>
											</li>
										</ul>
										@endif
									</li>
								</ul>
							</div>
						</nav>
					</div>
				</header>
