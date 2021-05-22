@include("website.layout_site.header")
@yield("content")
@include("website.layout_site.footer")
{{-- xử lý search --}}
<script type="text/javascript">
	$(document).ready(function() {
		$('#keywords').keyup(function(event) {
			event.preventDefault();
			var query = $(this).val();
			var token = $('input[name="_token"]').val();
			if (query!='') {
				$.ajax({
                url: '{{ route('auto_search') }}',
                type: 'POST',
                data:{
                    key:query,
                    _token:token,
                }, /*name:biến var*/
                success:function(data) /*dữ liệu(data) trả về bên function*/
                {
                   $('#search_ajax').fadeIn(); 
                   $('#search_ajax').html(data);
               }
           });
			}
			else {
				$('#search_ajax').fadeOut(); 
			}
		});
	});
	$(document).on('click','li.value_search',function(e){
            e.preventDefault();
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();

        });
</script>
{{-- end xử lý search --}}
<script type="text/javascript">
	$(document).ready(function() 
	{             
		$('.dangky').click(function(event) {
			$('#signupModal').modal('show');
			$('#loginModal').modal('hide');
			// $(function () {
			// 	$('[data-toggle="tooltip"]').tooltip()
			// })
		});
		$('.dangnhap').click(function(event) {
			$('#loginModal').modal('show');
			$('#signupModal').modal('hide');
			
		});
		// $('#nutthanhtoan').click(function(){
		// 	$('#loginModal').modal('show');
		// });
		$('.dangky_customer').click(function(event) {
			$('#signupModal').modal('show');
			$('#loginModal').modal('hide');
		});
		$('.dangnhap_customer').click(function(event) {
			$('#signupModal').modal('hide');
			$('#loginModal').modal('show');
		});
		$('.quenmk_customer').click(function(event) {
			$('#loginModal').modal('hide');
			$('#quenModal').modal('show');
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.cart_thanhtoan').click(function(event) {
			event.preventDefault();
			var id = $(this).data('id');
			var cart_product_id = $('.cart_product_id_'+id).val();
			var cart_product_name = $('.cart_product_name_'+id).val();
			var cart_product_unit = $('.cart_product_unit_'+id).val();
			var cart_product_image = $('.cart_product_image_'+id).val();
			var cart_product_price = $('.cart_product_price_'+id).val();
			var cart_product_qty = $('.cart_product_qty_'+id).val();
			var quantity_storage = $('.cart_product_storage_'+id).val();
			var token = $('input[name="_token"]').val();

			if (parseInt(quantity_storage)>parseInt(cart_product_qty)) {
				$.ajax({
					url: '{{ route('add_cart_ajax') }}',
					type: 'POST',
					data:{cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:token,cart_product_id:cart_product_id,quantity_storage:quantity_storage,cart_product_unit:cart_product_unit}, /*name:biến var*/
					success:function(data) /*dữ liệu(data) trả về bên function*/
					{
						var soluong = parseInt(data);
						$('.giohang_show').html(`<span id="cart-info"> Có ${soluong} sp trong giỏ hàng</span>`);
						$('.giohang_show_2').html(`<i class="fas fa-shopping-cart align-middle text-primary fa-2x"></i><span>${soluong}</span>`);

						swal({
							title: 'Thêm giỏ hàng thành công!!!',
							text:"bạn muốn đến giỏ hàng chứ!!",
							icon: "success",
							buttons:["không","Okee lunn"]
						}).then((ok)=>{
							if (ok) {
								window.location.href = "{{ route('get_cart') }}";
							}
							else{

							}
						});
					}
				});
			}
			else{
				swal({
					title: 'Số lượng sản phẩm không đủ!!!',
					text:"Xin vui lòng liên hệ với quản lý để được hỗ trợ",
					icon: "warning",
					buttons:["Quay về trang chủ","Xem tiếp"],
				}).then((ok)=>{
					if (ok) {

					}
					else {
						window.location.href = "{{ route('get_home_page') }}";
					}


				});
			}
		});
		$(document).on('change','.update_cart',function(e){
			e.preventDefault();

			var session_id = $(this).data('id');
			var token = $('input[name="_token"]').val();
			var soluong = $(this).val();
			var cart_product_name = $('.product_name_'+session_id).val();
			var cart_product_price = $('.cart_product_price_'+session_id).val();
			var price_old = $(this).parent().next().next().children().text().replace(/[^a-zA-Z0-9 ]/g, "");
			// alert(price_old);

			var thanhtien = $(this).parent().next().next().children().text((cart_product_price*soluong).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+'đ');
			var total_am = parseInt($('.tongtien_am').text());
			if (total_am<0) {
                var total_offical = parseInt((cart_product_price*soluong)-parseInt(price_old))+total_am;
			}
			else{
				var total_old = $('.tongtien').text().replace(/[^a-zA-Z0-9 ]/g, "");
				var total_offical = parseInt((cart_product_price*soluong)-parseInt(price_old))+parseInt(total_old);
			}
            $('.tongtien_am').text(total_offical);
            
			if (total_offical<0) {
				$('.tongtien').text('0đ');
			}
			else{
				$('.tongtien').text(total_offical.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+'đ');
			}


			$.ajax({
				url: '{{ route('update_cart_ajax') }}',
				type: 'POST',
				data:{session_id:session_id,_token:token,soluong:soluong,cart_product_name:cart_product_name}, /*name:biến var*/
				success:function(data) /*dữ liệu(data) trả về bên function*/
				{
					if (data['error']=='error') {
						swal({
							text: `Số lượng sản phẩm ${data['product']} không đủ để đặt hàng!!!`,
							icon: "warning",
							button: "Trở lại giỏ hàng"
						});
					}
					else{
						swal({
							text: 'Cập nhật giỏ hàng thành công!!!',
							icon: "success",
							button: "Trở lại giỏ hàng"
						}).then((ok)=>{
							if (ok) {
								window.location.href = "{{ Request()->url() }}";
							}
							else{

							}

						});
					}
				}

			})
		});
	});
	$(document).ready(function() {
		$('.delete_cart').click(function(e) {
			e.preventDefault();
			$(this).parent().parent().remove();
			if ($('.wrap-cart').length==0) {
				$('.total_area').remove();
			}
			var session_id = $(this).data('id');
			var price_product = parseInt($(this).parent().prev().children().text().replace(/[^a-zA-Z0-9 ]/g, ""));
			var total_am = parseInt($('.tongtien_am').text());
			var total = parseInt($('.tongtien').text().replace(/[^a-zA-Z0-9 ]/g, ""));

			if (total_am<0) {
                 $('.tongtien').text('0đ');
			}
			else if((total-price_product)<0){
				$('.tongtien').text('0đ');
			}
			else{
				$('.tongtien').text((total-price_product).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+'đ');
			}

			$.ajax({
				url: '{{ route('delete_cart_ajax') }}',
				type: 'GET',
				data:{session_id:session_id}, /*name:biến var*/
				success:function() /*dữ liệu(data) trả về bên function*/
				{
					swal({
						text: 'Xóa khỏi giỏ hàng thành công!!!',
						icon: "success",
						buttons: ["Không","Trở lại giỏ hàng"]
					}).then((ok)=>{
						if (ok) {
							window.location.href = "{{ Request()->url() }}";
						}
						else{

						}

					});
				}
			});

		});
	});
</script>