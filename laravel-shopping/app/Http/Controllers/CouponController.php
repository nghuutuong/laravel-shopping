<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
session_start();

class CouponController extends Controller
{
    public function add_coupon(){
        return view('admin.coupon.add_coupon');
    }
    public function add_coupon_code(Request $request){
        $data = $request->all();
        $coupon = new Coupon;
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_times = $data['coupon_times'];
        $coupon->coupon_start = $data['coupon_start'];
        $coupon->coupon_end = $data['coupon_end'];
        $coupon->coupon_option = $data['coupon_option'];
        $coupon->coupon_value = $data['coupon_value'];
        $coupon->coupon_status = $data['coupon_status'];
        $coupon->save();
        Session::put('message','Thêm mã giảm giá thành công');
        return Redirect::to('/add-coupon');
    }
    public function list_coupon(){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
        $coupon = Coupon::orderBy('coupon_id','desc')->paginate(10);
        return view('admin.coupon.list_coupon')->with(compact('coupon','today'));
    }

    public function delete_coupon($coupon_id){
        $coupon = Coupon::find('coupon_id');
        $coupon->delete();
        Session::put('message','Xóa mã giảm giá thành công');
        return Redirect::to('/list-coupon'); 
    }

    public function unset_coupon(){
        $coupon = Session::get('coupon');
        if($coupon== true){
            Session::forget('coupon');
            return Redirect()->back()->with('message','Xóa mã khuyến mãi thành công');
        } 
    }
}
