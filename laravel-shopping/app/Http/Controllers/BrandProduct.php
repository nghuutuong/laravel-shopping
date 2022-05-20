<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\CategoryPost;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{   
    // public function AuthLogin(){
    //     $admin_id = Session::get('admin_id');
    //     if($admin_id){
    //         return Redirect::to('doashboard');
    //     }else{
    //         return Redirect::to('login-auth')->send();
    //     }
    // }
    public function add_brand_product(){
        // $this->AuthLogin();
        return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        // $this->AuthLogin();
        // $all_brand_product = DB::table('tbl_brand')->get();
        // $all_brand_product = Brand::all();
        // $all_brand_product = Brand::orderBy('brand_id','desc')->paginate(5);
        $all_brand_product = Brand::orderBy('brand_id','desc')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
       
    }
    public function save_brand_product(Request $request) {
        // $this->AuthLogin();
        $data = $request->all();
        $brand = new Brand();
        $brand -> brand_name = $data['brand_product_name'];
        $brand -> brand_desc = $data['brand_product_desc'];
        $brand -> brand_status = $data['brand_product_status'];
        $brand -> save();
        // $data = array();
        // $data['brand_name'] = $request->brand_product_name;
        // $data['brand_desc'] = $request->brand_product_desc;
        // $data['brand_status'] = $request->brand_product_status;
        // DB::table('tbl_brand')->insert($data);
        Session::put('message', 'Thêm thương hiệu thành công');
        return Redirect::to('add-brand-product');
        
    }
    public function active_brand_product($brand_product_id) {
        // $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        Session::put('message','Bỏ kích hoạt thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }
    public function unactive_brand_product($brand_product_id) {
        // $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        Session::put('message','Kích hoạt thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }
    public function edit_brand_product($brand_product_id){
        // $this->AuthLogin();
        // $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
        // $edit_brand_product = Brand::where('brand_id',$brand_product_id)->first();
        $edit_brand_product = Brand::find($brand_product_id);
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }
    public function delete_brand_product($brand_product_id) {
        // $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
        Session::put('message','Xóa thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }
    public function update_brand_product(Request $request,$brand_product_id){
        // $this->AuthLogin();
        // $data=[];
        // $data['brand_name'] = $request->brand_product_name;
        // $data['brand_desc'] = $request->brand_product_desc;
        $data = $request->all();
        $brand = Brand::find($brand_product_id);
        $brand -> brand_name = $data['brand_product_name'];
        $brand -> brand_desc = $data['brand_product_desc'];
        $brand -> brand_status = $data['brand_product_status'];
        $brand -> save();
        // DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message','Cập nhật thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }
    //Kết thúc điều khiển brand

    public function show_brand($brand_id,Request $request) {
        $slider = DB::table('tbl_slider')->where('slider_status','1')->get();
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','tbl_brand.brand_id')->where('tbl_product.brand_id',$brand_id)->get();
        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->limit(1)->get();
        foreach($brand_by_id as $key => $val){
            // $meta_desc = $val->meta_desc;
           $brand_id = $request->brand_id;

        }
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'giam_dan'){
                $brand_by_id = Product::with('brand')->where('brand_id',$brand_id)->orderBy('product_price','desc')
                ->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'tang_dan'){
                $brand_by_id = Product::with('brand')->where('brand_id',$brand_id)->orderBy('product_price','asc')
                ->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'kytu_za'){
                $brand_by_id = Product::with('brand')->where('brand_id',$brand_id)->orderBy('product_name','desc')
                ->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'kytu_az'){
                $brand_by_id = Product::with('brand')->where('brand_id',$brand_id)->orderBy('product_name','asc')
                ->paginate(6)->appends(request()->query());
            }
        }elseif(isset($_GET['start_price']) && $_GET['end_price']){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $brand_by_id = Product::with('brand')->whereBetween('product_price',[$min_price,$max_price])
            ->orderBy('product_id','asc')->paginate(6);
        }else{
            $brand_by_id = Product::with('brand')->where('brand_id',$brand_id)->orderBy('product_id','desc')
            ->paginate(6);
        }
        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)->with('brand_by_id',$brand_by_id)
        ->with('brand_name',$brand_name)->with('slider',$slider)->with('category_post',$category_post);
    }
}
