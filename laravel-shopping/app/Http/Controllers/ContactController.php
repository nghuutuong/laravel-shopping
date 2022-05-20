<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Contact;
use App\Models\Slider;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Redirect;
session_start();
class ContactController extends Controller
{
    public function lien_he(){
        $contact = Contact::where('contact_id',1)->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
        $slider = Slider::orderBy('slider_id','desc')->where('slider_status','1')->take(4)->get();

        return view('pages.contact.lienhe')->with('slider',$slider)->with('category_post',$category_post)
        ->with('category',$cate_product)->with('brand',$brand_product)->with('contact',$contact);
    }
    public function add_contact(){
        $contact = Contact::all();
        return view('admin.contact.add_contact')->with(compact('contact'));
    }
    public function save_contact(Request $request){
        $data = $request->where('contact_id',1)->get();
        $contact = new Contact();
        $contact->contact_info = $data['contact_info'];
        $contact->contact_map = $data['contact_map'];
        $contact->contact_fanpage = $data['contact_fanpage'];
        $get_image= $request->file('product_image');
        $path = 'uploads/product/contact/';
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            File::copy($path,$new_image);
            $contact->contact_image = $new_image;
        }
        $contact->save();
        return Redirect()->back()->with('message','Thêm thông tin liên hệ thành công');
    }
    public function update_contact(Request $request,$contact_id){
        $data = $request->all();
        $contact = Contact::find($contact_id);
        $contact->contact_info = $data['contact_info'];
        $contact->contact_map = $data['contact_map'];
        $contact->contact_fanpage = $data['contact_fanpage'];
        $get_image= $request->file('product_image');
        $path = 'uploads/product/contact/';
        if($get_image){
            unlink($path.$contact->contact_image);
            $get_name_image=$get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            File::copy($path,$new_image);
            $contact->contact_image = $new_image;
        }
        $contact->save();
        return Redirect()->back()->with('message','Cập nhật thông tin liên hệ thành công');
    }
}
