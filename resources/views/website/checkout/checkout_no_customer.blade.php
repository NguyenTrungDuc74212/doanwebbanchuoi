@extends('website.layout_site.index')
@section('content')
<section id="layout-content">

	<div class="container mb-5">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('get_home_page') }}">Trang chủ</a></li>
				<li class="breadcrumb-item active" aria-current="page">Đặt hàng và Thanh toán</li>
			</ol>
		</nav>
		<section class="checkout-page">
			<div class="title-section clearfix"><span>Đặt hàng và thanh toán</span></div>
			<div class="body-section">
				<form action="{{ route('save_shipping') }}" method="post">
					@csrf
					<input class="form-check-input" type="hidden" name="samecheck" value="2">
					<div class="adress">
					<div class="head" style="font-weight: 700;
					margin: 23px 0px;">THÔNG TIN NHẬN HÀNG</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-gruop row mb-4">
								<label class="col-sm-3 col-form-label">Họ tên</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="name_2" value="">
									@error('name_2')
									<p class="text-danger">{{ $message }}</p>
									@enderror
								</div>
							</div>
							<div class="form-gruop row mb-4">
								<label class="col-sm-3 col-form-label">Phone</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="phone_2" value="">
									@error('phone_2')
									<p class="text-danger">{{ $message }}</p>
									@enderror
								</div>
							</div>
							<div class="form-gruop row mb-4">
								<label class="col-sm-3 col-form-label">Email</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="email_2" value="">
									@error('email_2')
									<p class="text-danger">{{ $message }}</p>
									@enderror
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-gruop mb-4">
								<div class="">
									<textarea name="address_2" rows="5" class="w-100 p-3" placeholder="Địa chỉ nhận hàng"></textarea>
									@error('address_2')
									<p class="text-danger">{{ $message }}</p>
									@enderror
								</div>
							</div>
						</div>
					</div>
				</div>
				<section class="method-delivery">
					<div class="row">
						<div class="col-sm-6">
							<textarea name="notes" rows="3" style="width: 100%;padding: 0.5rem" placeholder="Nhập ghi chú đơn hàng"></textarea>
							@error('notes')
							<p class="text-danger">{{ $message }}</p>
							@enderror
							<select class="form-control" name="city" style="margin: 10px 0px;">
								<option value="">----Chọn thành phố---</option>
								@foreach ($city as $value)
								<option value="{{ $value->matp }}">{{ $value->name }}</option>
								@endforeach
								@error('city')
								<p class="text-danger">{{ $message }}</p>
								@enderror
							</select>
							@if (count(Session::get('cart'))>0)
							<span>
								<label><input class="type" name="method" value="1" type="radio">
								Chuyển khoản</label>
							</span>
							<span>
								<label><input class="type" name="method" value="2" type="radio">
								Nhận tiền mặt</label>
							</span>
							@error('method')
							<p class="text-danger">{{ $message }}</p>
							@enderror
							@endif

						</div>
						<div class="col-sm-6">
							<p><strong>Quý khách có thể thanh toán tiền mặt khi nhận hàng hoặc chuyển khoản theo thông tin sau</strong></p>
							<p>STK: 03101014666664 <br>
								Chủ tài khoản: Chử Quang Hà <br>
							Ngân hàng: MSB - Chi nhánh Đống Đa</p>
						</div>
					</div>
				</section>
				<table class="table table-bordered table-cart mt-4">
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
					<tbody class="text-center">
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
				@php
				$coupon_total = 0;
				if (Session::get('coupon_ss')) {
					foreach (Session::get('coupon_ss') as $value){
						if ($value['coupon_tinhnang']==2) {
							$coupon_total = ($total*$value['coupon_value'])/100;
						}
						elseif($value['coupon_tinhnang']==1){
							$coupon_total=$value['coupon_value'];
						}
					}
				}
				$total_offical = $total-$coupon_total;
				@endphp             
				<div class="row justify-content-end">
					<div class="col-3 text-right d-flex">
						@if (Session::get('coupon_ss'))
						<span class="text-danger">Tổng cộng:</span>
						<div class="box-total tongtien" style="margin: 0px 5px;">
							{{ $total_offical<0?'0đ': currency_format($total_offical)}}
						</div>
						<div class="tongtien_am" hidden>
							{{ ($total_offical)}} 
						</div>
						@else
						<span class="text-danger">Tổng cộng:</span>
						<div class="box-total tongtien" style="margin: 0px 5px;">
						{{ currency_format($total_offical = $total) }}</div>
						<div class="tongtien_am" hidden>
							{{ ($total_offical)}} 
						</div>
						@endif
					</div>
					<div class="col-2"></div>
				</div>
				<div class="row justify-content-between">
					<div class="col-3"><a href="{{ route('get_cart') }}" class="btn btn-success">Kiểm tra giỏ hàng</a></div>
					<div class="col-7 text-right">
						@if (Session::get('cart'))
						<button name="btnOrder" class="btn btn-primary">Xác nhận và thanh toán</button>
						@else
						<button name="btnOrder" disabled class="btn btn-primary">Xác nhận và thanh toán</button>
						@endif

					</div>
				</div>
			</form>
		</div>
	</section>
</div>
</section>
@stop