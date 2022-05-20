<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slider;
use Session;
use App\Models\CategoryPost;
session_start();
class WishlistController extends Controller
{
   public function show_wishlist(){
      $category_post = CategoryPost::orderBy('cate_post_id','desc')->get();
      return view('pages.wishlist.show_wishlist')->with('category_post',$category_post);
   }
}
