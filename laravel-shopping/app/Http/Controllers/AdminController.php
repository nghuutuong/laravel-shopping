<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use Session;
use Socialite;
use App\Models\Login;
use App\Models\Visitor;
use App\Models\Product;
use App\Models\Post;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Social;
use App\Models\Statistical;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('doashboard');
        }else{
            return Redirect::to('login-auth')->send();
        }
    }
    public function index(){
        
        return view('admin_login');
    }
    public function show_dashboard(Request $request) {
        $this->AuthLogin();
        $user_ip_address = $request->ip();
        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $early_this_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $one_year = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $visitor_of_lastmonth = Visitor::whereBetween('date_visitor',[$early_last_month,$end_of_last_month])->get();
        $visitor_last_month_count = $visitor_of_lastmonth->count();

        $visitor_of_thismonth = Visitor::whereBetween('date_visitor',[$early_this_month,$now])->get();
        $visitor_this_month_count = $visitor_of_thismonth->count();

        $visitor_of_year = Visitor::whereBetween('date_visitor',[$one_year,$now])->get();
        $visitor_year_count = $visitor_of_year->count();
        //tong visit
        $visitors = Visitor::all();
        $visitors_total = $visitors->count();
        //Dang onl
        $visitor_current = Visitor::where('ip_address',$user_ip_address)->get();
        $visitor_count = $visitor_current->count();

        if($visitor_count<1){
            $visitor = new Visitor();
            $visitor->ip_address = $user_ip_address;
            $visitor->date_visitor = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $visitor->save();
        }

        $product = Product::all()->count();       
        $post = Post::all()->count();
        $order = Order::all()->count();
        $customer = Customer::all()->count();
        // $post_views = Post::orderBy('post_view','desc')->take(20)->get();
        // $product_views = Product::orderBy('product_views','desc')->take(20)->get();
        return view('admin.dashboard')->with(compact('visitors_total','visitor_count','visitor_last_month_count',
    'visitor_this_month_count','visitor_year_count','product','post','order','customer'));
    }
    public function dashboard(Request $request) {
        $data = $request->all();
        $admin_email = $data['admin_email'];
        $admin_password = $data['admin_password'];
        $login = Login::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($login){
            $login_count = $login->count();
            if($login_count){
                Session::put('admin_name',$login->admin_name);
                Session::put('admin_id',$login->admin_id);
                return Redirect::to('/dashboard');
                }
            }else{
                Session::put('message','Mật khẩu hoặc tài khoản bị sai');
                return Redirect::to('/admin');
            }
    //     $admin_email = $request->admin_email;
    //     $admin_password = $request->admin_password;
    //     $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
    //     if(isset($result)){
    //         Session::put('admin_name',$result->admin_name);
    //         Session::put('admin_id',$result->admin_id);
    //         return Redirect::to('/dashboard');
    //     }else{
    //         Session::put('message','Mật khẩu hoặc tài khoản sai - Vui lòng nhập lại');
    //         return Redirect::to('/admin-login');
    //     }
    // }
    }
    public function logout() {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin-login');
    }

    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri  
            $account_name = Login::where('admin_id',$account->user)->first();
            Session::put('admin_login',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $hieu = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('admin_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => ''
                ]); 
            }
            $hieu->login()->associate($orang);
            $hieu->save();

            $account_name = Login::where('admin_id',$account->user)->first();

            Session::put('admin_login',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        } 
    }


    public function filter_by_date(Request $request){
        $data = $request->all();
        $from_date = $data['from_date']; 
        $to_date = $data['to_date']; 
        $get = Statistical::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','asc')->get();
            foreach($get as $key => $get){
                $chart_data[] = array(
                    'period' => $get->order_date,
                    'order' => $get->total_order,
                    'sales' => $get->sales,
                    'profit' => $get->profit,
                    'quantity' => $get->quantity
                );
            }
        echo $data = json_encode($chart_data);
        // dd($chart_data);
    }


    public function dashboard_filter(Request $request){
        $data = $request->all();

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        if($data['dashboard_value']=='7ngay'){
            $get = Statistical::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','asc')->get();
        }elseif($data['dashboard_value']=='thangtruoc'){
            $get = Statistical::whereBetween('order_date',[$dauthangtruoc,$cuoithangtruoc])->orderBy('order_date','asc')->get();
        }elseif($data['dashboard_value']=='7ngay'){
            $get = Statistical::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','asc')->get();
        }else{
            $get = Statistical::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','asc')->get();
        }
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }



    public function days_order(Request $request){
        $sub60days = Carbon::now('Asia/Ho_Chi_minh')->subdays(60)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistical::whereBetween('order_date',[$sub60days,$now])->orderBy('order_date','asc')->get();
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
        echo $data = json_encode($chart_data);
        // dd($chart_data);
    }
}
