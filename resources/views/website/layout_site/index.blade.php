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
							buttons:["không","Có"]
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

	/*xử lý sản phẩm yêu thích*/
	function  delete_withlist(id)
	{
		$.ajax({
			url: '{{ route('delete_product_like') }}',
			type: 'GET',
			data:{id:id}, /*name:biến var*/
			success:function() /*dữ liệu(data) trả về bên function*/
			{
				swal({
					title: 'Sản phẩm đã được xóa khỏi danh mục yêu thích!!!',
					icon: "success",
					button: "Quay lại",
				}).then((ok)=>{
					window.location.reload();
				});
			}
		});
	}
	function view()
	{
		if (localStorage.getItem('data')) {
			var result = JSON.parse(localStorage.getItem('data'));
			result.reverse(); /*đảo ngược, những cái nào mới thêm sẽ lên đầu*/
			for (var i = 0; i < result.length; i++) {
				var html =`<div class="col-lg-4">`;
				html+=`<div class="card">`;
				if (parseInt(result[i].discount)>0) {

					html+=`<div class="discount">${result[i].discount}%</div>`;
				}
				html+=`<div class="card-img hvr-grow">`;
				html+=`<a href="${result[i].url}"><img class="card-img-top"
				src="${result[i].image}" alt="${result[i].name} style="width:100% !important;"></a>`;
				html+=`<div class="box-control">`;
				html+=`<div class="item" style="margin: 120px 0px;">
				<a href="" class="delete_withlist" data-id="${result[i].id}"> <i class="fas fa-thumbs-down"></i></a>
				<span class="text">Bỏ thích</span>
				</div>`;
				html+=`<div class="item" style="margin: 120px 0px;">
				<a href="${result[i].url}"><i class="fas fa-plus"></i></a>
				<span class="text">Xem chi tiết</span>
				</div>`;
				html+=`</div>`;
				html+=`<div class="card-body">`;
				html+=`<h2><a href="${result[i].url}">${result[i].name}</a></h2>`;
				html+=`<div class="box-price">`;
				if (parseInt(result[i].discount)>0) {
					html+=`<div class="price">${(parseInt(result[i].price)*((100-parseInt(result[i].discount))/100)).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+'đ'}/${result[i].unit}</div>
					<div class="old-price">${(result[i].price).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+'đ'}/${result[i].unit}</div>`;
				}
				else{
					html+=`<div class="price">${(result[i].price).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")+'đ'}/${result[i].unit}</div>`;
				}
				html+=`</div>`;
				html+=`</div>`;
				html+=`</div>`;
				html+=`</div>`;
				$('.row_withlist').append(html);
			}
			$(document).on('click','.delete_withlist',function(event) {
				event.preventDefault();
				var id = $(this).data('id');
				console.log(result.length);
				if (result.length==0) {
					swal({
						title: 'lỗi',
						icon: "warning",
						button: "Quay lại",
					})
				}
				else if(result.length==1){
					for(var i = 0; i < result.length; i++) {
						if(result[i].id == id) {
							result.splice(i,1);
							break;
						}
					}
					localStorage.setItem('data',JSON.stringify(result));
					swal({
						title: 'Sản phẩm đã được xóa khỏi danh mục yêu thích!!!',
						icon: "success",
						button: "Quay lại",
					}).then(ok=>{
						window.location.reload();
					});
				}
				else if(result.length!=0) {
					for(var i = 0; i < result.length; i++) {
						if(result[i].id == id) {
							result.splice(i,i);
							break;
						}
					}
					localStorage.setItem('data',JSON.stringify(result));
					swal({
						title: 'Sản phẩm đã được xóa khỏi danh mục yêu thích!!!',
						icon: "success",
						button: "Quay lại",
					}).then(ok=>{
						window.location.reload();
					});
				}

			});
		}
	}
	view();
	function add_withlist(id)
	{
		var customer = $('#customer_id').val();
		if (customer) {
			var token = $('input[name="_token"]').val();
			$.ajax({
				url: '{{ route('like_product_ajax') }}',
				type: 'POST',
				data:{id:id,customer:customer,_token:token}, /*name:biến var*/
				success:function(data) /*dữ liệu(data) trả về bên function*/
				{
					
					if (data.indexOf("error")>0) {
						swal({
							title: 'Sản phẩm đã có trong danh mục yêu thích !!!',
							icon: "warning",
							button: "Quay lại",
						})
					}
					else {
						swal({
							title: 'Thêm sản phẩm yêu thích thành công',
							icon: "success",
							buttons: ["Bỏ qua","Đến xem sản phẩm yêu thích"],
						}).then((ok)=>{
							if (ok) {
								window.location.href = "{{ route('view_like_product') }}";
							}
						});
					}
					
				}
			});
		}
		else{
			var name = document.querySelector('.cart_product_name_'+id).value;
			var price = document.querySelector('.cart_product_price_off_'+id).value;
			var image = document.querySelector('#withlist_product_img_'+id).src;
			var url = document.querySelector('.cart_product_url_'+id).href;
			var id = document.querySelector('.cart_product_id_'+id).value;
			var unit = document.querySelector('.cart_product_unit_'+id).value;
			var discount = document.querySelector('.cart_product_discount_'+id).value;	

			/*tạo ra biến mới*/
			var newItem = {
				'name':name,
				'id'  : id,
				'price':price,
				'image':image,
				'unit':unit,
				'discount':discount,
				'url':url
			};

			if (localStorage.getItem('data')==null) {
				localStorage.setItem('data', '[]');
			}
			var old_data = JSON.parse(localStorage.getItem('data'));  /*object*/
			var match = $.grep(old_data,function(obj) {
				return obj.id ==id;
			});

			if (match.length>0) {
				swal({
					title: 'Sản phẩm đã có trong danh mục yêu thích !!!',
					icon: "warning",
					button: "Quay lại",
				})
			}else{
				old_data.push(newItem);
				swal({
					title: 'Thêm sản phẩm yêu thích thành công',
					icon: "success",
					buttons: ["Bỏ qua","Đến xem sản phẩm yêu thích"],
				}).then((ok)=>{
					if (ok) {
						window.location.href = "{{ route('view_like_product') }}";
					}
				});
				localStorage.setItem('data',JSON.stringify(old_data)); /*từ object chuyển sang json*/
				/**/  
			}
		}
	}
	/*end sản phẩm yêu thích*/

	/*xử lý lọc sản phẩm theo tiêu chí*/
	$(document).ready(function() {
		$('#sort').on('change',function(){
			var url = $(this).val();
			if (url) {
				window.location = url; 
			}
			return false;

		});
		$( function() {
			$( "#slider_filter" ).slider({
				range: true,
				min: {{$min_price}},
				max: {{$max_price}},
				values: [ {{$min_price}},{{$max_price}} ],
				steps: 10000,
				slide: function( event, ui ) {
					/*cho xem thông số*/
					$( "#amount" ).val( "VNĐ" + ui.values[ 0 ] + " - VNĐ" + ui.values[ 1 ] );
					$("#start_price").val(ui.values[ 0 ]);
					$("#end_price").val(ui.values[ 1 ]);
				}
			});
			$( "#amount" ).val( "VNĐ" + $( "#slider_filter" ).slider( "values", 0 ) +
				" - VNĐ" + $( "#slider_filter" ).slider( "values", 1 ) );
		} );
	});    
	/*end lọc*/
</script>