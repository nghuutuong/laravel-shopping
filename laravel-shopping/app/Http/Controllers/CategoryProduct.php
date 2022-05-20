<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Excel;
use Auth;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use App\Imports\ExcelImports;
use App\Exports\ExcelExports;
session_start();

use Illuminate\Http\Request;

class CategoryProduct extends Controller
{   
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('doashboard');
        }else{
            return Redirect::to('login-auth')->send();
        }
    }
    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.add_category_product');
    }
    public function all_category_product(){
        $this->AuthLogin();
        
        // $category_product = Category::where('category_parent',0)->orderBy('category_id','desc')->get();
        // $all_category_product = DB::table('tbl_category_product')->get();
        $all_category_product = Category::orderBy('category_id','desc')->paginate(10);
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
       
    }
    public function save_category_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        
        $data['category_status'] = $request->category_product_status;
        // $data['category_parent'] = $request->category_parent;
       
        DB::table('tbl_category_product')->insert($data);
        // $data = $request->all();
        // $category = new Category();
        // $category -> category_name = $request->$data['category_product_name'];
        // $category -> category_desc = $request->$data['category_product_desc'];
        // $category -> meta_keywords = $request->$data['category_product_keywords'];
        // $category -> category_status = $request->$data['category_product_status'];
        // $category -> save();
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return Redirect::to('add-category-product');
        
    }
    public function active_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Bỏ kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function unactive_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        // $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $edit_category_product = Category::find($category_product_id);
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }
    public function delete_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        $data=[];
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;   
        $data['category_status'] = $request->category_product_status;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        // $data = $request->all();
        // $category = Category();
        // $category -> category_name = $request->$data['category_product_name'];
        // $category -> category_desc = $request->$data['category_product_desc'];
        // $category -> meta_keywords = $request->$data['category_product_keywords'];
        // $category -> category_status = $request->$data['category_product_status'];
        // $category -> save();
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
    // Kết thúc điều khiển trang admin
    
    public function show_category($category_id, Request $request) {
        $slider = DB::table('tbl_slider')->where('slider_status','1')->get();

        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_by_id = Category::where('category_id',$category_id)->get();
        $min_price = Product::min('product_price');
        // dd($min_price);
        $max_price = Product::max('product_price');
        $max_price_range = $max_price + 100;
        foreach($category_by_id as $key => $val){
            // $meta_desc = $val->meta_desc;
           $category_id = $request->category_id;

        }
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'giam_dan'){
                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_price','desc')
                ->paginate(9)->appends(request()->query());
            }elseif($sort_by == 'tang_dan'){
                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_price','asc')
                ->paginate(9)->appends(request()->query());
            }elseif($sort_by == 'kytu_za'){
                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_name','desc')
                ->paginate(9)->appends(request()->query());
            }elseif($sort_by == 'kytu_az'){
                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_name','asc')
                ->paginate(9)->appends(request()->query());
            }
        }elseif(isset($_GET['start_price']) && $_GET['end_price']){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $category_by_id = Product::with('category')->whereBetween('product_price',[$min_price,$max_price])
            ->orderBy('product_id','asc')->paginate(9);
        }else{
            $category_by_id = Product::with('category')->where('category_id',$category_id)->orderBy('product_id','desc')
            ->paginate(9);
        }
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
        return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)
        ->with('category_name',$category_name)->with('category_post',$category_post)->with('slider',$slider)
        ->with('min_price',$min_price)->with('max_price',$max_price)->with('max_price_range',$max_price_range);
    }

    public function import_csv(){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImports, $path);
        return back();
    }
    public function export_csv(Request $request){
        return Excel::download(new ExcelExports, 'category_product.xlsx');
    }
}