<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Tinhthanhpho;
use App\Models\Warehouse;
use App\Models\WarehouseOrder;
use App\Models\WarehouseProduct;
use App\Models\Customer;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Order_detail;
use App\Models\Soical;
use App\Models\Repost;
use App\Models\User;
use App\Models\Feeship;
use Socialite; 
use Carbon\carbon;
use Session;
use Mail;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\addCustomerRequest;
use App\Http\Requests\shippingRequest;
use App\Http\Requests\check_login;
use DB;
use App\Rules\Captcha;
use Pusher\Pusher;
use App\Notifications\NotificationAdmin;


class checkoutController extends Controller
{
	public function get_checkout(Request $req)
	{
		$city = Tinhthanhpho::orderby('matp','DESC')->get();
		if (Session::get('id_customer')) {
			$customer = Customer::find(Session::get('id_customer'));
			return view("website.checkout.checkout",compact('city','customer'));
		}
		return view("website.checkout.checkout_no_customer",compact('city'));
	}
	public function login_customer(check_login $req)
	{

	// 	$validatedData = $req->validate([
	// 		"password"=>"required",
	// 		"g-recaptcha-response" => new Captcha(),
	// 	],
	// 	["password.required"=>"password không được để trống"]
	// );
		$customer = new Customer;
		$email = $req->input('email');
		$password = $req->input('password');
		$kq = $customer->where('email',$email)->first();
		if (!$kq) {
			return redirect()->back()->with('thongbao_login_thatbai','Đăng nhập thất bại');
		}
		if (Hash::check($password, $kq->password)) {
			Session::put('name_customer',$kq->name);
			Session::put('id_customer',$kq->id);
			if (Session::get('cart')) {
				return redirect()->route('view_checkout');
			}
			return redirect()->route('get_home_page');
		}
		return redirect()->back()->with('thongbao_login_thatbai','Đăng nhập thất bại');	
	}
	public function add_customer(addCustomerRequest $req)
	{
		$customer = new Customer;
		$customer->name = $req->input('name');
		$customer->email = $req->input('email');
		$customer->address = $req->input('address');
		$customer->password = bcrypt($req->input('password'));
		$customer->phone = $req->input('phone');
		$customer->save();
		return redirect()->back()->with('thongbao_login','Bạn đã đăng ký thành công');

	}
	public function logout_customer(Request $req)
	{
		$req->session()->forget('name_customer');
		$req->session()->forget('id_customer');
		//Session::flush();
		return redirect()->route('get_home_page');
	}
	public function save_shipping(Request $req)
	{
		
		$code_random = substr(md5(microtime()),rand(0,20),6);
		$coupon = Session::get('coupon_ss');
		$mytime = Carbon::now();
		$soluong =0;


		if (Session::get('id_customer'))
		{
			$customer = Customer::find(Session::get('id_customer'));
			if ($req->samecheck==1) {
				$validatedData = $req->validate([
					"method"=>"required",
					"notes"=>"required",
					"city"=>"required",
				],
				[
					"notes.required"=>"ghi chú không được bỏ trống",
					"method.required"=>"hình thức thanh toán không được bỏ trống",
					"city.required"=>"Bạn phải nhập thành phố của mình hiện đang sống"]
				);
				$shipping = new Shipping;
				$shipping->name = $req->input('name');
				$shipping->email = $req->input('email');
				$shipping->city = $req->input('city');
				$shipping->customer_id = Session::get('id_customer');
				$shipping->address = $req->input('address');
				$shipping->phone = $req->input('phone');
				$shipping->notes = $req->input('notes');
				$shipping->method = $req->input('method');
				$shipping->status = 1; /*mặc định là đang xử lý*/
				$shipping->save();
				$shipping_id = $shipping->id;
				Session::put('id_shipping',$shipping_id);
				$cart = Session::get('cart');
				foreach ($cart as $value) {
					$soluong += $value['product_qty'];
				}
				$order = new Order;
				$order->customer_id = Session::get('id_customer');
				$order->shipping_id = $shipping_id;
				$order->total = Session::get('total');
				$order->status =1 ;/*mặc định là đang xử lý*/
				//$order->order_code = $code_random;
				$order->quantity = $soluong;
				$order->order_date = $mytime->toDateString();
				if ($coupon) {
					$order->coupon = $coupon[0]['coupon_code'];
				}
				$order->save();
				$order_id = $order->id;
				$order->order_code=get_code($order_id,"DH");
				$order->save();
				foreach ($cart as $value) {
					$product = Product::find($value['product_id']);
					$order_detail = new Order_detail;
					$order_detail->order_id = $order_id;
					$order_detail->order_code = $code_random;
					$order_detail->product_id = $value['product_id'];
					$order_detail->unit = $value['product_unit'];
					$order_detail->soluong = $value['product_qty'];
					if ($product->persent_discount) {
						$order_detail->coupon = $product->persent_discount;
					}
					$order_detail->save();
					$product =$order_detail->product;
					$product->quantity = $product->quantity-$value['product_qty'];
					if($product->quantity<10)
					{
						$options = array(
							'cluster' => 'ap1',
							'encrypted' => true
						);
				
						$pusher = new Pusher(
							env('PUSHER_APP_KEY'),
							env('PUSHER_APP_SECRET'),
							env('PUSHER_APP_ID'),
							$options
						);
						$data['id_product']=$product->id;
						$pusher->trigger('my-channel', 'event-quantity-product', $data);
					}
					$product->save();
					// lấy sản phẩm ra từ trong kho
					do{
						$warehouseProduct=WarehouseProduct::where('product_id',$order_detail->product_id)->where('quantity','>',0)->where('status',0)->orderBy('created_at','ASC')->first();
						$warehouse = $warehouseProduct->warehouse;
						$warehouseOrder=new WarehouseOrder();
						$warehouseOrder->warehouse_product_id=$warehouseProduct->id;
						$warehouseOrder->order_detail_id=$order_detail->id;
						if($warehouseProduct->quantity>=$value['product_qty']){
							$warehouseOrder->quantity=$value['product_qty'];
							$warehouseProduct->quantity=$warehouseProduct->quantity-$value['product_qty'];
							$warehouse->quantity_now=$warehouse->quantity_now-$value['product_qty'];
							$value['product_qty']=0;
						}else{
							$warehouseOrder->quantity=$warehouseProduct->quantity;
							$warehouse->quantity_now=$warehouse->quantity_now-$warehouseProduct->quantity;
							$value['product_qty']=$value['product_qty']-$warehouseProduct->quantity;
							$warehouseProduct->quantity=0;
						}
						$warehouseOrder->save();
						$warehouseProduct->save();
						$warehouse->save();
					}while($value['product_qty']>0);
				}
				if ($req->input('method')==1) {
					return redirect()->route('thanh_cong_atm');
				}
				elseif($req->input('method')==2) {
					return redirect()->route('thanh_cong_cash');
				}
			}
			else{
				$validatedData = $req->validate([
					"email_2"=>"required|Email",
					"name_2"=>"required",
					"phone_2"=>"required|numeric",
					"address_2"=>"required",
					"method"=>"required",
					"notes"=>"required",
					"city"=>"required",
				],
				["email_2.required"=>"email không được để trống",
				"notes.required"=>"ghi chú không được bỏ trống",
				"email_2.Email"=>"email không hợp lệ",
				"name_2.required"=>"tên không được để trống",
				"phone_2.required"=>"số điện thoại không được để trống",
				"phone_2.numeric"=>"số điện thoại phải là số",
				"address_2.required"=>"địa chỉ không được để trống",
				"method.required"=>"hình thức thanh toán không được bỏ trống",
				"city.required"=>"Bạn phải nhập thành phố của mình hiện đang sống"]
			);
				$shipping = new Shipping;
				$shipping->name = $req->input('name_2');
				$shipping->email = $req->input('email_2');
				$shipping->city = $req->input('city');
				$shipping->customer_id = Session::get('id_customer');
				$shipping->address = $req->input('address_2');
				$shipping->phone = $req->input('phone_2');
				$shipping->notes = $req->input('notes');
				$shipping->method = $req->input('method');
				$shipping->status = 1; /*mặc định là đang xử lý*/
				$shipping->save();
				$shipping_id = $shipping->id;
				Session::put('id_shipping',$shipping_id);
				$cart = Session::get('cart');
				foreach ($cart as $value) {
					$soluong += $value['product_qty'];
				}
				$order = new Order;
				$order->customer_id = Session::get('id_customer');
				$order->shipping_id = $shipping_id;
				$order->total = Session::get('total');
				$order->status =1 ;/*mặc định là đang xử lý*/
			//	$order->order_code = $code_random;
				$order->quantity = $soluong;
				$order->order_date = $mytime->toDateString();
				if ($coupon) {
					$order->coupon = $coupon[0]['coupon_code'];
				}
				$order->save();
				$order_id = $order->id;
				$order->order_code=get_code($order_id,"DH");
				$order->save();

				foreach ($cart as $value) {
					$product = Product::find($value['product_id']);
					$order_detail = new Order_detail;
					$order_detail->order_id = $order_id;
					$order_detail->order_code = $code_random;
					$order_detail->product_id = $value['product_id'];
					$order_detail->unit = $value['product_unit'];
					$order_detail->coupon = $product->persent_discount;
					$order_detail->soluong = $value['product_qty'];
					$order_detail->save();
					$product =$order_detail->product;
					$product->quantity = $product->quantity-$value['product_qty'];
					$product->save();
					if($product->quantity<10)
					{
						$options = array(
							'cluster' => 'ap1',
							'encrypted' => true
						);
				
						$pusher = new Pusher(
							env('PUSHER_APP_KEY'),
							env('PUSHER_APP_SECRET'),
							env('PUSHER_APP_ID'),
							$options
						);
						$data['id_product']=$product->id;
						$pusher->trigger('my-channel', 'event-quantity-product', $data);
					}
						// lấy sản phẩm ra từ trong kho
					do{
						$warehouseProduct=WarehouseProduct::where('product_id',$order_detail->product_id)->where('quantity','>',0)->where('status',0)->orderBy('created_at','ASC')->first();
						$warehouse = $warehouseProduct->warehouse;
						$warehouseOrder=new WarehouseOrder();
						$warehouseOrder->warehouse_product_id=$warehouseProduct->id;
						$warehouseOrder->order_detail_id=$order_detail->id;
						if($warehouseProduct->quantity>=$value['product_qty']){
							$warehouseOrder->quantity=$value['product_qty'];
							$warehouseProduct->quantity=$warehouseProduct->quantity-$value['product_qty'];
							$warehouse->quantity_now=$warehouse->quantity_now-$value['product_qty'];
							$value['product_qty']=0;
						}else{
							$warehouseOrder->quantity=$warehouseProduct->quantity;
							$warehouse->quantity_now=$warehouse->quantity_now-$warehouseProduct->quantity;
							$value['product_qty']=$value['product_qty']-$warehouseProduct->quantity;
							$warehouseProduct->quantity=0;
						}
						$warehouseOrder->save();
						$warehouseProduct->save();
						$warehouse->save();
					}while($value['product_qty']>0);
				}

				if ($req->input('method')==1) {
					return redirect()->route('thanh_cong_atm');
				}
				elseif($req->input('method')==2) {
					return redirect()->route('thanh_cong_cash');
				}
			}
		}
		
		else{
			$validatedData = $req->validate([
				"email_2"=>"required|Email",
				"name_2"=>"required",
				"phone_2"=>"required|numeric",
				"address_2"=>"required",
				"method"=>"required",
				"notes"=>"required",
				"city"=>"required",
			],
			["email_2.required"=>"email không được để trống",
			"notes.required"=>"ghi chú không được bỏ trống",
			"email_2.Email"=>"email không hợp lệ",
			"name_2.required"=>"tên không được để trống",
			"phone_2.required"=>"số điện thoại không được để trống",
			"phone_2.numeric"=>"số điện thoại phải là số",
			"address_2.required"=>"địa chỉ không được để trống",
			"method.required"=>"hình thức thanh toán không được bỏ trống",
			"city.required"=>"Bạn phải nhập thành phố của mình hiện đang sống"]
		);
			$shipping = new Shipping;
			$shipping->name = $req->input('name_2');
			$shipping->email = $req->input('email_2');
			$shipping->city = $req->input('city');
				// $shipping->customer_id = Session::get('id_customer');
			$shipping->address = $req->input('address_2');
			$shipping->phone = $req->input('phone_2');
			$shipping->notes = $req->input('notes');
			$shipping->method = $req->input('method');
			$shipping->status = 1; /*mặc định là đang xử lý*/
			$shipping->save();
			$shipping_id = $shipping->id;
			Session::put('id_shipping',$shipping_id);
			$cart = Session::get('cart');
			foreach ($cart as $value) {
				$soluong += $value['product_qty'];
			}
			$order = new Order;
				// $order->customer_id = Session::get('id_customer');
			$order->shipping_id = $shipping_id;
			$order->total = Session::get('total');
			$order->status =1 ;/*mặc định là đang xử lý*/
			//$order->order_code = $code_random;
			$order->quantity = $soluong;
			$order->order_date = $mytime->toDateString();
			if ($coupon) {
				$order->coupon = $coupon[0]['coupon_code'];
			}
			$order->save();
			$order_id = $order->id;
			$order->order_code=get_code($order_id,"DH");
			$order->save();

			foreach ($cart as $value) {
				$product = Product::find($value['product_id']);
				$order_detail = new Order_detail;
				$order_detail->order_id = $order_id;
				$order_detail->order_code = $code_random;
				$order_detail->product_id = $value['product_id'];
				$order_detail->unit = $value['product_unit'];
				if ($product->persent_discount) {
					$order_detail->coupon = $product->persent_discount;
				}
				$order_detail->soluong = $value['product_qty'];
				$order_detail->save();
				$product =$order_detail->product;
				$product->quantity = $product->quantity-$value['product_qty'];
				$product->save();
				if($product->quantity<10)
				{
					$options = array(
						'cluster' => 'ap1',
						'encrypted' => true
					);
			
					$pusher = new Pusher(
						env('PUSHER_APP_KEY'),
						env('PUSHER_APP_SECRET'),
						env('PUSHER_APP_ID'),
						$options
					);
					$data['id_product']=$product->id;
					$pusher->trigger('my-channel', 'event-quantity-product', $data);
				}
					// lấy sản phẩm ra từ trong kho
				do{ 
					$warehouseProduct=WarehouseProduct::where('product_id',$order_detail->product_id)->where('quantity','>',0)->where('status',0)->orderBy('created_at','ASC')->first();
					$warehouse = $warehouseProduct->warehouse;
					$warehouseOrder=new WarehouseOrder();
					$warehouseOrder->warehouse_product_id=$warehouseProduct->id;
					$warehouseOrder->order_detail_id=$order_detail->id;
					if($warehouseProduct->quantity>=$value['product_qty']){
						$warehouseOrder->quantity=$value['product_qty'];
						$warehouseProduct->quantity=$warehouseProduct->quantity-$value['product_qty'];
						$warehouse->quantity_now=$warehouse->quantity_now-$value['product_qty'];
						$value['product_qty']=0;
					}else{
						$warehouseOrder->quantity=$warehouseProduct->quantity;
						$warehouse->quantity_now=$warehouse->quantity_now-$warehouseProduct->quantity;
						$value['product_qty']=$value['product_qty']-$warehouseProduct->quantity;
						$warehouseProduct->quantity=0;
					}
					$warehouseOrder->save();
					$warehouseProduct->save();
					$warehouse->save();
				}while($value['product_qty']>0);
			}

			if ($req->input('method')==1) {
				return redirect()->route('thanh_cong_atm');
			}
			elseif($req->input('method')==2) {
				return redirect()->route('thanh_cong_cash');
			}
			
		}
	
		
	}
	public function checkout_success_atm(Request $req)
	{
		DB::beginTransaction();
		try{
		$cart = Session::get('cart');
		// if ($cart) {
		// 	foreach ($cart as $key => $value) {
		// 	$product = Product::find($value['product_id']);
		// 	$product->quantity = $product->quantity-$value['product_qty'];
		// 	$product->save();
		// 	do{
		// 	$warehouseProduct=WarehouseProduct::orderByAsc('created_at')->first();
		// 	$product->quantity = $product->quantity-$value['product_qty'];
		// 	$warehouseOrder=new WarehouseOrder();
		// 	$warehouseOrder->warehouse_product_id=$warehouseProduct->id;
		// 	$warehouseOrder->order
		// 	}while($value['product_qty']>0)
		// }
		// }

		/*send mail*/
		$now = Carbon::now()->format('Y-m-d');
		$title_mail = "Đơn xác nhận ngày".' '.$now;
		$shipping =Shipping::find(Session::get('id_shipping'));
		if ($shipping) {
			$data['email'][] = $shipping->email;
			if ($cart) {
				foreach ($cart as $key=> $cart_email) {
					$cart_array[] = array(
						'product_name'=>$cart_email['product_name'],
						'product_price'=>$cart_email['product_price'],
						'product_qty'=>$cart_email['product_qty'],
						'product_unit'=>$cart_email['product_unit']
					);
				}
			}

			$shipping_array = array(
				'shipping_name'=>$shipping->name,
				'shipping_email'=>$shipping->email,
				'shipping_phone'=>$shipping->phone,
				'shipping_address'=>$shipping->address,
				'shipping_notes'=>$shipping->notes,
				'shipping_method'=>$shipping->method
			);
			$order = Order::where('shipping_id',Session::get('id_shipping'))->first();
			$options = array(
				'cluster' => 'ap1',
				'encrypted' => true
			);
	
			$pusher = new Pusher(
				env('PUSHER_APP_KEY'),
				env('PUSHER_APP_SECRET'),
				env('PUSHER_APP_ID'),
				$options
			);
			if($order->customer!=null)
			{
				$customerName=$order->customer->name;
			}else{
				$customerName=$order->shipping->name;
			}
		
			$data['custommerName']= $customerName;
			$data['order_id']=$order->id;
			$pusher->trigger('my-channel', 'my-event', $data);
			$users = User::join('users_roles', 'users.id', '=', 'users_roles.user_id')->where("users_roles.role_id",1)->get(['users.*']);
			foreach($users as $user)
			{
				$user->notify(new NotificationAdmin($order));
			}
			$repost=Repost::where('date_repost',$order->order_date)->first();
			if($repost==null)
			{
				$repost=new Repost();
				$repost->total_order=1;
				$repost->date_repost=$order->order_date;
			}else
			{
				$repost->total_order++;
			}
			$repost->save();
			if (Session::get('coupon_ss')) {
				$coupon_email = $order->coupon;
			}
			else{
				$coupon_email='không có mã giảm giá';
			}
			$ordercode_email = array(
				'coupon_code' =>$coupon_email,
				'order_code' =>$order->order_code,
				'order_total' =>$order->total
			);
			Mail::send('website.mail.mail_order',['cart_array'=>$cart_array,'shipping_array'=>$shipping_array,'code'=>$ordercode_email],function($message) use ($title_mail,$data){
				$message->to($data['email'])->subject($title_mail);
				$message->from($data['email'],$title_mail);
			});

			
		}
		/*end send mail*/


		$req->session()->forget('cart');
		$req->session()->forget('total');
		$req->session()->forget('fee');
		if (Session::get('coupon_ss')) {
			foreach (Session::get('coupon_ss') as $value) {
				$coupon = Coupon::where('code',$value['coupon_code'])->first();
				$coupon->quanlity = $coupon->quanlity-1;
				$coupon->save();
			}
		}
		$req->session()->forget('coupon_ss');
		if (Session::get('id_shipping')) {
			$customer = Customer::find(Session::get('id_customer'));
			$shipping = Shipping::find(Session::get('id_shipping'));
			$order = Order::where('shipping_id',$shipping->id)->first();
			$order_detail = Order_detail::where('order_id',$order->id)->get();
			$req->session()->forget('id_shipping');
			DB::commit();
			return view('website.checkout.checkout_success_atm',compact('customer','shipping','order','order_detail'));
		}
		DB::commit();
		return redirect()->route('get_home_page');

	}catch(Exception $ex)
	{
		DB::rollback();
		throw new Exception($ex->getMessage());
		
	}
	}
	public function checkout_success_cash(Request $req)
	{
		DB::beginTransaction();
		try{
		$cart = Session::get('cart');
		// if ($cart) {
		// 	foreach ($cart as $key => $value) {
		// 	$product = Product::find($value['product_id']);
		// 	$product->quantity = $product->quantity-$value['product_qty'];
		// 	$product->save();

		// }
		// }

			/*send mail*/
		$now = Carbon::now()->format('Y-m-d');
		$title_mail = "Đơn xác nhận ngày".' '.$now;
		$shipping =Shipping::find(Session::get('id_shipping'));
		
		if ($shipping) {
			$data['email'][] = $shipping->email;
			if ($cart) {
				foreach ($cart as $key=> $cart_email) {
					$cart_array[] = array(
						'product_name'=>$cart_email['product_name'],
						'product_price'=>$cart_email['product_price'],
						'product_qty'=>$cart_email['product_qty'],
						'product_unit'=>$cart_email['product_unit']
					);
				}
			}

			$shipping_array = array(
				'shipping_name'=>$shipping->name,
				'shipping_email'=>$shipping->email,
				'shipping_phone'=>$shipping->phone,
				'shipping_address'=>$shipping->address,
				'shipping_notes'=>$shipping->notes,
				'shipping_method'=>$shipping->method
			);
			$order = Order::where('shipping_id',Session::get('id_shipping'))->first();
			$users = User::join('users_roles', 'users.id', '=', 'users_roles.user_id')->where("users_roles.role_id",1)->get(['users.*']);
			foreach($users as $user)
			{
				$user->notify(new NotificationAdmin($order));
			}
			$repost=Repost::where('date_repost',$order->order_date)->first();
			$options = array(
				'cluster' => 'ap1',
				'encrypted' => true
			);
	
			$pusher = new Pusher(
				env('PUSHER_APP_KEY'),
				env('PUSHER_APP_SECRET'),
				env('PUSHER_APP_ID'),
				$options
			);
			if($order->customer!=null)
			{
				$customerName=$order->customer->name;
			}else{
				$customerName=$order->shipping->name;
			}
		
			$data['custommerName']= $customerName;
			$data['order_id']=$order->id;
			$pusher->trigger('my-channel', 'my-event', $data);
			// báo cáo
			if($repost==null)
			{
				$repost=new Repost();
				$repost->total_order=1;
				$repost->date_repost=$order->order_date;
			}else
			{
				$repost->total_order++;
			}
			$repost->save();
			if (Session::get('coupon_ss')) {
				$coupon_email = $order->coupon;
			}
			else{
				$coupon_email='không có mã giảm giá';
			}
			$ordercode_email = array(
				'coupon_code' =>$coupon_email,
				'order_code' =>$order->order_code,
				'order_total' =>$order->total
			);
			Mail::send('website.mail.mail_order',['cart_array'=>$cart_array,'shipping_array'=>$shipping_array,'code'=>$ordercode_email],function($message) use ($title_mail,$data){
				$message->to($data['email'])->subject($title_mail);
				$message->from($data['email'],$title_mail);
			});
			
		}
		/*end send mail*/

		$req->session()->forget('cart');
		$req->session()->forget('total');
		$req->session()->forget('fee');
		if (Session::get('coupon_ss')) {
			foreach (Session::get('coupon_ss') as $value) {
				$coupon = Coupon::where('code',$value['coupon_code'])->first();
				$coupon->quanlity = $coupon->quanlity-1;
				$coupon->save();
			}
		}
		$req->session()->forget('coupon_ss');
		if (Session::get('id_shipping')) {
			$customer = Customer::find(Session::get('id_customer'));
			$shipping = Shipping::find(Session::get('id_shipping'));
			$order = Order::where('shipping_id',$shipping->id)->first();
			$order_detail = Order_detail::where('order_id',$order->id)->get();
			$req->session()->forget('id_shipping');
			DB::commit();
			return view('website.checkout.checkout_success_cash',compact('customer','shipping','order','order_detail'));
		}
		DB::commit();
		return redirect()->route('get_home_page');
	}catch(Exception $ex)
	{
		DB::rollback();
		throw new Exception($ex->getMessage());
		
	}
	}
	public function recover_password(Request $req){
		$now = Carbon::now()->format('Y-m-d');
		$title_mail = "Lấy lại mật khẩu".''.$now;
		$customer = Customer::where('email',$req->input('email'))->first();
		if ($customer) {
			$token_random = Str::random(20);
			$customer = Customer::find($customer->id);
			$customer->customer_token = $token_random;
			$customer->save();

			$to_email = $req->input('email');
			$link_reset_pass = asset('/update-new-pass?token='.$token_random);
			$data = array("name"=>$title_mail,'body'=>$link_reset_pass,'email'=>$to_email);
			Mail::send('website.checkout.forget_pass_notify',['data'=>$data],function($message) use ($title_mail,$data){
				$message->to($data['email'])->subject($title_mail);
				$message->from($data['email'],$title_mail);
			});
			return redirect()->back()->with('thongbao_quenmatkhau','Gửi mail thành công, vui lòng check mail để thay đổi password!!!');
		}
		else{
			return redirect()->back()->with('thongbao_quenmatkhau','Email chưa được đăng ký để khôi phục mật khẩu');
		}


	}
	public function update_new_pass(Request $req)
	{
		if ($req->token) {
			return view('website.checkout.new_pass');
		}
		else {
			return redirect()->route('get_home_page')->with('thongbao_quenmatkhau','Vui lòng nhập lại email vì link quá hạn');
		}
		
	}
	public function update_pass(Request $req){
		$token_random = Str::random(20);
		$customer = Customer::where('email',$req->email)->where('customer_token',$req->token_2)->first();
		if ($customer) {
			$reset = Customer::find($customer->id);
			$reset->password = bcrypt($req->password);
			$reset->customer_token = $token_random;
			$reset->save();
			return redirect()->route('get_home_page')->with('thongbao_login_thatbai','Mật khẩu đã cập nhật thành công!!!');
		}
		else{
			return redirect()->route('get_home_page')->with('thongbao_quenmatkhau','Vui lòng nhập lại email vì link quá hạn');
		}

	}
	public function login_customer_google()
	{
		config(['services.google.redirect'=>env('GOOGLE_CLIENT_URL')]);
		return Socialite::driver('google')->redirect();
	}
	public function callback_customer_google(){	
		config(['services.google.redirect'=>env('GOOGLE_CLIENT_URL')]); 
		$users = Socialite::driver('google')->stateless()->user();
		$customer =  Customer::where('email',$users->email)->first();
		$authUser = $this->findOrCreateCustomer($users,'google');
		if ($authUser) {
			$account_name = Customer::where('id',$authUser->user)->first();
			Session::put('name_customer',$account_name->name);
			Session::put('id_customer',$account_name->id);
		}elseif($customer_new)
		{
			$account_name = Customer::where('id',$authUser->user)->first();
			Session::put('name_customer',$account_name->name);
			Session::put('id_customer',$account_name->id);
		}
		if (Session::get('cart')) {
			return redirect()->route('get_cart')->with('thongbao_login_thatbai', 'Đăng nhập thành công');
		}
		return redirect()->route('get_home_page')->with('thongbao_login_thatbai', 'Đăng nhập thành công');
	}
	public function login_facebook(){
		return Socialite::driver('facebook')->redirect();
	}

	public function callback_facebook(){
		$provider = Socialite::driver('facebook')->stateless()->user();
		$account = Soical::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
		if($account){ 
			$account_name = Customer::where('id',$account->user)->first();
			Session::put('name_customer',$account_name->name);
			Session::put('id_customer',$account_name->id);
			return redirect()->route('get_home_page')->with('thongbao_login_thatbai', 'Đăng nhập Admin thành công');
		}else{
			$customer_new = new Soical([
				'provider_user_id'=>$provider->getId(),
				'provider_user_email'=>$provider->getEmail(),
				'provider'=>'facebook',
			]);

			$customer = Customer::where('email',$provider->getEmail())->first();
			if (!$customer) {
				$customer = Customer::create([
					'name' => $provider->getName(),
					'email' => $provider->getEmail(),
					'password' => '',
					'address' => '',
					'phone'=>'',
				]);
			}
			$customer_new->customer()->associate($customer);
			$customer_new->save();

			$account_new = Customer::where('id',$customer_new->user)->first();
			Session::put('name_customer',$account_new->name);
			Session::put('id_customer',$account_new->id);
			return redirect()->route('get_home_page')->with('thongbao_login_thatbai', 'Đăng nhập Admin thành công');
		} 
	}
	public function findOrCreateCustomer($users,$provider)
	{
		$authUser = Soical::where('provider_user_id', $users->id)->where('provider_user_email',$users->email)->first();
		if($authUser){
			return $authUser;
		}else{
			$customer_new = new Soical([
				'provider_user_id'=>$users->id,
				'provider_user_email'=>$users->email,
				'provider'=>strtoupper($provider),
			]);
		}
		$customer = Customer::where('email',$users->email)->first();

		if(!$customer){
			$customer = Customer::create([
				'name' => $users->name,
				'email' => $users->email,
				'password' => '',
				'phone' => '',
				'address' => ''
			]);
		}
		$customer_new->customer()->associate($customer); /*lấy 2 id mới thêm vào*/
		$customer_new->save();
		return $customer_new;	
	}

}
