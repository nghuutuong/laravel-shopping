<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Roles;
use Auth;
class AuthController extends Controller
{
    public function register_auth(){
        return view('admin.custom_auth.register');
    }
    public function register(Request $request){
        $this->validation($request);
        $data= $request->all();
        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = $data['admin_password'];
        $admin->save();
        return Redirect('register-auth')->with('message','Tạo thành công');
    }
    public function validation($request){
        return $this->validate($request,[
            'admin_name' => 'required|max:255',
            'admin_email' => 'required|max:255',
            'admin_phone' => 'required|max:255',
            'admin_password' => 'required|max:255',
        ]);
    }

    public function login_auth(){
        // $id= Auth::user()->admin_id;
        // dd($id);
        return view('admin.custom_auth.login_auth');
    }
    public function login(Request $request){
        $this->validate($request,[
            'admin_email' => 'required|max:255',
            'admin_password' => 'required|max:255'
        ]);
        $data = $request->all();
        // echo Auth::attempt(['admin_email' => $request->admin_email, 'admin_password' => $request->admin_password]);
        if(Auth::attempt(['admin_email' => $request->admin_email, 'admin_password' => $request->admin_password])){
            return Redirect('/dashboard');
        }else{
            return Redirect('/login-auth')->with('message','Đăng nhập thất bại');
        }
    }
    public function logout_auth(){
        Auth::logout();
        return Redirect('/login-auth')->with('message','Đăng xuất thành công');
    }
}
