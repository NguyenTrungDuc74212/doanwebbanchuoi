@include("website.layout_site.header")
@yield("content")
@include("website.layout_site.footer")
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
		$(document).on('blur','.update_cart',function(e){
			e.preventDefault();
			var session_id = $(this).data('id');
			var token = $('input[name="_token"]').val();
			var soluong = $(this).val();
			var cart_product_name = $('.product_name_'+session_id).val();
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
							text: 'cập nhật giỏ hàng thành công!!!',
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
							window.location.href = "{{ route('get_cart') }}";
						}
						else{

						}

					});
				}
			});

		});
	});
</script>