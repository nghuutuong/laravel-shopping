<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Models\Roles;
use App\Models\Admin;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\CategoryPost;
use Carbon\Carbon;
use Auth;
use Mail;
use Session;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $admin = Admin::with('roles')->orderBy('admin_id','Asc')->paginate(5);
        return view('admin.users.all_users')->with(compact('admin'));
    }
    public function add_users(){
        return view('admin.users.add_users');
    }
    public function delete_user_role($admin_id){
        if(Auth::id() == $admin_id){
            return redirect()->back()->with('Message','Bạn không thể xóa chính mình');
        }
        $admin = Admin::find($admin_id);
        if($admin){
            $admin->roles()->detach();
            $admin->delete();
        }
        return redirect()->back()->with('Message','Xóa người dùng thành công');
    }
    public function assign_roles(Request $request){
        if(Auth::id()==$request->admin_id){
            return redirect()->back()->with('Message','Bạn không thể thêm quyền cho chính mình');
        }
        $user = Admin::where('admin_email',$request->admin_email)->first();
        $user->roles()->detach();
        if($request->author_role){
           $user->roles()->attach(Roles::where('name','author')->first());     
        }
        if($request->user_role){
           $user->roles()->attach(Roles::where('name','user')->first());     
        }
        if($request->admin_role){
           $user->roles()->attach(Roles::where('name','admin')->first());     
        }
        return redirect()->back()->with('Message','Cấp quyền thành công');
    }
    public function store_users(Request $request){
        $data = $request->all();
        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = $data['admin_password'];
        $admin->messenger_color = #2180f3;
        $admin->dark_mode = 0;
        $admin->active_status = 0;
        $admin->save();
        $admin->roles()->attach(Roles::where('name','user')->first());
        Session::put('message','Thêm users thành công');
        return Redirect::to('users');
    }

    public function impersonate($admin_id){
        $user = Admin::where('admin_id',$admin_id)->first();
        if($user){
            session()->put('impersonate',$user->admin_id);
        }
        return redirect('/users');
        // return dd($user);
    }
    public function impersonate_destroy(){
        session()->forget('impersonate');
        return redirect('/users');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function forget_password(){
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $slider = Slider::orderBy('slider_id','desc')->where('slider_status','1')->take(4)->get();
        // $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->orderBy('category_order','asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(6)->get();

        return view('pages.checkout.forget_password')
        ->with('brand',$brand_product)->with('all_product',$all_product)
        ->with('slider',$slider)->with('category_post',$category_post);
    }
    public function recover_password(Request $request){
        $data = $request->all();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = "Lấy lại mật khẩu".' '.$now;
        $customer = Customer::where('customer_email','=',$data['email_account'])->get();
        foreach($customer as $key => $value){
            $customer_id = $value->customer_id;
        }
        if($customer){
            $count_customer = $customer->count();
            if($count_customer==0){
                return redirect()->back()->with('error','Email chưa được đăng ký');
            }else{
                $token_random = Str::random();
                $customer = Customer::find($customer_id);
                $customer->customer_token = $token_random;
                $customer->save();

                $to_email = $data['email_account'];
                $link_reset_pass = url('/update-new-password?email='.$to_email.'&token='.$token_random);
                $data = array("name"=>$title_mail,"body"=>$link_reset_pass,"email"=>$data['email_account']);
                Mail::send('pages.checkout.forget_password_notify',['data'=>$data], function($message) use ($title_mail,$data)
                {
                    $message->to($data['email'])->subject($title_mail);
                    $message->from($data['email'],$title_mail);
                });
                return redirect()->back()->with('message','Gửi email xác nhận đổi mật khẩu thành công');
            }
        }
    }
    public function update_new_password(){
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $slider = Slider::orderBy('slider_id','desc')->where('slider_status','1')->take(4)->get();
        // $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->orderBy('category_order','asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(6)->get();

        return view('pages.checkout.new_password')
        ->with('brand',$brand_product)->with('all_product',$all_product)
        ->with('slider',$slider)->with('category_post',$category_post); 
    }
    public function reset_new_password(Request $request){
        $data = $request->all();
        $token_random = Str::random();
        $customer = Customer::where('customer_email','=',$data['email'])->where('customer_token','=',$data['token'])->get();
        $count = $customer->count();
        if($count>0){
            foreach($customer as $key => $cus){
                $customer_id = $cus->customer_id;
            }
            $reset = Customer::find($customer_id);
            $reset->customer_password = $data['password_account'];
            $reset->customer_token = $token_random;
            $reset->save();
            return redirect('login-customer')->with('success','Đổi mật khẩu thành công');
        }else{
            return redirect('forget-password')->with('error','Vui lòng thử lại');
        }
    }

}
