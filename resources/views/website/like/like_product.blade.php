@extends('website.layout_site.index')
@section('content')
<section id="layout-content">

	<!--.service-->
	<section class="product mb-5">
		<div class="container">
			<h3 class="title text-center text-primary">SẢN PHẨM YÊU THÍCH</h3>
			<div class="des text-center mb-4 w-75 mx-auto">Với mong muốn mang tới cho khách hàng sự thuận tiện nhất
				và dẫn thay đổi thói quen đi chợ truyền thống cũng như đa số khách hàng đều được sử dụng các sản
			phẩm hoa quả sạch chất lượng cao nhất.</div>
			<!-- Swiper -->
			<div class="row row_withlist">
				<style type="text/css">
					img.card-img-top {
						width: 100%;
					}
				</style>
				@foreach ($product_like as $item)
				{{-- expr --}}
				<div class="col-lg-4">
					<div class="card">
						@if($item->persent_discount>0)
						<div class="discount">{{$item->persent_discount}}%</div>
						@endif
						<div class="card-img hvr-grow">
							<a href="{{route('get_product_detail',$item->slug)}}"><img class="card-img-top"
								src="{{asset('public/upload/product/'.$item->image)}}" alt="{{ $item->name }}" style="width:100% !important;"></a>
								<div class="box-control">
									<div class="item" style="margin: 120px 0px;">
										<a data-href="" class="delete_product_like_{{ $item->id }}" id="{{ $item->id }}" onclick="delete_withlist(this.id)"> <i class="fas fa-thumbs-down"></i></a>
										<span class="text">Bỏ thích</span>
									</div>
									<div class="item" style="margin: 120px 0px;">
										<a href="{{route('get_product_detail',$item->slug)}}"><i class="fas fa-plus"></i></a>
										<span class="text">Xem chi tiết</span>
									</div>
								</div>
								<div class="card-body">
									<h2><a href="{{route('get_product_detail',$item->slug)}}">{{$item->name}}</a></h2>
									<div class="box-price">
										@if($item->persent_discount>0)
										<div class="price">{{currency_format($item->price*((100-$item->persent_discount)/100))}}/{{$item->unit}}</div>
										<div class="old-price">{{currency_format($item->price)}}/{{$item->unit}}</div>
										<input type="hidden" value="{{ $item->price*((100-$item->persent_discount)/100)}}" class="cart_product_price_{{$item->id}}">
										<input type="hidden" value="{{ $item->price}}" class="cart_product_price_off_{{$item->id}}">
										@else
										<div class="price">{{currency_format($item->price)}}/{{$item->unit}}</div>
										<input type="hidden" value="{{ $item->price}}" class="cart_product_price_{{$item->id}}">
										<input type="hidden" value="{{ $item->price}}" class="cart_product_price_off_{{$item->id}}">
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach

				</div>
			</section>
			<!--- /.sanpham --->
			<!--- .category-product --->
			<section class="category-product">
				<div class="title-section">DANH MỤC SẢN PHẨM</div>
				<div class="container">
					<div class="row">
						@foreach ($productCategory as $item)
						<div class="col-md-4 mb-5">
							<div class="box-category" style="background-image:url('https://hoaquafuji.com/storage/app/uploads/public/463/6a0/ad7/thumb__525_420_0_0_auto.jpg') ">
								<h3 class="title"><a href="{{route('get_product_by_category',$item->slug)}}">{{$item->name}}</a></h3>
								<p><br></p> <p><br></p> <p><br></p>
							</div>
						</div>
						@endforeach

					</div>
				</div>
			</section>
			<!--- /.category-product --->
			<!--- .customer --->
			<section class="customer fixed-container mb-4">
				<div class="overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-6 pr-md-5">
							<div class="title">VIDEO</div>
							<div class="embed-responsive embed-responsive-4by3">
								<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/_Pw4ZO2WZBg"
								allowfullscreen></iframe>
							</div>
						</div>
						<div class="col-md-6">
							<div class="title">Ý KIẾN KHÁCH HÀNG</div>
							<!-- Swiper -->
							<div class="swiper-container customer-slider">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<div class="item">
											<p>Bà Hậu Phương </p>
											<p> Giám đốc công ty TNHH Phát triển công nghệ 2MG</p>
											<p><img src="https://hoaquafuji.com/storage/app/uploads/public/cad/0f0/2c2/thumb__150_150_0_0_auto.jpg"
												alt="Khách hàng fuij"></p>
												<p>“ Là người thường xuyên phải chuẩn bị hậu cần ở công ty, tôi luôn phải tìm
													nguồn trái cây nhập khẩu tươi ngon, an toàn cho cả công ty mỗi dịp liên
													hoan, hội nghị....Sau khi tìm hiểu rất kỹ, tôi đã lựa chọn Hoa quả sạch Fuji
													và tôi không còn lo lắng chất lượng hoa quả nữa”
												</p>
											</div>
										</div>
										<div class="swiper-slide">
											<div class="item">
												<p>Ông Ngô Quyền </p>
												<p> Giám đốc công ty nội thất ADhome</p>
												<p><img src="https://hoaquafuji.com/storage/app/uploads/public/4b4/d0e/ca8/thumb__150_150_0_0_auto.jpg"
													alt="Khách hàng fuij"></p>
													<p>“Hoa quả sạch FUJI luôn tươi ngon với đầy đủ giấy tờ chứng minh nguồn gốc rõ
														ràng nên tôi rất yên tâm lựa chọn cho gia đình cũng như tặng người thân, bạn
														bè!”
													</p>
												</div>
											</div>
											<div class="swiper-slide">
												<div class="item">
													<p>Ông Trần Tuấn </p>
													<p> CEO &amp; founder Công ty in, thiết kế Tuấn Hoàng</p>
													<p><img src="https://hoaquafuji.com/storage/app/uploads/public/ac5/83b/43f/thumb__150_150_0_0_auto.jpg"
														alt="Khách hàng fuij"></p>
														<p>“Tôi thích nhất chính sách đổi trả của Hoa quả sạch Fuji. Có lần mình mua
															trái lựu bị khô bên trong, các bạn nhân viên đã tư vấn nhiệt tình và đổi trả
															100% Miễn phí. Từ đó, tôi không cần lo lắng về chất lượng sản phẩm mua tại
															hệ thống hoa quả sạch nhập khẩu Fuji”.
														</p>
													</div>
												</div>
												<div class="swiper-slide">
													<div class="item">
														<p>Ông Minh </p>
														<p> Giám đốc công ty cổ phần phần mềm POS 365</p>
														<p><img src="https://hoaquafuji.com/storage/app/uploads/public/9bc/681/458/thumb__150_150_0_0_auto.jpg"
															alt="Khách hàng fuij"></p>
															<p>"Có lần, tôi muốn đặt giỏ quà tặng sinh nhật đối tác, nhân viên đã gọi điện
																tư vấn rất nhiệt tình, trang trí rất đẹp và sáng tạo, tôi rất ưng ý và sẽ
																thường xuyên ghé mua hàng tại hệ thống HQS Fuji!"
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
							<!--- /.customer --->
							<!--- .news --->
							<!--- /.news --->
						</section>
						@stop
