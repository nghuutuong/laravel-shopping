<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Slider;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    // public function add_to_cart(Request $request) {
    //     $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
    //     $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    //     $productid = $request->productid_hidden;
    //     $quantity = $request->qty;
    //     $product_info = DB::table('tbl_product')->where('product_id',$productid)->first();
    //     $data['id'] = $product_info->product_id;
    //     $data['qty'] = $quantity;
    //     $data['name'] = $product_info->product_name;
    //     $data['price'] = $product_info->product_price;
    //     $data['weight'] ='123';
    //     $data['options']['images'] = $product_info->product_image;
    //     Cart::add($data);
    //     return Redirect::to('/show-cart');
    //     // Cart::destroy();
        
    // }
    // public function show_cart() {
    //     $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
    //     $slider = DB::table('tbl_slider')->where('slider_status','1')->get();
        
    //     $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
    //     $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    //     return view('pages.cart.cart')->with('category',$cate_product)->with('brand',$brand_product)
    //     ->with('category_post',$category_post)->with('slider',$slider);
    // }
    // public function delete_cart($rowId) {
    //     Cart::update($rowId,0);
    //     return Redirect::to('/show-cart');
    // }

    // public function update_cart_quantity(Request $request) {
    //     $rowId = $request->cart_id;
    //     $qty = $request->cart_quantity;
    //     Cart::update($rowId,$qty);
    //     return Redirect::to('/show-cart');
    // }

    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_image' => $data['cart_product_image'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
                }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_image' => $data['cart_product_image'],
                'product_quantity' => $data['cart_product_quantity'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        Session::save(); 
    }  

    public function gio_hang(Request $request) {
        $slider = DB::table('tbl_slider')->where('slider_status','1')->get();
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('brand',$brand_product)->with('category_post',$category_post)
        ->with('slider',$slider);
        // $cart = Session::get('cart');
        // foreach($cart as $key => $val){
        //     $val['product_id'];
        // }
        // dd($val);
        // $product_id = $request->all();
        // $data = Session::get('cart');
        // $cart= Session::get('cart');
       
    }

    public function delete_cart_product($session_id){
        $cart = Session::get('cart');
        if($cart == true){
            foreach($cart as $key => $val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
            }
        }
        Session::put('cart',$cart);
        return Redirect()->back()->with('message','Xóa sản phẩm thành công');
    }else{
        return Redirect()->back()->with('error','Xóa sản phẩm thất bại');
        }
    }

    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart == true){
            $message = '';
            foreach($data['cart_quantity'] as $key => $qty){
                $i = 0;
                foreach($cart as $session => $val){
                    $i++;
                    if($val['session_id']==$key && $qty < $cart[$session]['product_quantity']){
                        $cart[$session]['product_qty'] = $qty;
                        $message .= '<p style="color:green">'.$i.'/ Cập nhật số lượng'.$cart[$session]['product_quantity'].'thành công</p>';
                    }elseif($val['session_id']==$key && $qty > $cart[$session]['product_quantity']){
                        $message .= '<p style="color:red">'.$i.'/ Cập nhật số lượng'.$cart[$session]['product_quantity'].'thất bại</p>';
                    }
                }
            }
            Session::put('cart',$cart);
            return Redirect()->back()->with('message','Cập nhật giỏ hàng thành công');
        }else{
            return Redirect()->back()->with('error','Cập nhật giỏ hàng thất bại');
        }
    }

    public function delete_all_cart_product() {
        $cart = Session::get('cart');
        if($cart== true){
            Session::forget('cart');
            return Redirect()->back()->with('message','Xóa tất cả thành công');
        }
    }

    public function check_coupon(Request $request){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');

        $data = $request->all();
        if(Session::get('customer_id')){
            $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)
            ->where('coupon_end','>=',$today)->where('coupon_used','LIKE','%'.Session::get('customer_id').'%')->first();
            if($coupon){
                return Redirect()->back()->with('error','Mã giảm giá đã sử dụng');
            }else{
                $coupon_login = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_end','>=',$today)->first();
                if($coupon_login){
                  $count_coupon = $coupon_login->count();
                    if($count_coupon > 0){
                      $coupon_session = Session::get('coupon');
                        if($coupon_session == true){
                        $is_avaiable = 0;
                        if($is_avaiable == 0){
                        $cou[] = array(
                            'coupon_code' => $coupon_login->coupon_code,
                            'coupon_option' => $coupon_login->coupon_option,
                            'coupon_value' => $coupon_login->coupon_value,
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                        'coupon_code' => $coupon_login->coupon_code,
                        'coupon_option' => $coupon_login->coupon_option,
                        'coupon_value' => $coupon_login->coupon_value,
                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return Redirect()->back()->with('message','Kích hoạt mã giảm giá thành công');
            }
        }else{
            return Redirect()->back()->with('error','Mã giảm giá không tồn tại hoặc đã hết hạn');
            }
        }
        }else{
            $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)
            ->where('coupon_end','>=',$today)->first();
            if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon > 0){
                $coupon_session = Session::get('coupon');
                if($coupon_session == true){
                    $is_avaiable = 0;
                    if($is_avaiable == 0){
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_option' => $coupon->coupon_option,
                            'coupon_value' => $coupon->coupon_value
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_option' => $coupon->coupon_option,
                        'coupon_value' => $coupon->coupon_value
                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return Redirect()->back()->with('message','Kích hoạt mã giảm giá thành công');
            }
        }else{
            return Redirect()->back()->with('error','Mã giảm giá không tồn tại hoặc đã hết hạn');
            }
        }

        $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_end','>=',$today)->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon > 0){
                $coupon_session = Session::get('coupon');
                if($coupon_session == true){
                    $is_avaiable = 0;
                    if($is_avaiable == 0){
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_option' => $coupon->coupon_option,
                            'coupon_value' => $coupon->coupon_value
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_option' => $coupon->coupon_option,
                        'coupon_value' => $coupon->coupon_value
                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return Redirect()->back()->with('message','Kích hoạt mã giảm giá thành công');
            }
        }else{
            return Redirect()->back()->with('error','Mã giảm giá không tồn tại hoặc đã hết hạn');
        }
    }
    public function cart_count(){
        if(Session::get('cart')){
            $slider = DB::table('tbl_slider')->where('slider_status','1')->get();
            $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
            $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
            $count = count(Session::get('cart'));

            return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('brand',$brand_product)->with('category_post',$category_post)
            ->with('slider',$slider)->with('count',$count);
        }else{
            $slider = DB::table('tbl_slider')->where('slider_status','1')->get();
            $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
            $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
            $count = 0;
            return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('brand',$brand_product)->with('category_post',$category_post)
            ->with('slider',$slider)->with('count',$count);
        }
    }
}
