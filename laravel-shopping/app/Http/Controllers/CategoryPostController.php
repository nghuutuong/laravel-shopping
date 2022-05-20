<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Excel;
use Auth;
use App\Models\Category;
use App\Models\Admin;
use App\Models\Slider;
use App\Models\Post;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Redirect;
use App\Imports\ExcelImports;
use App\Exports\ExcelExports;
session_start();

class CategoryPostController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('doashboard');
        }else{
            return Redirect::to('admin-login')->send();
        }
    }

    public function add_category_post(){
        $this->AuthLogin();
        return view('admin.category_post.add_category_post');
    }
    public function all_category_post(){
        $this->AuthLogin();
        $category_post = CategoryPost::with('post')->orderBy('cate_post_id','desc')->paginate(10);
        // $all_category_product = DB::table('tbl_category_product')->get();
        return view('admin.category_post.list_category_post')->with(compact('category_post'));
       
    }
    public function save_category_post(Request $request) {
        $this->AuthLogin();
        $data = $request->all();
        $category_post = new CategoryPost();
        $category_post -> cate_post_name = $data['cate_post_name'];
        $category_post -> cate_post_desc = $data['cate_post_desc'];
        $category_post -> cate_post_status = $data['cate_post_status'];
 
        $category_post -> save();
        Session::put('message', 'Thêm danh mục bài viết thành công');
        return Redirect()->back();
        
    }
 
    public function edit_category_post($cate_post_id){
        $this->AuthLogin();
        // $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $edit_category_post = CategoryPost::find($cate_post_id);
        return view('admin.category_post.edit_category_post')->with(compact('edit_category_post'));
    }
    public function delete_category_post($cate_post_id) {
        $this->AuthLogin();
        $category_post = CategoryPost::find($cate_post_id);
        $category_post->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return Redirect::to('all-category-post');
    }
    public function update_category_post(Request $request,$cate_post_id){
        $this->AuthLogin();
        $data = $request->all();
        $category_post = CategoryPost::find($cate_post_id);
        $category_post -> cate_post_name = $data['cate_post_name'];
        $category_post -> cate_post_desc = $data['cate_post_desc'];
        $category_post -> cate_post_status = $data['cate_post_status'];
        $category_post -> save();
        Session::put('message','Cập nhật danh mục bài viết thành công');
        return Redirect('/all-category-post');
    }
    
    public function category_post(Request $request,$post_id){
        $slider = Slider::orderBy('slider_id','desc')->where('slider_status','1')->take(3)->get();
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $cate_post = CategoryPost::where('cate_post_id',$post_id)->take(1)->get();
        foreach($cate_post as $key => $cate_post){
            $cate_title = $cate_post->cate_post_name;
            $cate_id = $cate_post->cate_post_id;
        }
        $post = Post::with('category_post')->where('post_status',0)->where('cate_post_id',$cate_id)->paginate(10);
        return view('pages.post.category_post')->with('category_post',$category_post)->with('brand',$brand_product)
        ->with('slider',$slider)->with('post',$post)->with('category',$cate_product)
        ->with('cate_post',$cate_post);
    }
    
    // public function show_category($category_id, Request $request) {

    //     $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
    //     $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
    //     $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','tbl_category_product.category_id')->where('tbl_product.category_id',$category_id)->get();
    //     foreach($category_by_id as $key => $val){
    //         // $meta_desc = $val->meta_desc;
    //         $meta_keywords = $val->meta_keywords;
    //         $meta_title = $val->category_name;
    //         $url_canonical = $request->url();
    //     }
    //     $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
    //     return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name);
    // }

    // public function import_csv(){
    //     $path = $request->file('file')->getRealPath();
    //     Excel::import(new ExcelImports, $path);
    //     return back();
    // }
    // public function export_csv(Request $request){
    //     return Excel::download(new ExcelExports, 'category_product.xlsx');
    // }
}
