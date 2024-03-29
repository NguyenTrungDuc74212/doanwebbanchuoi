<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/*admin*/

//Auth
Route::get('Login','AuthController@login')->name('login');
Route::post('check-login','AuthController@check_login')->name('check_login');
Route::get('logout','AuthController@admin_logout')->name('admin_logout');
Route::get('forgot','AuthController@view_forgot')->name('view_forgot');
Route::post('send-mail','AuthController@send_mail')->name('send_mail');
Route::get('reset-password/{reset_password_token}','AuthController@reset_password')->name('reset_password');
Route::post('change-password','AuthController@change_password')->name('change_password');




Route::group(['middleware'=>'checkLogin','prefix'=>'admin'], function() {
	Route::get('backup','BackupController@myBackup')->name('back_up');
	Route::get('restore/{id}','BackupController@restoreDatabase')->name('restore');
	Route::get('backup/list','BackupController@getListBackup')->name('back_up_list');
	Route::get('backup/search','BackupController@search')->name('backup_search');
	//Dashboard
Route::get('Dashboard','AuthController@dashboard')->name('trangchu_admin');
	//thống kê báo cáo
Route::post('/filter-by-date','AuthController@filter_date')->name('filter_date');
Route::post('filter-date-selection','AuthController@order_filter')->name('order_filter');
Route::post('filter-30-days','AuthController@order_30_day')->name('order_30_day');
Route::post('input-chart','AuthController@chart_input_sheet')->name('chart_input_sheet');


// category_product
	Route::group(['middleware'=>'roleUser'], function() {
		Route::get('category-product','CategoryController@view_add_category_product')->name('view_add_category_product');
		Route::post('add-category-product','CategoryController@add_category')->name('insert_category_product');
		Route::get('list-category-product','CategoryController@list_category_product')->name('list_category_product');
		Route::get('edit-category-product/{id}','CategoryController@edit_category_product')->name('edit_category_product');
		Route::post('update-category-product/{id}','CategoryController@update_category_product')->name('update_category_product');
		Route::get('delete-category-product/{id}','CategoryController@delete_category_product')->name('delete_category_product');
	});

// category_post
	Route::group(['middleware'=>'roleAuth'], function() {
		Route::get('category-post','CategoryController@view_add_category_post')->name('view_add_category_post');
		Route::post('add-category-post','CategoryController@save_category_post')->name('insert_category_post');
		Route::get('list-category-post','CategoryController@list_category_post')->name('list_category_post');
		Route::get('edit-category-post/{id}','CategoryController@edit_category_post')->name('edit_category_post');
		Route::post('update-category-post/{id}','CategoryController@update_category_post')->name('update_category_post');
		Route::get('delete-category-post/{id}','CategoryController@delete_category_post')->name('delete_category_post');
		// Route::post('Search-live','CategoryController@searchFullText')->name('search_category_post');

	});

//product
	Route::group(['middleware'=>'roleUser'], function() {
		Route::get('view-add-product','ProductController@view_add_product')->name('view_add_product');
		Route::post('add-product','ProductController@add_product')->name('insert_product');
		Route::get('list-product','ProductController@list_product')->name('list_product');
		Route::get('edit-product/{id}','ProductController@edit_product')->name('edit_product');
		Route::post('update-product/{id}','ProductController@update_product')->name('update_product');
		Route::get('delete-product/{id}','ProductController@delete_product')->name('delete_product');
		Route::get('filter-product/{id_warehouse}/{status}','ProductController@filter_product')->name('filter_product_admin');
		Route::post('cancel-product','ProductController@cancel_product')->name('cancel_product');
		//gallery
		Route::get('add-gallery/{id}','ProductController@add_gallery')->name('add_gallery');
		Route::post('select-gallery','ProductController@select_gallery')->name('select_gallery');
		Route::post('insert-gallery/{id}','ProductController@insert_gallery')->name('insert_gallery');
		Route::post('update_gallery_name','ProductController@update_gallery')->name('update_gallery');
		Route::post('delete_gallery','ProductController@delete_gallery')->name('delete_gallery');
		Route::post('update_image','ProductController@update_image')->name('update_image');

	});

	Route::group(['middleware'=>'roleAuth'], function() {
		//post
		Route::get('view-add-post','PostController@view_add_post')->name('view_add_post');
		Route::post('add-post','PostController@add_post')->name('insert_post');
		Route::get('list-post','PostController@list_post')->name('list_post');
		Route::get('edit-post/{id}','PostController@edit_post')->name('edit_post');
		Route::post('update-post/{id}','PostController@update_post')->name('update_post');
		Route::get('delete-post/{id}','PostController@delete_post')->name('delete_post');

		//Slider
		Route::get('manage-banner','SliderController@manage_banner')->name('manage_banner');
		Route::get('add-slide','SliderController@add_slide')->name('add_slide');
		Route::post('save-slide','SliderController@insert_slide')->name('insert_slide');
		Route::get('an_slide/{id}','SliderController@anSlide')->name('an_slide');
		Route::get('hien_slide/{id}','SliderController@hienSlide')->name('hien_slide');
		Route::get('delete_slide/{id}','SliderController@delete_slide')->name('delete_slide');
	});
 
	
	Route::group(['middleware'=>'roleAdmin'], function() {
		/*delivery*/
		Route::get('/delivery','deliveryController@delivery')->name('add_delivery');
		Route::post('/xoa_delivery','deliveryController@delete_delivery')->name('delete_delivery');

		Route::post('/select-delivery','deliveryController@select_delivery')->name('select-delivery');
		Route::post('/select-delivery-page','deliveryController@select_delivery_page')->name('select-delivery-page');
		Route::post('/add-delivery','deliveryController@insert_delivery')->name('insert_delivery');
		Route::get('/load-delivery','deliveryController@load_delivery')->name('load_delivery');
		Route::post('/update-delivery','deliveryController@update_delivery')->name('update_delivery');

		/*coupon*/

		Route::get('/insert_coupon','CouponController@insert_coupon')->name('view_insert_coupon');
		Route::post('/save_coupon','CouponController@save_coupon')->name('save_coupon');

		Route::get('/list-coupon','CouponController@list_coupon')->name('list_coupon');
		Route::get('/xoa-coupon/{id}','CouponController@delete_coupon')->name('delete_coupon');
		Route::get('/khoa-coupon/{id}','CouponController@khoa_coupon')->name('khoa_coupon');
		Route::get('/kichhoat-coupon/{id}','CouponController@kichhoat_coupon')->name('kichhoat_coupon');
	});
	// order
	Route::group(['middleware'=>'roleAdmin'], function() {
		Route::get('order/list-order','orderController@getListOrder')->name('list_order');
		Route::get('order/get-detail/{id}','orderController@getOrderDetail')->name('order_get_detail');
		Route::post('order/change-status','orderController@changeStatus')->name('change_status_order');
		Route::post('order/change-status-pay','orderController@changeStatusPay')->name('change_status_pay_order');
		Route::get('order/get-by-status/{status}/{status_pay}','orderController@getByStatus')->name('get_by_status');
		Route::get('view_exchange/{order_code}','orderController@get_view_exchange')->name('get_view_exchange');
		Route::post('save_exchange/{order_code}','orderController@save_exchange')->name('save_exchange');
		Route::get('product-cancel','ProductController@getViewProductCancel')->name('get_view_product_cancel');
		Route::get('product-cancel/search','ProductController@getViewProductCancelSearch')->name('get_view_product_cancel_search');
		
	});


// users
	Route::group(['middleware'=>'roleAdmin'], function() {
		Route::get('list-user','AuthController@list_user')->name('list_user');
		Route::post('assign-role','AuthController@assign_role')->name('assign_role');
		Route::get('register-user','AuthController@register')->name('register-user');
		Route::post('save-user','AuthController@save_user')->name('save-user');
	});

   
   //warehouse
  Route::group(['middleware'=>'roleUser'], function() {


	//vendors
	Route::get('list-vendors','VendorController@list_vendor')->name('list_vendor');
	Route::get('/insert_vendor','VendorController@insert_vendor')->name('view_insert_vendor');
    Route::post('/save_vendor','VendorController@save_vendor')->name('save_vendor');
    Route::get('/xoa-vendor/{id}','VendorController@delete_vendor')->name('delete_vendor');
    Route::get('/sua-vendor/{id}','VendorController@edit_vendor')->name('edit_vendor');
    Route::post('/update-vendor/{id}','VendorController@update_vendor')->name('update_vendor');
    
    Route::get('/insert_warehouse','WarehouseController@insert_warehouse')->name('view_insert_warehouse');
    Route::post('/save_warehouse','WarehouseController@save_warehouse')->name('save_warehouse');
    Route::get('list-warehouse','WarehouseController@list_warehouse')->name('list_warehouse');
    Route::get('/xoa-warehouse/{id}','WarehouseController@delete_warehouse')->name('delete_warehouse');
    Route::get('/sua-warehouse/{id}','WarehouseController@edit_warehouse')->name('edit_warehouse');
    Route::post('/update-warehouse/{id}','WarehouseController@update_warehouse')->name('update_warehouse');

    //inwardslip
    Route::get('/insert_input','inputSheetController@insert_input')->name('view_insert_input');
    Route::post('/save_input','inputSheetController@save_input')->name('save_input');
    Route::post('/load-more','inputSheetController@load_input_sheet')->name('load_input_sheet');
    Route::get('list-input','inputSheetController@list_input')->name('list_input');
    Route::get('delete-input/{id}','inputSheetController@delete_input')->name('delete_input');
    Route::get('/sua-input/{id}','inputSheetController@edit_input')->name('edit_input');
    Route::post('/update-input/{id}','inputSheetController@update_input')->name('update_input');
    Route::post('change-status','inputSheetController@change_status')->name('change_status');
    Route::post('load-edit','inputSheetController@load_input_sheet_edit')->name('load_input_sheet_edit');
     Route::get('/view-input/{id}','inputSheetController@view_input')->name('view_input');

 });
     
     //Quản lý khách hàng
     Route::get('list-customer','AuthController@list_customer')->name('list_customer');

     //Quản lý phiếu  đổi trả
     Route::get('list-return-voucher','returnVoucherController@get_list_return')->name('get_list_return');
     Route::get('detail-return/{code}','returnVoucherController@view_detail_return')->name('view_detail_return');
});

Route::get('test', function() {
	$user = App\Models\User::find(4);
	$roles = ['admin'];
	$author = $user->roles()->whereIn('name',$roles)->first();
	if ($author) {
		echo 'true';
	}
	else{echo 'false';}
});

Route::get('test2', function() {
	$order = App\Models\Order::orderBy('id','DESC')->paginate(10);
	dd($order);
});
Route::get('add_user', function() {
	$user = new App\Models\User;
	$user->name = "Nguyễn Trung Đức";
	$user->email = "ductrungthug@gmail.com";
	$user->password = bcrypt('12345678');
	$user->gender = 1;
	$user->phone = '0948396138';
	$user->save();
	
});

/*end admin*/

/*website*/

Route::get('/','homePageController@getHomePage')->name('get_home_page');
Route::get('/timkiem','homePageController@getHomePage')->name('timkiem');
Route::post('/auto-search','homePageController@auto_search')->name('auto_search');

Route::get('san-pham/{slug}','productSiteController@getProductDetail')->name('get_product_detail');
Route::get('bai-viet','PostSiteController@getViewBlog')->name('get_view_blog');
Route::get('bai-viet/{slug}','PostSiteController@getBlogDetail')->name('get_view_blog_details');
Route::get('danh-muc-san-pham/{slug}','productSiteController@getProductByCategory')->name('get_product_by_category');
Route::get('danh-muc-bai-viet/{slug}','PostSiteController@getPostByCategory')->name('get_post_by_category');
Route::get('dia-chi-lien-he','addressController@getViewAddress')->name('get_address');
Route::get('ve-chung-toi','addressController@getViewIntroduce')->name('get_intro');

// Route::get('sanpham/{slug}','productSiteController@getProductDetail')->name('get_product_detail');
// Route::get('baiviet','PostSiteController@getViewBlog')->name('get_view_blog');
// Route::get('baiviet/{slug}','PostSiteController@getBlogDetail')->name('get_view_blog_details');

//giỏ hàng
Route::post('add-cart-ajax','cartController@add_cart_ajax')->name('add_cart_ajax');
Route::get('get-cart-ajax','cartController@get_cart')->name('get_cart');
Route::get('xoa-cart-ajax','cartController@delete_cart_ajax')->name('delete_cart_ajax');
Route::get('huy-don-hang','cartController@cancel_cart')->name('cancel_cart');
Route::post('update-cart-ajax','cartController@update_cart_ajax')->name('update_cart_ajax');
Route::post('check-coupon','cartController@check_coupon')->name('check_coupon');

//checkout
Route::get('login-google-customer','checkoutController@login_customer_google')->name('login_customer_google');
Route::get('/customer/google/callback','checkoutController@callback_customer_google');

Route::get('login-facebook','checkoutController@login_facebook')->name('facebook');
Route::get('facebook/callback','checkoutController@callback_facebook');

Route::get('checkout','checkoutController@get_checkout')->name('view_checkout');
Route::post('login_customer','checkoutController@login_customer')->name('login_customer');
Route::post('add-customer','checkoutController@add_customer')->name('add_customer');
Route::post('logout-customer','checkoutController@logout_customer')->name('logout_customer');
Route::post('save-shipping','checkoutController@save_shipping')->name('save_shipping');
Route::get('Success_payment','checkoutController@checkout_success_atm')->name('thanh_cong_atm');
Route::get('Success_payment_cash','checkoutController@checkout_success_cash')->name('thanh_cong_cash');
Route::post('lay-lai-mat-khau','checkoutController@recover_password')->name('recover_password');	
Route::get('update-new-pass','checkoutController@update_new_pass')->name('update_new_pass');
Route::post('update-pass','checkoutController@update_pass')->name('update_pass');
Route::post('feeship-order','checkoutController@feeship_order')->name('feeship_order');

//lịch sử đơn hàng
Route::get('history','orderController@history')->name('order_history');
Route::get('view-history-order/{id}','orderController@view_history_order')->name('view_history_order');
Route::post('cancel-order','orderController@cancelOrder')->name('cancel_order');

//sản phẩm yêu thích
Route::get('like-product','likeProductController@view_like_product')->name('view_like_product');
Route::get('delete-like-product','likeProductController@delete_product_like')->name('delete_product_like');
Route::post('like-product-ajax','likeProductController@like_product_ajax')->name('like_product_ajax');

// notification
Route::get('order/get-detail/{id}/{notification_id}','orderController@getOrderDetail')->name('order_get_detail_by_notification');
Route::get('notification/delete-all','orderController@deleteNotifications')->name('delete_all_notifications');
/* end website*/
