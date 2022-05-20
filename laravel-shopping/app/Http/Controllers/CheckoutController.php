<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Mail;
use Carbon\Carbon;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\Slider;
use App\Models\CategoryPost;
use App\Models\Customer;
use App\Models\OrderDetails;
session_start();

class CheckoutController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('doashboard');
        }else{
            return Redirect::to('admin-login')->send();
        }
    }
    public function login_checkout() {
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $slider = Slider::orderBy('slider_id','desc')->where('slider_status','1')->take(4)->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(12)->get();
        return view('pages.index')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('category_post',$category_post)->with('slider',$slider)->with('all_product',$all_product);
    }
    public function add_customer(Request $request) {
        $data = array();
        $data['customer_email'] = $request->customer_email;
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_password'] = $request->customer_password;

        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect('/checkout');
    }
    public function checkout() {
        $customer_id = Session::get('customer_id');
        $customer = Customer::where('customer_id',$customer_id)->get();
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();

        $city = City::orderBy('matp','desc')->get();
        return view('pages.checkout.checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('city',$city)
        ->with('category_post',$category_post)->with('customer',$customer);
        // dd($customer);
    }
    public function save_checkout_customer(Request $request) {
        $data = array();
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;
        $data['shipping_address'] = $request->shipping_address;
       
        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');
    }
    public function payment() {
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $slider = Slider::orderBy('slider_id','desc')->where('slider_status','1')->take(4)->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(12)->get();
        
        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('category_post',$category_post)->with('slider',$slider)->with('all_product',$all_product);
    }
    public function logout_checkout() {
        Session::forget('customer_id');
        Session::forget('coupon');
        return redirect('/');
    }
    public function login_customer(Request $request) {
        $email = $request->email_account;
        $password = $request->password_account;
        $result = DB::table('tbl_customers')
        ->where('customer_email',$email)->where('customer_password',$password)->first();
        if(Session::get('coupon')==true){
            Session::forget('coupon');
        }
        if($result){
            Session::put('customer_id',$result->customer_id);
            return redirect()->back();
        }else{
            return redirect()->back();
        }            
        Session:save();
    }
    public function order_place(Request $request) {
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);


        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        $content = Cart::content();
        foreach($content as $v_content) {
            $order_detail_data['order_id'] = $order_id;
            $order_detail_data['product_id'] = $v_content->id;
            $order_detail_data['product_name'] = $v_content->name;
            $order_detail_data['product_price'] = $v_content->price;
            $order_detail_data['product_sales_quantity'] = $v_content->qty;
            $payment_id = DB::table('tbl_order_details')->insert($order_detail_data);
        }
        if($data['payment_method'] == 1){
            echo 'Thanh toán thẻ ATM';
        }elseif($data['payment_method'] == 2) {
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
            return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product);
        }elseif($data['payment_method'] == 3) {
            echo 'Ghi nợ';
        }

        // Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');
    }
    public function manage_order() {
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order = view('admin.manage_order')->with('all_order', $all_order);
        return view('admin_layout')->with('admin.manage_order', $manager_order);
    }
    public function view_order($orderId) {
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_shipping.*','tbl_customers.*','tbl_order_details.*')
        ->first();
        $manager_order_by_id = view('admin.view_order')->with('order_by_id', $order_by_id);
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);

    }
    public function delete_fee(){
        Session::forget();
        return Redirect()->back();
    }

    public function confirm_order(Request $request){
        $data = $request->all();
        if(Session::get('coupon')){
                $coupon = Coupon::where('coupon_code',$data['order_coupon'])->first();  
                $coupon->coupon_used = $coupon->coupon_used.','.Session::get('customer_id');
                $coupon->coupon_times = $coupon->coupon_times - 1;
                $coupon->save();
            }else{
                $coupon_email = 'Không dùng mã giảm giá';
        }
        $shipping_name = array(
            'Nguyen Van A',
            'Tran Hoang B',
            'Do Hien C',
            'Le Nha D',
            'Ngo Gia E',
            'Luong Viet F'
        );
        $shipping = new Shipping();
        $shipping->shipping_name = $shipping_name[rand(0,count($shipping_name)-1)];
        $shipping->shipping_note = $data['shipping_note'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()),rand(0,26),5);
        
        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        
        $order->created_at = $today;
        $order->order_date = $order_date;
        $order->save();

        if(Session::get('cart')){
            foreach(Session::get('cart') as $key => $cart){
                $order_details = new OrderDetails();
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                $order_details->product_coupon = $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->save();
            }
        }   
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Đơn hàng xác nhận ngày".' '.$now;
        $customer = Customer::find(Session::get('customer_id'));
        $data['email'][] = $customer->customer_email;
        if(Session::get('cart')==true){
            foreach(Session::get('cart') as $key => $cart_mail){
                $cart_array[] = array(
                    'product_name' => $cart_mail['product_name'],
                    'product_price' => $cart_mail['product_price'],
                    'product_qty' => $cart_mail['product_qty']
                );
            }
        }
        $shipping_array = array(
            'customer_name' => $customer->customer_name,
            'customer_address' => $customer->customer_address,
            'customer_phone' => $customer->customer_phone,
            'customer_email' => $customer->customer_email,
            'shipping_method' => $data['shipping_method'],
            'shipping_note' => $data['shipping_note'],
        );
        $ordercode_mail = array(
            'coupon_code' => 'không có mã',
            'order_code' => $checkout_code
        );
        Mail::send('pages.mail.mail_order',['cart_array'=>$cart_array,'shipping_array'=>$shipping_array,'code'=>$ordercode_mail], function($message) use ($title_mail,$data){
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'],$title_mail);
        });
        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('cart');
    }
    // public function confirm_order_bank(Request $request){
    //     $data = $request->all();
    //     if(Session::get('coupon')!=NULL){
    //             $coupon = Coupon::where('coupon_code',$data['order_coupon'])->first();  
    //             $coupon->coupon_used = $coupon->coupon_used.','.Session::get('customer_id');
    //             $coupon->coupon_times = $coupon->coupon_times - 1;
    //             $coupon->save();
    //         }else{
    //             $coupon_mail = 'Không có dùng mã giảm giá';
    //     }
    //     $shipping_name = array(
    //         'Nguyen Van A',
    //         'Tran Hoang B',
    //         'Do Hien C',
    //         'Le Nha D',
    //         'Ngo Gia E',
    //         'Luong Viet F'
    //     );
    //     $shipping = new Shipping();
    //     $shipping->shipping_name = $shipping_name[rand(0,count($shipping_name)-1)];
    //     $shipping->shipping_note = $data['shipping_note'];
    //     $shipping->shipping_method = $data['shipping_method'];
    //     $shipping->save();
    //     $shipping_id = $shipping->shipping_id;

    //     $checkout_code = substr(md5(microtime()),rand(0,26),5);
        
    //     $order = new Order();
    //     $order->customer_id = Session::get('customer_id');
    //     $order->shipping_id = $shipping_id;
    //     $order->order_status = 2;
    //     $order->order_code = $checkout_code;
    //     date_default_timezone_set('Asia/Ho_Chi_Minh');
    //     $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
    //     $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        
    //     $order->created_at = $today;
    //     $order->order_date = $order_date;
    //     $order->save();

    //     $order_details = new OrderDetails();
    //     if(Session::get('cart')){
    //         foreach(Session::get('cart') as $key => $cart){
    //             $order_details->order_code = $checkout_code;
    //             $order_details->product_id = $cart['product_id'];
    //             $order_details->product_name = $cart['product_name'];
    //             $order_details->product_price = $cart['product_price'];
    //             $order_details->product_sales_quantity = $cart['product_qty'];
    //             $order_details->product_coupon = $data['order_coupon'];
    //             $order_details->product_feeship = $data['order_fee'];
    //             $order_details->save();
    //         }
    //     }   
    //     $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
    //     $title_mail = "Đơn hàng xác nhận ngày".' '.$now;
    //     $customer = Customer::find(Session::get('customer_id'));
    //     $data['email'][] = $customer->customer_email;
    //     if(Session::get('cart')==true){
    //         foreach(Session::get('cart') as $key => $cart_mail){
    //             $cart_array[] = array(
    //                 'product_name' => $cart_mail['product_name'],
    //                 'product_price' => $cart_mail['product_price'],
    //                 'product_qty' => $cart_mail['product_qty']
    //             );
    //         }
    //     }
    //     $shipping_array = array(
    //         'customer_name' => $customer->customer_name,
    //         'customer_address' => $customer->customer_address,
    //         'customer_phone' => $customer->customer_phone,
    //         'customer_email' => $customer->customer_email,
    //         'shipping_method' => $data['shipping_method'],
    //         'shipping_note' => $data['shipping_note'],
    //     );
    //     $ordercode_mail = array(
    //         'coupon_code' => $coupon_mail,
    //         'order_code' => $checkout_code
    //     );
    //     Mail::send('pages.mail.mail_order',['cart_array'=>$cart_array,'shipping_array'=>$shipping_array,'code'=>$ordercode_mail], function($message) use ($title_mail,$data){
    //         $message->to($data['email'])->subject($title_mail);
    //         $message->from($data['email'],$title_mail);
    //     });
    //     Session::forget('coupon');
    //     Session::forget('fee');
    //     Session::forget('cart');
    // }
    public function tksfbuying(){
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('pages.checkout.tksfbuying')->with('category_post',$category_post)->with('category',$cate_product)->with('brand',$brand_product);
    }
    
}
