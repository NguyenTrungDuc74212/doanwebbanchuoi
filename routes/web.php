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
    //Dashboard
	Route::get('Dashboard','AuthController@dashboard')->name('trangchu_admin');


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
		Route::post('/add-delivery','deliveryController@insert_delivery')->name('insert_delivery');
		Route::get('/load-delivery','deliveryController@load_delivery')->name('load_delivery');
		Route::post('/update-delivery','deliveryController@update_delivery')->name('update_delivery');

		/*coupon*/

		Route::get('/insert_coupon','CouponController@insert_coupon')->name('view_insert_coupon');
		Route::post('/save_coupon','CouponController@save_coupon')->name('save_coupon');

		Route::get('/list-coupon','CouponController@list_coupon')->name('list_coupon');
		Route::get('/xoa-coupon/{id}','CouponController@delete_coupon')->name('delete_coupon');
	});
	// order
	Route::group(['middleware'=>'roleAdmin'], function() {
		Route::get('order/list-order','orderController@getListOrder')->name('list_order');
		Route::get('order/get-detail/{id}','orderController@getOrderDetail')->name('order_get_detail');
		Route::post('order/change-status','orderController@changeStatus')->name('change_status_order');
		Route::post('order/change-status-pay','orderController@changeStatusPay')->name('change_status_pay_order');
		
	});


// users
	Route::group(['middleware'=>'roleAdmin'], function() {
		Route::get('list-user','AuthController@list_user')->name('list_user');
		Route::post('assign-role','AuthController@assign_role')->name('assign_role');
		Route::get('register-user','AuthController@register')->name('register-user');
		Route::post('save-user','AuthController@save_user')->name('save-user');
	});

	//vendors
	Route::get('list-vendors','VendorController@list_vendor')->name('list_vendor');
	Route::get('/insert_vendor','VendorController@insert_vendor')->name('view_insert_vendor');
    Route::post('/save_vendor','VendorController@save_vendor')->name('save_vendor');
    Route::get('/xoa-vendor/{id}','VendorController@delete_vendor')->name('delete_vendor');
    Route::get('/sua-vendor/{id}','VendorController@edit_vendor')->name('edit_vendor');
    Route::post('/update-vendor/{id}','VendorController@update_vendor')->name('update_vendor');
   
   //warehouse
    Route::get('/insert_warehouse','WarehouseController@insert_warehouse')->name('view_insert_warehouse');
    Route::post('/save_warehouse','WarehouseController@save_warehouse')->name('save_warehouse');
    Route::get('list-warehouse','WarehouseController@list_warehouse')->name('list_warehouse');
     Route::get('/xoa-warehouse/{id}','WarehouseController@delete_warehouse')->name('delete_warehouse');
       Route::get('/sua-warehouse/{id}','WarehouseController@edit_warehouse')->name('edit_warehouse');
    Route::post('/update-warehouse/{id}','WarehouseController@update_warehouse')->name('update_warehouse');

    //inward slip
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
	$count = App\Models\Feeship::orderBy('id','DESC')->where('matp_id',96)->get();
	echo count($count);
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
Route::get('checkout','checkoutController@get_checkout')->name('view_checkout');
Route::post('login_customer','checkoutController@login_customer')->name('login_customer');
Route::post('add-customer','checkoutController@add_customer')->name('add_customer');
Route::post('logout-customer','checkoutController@logout_customer')->name('logout_customer');
Route::post('save-shipping','checkoutController@save_shipping')->name('save_shipping');
Route::get('Success_payment','checkoutController@checkout_success_atm')->name('thanh_cong_atm');
Route::get('Success_payment_cash','checkoutController@checkout_success_cash')->name('thanh_cong_cash');
/* end website*/
