@extends('website.layout_site.index')
@section('content')
<section id="layout-content">

	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
				<li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
			</ol>
		</nav>
		<div class="view-cart">
			<h1 class="text-center text-primary">Giỏ hàng của bạn</h1>
			<p class="text-dark text-center">Dưới đây là danh sách các sản phẩm trong giỏ hàng của bạn. Vui lòng xem lại danh sách sản phẩm, số lượng và bấm vào thanh toán</p>
			<div class="row">
				<div class="col-lg-12" id="cartList">
					<div class="cart-list">
						<div class="table-block">
							<div class="table-responsive text-center">
								<table class="table table-bordered table-cart">
									<thead>
										<tr>
											<th class="text-center">HÌNH ẢNH</th>
											<th class="text-center">TÊN SẢN PHẨM</th>
											<th class="text-center">ĐƠN GIÁ</th>
											<th class="text-center">SỐ LƯỢNG</th>
											<th class="text-center">ĐƠN VỊ TÍNH</th>
											<th class="text-center">THÀNH TIỀN</th>
											<th class="text-center">XÓA</th>
										</tr>
									</thead>
									@php
									$cart = Session::get('cart');
									$total = 0;
									@endphp
									<tbody>
										@if($cart)
										@foreach ($cart as $value)
										@php
										$subtotal = $value['product_price']*$value['product_qty'];
										$total = $total + $subtotal;
										@endphp
										<tr class="wrap-cart">
											<td>
												<a class="img-product-cart" href="" title="{{ $value['product_name'] }}">
													<img width="150px" alt="{{ $value['product_name'] }}" src="{{asset('public/upload/product/'.$value['product_image'])}}">
												</a>
											</td>
											<td>
												<h3 class="mb-0">
													<a class="name-product-cart" href="">{{ $value['product_name'] }}</a>          
												</h3>
												<p>({{ currency_format($value['product_price']) }}/{{ $value['product_unit'] }})</p>
											</td>
											<td>
												<span class="product-price">{{ currency_format($value['product_price']) }}</span>
											</td>
											<td>
												<input type="hidden" name="" class="product_name_{{ $value['session_id'] }}" value="{{ $value['product_name'] }}">
												<input type="hidden" name="" class="cart_product_price_{{ $value['session_id'] }}" value="{{ $value['product_price'] }}">

												<input type="number" size="1" value="{{ $value['product_qty'] }}" maxlength="3" min="0" class="update_cart" data-id="{{ $value['session_id'] }}" style="max-width: 60px;text-align:center">
											</td>
											<td>
												{{ $value['product_unit'] }}
											</td>
											<td>
												<span class="product-price">{{ currency_format($value['product_price']*$value['product_qty']) }}</span>
												{{-- <input type="hidden" value="{{ $value['product_price']*$value['product_qty'] }}" class="price_old_{{ $value['session_id'] }}"> --}}
											</td>
											<td>
												<a class="delete_cart" title="Xóa" data-id="{{ $value['session_id'] }}" href="">
													<i class="fa fa-trash" aria-hidden="true"></i>
												</a>
											</td>
										</tr>
										@endforeach
										@else
										<div class="view-cart">
											<h4 class="alert alert-danger mb-5" role="alert">
												Giỏ hàng đang trống, vui lòng chọn sản phẩm cho vào giỏ hàng sau đó tiến hành đặt hàng!!!
											</h4>
											<div class="text-center mb-5"><a href="{{ route('get_home_page') }}" class="btn btn-primary">Quay lại trang chủ</a></div>
										</div>
										@endif
									</tbody>
								</table>
							</div>
						</div>
						<div class="coupon text-right" style="margin: 10px 0px;">
							<form action="{{ route('check_coupon') }}" method="POST">
								@csrf
								<input type="text" name="code" placeholder="Nhập mã giảm giá">
								<button class="check_coupon" type="submit" style="
								background-color: #ff9600!important;
								color:white;
								border: 2px solid #ff9600;
								width: 9%;cursor: pointer;">Chấp nhận</button>
								@if (session('thongbao'))
								<p class="text-success">{{ session('thongbao') }}</p>
								@elseif(session('error'))
								<p class="text-danger">{{ session('error') }}</p>
								@endif
							</form>
						</div>
						<div class="row justify-content-between">
							<div class="col-md-4 col-xs-12">
								<div class="no-border">
									<div class="col-sm-6 col-xs-12" style="margin-bottom: 10px;">
										<a type="button" name="huy" value="Hủy đặt hàng" class="btn btn-dark" onclick="return confirm('Bạn có chắc muốn hủy đặt hàng?')" style="color: white;" href="{{ route('cancel_cart') }}">
										Hủy đặt hàng</a>
									</div>
									<div class="col-sm-6 col-xs-12" style="margin-bottom: 10px;">
										<a href="{{ route('get_home_page') }}" name="btnUpdate" value="" class="btn btn-dark" style="color: white;">
											Quay lại trang trủ
										</a>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-4 pull-right">
								<table class="table table-bordered table-cart-total">
									<tbody>
										@if (Session::get('coupon_ss'))
										@foreach (Session::get('coupon_ss') as $value)
										<tr>
											<td class="text-left">Mã giảm</td>
											<td class="text-right">
												<div class="product-price">{{ $value['coupon_code']}}</div>
											</td>
										</tr>
										<tr>
											<td class="text-left">Tổng giảm</td>
											@if ($value['coupon_tinhnang']==2)
											<input type="hidden" name="" class="coupon_phantram" value={{ $value['coupon_value'] }}>
											<td class="text-right">
												<div class="product-price">{{ currency_format($coupon_total = ($total*$value['coupon_value'])/100) }}</div>
											</td>
											@elseif($value['coupon_tinhnang']==1)
											<td class="text-right">
												<input type="hidden" name="" class="coupon" value={{ $value['coupon_value'] }}>
												<div class="product-price">{{ currency_format($coupon_total=$value['coupon_value']) }}</div>
											</td>
											@endif
										</tr>
										@php
										$total_offical = $total-$coupon_total;
										@endphp
										<tr>
											<td class="text-left">Tổng giá trị đơn hàng</td>
											@if (Session::get('coupon_ss'))
											<td class="text-right">
												<div class="product-price tongtien">{{ $total_offical<0?'0đ': currency_format($total_offical)}}</div>
												<div class="tongtien_am" hidden>
													{{ ($total_offical)}} }}
												</div>
											</td>
											@else
											<td class="text-right">
												<div class="product-price tongtien">{{ currency_format($total_offical = $total) }}</div>
											</td>
											@endif
										</tr>
										@endforeach
										@else
										<tr>
											<td class="text-left">Tổng giá trị đơn hàng</td>
											<td class="text-right">
												<div class="product-price tongtien">{{ currency_format($total_offical=$total) }}</div>
											</td>
										</tr>
										@endif
									</tbody>
									<input type="hidden" name="" class="total_offical" value={{ $total_offical }}>
									@php
									Session::put('total',$total_offical);
									@endphp
								</table>
								@if ($cart)
								<a href="{{ route('view_checkout') }}" class="btn btn-lg btn-style pull-xs-right btn-checkout width100" title="Tiến hành thanh toán">Thanh toán</a>
								@else
								<button disabled class="btn btn-lg btn-style pull-xs-right btn-checkout width100" title="Tiến hành thanh toán">Thanh toán</button>
								@endif
							</div>
						</div>
					</div>	            
				</div>
			</div>
		</div>
		<section class="viewed mb-5">
			<div class="title-section">Sản phẩm bán chạy</div>
			<div class="row mb-5 mt-3">
				@foreach ($product_top_sale as $item)
				<div class="col-md-3">
					<div class="card">
						<form>
							@if($item->persent_discount>0)
							<div class="discount">{{$item->persent_discount}}%</div>
							@endif
							<div class="rate">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
							</div>
							<div class="card-img hvr-grow">
								<a href="/product/tao-envy-new-zealand"><img class="card-img-top" src="{{asset('public/upload/product/'.$item->image)}}" alt="{{ $item->name }}" id="withlist_product_img_{{ $item->id }}"></a>
								<div class="box-control">
									<div class="item">
										<button class="cart_thanhtoan" data-id="{{ $item->id }}" type="button" style="display: block;
										margin: 0 auto;
										background: 0 0;
										border: 0;
										cursor: pointer;
										color: #269300;">
										<i class="fas fa-shopping-cart"></i></button>
										<span class="text">Thêm giỏ hàng</span>
									</div>
									<div class="item">
										<button class="button_withlist_1" onclick="add_withlist(this.id)" id="{{ $item->id }}" type="button" style="display: block;
										margin: 0 auto;
										background: 0 0;
										border: 0;
										cursor: pointer;
										color: #269300;">
										<i class="fas fa-heart"></i></button>
										<span class="text">Like sản phẩm</span>
									</div>
									<div class="item">
										<a href="{{route('get_product_detail',$item->slug)}}" class="cart_product_url_{{ $item->id }}"><i class="fas fa-plus"></i></a>
										<span class="text">Xem chi tiết</span>
									</div>
								</div>
							</div>
							<input type="hidden" value="{{ $item->id }}" class="cart_product_id_{{$item->id}}">
							<input type="hidden" value="{{ $item->name }}" class="cart_product_name_{{$item->id}}">
							<input type="hidden" value="{{ $item->image}}" class="cart_product_image_{{$item->id}}">
							<input type="hidden" value="1" class="cart_product_qty_{{$item->id}}">
							<input type="hidden" value="{{$item->quantity}}" class="cart_product_storage_{{$item->id}}">
							<input type="hidden" value="{{$item->unit}}" class="cart_product_unit_{{$item->id}}">
							<input type="hidden" value="{{$item->persent_discount}}" class="cart_product_discount_{{$item->id}}">
							@if (Session::get('id_customer'))
							<input type="hidden" value="{{ Session::get('id_customer') }}" id="customer_id">
							@endif

							<div class="card-body">
								<h2><a href="/product/tao-envy-new-zealand">{{$item->name}}</a></h2>
								<div class="box-price">
									@if($item->persent_discount>0)
									<div class="price">{{currency_format($item->price*((100-$item->persent_discount)/100))}}<sup>đ</sup></div>
									<div class="old-price">{{currency_format($item->price)}}<sup>đ</sup></div>
									<input type="hidden" value="{{ $item->price*((100-$item->persent_discount)/100)}}" class="cart_product_price_{{$item->id}}">
									<input type="hidden" value="{{ $item->price}}" class="cart_product_price_off_{{$item->id}}">
									@else
									<div class="price">{{currency_format($item->price)}}<sup>đ</sup></div>
									<input type="hidden" value="{{ $item->price}}" class="cart_product_price_off_{{$item->id}}">
									@endif
								</div>
							</div>
						</form>
					</div>
					<!-- Card -->
				</div>
				@endforeach
			</div>
		</section>
	</div>
</section>
@stop