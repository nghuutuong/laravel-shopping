<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BotmanController;
use App\Http\Controllers\WishlistController;
// use App\Http\Controllers\MessagesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Danh mục sản phẩm
Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'show_category']);
Route::get('/thuong-hieu-san-pham/{brand_id}', [BrandProduct::class, 'show_brand']);
Route::get('/tat-ca-san-pham', [ProductController::class, 'show_all_product']);
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'detail_product']);
Route::post('/quickview', [ProductController::class, 'quickview']);
// Auth::routes();
//Comment
Route::post('/load-comment', [ProductController::class, 'load_comment']);
Route::post('/send-comment', [ProductController::class, 'send_comment']);
Route::post('/comment', [ProductController::class, 'list_comment']);
Route::post('/allow-comment', [ProductController::class, 'allow_comment']);
Route::post('/reply-comment', [ProductController::class, 'reply_comment']);

//Rating
Route::post('/insert-rating', [ProductController::class, 'insert_rating']);

//Liên hệ
Route::get('/lien-he', [ContactController::class, 'lien_he']);
Route::get('/add-contact', [ContactController::class, 'add_contact']);
Route::post('/save-contact', [ContactController::class, 'save_contact']);
Route::post('/update-contact/{contact_id}', [ContactController::class, 'update_contact']);
//Ckeditor
Route::get('/uploads-ckeditor', [ProductController::class, 'ckeditor_image']);
Route::post('/file-browser', [ProductController::class, 'file_browser']);

// FrontEnd
Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::get('/trang', [HomeController::class, 'indexx']);
Route::post('/search', [HomeController::class, 'search']);
Route::post('/autocomplete-ajax', [HomeController::class, 'autocomplete_ajax']);

// BackEnd
Route::get('/admin-login', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);

// Category Product
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product']);
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product']);
Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product']);
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product']);
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product']);
Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product']);
Route::get('/arrange-category', [CategoryProduct::class, 'arrange_category']);

Route::post('/export-csv', [CategoryProduct::class, 'export_csv']);
Route::post('/import-csv', [CategoryProduct::class, 'import_csv']);
// Brand Product
Route::get('/add-brand-product', [BrandProduct::class, 'add_brand_product']);
Route::get('/all-brand-product', [BrandProduct::class, 'all_brand_product']);
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class, 'update_brand_product']);
Route::post('/save-brand-product', [BrandProduct::class, 'save_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}', [BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}', [BrandProduct::class, 'delete_brand_product']);
Route::get('/active-brand-product/{brand_product_id}', [BrandProduct::class, 'active_brand_product']);
Route::get('/unactive-brand-product/{brand_product_id}', [BrandProduct::class, 'unactive_brand_product']);
//Tag
Route::get('/tag/{product_tags}', [ProductController::class, 'tag']);

//Product
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);
Route::post('/save-product', [ProductController::class, 'save_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);
Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);

// Route::group(['middleware' => 'auth.roles'],function(){
//     Route::get('/add-product',[ProductController::class,'add_product']);
//     Route::get('/edit-product/{product_id}',[ProductController::class,'edit_product']);
// });

//Cart
Route::post('/add-to-cart', [CartController::class, 'add_to_cart']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-cart/{rowId}', [CartController::class, 'delete_cart']);
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);


Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax']);
Route::get('/gio-hang', [CartController::class, 'gio_hang']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::get('/delete-cart-product/{session_id}', [CartController::class, 'delete_cart_product']);
Route::get('/delete-all-cart-product', [CartController::class, 'delete_all_cart_product']);

//Mã giảm giá
Route::post('/check-coupon', [CartController::class, 'check_coupon']);


Route::post('/add-coupon-code', [CouponController::class, 'add_coupon_code']);
Route::get('/add-coupon', [CouponController::class, 'add_coupon']);
Route::get('/list-coupon', [CouponController::class, 'list_coupon']);
Route::get('/delete-coupon', [CouponController::class, 'delete_coupon']);
Route::get('/unset-coupon', [CouponController::class, 'unset_coupon']);
//Thanh toán
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::get('/login-customer', [CheckoutController::class, 'login_customer']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);
Route::get('/tksfbuying', [CheckoutController::class, 'tksfbuying']);

// Order
Route::get('/manage-order', [OrderController::class, 'manage_order']);
Route::get('/view-order/{order_code}', [OrderController::class, 'view_order']);
Route::post('/delete-order', [CheckoutController::class, 'delete_order']);
Route::post('/confirm-order', [CheckoutController::class, 'confirm_order']);
Route::post('/confirm-order-bank', [CheckoutController::class, 'confirm_order-bank']);
Route::get('/print-order/{checkout_code}', [OrderController::class, 'print_order']);
Route::post('/update-order-qty', [OrderController::class, 'update_order_qty']);
Route::post('/update-qty', [OrderController::class, 'update_qty']);
Route::get('/history-order', [OrderController::class, 'history_order']);
Route::get('/view-history-order/{order_code}', [OrderController::class, 'view_history_order']);
//Send mail
Route::get('/send-mail', [HomeController::class, 'send_mail']);

//Login FB
Route::get('/login-facebook',[AdminController::class, 'login_facebook']);
Route::get('/admin-login/callback',[AdminController::class, 'callback_facebook']);

//Vận chuyển Delivery - admin
Route::get('/delivery',[DeliveryController::class, 'delivery']);
Route::post('/select-delivery',[DeliveryController::class, 'select_delivery']);
Route::post('/add-delivery',[DeliveryController::class, 'add_delivery']);
Route::post('/select-feeship',[DeliveryController::class, 'select_feeship']);
Route::post('/update-delivery',[DeliveryController::class, 'update_delivery']);
//Vận chuyển Delivery - user
Route::post('/select-delivery-home',[DeliveryController::class, 'select_delivery_home']);
Route::post('/caculate-fee',[DeliveryController::class, 'caculate_fee']);
Route::post('/delete-fee',[CheckoutController::class, 'delete_fee']);

//Banner
Route::get('/manage-slider',[SliderController::class,'manage_slider']);
Route::get('/add-slider',[SliderController::class,'add_slider']);
Route::post('/insert-slider',[SliderController::class,'insert_slider']);
Route::get('/active-slider/{slider_id}', [SliderController::class, 'active_slider']);
Route::get('/unactive-slider/{slider_id}', [SliderController::class, 'unactive_slider']);
Route::get('/delete-slider/{slider_id}',[SliderController::class, 'delete_slider']);
//Authentication
Route::get('/register-auth',[AuthController::class,'register_auth']);
Route::get('/login-auth',[AuthController::class,'login_auth']);
Route::get('/logout-auth',[AuthController::class,'logout_auth']);
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

//Users
Route::get('users',[UserController::class,'index'])->middleware('auth.roles');
Route::get('add-users',[UserController::class,'add_users'])->middleware('auth.roles');
Route::get('/delete-user-role/{admin_id}',[UserController::class,'delete_user_role'])->middleware('auth.roles');
Route::post('store-users',[UserController::class,'store_users']);
Route::post('assign-roles',[UserController::class,'assign_roles'])->middleware('auth.roles');
Route::get('/impersonate/{admin_id}',[UserController::class,'impersonate']);
Route::get('impersonate-destroy',[UserController::class,'impersonate_destroy']);

//Danh mục bài viết
Route::get('/all-category-post',[CategoryPostController::class,'all_category_post']);
Route::get('/add-category-post',[CategoryPostController::class,'add_category_post']);
Route::post('/save-category-post',[CategoryPostController::class,'save_category_post']);
Route::post('/update-category-post/{cate_post_id}',[CategoryPostController::class,'update_category_post']);
Route::get('/edit-category-post/{cate_post_id}',[CategoryPostController::class,'edit_category_post']);
Route::get('/delete-category-post/{cate_post_id}',[CategoryPostController::class,'delete_category_post']);
Route::get('/category_post/{cate_post_id}',[CategoryPostController::class,'category_post']);

//Bài viết
Route::get('/add-post',[PostController::class,'add_post']);
Route::post('/save-post',[PostController::class,'save_post']);
Route::get('/all-post',[PostController::class,'all_post']);
Route::get('/delete-post/{post_id}',[PostController::class,'delete_post']);
Route::get('/edit-post/{post_id}',[PostController::class,'edit_post']);
Route::post('/update-post/{post_id}',[PostController::class,'update_post']);
Route::get('/category-post/{post_id}',[PostController::class,'category_post']);
Route::get('/post/{post_id}',[PostController::class,'post']);

//Thư viện ảnh
Route::get('/add-gallery/{product_id}',[GalleryController::class,'add_gallery']);
Route::post('/select-gallery',[GalleryController::class,'select_gallery']);
Route::post('/insert-gallery/{pro_id}',[GalleryController::class,'insert_gallery']);
Route::post('/update-gallery-name',[GalleryController::class,'update_gallery_name']);
Route::post('/delete-gallery',[GalleryController::class,'delete_gallery']);
Route::post('/update-gallery',[GalleryController::class,'update_gallery']);

//
Route::post('/filter-by-date',[AdminController::class,'filter_by_date']);
Route::post('/days-order',[AdminController::class,'days_order']);
Route::post('/dashboard-filter',[AdminController::class,'dashboard_filter']);

//Quen mat khau
Route::get('/forget-password',[UserController::class,'forget_password']);
Route::post('/recover-password',[UserController::class,'recover_password']);
Route::get('/update-new-password',[UserController::class,'update_new_password']);
Route::post('/reset-new-password',[UserController::class,'reset_new_password']);

//CHatbott
// Route::get('/', function () {
//     return view('chat');
// });
    
// Route::match(['get', 'post'], '/botman', [BotmanController::class,'botman']);
    
// Route::match(['get', 'post'], '/botman', [BotManController::class,'handle']); 
// Route::get('/botman/tinker', [BotManController::class,'tinker']);
// Route::get('/', function () {
//     return view('welcome');
// });

Route::match(['get', 'post'], '/botman', [BotmanController::class,'handle']);
Route::get('/botman/tinker', [BotmanController::class,'tinker']);
// Route::get('/chatbot',[BotManController::class,'chatbot']);

//wishlisttttttttttttttt
// Route::resource('/wishlist', 'WishlistController', ['except' => ['create', 'edit', 'show', 'update']]);
Route::get('/show-wishlist',[WishlistController::class,'show_wishlist']);





