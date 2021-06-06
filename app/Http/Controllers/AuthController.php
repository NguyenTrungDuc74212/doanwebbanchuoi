<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Roles;
use Mail;
use DB;
use Session;
use App\Models\Repost;
use App\Models\Visitors;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Post;
use Carbon\Carbon;
use App\Http\Requests\changeRequest;
use App\Http\Requests\UserRegisterRequest;
use Gate;

class AuthController extends Controller
{
	public function dashboard(Request $req)
	{
		$user_ip_add = $req->ip(); /*lấy ra ip hiện tại*/
		$today = Carbon::now()->toDateString();
		$startofMonth_ago = Carbon::now()->subMonth()->startOfMonth()->toDateString();
		$endofMonth_ago = Carbon::now()->subMonth()->endOfMonth()->toDateString();
		$thismonth = Carbon::now()->startOfMonth()->toDateString();
		$sub365days = Carbon::now()->subdays(365)->toDateString();

		$visitor_lastmonth = Visitors::whereBetween('date',[$startofMonth_ago,$endofMonth_ago])->get();
		$visitor_lastmonth_count =$visitor_lastmonth->count();

		$visitor_thismonth = Visitors::whereBetween('date',[$thismonth,$today])->get();
		$visitor_thismonth_count =$visitor_thismonth->count();
		
		$visitor_oneyear = Visitors::whereBetween('date',[$sub365days,$today])->get();
		$visitor_oneyear_count =$visitor_oneyear->count();

    //online
		$visitor_online =Visitors::where('ip_add',$user_ip_add)->get();
		$visitor_count_online = $visitor_online->count();

		if ($visitor_count_online<1) {
			$visitor = new Visitors();
			$visitor->ip_add = $user_ip_add;
			$visitor->date = Carbon::now()->toDateString();
			$visitor->save();
		}
    //total visitor
		$visitors = Visitors::all();
		$visitors_total = $visitors->count();

	//sản phẩm bán chạy
		$product_top = Product::orderBy('product_sold','DESC')->limit(5)->get();

	//bài viết xem nhiều nhất
		$post_top = Post::orderBy('view','DESC')->limit(5)->get();
    
    //sản phẩm sắp hết hàng
		$product_stored = Product::where('quantity','<',100)->get();

	//mã giảm giá đã hết hạn
		$coupon_expired = Coupon::where('coupon_date_end','<',$today)->get();

		return view('admin.dashboard.dashboard_view',compact('visitors_total','visitor_lastmonth_count','visitor_thismonth_count','visitor_oneyear_count','visitor_count_online','product_top','post_top','product_stored','coupon_expired'));
	}
	public function filter_date(Request $req)
	{
		$result = $req->all();
		$from_date = $result['fromDate'];
		$to_date = $result['toDate'];
		$data = Repost::whereBetween('date_repost',[$from_date,$to_date])->orderBy('date_repost','ASC')->get();
		$chart_data =[];
		foreach ($data as $value) {
			$chart_data[] = array(
				'period' =>$value->date_repost,
				'order' =>$value->total_order,
				'profit' =>$value->total_revenue,
				'quantity' =>$value->total_quantity,
			);
		}
		echo $result = json_encode($chart_data);
	}
	public function order_filter(Request $req)
	{
		$today = Carbon::now()->toDateString();
		$tomorow = Carbon::now()->addDay()->toDateString();
		$startofMonth = Carbon::now()->startOfMonth()->toDateString();
		$startofMonth_ago = Carbon::now()->subMonth()->startOfMonth()->toDateString();
		$endofMonth_ago = Carbon::now()->subMonth()->endOfMonth()->toDateString();

		$sub7days = Carbon::now()->subdays(7)->toDateString();
		$sub365days = Carbon::now()->subdays(365)->toDateString();
		$sub30days = Carbon::now()->subdays(30)->toDateString();

		if ($req->filterValue == "1tuan") {
			$data = Repost::whereBetween('date_repost',[$sub7days,$today])->orderBy('date_repost','DESC')->get();
		}
		elseif($req->filterValue=="thangtruoc"){
			$data = Repost::whereBetween('date_repost',[$startofMonth_ago,$endofMonth_ago])->orderBy('date_repost','DESC')->get();
		}elseif($req->filterValue=="thangnay"){
			$data = Repost::whereBetween('date_repost',[$startofMonth,$today])->orderBy('date_repost','DESC')->get();
		}elseif($req->filterValue==""){
			$data = Repost::whereBetween('date_repost',[$sub30days,$tomorow])->orderBy('date_repost','DESC')->get();
		}
		else{
			$data = Repost::whereBetween('date_repost',[$sub365days,$today])->orderBy('date_repost','DESC')->get();
		}
		$chart_data =[];
		foreach ($data as $value) {
			$chart_data[] = array(
				'period' =>$value->date_repost,
				'order' =>$value->total_order,
				'profit' =>$value->total_revenue,
				'quantity' =>$value->total_quantity,
			);
		}
		echo $result = json_encode($chart_data);
	}
	public function order_30_day()
	{
		$tomorow = Carbon::now()->addDay()->toDateString();
		$today = Carbon::now()->toDateString();
		$sub30days = Carbon::now()->subdays(30)->toDateString();
		$data = Repost::whereBetween('date_repost',[$sub30days,$tomorow])->orderBy('date_repost','DESC')->get();
		$chart_data =[];
		foreach ($data as $value) {
			$chart_data[] = array(
				'period' =>$value->date_repost,
				'order' =>$value->total_order,
				'profit' =>$value->total_revenue,
				'quantity' =>$value->total_quantity,
			);
		}
		echo $result = json_encode($chart_data);
	}
	public function login()
	{
		return view('admin.auth.login_view');
	}
	public function check_login(Request $req)
	{
		$username = $req->input('email');
		$password = $req->input('password');

		if (Auth::attempt([
			'email'=>$username,
			'password'=>$password,

		])) {
            // echo Auth::loginUsingId(Auth::id())->name;
			return redirect()->route('trangchu_admin')->with('thongbao','đăng nhập thành công');
		}
		else {
			return redirect()->back()->with('error','Đăng nhập thất bại');
		}
	}
	public function admin_logout()
	{
		Auth::logout();
		return redirect()->route('login');
	}
	public function view_forgot()
	{
		return view('admin.auth.forgot');
	}
	public function send_mail(Request $req)
	{
		$req->session()->forget('token');
		$user_reset = User::where('email',$req->email)->first();
		if ($user_reset) {
			$reset_password_token = md5(rand(0,30));
			$user = User::find($user_reset->id);
			$user->reset_password_token = $reset_password_token;
			$user->save();
			$data = [
				'subject' => "Reset password",
				'name' => "E-shopper",
				'email' => $req->email,
				'content' => "Vui lòng mời bạn truy cập link: http://myweb.local.com/banchuoi/reset-password/".$user->reset_password_token." "."để thay đổi password"
			];

			Mail::send('admin.auth.email-template', $data, function($message) use ($data) {
				$message->to($data['email'])
				->subject($data['subject'])
				->from('ductrungthug@gmail.com',$data['name']);  /*mail người gửi(mail của mình), tên người gửi(Tên của mình)*/
			});
			return redirect()->back()->with('thongbao','vui lòng check mail để thay đổi mật khẩu');
		}
		return redirect()->back()->with('error','Email không chính xác');
	}
	public function reset_password($reset_password_token)
	{
		$user_reset = User::where('reset_password_token',$reset_password_token)->first();
		if ($user_reset) {
			Session::put('token',$reset_password_token);
			return view('admin.auth.change_password');
		}
		return redirect()->route('login')->with('error','Thích hack à!!!');
	}
	public function change_password(changeRequest $req)
	{
		$user_reset = User::where('email',$req->email)->where('reset_password_token',Session::get('token'))->first();
		if ($user_reset) {
			$user_reset->password = bcrypt($req->password);
			$user_reset->save();
			return redirect()->route('login')->with('sucsses','Reset mật khẩu thành công');
		}
		return redirect()->back()->with('error','Email không tồn tại!!!');
	}
	public function list_user()
	{
		$admin = User::with('roles')->orderby('id','DESC')->paginate(5);
		return view('admin.auth.list_user',compact('admin'));
	}
	public function assign_role(Request $req)
	{

		$user = User::where('email',$req->email)->first();
		$user->roles()->detach();
		$author = Roles::where('name','author')->first();
		$admin = Roles::where('name','admin')->first();
		$user_1 = Roles::where('name','user')->first();


		if ($req->author_role) {
			$user->roles()->attach($author->id);
		}
		if ($req->admin_role) {
			$user->roles()->attach($admin->id);
		}
		if ($req->user_role) {
			$user->roles()->attach($user_1->id);
		}
		/*bắt lỗi không có admin*/
		$all = User::has('roles')->get();
		$pos='';
		foreach ($all as $value) {
			$admin_role = $value->roles()->where('name','admin')->first();
			$pos .= strpos($admin_role['name'], "admin");
		}
		if ($req->admin_role==null&&$pos=='') {
			$user->roles()->attach($admin->id);
			return redirect()->back()->with('error','Phải có 1 admin để quản lý và điều hành, bạn không thể vào trang này mà không có người nào có quyền admin');
		}
		/*end bắt lỗi*/
		
		return redirect()->back()->with('thongbao','phân quyền thành công');

	}
	public function register()
	{
		return view('admin.auth.register');
	}
	public function save_user(UserRegisterRequest $req)
	{
		$user = new User;
		$user->name = $req->input('name');
		$user->phone = $req->input('phone');
		$user->email = $req->input('email');
		$user->gender = $req->input('gender');
		$user->password =bcrypt($req->input('password'));
		$user->save();
		return redirect()->route('list_user')->with('thongbao','Đăng ký thành công');
	}
	public function list_customer(Request $req)
	{
        
        $customer = DB::table('tbl_customer')->leftJoin('tbl_order','tbl_customer.id','=','tbl_order.customer_id')->selectRaw('tbl_customer.*,count(tbl_order.id) AS SoDonHang')->groupByRaw('id,name,email,phone,address,password,created_at,updated_at,customer_token')->get();
        
		return view('admin.auth.list_customer',compact('customer')); 
	}

}
