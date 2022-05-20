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
use App\Models\Gallery;
use App\Models\CategoryPost;
use Illuminate\Support\Facades\Redirect;
use App\Imports\ExcelImports;
use App\Exports\ExcelExports;

class GalleryController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('doashboard');
        }else{
            return Redirect::to('admin-login')->send();
        }
    }
    public function add_gallery($product_id){
        $pro_id = $product_id;
        return view('admin.gallery.add_gallery')->with(compact('pro_id'));
    }
    public function select_gallery(Request $request){
        $product_id = $request->$pro_id;
        $gallery = Gallery::where('product_id',$product_id)->get();
        $gallery_count = $gallery->count();
        $output = '
        <form>
        '.csrf_field().'
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Thứ tự</th>
                <th>Tên hình ảnh</th>
                <th>Hình ảnh</th>
                <th>Quản lý</th>
            </tr>
            </thead>
            <tbody>
        ';
        if($gallery_count>0){
            $i = 0;
            foreach($gallery as $key => $gal){
                $i++;
                $output .='
               
                <tr>
                    <td>'.$i.'</td>
                    <td contenteditables class="edit_gallery_name" data-gallery_id="'.$gal->gallery_id.'">'.$gal->gallery_name.'</td>
                    
                    <td><img src="'.url('uploads/gallery/'.$gal->gallery_image).'" class="img-thumbnail" width="120px" height="120px"></td>
                    <input type=""file> class="file_image" style="width:40%" data-gallery_id="'.$gal->gallery_id.'" id="file-'.$gal->gallery_id.'" name="file" accept="image/*" />
                    <td><button type="button" data-gallery_id="'.$gal->gallery_id.'" class="btn btn-xs btn-danger delete-gallery">
                    Xóa</button></td>
                </tr>
               
                ';
            }
        }else{
            $output .='
            <tr>
                <td colspan="4">Sản phẩm này chưa có thư viện ảnh</td>
            </tr>
            ';
        }
        $output .='
           </tbody>
           </table>
           </form>
            ';
        echo $output;
    }
    public function insert_gallery(Request $request,$pro_id){
        $get_image = $request->file('file');
        if($get_image){
            foreach($get_image as $image){
                $get_name_image=$image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image=$name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
                $image->move('uploads/product',$new_image);
                $gallery = new Gallery();
                $gallery->gallery_name = $new_image;
                $gallery->gallery_image = $new_image;
                $gallery->product_id = $pro_id;
                $gallery->save();
            }
        }
        Session::put('message', 'Thêm thư viện ảnh thành công');
        return Redirect()->back();
    }

    public function update_gallery_name(Request $request){
        $gallery_id = $request->gallery_id;
        $gallery_text = $request->gallery_text;
        $gallery = Gallery::find($gallery_id);
        $gallery->gallery_name = $gallery_text;
        $gallery->save();
    }
    public function delete_gallery(Request $request){
        $gallery_id = $request->gallery_id;
        $gallery = Gallery::find($gallery_id);
        unlink('/uploads/gallery'.$gallery->gallery_image);
        $gallery->delete();
    }
    public function update_gallery(Request $request){
        $get_image = $request->file('file');
        $gallery_id = $request->gallery_id;
        if($get_image){
            foreach($get_image as $image){
                $get_name_image=$get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('uploads/gallery',$new_image);
                $gallery = Gallery::find($gallery_id); 
                unlink('/uploads/gallery'.$gallery->gallery_image);
                $gallery->gallery_image = $new_image;
                $gallery->save();
            }
        }
    }
}
