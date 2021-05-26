<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Document</title>
</head>
<body>
	<div class="container" style="background: #222;border-radius: 12px;padding: 15px;">
		<div class="col-lg-12">
			<p style="text-align: center;color: #fff">Đây là email tự động. Quý khách vui lòng không trả lời email này.</p>
			<div class="row" style="background: cadetblue;padding: 15px;">
				<div class="col-lg-6" style="text-align: center;color: #fff;font-weight: bold;font-size: 30px;">
					<h4 style="margin: 0">CÔNG TY CHUỐI VIỆT NAM</h4>
					<h6 style="margin: 0">DỊCH VỤ BÁN HÀNG - NHẬP KHẨU - HOA SẠCH CHUYÊN NGHIỆP</h6>
				</div>
				<div class="col-lg-6 logo" style="color: #fff">
					<p>Chào bạn <strong style="color: #000;text-decoration: underline;">
						{{ $shipping_array['shipping_name'] }}
					</strong></p>
				</div>
				<div class="col-md-12">
					<p style="color: #fff;font-size: 17px;">Bạn hoặc một ai đó đã đăng ký dịch vụ tại cửa hàng với thông tin như sau: </p>
					<h4 style="color: #000;text-transform: uppercase;">Thông tin đơn hàng</h4>
					<p>Mã đơn hàng: <strong style="text-transform: uppercase;color: #fff">{{  $code['order_code']}}</strong></p>
					<p>Mã khuyến mãi áp dụng: <strong style="text-transform: uppercase;color: #fff">{{ $code['coupon_code'] }}</strong></p>
					<p>Dịch vụ:<strong style="text-transform: uppercase;color: #fff">Đặt hàng trực tuyến</strong></p>
					<h4 style="color: #000;text-transform: uppercase;">Thông tin người nhận</h4>
					<p>Email:
						<span style="color: #fff">{{ $shipping_array['shipping_email'] }}</span>
					</p>
					<p>Họ và tên người nhận: 
					     <span style="color: #fff">{{ $shipping_array['shipping_name'] }}</span>
					</p>
					<p>Địa chỉ nhận hàng: 
					     <span style="color: #fff">{{ $shipping_array['shipping_address'] }}</span>
					</p>
					<p>Số điện thoại: 
					     <span style="color: #fff">{{ $shipping_array['shipping_phone'] }}</span>
					</p>
					<p>Ghi chú đơn hàng: 
					     @if ($shipping_array['shipping_notes']=='')
					     <span style="color: #fff">Không có</span>
					     @else
					     <span style="color: #fff">{{ $shipping_array['shipping_notes'] }}</span>
					     @endif
					</p>
					<p>Hình thức thanh toán: <strong style="text-transform: uppercase;color: #fff">
					     @if ($shipping_array['shipping_method']==1)
					     	Chuyển khoản
					     @else
					     Tiền mặt
					     @endif
					</strong></p>
					@if ($shipping_array['shipping_method']==1)
						<p>Số tài khoản:
                           <span style="color: #fff">03101014666664</span>
						</p>
						<p>Chủ tài khoản:
                           <span style="color: #fff">NGUYỄN TRUNG ĐỨC</span>
						</p>
						<p>Ngân hàng:
                           <span style="color: #fff">Saccombank chi nhánh Đinh Tiên Hoàng</span>
						</p>
					@endif
					<p style="color: #fff">Nếu thông tin nhận hàng có gì sai sót hãy liên hệ với chúng tôi theo số sau: 0329294747</p>

				    <h4 style="color: #000;text-transform: uppercase;">Sản phẩm đã đặt</h4>
				    <table class="table table-striped" style="border:1px;">
				    	<thead>
				    		<tr>
				    			<th>Sản phẩm</th>
				    			<th>Giá tiền</th>
				    			<th>Số lượng đặt</th>
				    			<th>Đơn vị</th>
				    			<th>Thành tiền</th>
				    		</tr>
				    	</thead>
				    	<tbody>
				    		@php
				    			$subtotal = 0;
				    			$total = 0;
				    		@endphp
				    		@foreach ($cart_array as $cart)
				    			@php
				    				$subtotal = $cart['product_qty']*$cart['product_price'];
				    			@endphp
				    			<tr class="text-center">
				    				<td>{{ $cart['product_name'] }}</td>
				    				<td>{{ currency_format($cart['product_price']) }}</td>
				    				<td>{{ $cart['product_qty'] }}</td>
				    				<td>{{ $cart['product_unit'] }}</td>
				    				<td>{{ currency_format($subtotal) }}</td>
				    			</tr>
				    		@endforeach
				    		<tr>
				    			<td colspan="4" align="right" style="color: #fff">Tổng tiền thanh toán: {{currency_format($code['order_total'])}}</td>
				    		</tr>
				    	</tbody>
				    </table>
				</div>
				<p style="color: #fff">Mọi chi tiết xin liên hệ website: <a target="_blank" href="http://muachuoi.xyz/">Cưa hàng</a>, hoặc liên hệ qua số: 0329294747.Xin cảm ơn quý khách</p>
			</div>
		</div>
	</div>
</body>
</html>