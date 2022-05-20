<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Excel;
use Auth;
use App\Models\Post;
use App\Models\Admin;
use App\Models\Slider;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Redirect;
use App\Imports\ExcelImports;
use App\Exports\ExcelExports;
session_start();

class PostController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('doashboard');
        }else{
            return Redirect::to('admin-login')->send();
        }
    }
    public function add_post(){
        $this->AuthLogin();
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        return view('admin.post.add_post')->with(compact('category_post'));
    }
    public function all_post(){
        $this->AuthLogin();
        $all_post = Post::with('category_post')->orderBy('post_id','desc')->paginate(10);
        return view('admin.post.list_post')->with(compact('all_post'));
    }
    public function save_post(Request $request) {
        $this->AuthLogin();
        $data = $request->all();
        $post = new Post();
        $post->post_title = $data['post_title'];
        $post->post_desc = $data['post_desc'];
        $post->post_content = $data['post_content'];
        $post->post_status = $data['post_status'];
        $post->cate_post_id = $data['cate_post_id'];
        $get_image= $request->file('post_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/posts',$new_image);
            $post->post_image = $new_image;
            $post->save();
            Session::put('message', 'Thêm bài viết thành công');
            return Redirect()->back();
        }else{
            Session::put('message', 'Làm ơn thêm ảnh');
            return Redirect()->back();
        }
    }
    // public function active_product($product_id) {
    //     $this->AuthLogin();
    //     DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
    //     Session::put('message','Bỏ kích hoạt sản phẩm thành công');
    //     return Redirect::to('all-product');
    // }
    // public function unactive_product($product_id) {
    //     $this->AuthLogin();
    //     DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
    //     Session::put('message','Kích hoạt sản phẩm thành công');
    //     return Redirect::to('all-product');
    // }
    public function edit_post($post_id){
        $this->AuthLogin();
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $edit_post = Post::find($post_id); 
        return view('admin.post.edit_post')->with(compact('edit_post','category_post'));
    }
    public function delete_post($post_id) {
        $this->AuthLogin();
        $post = Post::find($post_id);
        $post_image = $post->post_image;
        if($post_image){
            $path = 'uploads/posts/'.$post_image;
            unlink($path);
        }
        $post->delete();
        Session::put('message','Xóa bài viết thành công');
        return Redirect()->back();
    }
    public function update_post(Request $request,$post_id){
        $this->AuthLogin();
        $data = $request->all();
        $post = Post::find($post_id);
        $post->post_title = $data['post_title'];
        $post->post_desc = $data['post_desc'];
        $post->post_content = $data['post_content'];
        $post->post_status = $data['post_status'];
        $post->cate_post_id = $data['cate_post_id'];
        $get_image= $request->file('post_image');
        if($get_image){
            //Xóa ảnh cũ
            $post_image_old = $post->post_image;
            $path = 'C:\xampp\htdocs\shopbanhanglaravel\public\uploads\posts\\'.$post_image_old;
            // unlink($path);
            //Cập nhật ảnh mới
            $get_name_image=$get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/posts',$new_image);
            $post->post_image = $new_image;  
        }
        $post->save();
        Session::put('message', 'Cập nhật bài viết thành công');
        // return Redirect()->back();
        
    }
    //KẾt thúc control sản phẩm

    public function detail_product($product_id) {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $slider = DB::table('tbl_slider')->where('slider_status','1')->get();
        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        foreach($details_product as $key => $pro_detail){
            $category_id = $pro_detail->category_id;
        }
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();

        return view('pages.product.product_detail')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('product_details',$details_product)
        ->with('relate',$related_product)->with('slider',$slider);
    }

    public function category_post(Request $request,$post_id){
        $slider = Slider::orderBy('slider_id','desc')->where('slider_status','1')->take(3)->get();
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $cate_post = CategoryPost::find('cate_post_id',$post_id)->take(1)->get();
        $newest_post = Post::orderBy('post_id','desc')->take(5)->get();
        dd($newest_post);
        foreach($category_post as $key => $cate_post){
            $keyworks = $request->keyworks_submit;
            $cate_id = $cate_post->cate_post_id;
        }
        
        $post = Post::with('category_post')->where('post_status',0)->where('cate_post_id',$cate_id)->paginate(10);
        return view('pages.post.category_post')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('slider',$slider)->with('post',$post)
        ->with('cate_post',$cate_post)->with('newest_post',$newest_post);
    }

    public function post(Request $request,$post_id){
        $slider = Slider::orderBy('slider_id','desc')->where('slider_status','1')->take(3)->get();
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $post = Post::with('category_post')->where('post_status',0)->where('post_id',$post_id)->take(1)->get();
        $newest_post = Post::orderBy('post_id','desc')->take(5)->get();
        // dd($newest_post);
        foreach($post as $key => $p){
            $cate_post_id = $p->cate_post_id;
        }
        $post_relate = Post::with('category_post')->where('post_status',0)->where('cate_post_id',$cate_post_id)
        ->whereNotIn('post_id',[$post_id])->take(5)->get();
        return view('pages.post.post')->with('category_post',$category_post)->with('brand',$brand_product)
        ->with('slider',$slider)->with('post',$post)->with('category',$cate_product)->with('post_relate',$post_relate)
        ->with('newest_post',$newest_post);
    }

}
