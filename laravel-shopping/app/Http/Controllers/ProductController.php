<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Brand;
use File;
use App\Models\Rating;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{   
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('doashboard');
        }else{
            return Redirect::to('login-auth')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')
        ->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')
        ->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('cate_product', $cate_product)
        ->with('brand_product',$brand_product);
    }
    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','tbl_product.brand_id')
        ->orderby('tbl_product.product_id','desc')->paginate(10);
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }
    public function save_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price'] = $request->product_price;
        $data['price_cost'] = $request->price_cost;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_sold'] = $request->product_sold;
        $data['product_tags'] = $request->product_tags;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image= $request->file('product_image');
        $path = 'uploads/product/';
        $path_gallery = 'uploads/gallery/';
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            File::copy($path.$new_image,$path_gallery.$new_image);
            $data['product_image'] = $new_image;
        }
        $pro_id = DB::table('tbl_product')->insertGetId($data);
        $gallery = new Gallery();
        $gallery->gallery_image = $new_image;
        $gallery->gallery_name = $new_image;
        $gallery->product_id = $pro_id;
        $gallery->save();
     
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('add-product');
       
    }
    public function active_product($product_id) {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Bỏ kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function unactive_product($product_id) {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Kích hoạt sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('brand_product',$brand_product)->with('category_product',$cate_product);
        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
    public function delete_product($product_id) {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $data=array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price'] = $request->product_price;
        $data['price_cost'] = $request->price_cost;
        $data['product_desc'] = $request->product_desc;
        $data['product_tags'] = $request->product_tags;
        $data['product_content'] = $request->product_content;
        $data['product_sold'] = $request->product_sold;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
    }
    //KẾt thúc control sản phẩm

    public function show_all_product(){
        $all_products = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->paginate(9);
        $slider = DB::table('tbl_slider')->where('slider_status','1')->get();

        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        // $category_by_id = Category::where('category_id',$category_id)->get();
        $pro_id = Product::find('product_id');
        $min_price = Product::min('product_price');
        $max_price = Product::max('product_price');
        $max_price_range = $max_price + 10000000;
        // foreach($pro_id as $key => $val){
        //     // $meta_desc = $val->meta_desc;
        //    $pro_id = $request->pro_id;

        // }
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'giam_dan'){
                $pro_id = Product::orderBy('product_price','desc')
                ->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'tang_dan'){
                $pro_id = Product::orderBy('product_price','asc')
                ->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'kytu_za'){
                $pro_id = Product::orderBy('product_name','desc')
                ->paginate(6)->appends(request()->query());
            }elseif($sort_by == 'kytu_az'){
                $pro_id = Product::orderBy('product_name','asc')
                ->paginate(6)->appends(request()->query());
            }
        }elseif(isset($_GET['start_price']) && $_GET['end_price']){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $pro_id = Product::whereBetween('product_price',[$min_price,$max_price])
            ->orderBy('product_id','asc')->paginate(6);
        }else{
            $pro_id = Product::orderBy('product_id','desc')
            ->paginate(6);
        }
        // $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
        return view('pages.product.show_all_product')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('category_post',$category_post)->with('slider',$slider)
        ->with('min_price',$min_price)->with('max_price',$max_price)->with('max_price_range',$max_price_range)->with('all_products',$all_products);
        dd($pro_id);
    }
    public function detail_product($product_id) {
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $slider = DB::table('tbl_slider')->where('slider_status','1')->get();
        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();
        
        foreach($details_product as $key => $pro_detail){
            $category_id = $pro_detail->category_id;
            $product_id = $pro_detail->product_id;
            $product_cate = $pro_detail->category_name;
            $product = $pro_detail->product_name;
        }
        $gallery = Gallery::where('product_id',$product_id)->get();
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','tbl_product.brand_id')
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])
        ->orderBy(DB::raw('RAND()'))->paginate(5);
        $rating = Rating::where('product_id',$product_id)->avg('rating');
        $rating = round($rating);
        return view('pages.product.product_detail_a')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('product_details',$details_product)
        ->with('relate',$related_product)->with('slider',$slider)->with('category_post',$category_post)
        ->with('gallery',$gallery)->with('product_cate',$product_cate)->with('category_id',$category_id)
        ->with('product',$product)->with('rating',$rating);
    } 

    public function tag(Request $request,$product_tags){
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $slider = DB::table('tbl_slider')->where('slider_status','1')->get();
        $pro_tags = Product::where('product_status',0)->where('product_name','LIKE','%'.$product_tags.'%')->orWhere('product_tags','LIKE','%'.$product_tags.'%')->get();
        $tag = str_replace("-"," ",$product_tags);
        
        // foreach($details_product as $key => $pro_detail){
            // $category_id = $pro_detail->category_id;
            // $product_id = $pro_detail->product_id;
        // }
        
        return view('pages.product.tag')->with('slider',$slider)->with('category_post',$category_post)
        ->with('category',$cate_product)->with('brand',$brand_product)->with('pro_tags',$pro_tags)->with('product_tags',$product_tags);
        // dd($product_tags);
    }
    public function quickview(Request $request){
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $gallery = Gallery::where('product_id',$product_id)->get();
        $output['product_gallery'] = '';
        foreach($gallery as $key => $gal ){
            $output['product_gallery'] .= '<p><img width="100%" src="uploads/gallery/'.$gal->gallery_image.'"></p>';
        }
        $output['product_name'] = $product->product_name;
        $output['product_id'] = $product->product_id;
        $output['product_desc'] = $product->product_desc;
        $output['product_content'] = $product->product_content;
        $output['product_price'] = number_format($product->product_price,0,',','.'). 'VNĐ';
        $output['product_image'] = '<p><img width="100%" src="uploads/product/'.$product->product_image.'"></p>';
        $output['product_button'] = '<input type="button" value="Mua ngay" class="btn btn-primary 
        btn-sm add-to-cart-quickview" id="buy_quickview" data-id_product="'.$product->product_id.'" name="add-to-cart">';
        $output['product_quickview_value'] = '     
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" class="cart_product_id_'.$product->product_id.'" value="'.$product->product_id.'">
        <input type="hidden" class="cart_product_name_'.$product->product_id.'" value="'.$product->product_name.'">
        <input type="hidden" class="cart_product_image_'.$product->product_id.'" value="'.$product->product_image.'">
        <input type="hidden" class="cart_product_price_'.$product->product_id.'" value="'.$product->product_price.'">
        <input type="hidden" class="cart_product_quantity_'.$product->product_id.'" value="'.$product->product_quantity.'">
        <input type="hidden" class="cart_product_qty_'.$product->product_id.'" value="1">
        ';
        echo json_encode($output);
    }
    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id',$product_id)->where('comment_status',0)->get();
        $output = '';
        foreach($comment as $key => $comment){
            $output .= '
            <div class="row style-comment">
                <div class="rol-md-2">
                </div>
                <div class="rol-md-10">
                    <p style="color:green">@'.$comment->comment_name.'</p>
                    <p style="color:#000;">'.$comment->comment_date.'</p>
                    <p>'.$comment->comment.'</p>
                </div>
            </div>
            ';

            foreach($comment as $key => $rep_comment){
                if($rep_comment['comment_parent_comment'] == $comment->comment_id){
                    $output .= '<div class="row style-comment" style="margin:5px 40px">
                        <div class="rol-md-2">
                        </div>
                        <div class="rol-md-10">
                            <p style="color:blue;">@Admin</p>
                            <p style="color:#000;">'.$rep_comment->comment_date.'</p>
                            <p>'.$rep_comment->comment.'</p>
                        </div>
                    </div>
                    ';
                }
            }
        }
        echo $output;
    }
    public function send_comment(Request $request){
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment_product_id = $product_id;
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_status = 0;
        $comment->comment_parent_comment = 0;
        $comment->save();

    }
    public function list_comment(){
        $comment = Comment::with('product')->orderBy('comment_status','desc')->get();
        $comment_rep = Comment::with('product')->where('comment_parent_comment','=',0)->orderBy('comment_id','desc')->get();
        return view('admin.comment.list_comment')->with(compact('comment','comment_rep'));
    }
    public function allow_comment(Request $request){
        $data = $request->all();
        $comment = Comment::find($data['comment_id']);
        $comment->comment_status = $data['comment_status'];
        $comment->save();
    }
    public function reply_comment(Request $request){
        $data = $request->all();
        $comment = new Comment();
        $comment->comment = $data['comment'];
        $comment->comment_product_id = $data['comment_product_id'];
        $comment->comment_parent_comment = $data['comment_id'];
        $comment->comment_status = 0;
        $comment->comment_name = 'Admin';
        $comment->save();
    }
    public function insert_rating(Request $request){
        $data = $request->all();
        $rating = new Rating;
        $rating->product_id = $data['product_id'];
        $rating->rating = $data['index'];
        $rating->save();
        echo 'done';
    }
    public function ckeditor_image(Request $request){
        if($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move('uploads/ckeditor',$fileName);
            $CKEditorNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/ckeditor/',$fileName);
            $msg = 'Tải ảnh thành công';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorNum,'$url','$msg')</script>";
            @header('Content-type: text/html; charset-utf-8');
            echo $response;
        }
    }
    public function file_browser(Request $request){
        $paths = glob(public_path('uploads/ckeditor/*'));
        $fileNames = array();
        foreach($path as $path){
            array_push($fileNames,basename($path));
        }
        $data = array(
            'fileNames' -> $fileNames
        );
        return view('admin.images.file_browser')->with($data);
    }
}
