<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Mail;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Post;
use App\Models\CategoryPost;
session_start();

class HomeController extends Controller
{
    public function index(Request $request) {
            
            // foreach($customer_name as $cus_name){
            //     $cus_name = $cus_name->customer_name;
            // }
        // $customer = Customer::find(Session::get('customer_id'))->first();
        $category = Category::all();
        // $product_by_category = Product::where('tbl_product.product_id','tbl_category.category')->get();
        // $brand_id = Brand::find('brand_id');
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $slider = Slider::orderBy('slider_id','desc')->where('slider_status','1')->take(4)->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();      
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $product_with_category_id = Product::join('tbl_category_product','tbl_product.category_id','tbl_category_product.category_id')->get();
        foreach($product_with_category_id as $key => $category){
            $category_id = $category->category_id;
            $category_name = $category->category_name;
        }
        $brand_sony = Product::join('tbl_brand','tbl_brand.brand_id','tbl_product.brand_id')->where('tbl_product.brand_id','1')->get()->chunk(4);
        $brand_microsoft = Product::join('tbl_brand','tbl_brand.brand_id','tbl_product.brand_id')->where('tbl_product.brand_id','2')->get()->chunk(4);
        $brand_apple = Product::join('tbl_brand','tbl_brand.brand_id','tbl_product.brand_id')->where('tbl_product.brand_id','3')->get()->chunk(4);
        $brand_samsung = Product::join('tbl_brand','tbl_brand.brand_id','tbl_product.brand_id')->where('tbl_product.brand_id','4')->get()->chunk(4);
        $newest_product = Product::all()->chunk(4);
        // $product_with_category = Category::where('brand_id','1')->get();
        // $product = Product::where('category_id',$category_id)->get();
        $hot_product = Product::where('product_sold','desc')->take(4)->get();
        // $all_products = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->paginate(4);
        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();
        $post = Post::where('post_status','0')->orderBy('post_id','desc')->take(3)->get();
        return view('pages.index')->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('slider',$slider)->with('category_post',$category_post)
        ->with('hot_product',$hot_product)->with('product',$newest_product)
        ->with('brand_sony',$brand_sony)->with('brand_microsoft',$brand_microsoft)
        ->with('brand_apple',$brand_apple)->with('brand_samsung',$brand_samsung)
        ->with('post',$post);
        // dd($customer);
        // dd($product_by_category);
        // return view('pages.home')->with(compact('cate_product','brand_product','all_product'));
    }
    public function indexx(Request $request) {
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();

        $slider = Slider::orderBy('slider_id','desc')->where('slider_status','1')->take(4)->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->orderBy('category_order','asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(6)->get();
        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();
        return view('pages.home')->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('all_product',$all_product)
        ->with('slider',$slider)->with('category_post',$category_post);
        // return view('pages.home')->with(compact('cate_product','brand_product','all_product'));
    }

    public function search(Request $request) {
        $keyworks = $request->keyworks_submit;
        $slider = Slider::orderBy('slider_id','desc')->where('slider_status','1')->take(4)->get();
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keyworks.'%')->get();
        return view('pages.product.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)
        ->with('slider',$slider)->with('category_post',$category_post);
    }

    public function send_mail() {
        $to_name = "Huu Tuong";
        $to_email = "huutuongng@gmail.com";

        $data = array("name"=>"Huu Tuong","body"=>"Mail gửi về vấn đề xyz");

        Mail::send("pages.send_mail",$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Test Mail');
            $message->from($to_email,$to_name);
        });
        return Redirect('/')->with('message','');
    }
    public function autocomplete_ajax(Request $request){
        $data = $request->all();
        if($data['query']){
            $product = Product::where('product_status',0)->where('product_name','LIKE','%'.$data['query'].'%')->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($product as $key => $val){
                $output .= '
                <li class="li_search"><a href="#">'.$val->product_name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
