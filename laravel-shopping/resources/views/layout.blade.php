<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" type="text/css">
	<link href="{{asset('frontend/css/sweetalert.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('frontend/css/login-register.css')}}" type="text/css">
	
	<link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/lightgallery.min.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/lightslider.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/prettify.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/login-form.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/slicknav.min.css')}}" rel="stylesheet">
	

</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> xyzshop@gmail.com</li>
                                <li>Nhi???t t??nh, gi?? t???t, t???n t??m</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
								<?php
								 	$customer_id = Session::get('customer_id');
								 	if($customer_id!=NULL){
								?>
									<style>
										/* Style The Dropdown Button */
										.dropbtn {
										background-color: #f5f5f5;
										color: black;
										
										font-size: 16px;
										border: none;
										cursor: pointer;
										}

										/* The container <div> - needed to position the dropdown content */
										.dropdown {
										position: relative;
										display: inline-block;
										}

										/* Dropdown Content (Hidden by Default) */
										.dropdown-content {
										display: none;
										position: absolute;
										background-color: #f5f5f5;
										min-width: 160px;
										box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
										z-index: 1;
										}

										/* Links inside the dropdown */
										.dropdown-content a {
										color: black;
										padding: 12px 16px;
										text-decoration: none;
										display: block;
										text-align: left;
										}

										/* Change color of dropdown links on hover */
										.dropdown-content a:hover {background-color: #f5f5f5}

										/* Show the dropdown menu on hover */
										.dropdown:hover .dropdown-content {
										display: block;
										}

										/* Change the background color of the dropdown button when the dropdown content is shown */
										.dropdown:hover .dropbtn {
										background-color: ;
										}
									</style>
									
									<div class="dropdown">
										<button class="dropbtn"><i class="fa fa-user"></i> XXXX</button>
										<div class="dropdown-content">
											<a href="#">Th??ng tin c?? nh??n</a>
											<a href="#">L???ch s??? mua h??ng</a>
											<a href="{{URL('/logout-checkout')}}"></i> ????ng xu???t</a>
										</div>
									</div>
									<!-- <a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-user"></i> ????ng xu???t</a> -->
								<?php
									}else{
								?>
									<a href="javascript:void(0)" onclick="openLoginModal();"><i class="fa fa-user"></i> ????ng nh???p</a>	
								<?php
									}
								?>	
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>			
								<!-- Modal HTMLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL -->
								<!-- <div id="myModal" class="modal fade">
									<div class="modal-dialog modal-login">
										<div class="modal-content">
											<div class="modal-header">				
												<h4 class="modal-title">????ng nh???p</h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											</div>
											<div class="modal-body">
												<form id="customer_login_form" action="{{URL('/login-customer')}}">
												{{csrf_field()}}
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-user"></i></span>
															<input type="text" class="form-control" name="email_account" placeholder="T??i kho???n" required="required">
														</div>
													</div>
													<div class="form-group">
														<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-lock"></i></span>
															<input type="password" class="form-control" name="password_account" placeholder="Password" required="required">
														</div>
													</div>
													<span>
														<input type="checkbox" class="checkbox">
														Ghi nh??? ????ng nh???p
													</span>
													<div class="form-group">
														<button type="submit" class="btn btn-primary btn-block btn-lg">????ng nh???p</button>
													</div>
													<p class="hint-text"><a href="{{url('/forget-password')}}">Qu??n m???t kh???u</a></p>
												</form>
											</div>
											<div class="modal-footer">Ch??a c?? t??i kho???n? <a href="#dang-ky" class="trigger-btn" data-toggle="modal">T???o t??i kho???n</a></div>
										</div>
									</div>
								</div>     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
		        <!--------------------------------FORM DANG KYYYYYYYYYYYYYYYYYYYYYYYYYYY----------------------------------------------->                     
		<!-- <div id="dang-ky" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">				
                        <h4 class="modal-title">????ng k??</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="ccustomer_registion_form" action="{{URL('/add-customer')}}">
                        {{csrf_field()}}
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" name="customer_email" placeholder="T??i kho???n" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" name="customer_name" placeholder="Password" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" name="customer_phone" placeholder="Password" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" name="customer_password" placeholder="Password" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">????ng k??</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">???? c?? t??i kho???n ? <a href="#myModal">????ng nh???p n??o</a></div>
                </div>
            </div>
        </div>   -->
		<!--------------------------------FORM DANG KYYYYYYYYYYYYYYYYYYYYYYYYYYY-----------------------------------------------> 
	<div class="modal fade login" id="loginModal">
		      <div class="modal-dialog login animated">
    		      <div class="modal-content">
    		         <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                             <div class="content">
                                <!-- <div class="social">
                                    <a class="circle github" href="#">
                                        <i class="fa fa-github fa-fw"></i>
                                    </a>
                                    <a id="google_login" class="circle google" href="#">
                                        <i class="fa fa-google-plus fa-fw"></i>
                                    </a>
                                    <a id="facebook_login" class="circle facebook" href="#">
                                        <i class="fa fa-facebook fa-fw"></i>
                                    </a>
                                </div> -->
                                <div class="division">
                                    <div class="line l"></div>
                                      <span>????ng nh???p</span>
                                    <div class="line r"></div>
                                </div>
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form id="customer_login_form" action="{{URL('/login-customer')}}" accept-charset="UTF-8">
                                    @csrf
                                        <input id="email" name="email_account" class="form-control" type="text" placeholder="Email">
                                        <input id="password" class="form-control" type="password" placeholder="Password" name="password_account">
                                        <input class="btn btn-default btn-login" type="submit" value="Login">
                                        <p class="hint-text"><a href="{{url('/forget-password')}}">Qu??n m???t kh???u</a></p>
                                    </form>
                                </div>
                             </div>
                        </div>
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form method="" id="ccustomer_registion_form" action="{{URL('/add-customer')}}" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
                                    <input id="email" class="form-control" type="text" placeholder="Email" name="customer_email">
                                    <input id="name" class="form-control" type="text" placeholder="Password" name="customer_name">
                                    <input id="phone" class="form-control" type="text" placeholder="Phone" name="customer_phone">
                                    <input id="password" class="form-control" type="password" placeholder="Password" name="customer_password">
                                    <input class="btn btn-default btn-register" type="button" value="Create account" name="commit">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>Ch??a c?? t??i kho???n
                                 <a href="javascript: showRegisterForm();">T???o ngay n??o</a>
                            ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>B???n ???? c?? t??i kho???n?</span>
                             <a href="javascript: showLoginForm();">????ng nh???p th??i</a>
                        </div>
                    </div>
    		      </div>
		      </div>
		  </div>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
        openLoginModal();
    });
</script>

        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{URL('/')}}">Trang ch???</a></li>
                            <li><a href="./shop-grid.html">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Tin t???c</a>
                                <ul class="header__menu__dropdown">
									@foreach($category_post as $key => $cate_post)
									<li><a href="{{url('/category_post/'.$cate_post->cate_post_id)}}">{{$cate_post->cate_post_name}}</a></li>
									@endforeach
                                </ul>
                            </li>
                           
                            <li><a href="./contact.html">Li??n h???</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                            <!-- <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i> <span> -->
							
								
										<!-- <li><a href="{{URL('/gio-hang')}}"><i class="fa fa-shopping-cart"></i><span>{{Cart::count()}}</span></a></li> -->
								
							<?php
                                $count = count((array)Session::get('cart'));
                                $link = url('/gio-hang');
                                echo '<li><a href="'.$link.'"><i class="fa fa-shopping-cart"></i><span>'.$count.'</span></a></li>';
                            ?> 
                        </ul>
                        <!-- <div class="header__cart__price">item: <span>$150.00</span></div> -->
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
	<section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            
                            <span>Danh m???c s???n ph???m</span>
                        </div>
                        <ul>
                            @foreach($category as $key => $cate)
                            <li><a href="{{URL('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="hero__categories" style="margin-top:50px">
                        <div class="hero__categories__all">
                            
                            <span>Th????ng hi???u s???n ph???m</span>
                        </div>
                        <ul>
                            @foreach($brand as $key => $brand)
                            <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
					<div class="hero__search__form">
                            <form action="{{url('/search')}}" method="post" style="display:flex;justify-content: space-between;">
                                @csrf
                                <input type="text" name="keyworks_submit" id="keywords" placeholder="T??m ki???m s???n ph???m">
                                <div id="search-ajax"></div>
                                <!-- <button type="submit" name="search_item" class="site-btn">T??m ki???m</button> -->
                                <!-- <input type="submit" name="search_item" class="site-btn" value="T??m ki???m"> -->
                                <input type="submit" name="search_item" class="btn btn-outline-success my-2 my-sm-0" value="T??m ki???m" 
							style="background:#7fad39;color: aliceblue; width:120px"/>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('frontend/js/mixitup.min.js')}}"></script>
	<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('backend/js/jquery.validate.min.js')}}"></script>
	<script src="{{asset('frontend/js/lightgallery-all.min.js')}}"></script>
	<script src="{{asset('frontend/js/lightslider.js')}}"></script>
	<script src="{{asset('frontend/js/prettify.js')}}"></script>
	<script src="{{asset('frontend/js/sweetalert.min.js')}}"></script>
	<script src="{{asset('frontend/js/login-register.js')}}"></script>
	<script>
	 $(document).ready(function() {
    $('#imageGallery').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        thumbItem:3,
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        }   
    });  
  });
	</script>
<!--///////////////////////////////////////////// -->
<script type="text/javascript">
	$(document).ready(function(){
		$('.add-to-cart').click(function(){
			var id = $(this).data('id_product');
			var cart_product_id = $('.cart_product_id_' + id).val();
			var cart_product_name = $('.cart_product_name_' + id).val();
			var cart_product_image = $('.cart_product_image_' + id).val();
			var cart_product_price = $('.cart_product_price_' + id).val();
			var cart_product_quantity = $('.cart_product_quantity_' + id).val();
			var cart_product_qty = $('.cart_product_qty_' + id).val();
			var _token = $('input[name="_token"]').val();
			if(parseInt(cart_product_qty) > parseInt(cart_product_quantity)){
				alert('S??? l?????ng h??ng c??n l???i' + cart_product_quantity);
			}else{
			$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: '{{url('/add-cart-ajax')}}',
				method: 'POST',
				data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,
					cart_product_quantity:cart_product_quantity,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
				success:function(){

					swal({
							title: "???? th??m s???n ph???m v??o gi??? h??ng",
							text: "B???n c?? th??? mua h??ng ti???p ho???c t???i gi??? h??ng ????? ti???n h??nh thanh to??n",
							showCancelButton: true,
							cancelButtonText: "Xem ti???p",
							confirmButtonClass: "btn-success",
							confirmButtonText: "??i ?????n gi??? h??ng",
							closeOnConfirm: false
						},
						function() {
							window.location.href = "{{url('/gio-hang')}}";
						});

					}

				});
			}
		});
	});
</script>
<!--------------------------------------------------------->
<!--Send Orderrrrrrrrrrrrrrrrrrrr--------->
<!-- <script>
$(document).ready(function(){
	$('.send_order').click(function(){
			swal({
				title: "X??c nh???n ?????t h??ng?",
				text: "????n h??ng",
				type: "success",
				showCancelButton: true,
				confirmButtonClass: "btn-success",
				confirmButtonText: "?????t h??ng",
				cancelButtonText: "Ch??a mua v???i",
				closeOnConfirm: false,
				closeOnCancel: false
				},
				function(isConfirm){
				if(isConfirm){
					var shipping_email = $('.shipping_email').val();
					var shipping_name = $('.shipping_name').val();
					var shipping_address = $('.shipping_address').val();
					var shipping_phone = $('.shipping_phone').val();
					var shipping_note = $('.shipping_note').val();
					var shipping_method = $('.payment_select').val();
					var order_fee = $('.order_fee').val();
					var order_coupon = $('.order_coupon').val();
					var _token = $('input[name="_token"]').val();
					$.ajax({
						url: '{{url('/confirm-order')}}',
						method: 'post',
						data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,
							shipping_phone:shipping_phone,shipping_note:shipping_note,order_fee:order_fee,order_coupon:order_coupon,
							shipping_method:shipping_method,_token:_token},
						success:function(){					
						swal("????n h??ng", "????n h??ng ???? ?????t th??nh c??ng", "success");
                    	
						}
					});
					window.setTimeout(function(){
						location.reload();
					}, 1000);
				}else{
					swal("????ng l???i", "?????t h??ng th???t b???i", "error");
			}
		});
	});
});
</script> -->
<!--Send Orderrrrrrrrrrrrrrrrrrrr--------->

<script>
$(document).ready(function(){
	$('.send_order').click(function(){
		var shipping_name = $('.shipping_name').val();
		var shipping_note = $('.shipping_note').val();
		var shipping_method = $('.payment_select').val();
		var order_fee = $('.order_fee').val();
		var order_coupon = $('.order_coupon').val();
		var _token = $('input[name="_token"]').val();
		$.ajax({
			url: '{{url('/confirm-order')}}',
			method: 'post',
			data:{shipping_name:shipping_name,
				shipping_note:shipping_note,order_fee:order_fee,order_coupon:order_coupon,
				shipping_method:shipping_method,_token:_token},
			success:function(){					
			alert('B???n ???? ?????t h??ng th??nh c??ng, vui l??ng ch??? nh???n h??ng');
			window.location.href = "{{'/tksfbuying'}}";
			}
		});
	});
});
</script>

<script>
$(document).ready(function(){
$('.choose').on('change',function(){
	var action = $(this).attr('id');
	var ma_id = $(this).val();
	var _token = $('input[name="_token"]').val();
	var result = '';
	if(action=='city'){
		result = 'province';
	}else{
		result = 'wards';
	}
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	$.ajax({
		url : '{{url('/select-delivery-home')}}',
		method: 'POST',
		data:{action:action,ma_id:ma_id,_token:_token},
		success:function(data){
			$('#'+result).html(data);     
			}
		});
	}); 
});
</script>

<script>
$(document).ready(function(){
	$('.caculate_delivery').click(function(){
		var matp = $('.city').val();
		var maqh = $('.province').val();
		var xaid = $('.wards').val();
		var _token = $('input[name="_token"]').val();
		if(matp == '' && maqh == '' && xaid == ''){
			alert('SAY HI');
		}else{
		$.ajax({
		url : '{{url('/caculate_fee')}}',
		method: 'POST',
		data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
		success:function(){
			     location.reload();
			}
		});
		}
	});
});
</script>



<script>
$('#keywords').keyup(function(){
	var query = $(this).val();
	if(query != ''){
		var _token = $('input[name="_token"]').val();
		$.ajax({
			url: '{{url('/autocomplete-ajax')}}',
			method: 'post',
			data:{query:query,_token:_token},
			success:function(data){
				$('#search_ajax').fadeIn();
				$('#search_ajax').html(data);
			}
		});
	}else{
		$('#search_ajax').fadeOut();
	}
});
$(document).on('click', '.li_search_ajax', function(){
	$('#keywords').val($(this).text());
	$('#search_ajax').fadeOut();
});
</script>	

<script>
	$('.xemnhanh').click(function(){
		var product_id = $(this).data('id_product');
		var _token = $('input[name="_token"]').val();
		$.ajax({
			url:'{{url('/quickview')}}',
			method:"POST",
			dataType:"JSON",
			data:{product_id:product_id,_token:_token},
			success:function(data){
				$('#product_quickview_title').html(data.product_name);
				$('#product_quickview_id').html(data.product_id);
				$('#product_quickview_price').html(data.product_price);
				$('#product_quickview_image').html(data.product_image);
				$('#product_quickview_gallery').html(data.product_gallery);
				$('#product_quickview_desc').html(data.product_desc);
				$('#product_quickview_content').html(data.product_content);
				$('#product_quickview_value').html(data.product_quickview_value);
				$('#product_quickview_button').html(data.product_button);
			}
		});
	});
</script>

<!-- Add to cart Quickview-->
<script type="text/javascript">
		$(document).on('click','.add-to-cart-quickview',function(){
			var id = $(this).data('id_product');
			var cart_product_id = $('.cart_product_id_' + id).val();
			var cart_product_name = $('.cart_product_name_' + id).val();
			var cart_product_image = $('.cart_product_image_' + id).val();
			var cart_product_price = $('.cart_product_price_' + id).val();
			var cart_product_quantity = $('.cart_product_quantity_' + id).val();
			var cart_product_qty = $('.cart_product_qty_' + id).val();
			var _token = $('input[name="_token"]').val();
			if(parseInt(cart_product_qty) > parseInt(cart_product_quantity)){
				alert('S??? l?????ng h??ng c??n l???i' + cart_product_quantity);
			}else{
			$.ajax({
				url: '{{url('/add-cart-ajax')}}',
				method: 'POST',
				data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,
					cart_product_quantity:cart_product_quantity,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
				beforeSend: function(){
					$('#beforesend_quickview').html("<p class='text text-primary'>??ang th??m s???n ph???m v??o gi??? h??ng</p>");
				},
				success:function(){
					$('#beforesend_quickview').html("<p class='text text-success'>S???n ph???m ???? th??m v??o gi??? h??ng</p>");
					
					}
				});
			}
		});
</script>

<script>
	$(document).ready(function(){
		load_comment();
		function load_comment(){
			var product_id = $('.comment_product_id').val();
			var _token = $('input[name="_token"]').val();
				$.ajax({
				url: '{{url('/load-comment')}}',
				method: 'post',
				data:{product_id:product_id,_token:_token},
				success:function(data){
					$('#comment_show').html(data);
				}
			});
		}
		$('.send-comment').click(function(){
			var product_id = $('.comment_product_id').val();
			var comment_name = $('.comment_name').val();
			var comment_content = $('.comment_content').val();
			var _token = $('input[name="_token"]').val();
			$.ajax({
				url: '{{url('/send-comment')}}',
				method: 'post',
				data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content,_token:_token},
				success:function(data){
					$('#notify_comment').html('<span class="text text-success">Th??m b??nh lu???n th??nh c??ng</span>');
					load_comment();
					$('#notify_comment').fadeOut(5000);
					$('.comment_name').val('');
					$('.comment_content').val('');
				}
			});
		})
	});
</script>

<script>
	function remove_background(product_id){
		for(var count = 1; count <= 5; count ++){
			$('#'+product_id+'-'+count).css('color','#ccc');
		}
	}
	$(document).on('mouseenter','.rating',function(){
		var index = $(this).data('index');
		var product_id = $(this).data('product_id');
		remove_background(product_id);
		for(var count = 1; count<=index; count++){
			$('#'+product_id+'-'+count).css('color','#ffcc00');
		}
	});
	// Nh??? chu???t kh??ng ????nh gi??
	$(document).on('mouseleave','.rating',function(){
		var index = $(this).data('index');
		var product_id = $(this).data('product_id');
		var rating = $(this).data('rating');
		remove_background(product_id);
		for(var count = 1; count <= rating; count++){
			$('#'+product_id+'-'+count).css('color','#ffcc00');
		}
	});
	//Click ????nh gi?? sao
	$(document).on('click','.rating',function(){
		var index = $(this).data('index');
		var product_id = $(this).data('product_id');
		var _token = $('input[name="_token"]').val();
		$.ajax({
			url: '{{url('/insert-rating')}}',
			method: 'post',
			data:{index:index,product_id:product_id,_token:_token},
			success:function(data){
				if(data == 'done'){
					alert("B???n ???? ????nh gi?? "+index+" tr??n 5 sao");
				}else{
					alert("L???i ????nh gi??");
				}
			}
		});
	});
</script>

<!--S???n ph???m y??u th??chhhhhhhhhhhhhhhhhhhhhhhhh-->
<script>
	function view(){
		if(localStorage.getItem('data')!=null){
			var data = JSON.parse(localStorage.getItem('data'));
			data.reverse();
			document.getElementById('row_wishlist').style.overflow = 'scroll';
			document.getElementById('row_wishlist').style.height = '500px';
			for(i=0;i<data.length;i++){
				var name = data[i].name;
				var price = data[i].price;
				var image = data[i].image;
				var url = data[i].url;
				$('#row_wishlist').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img src="'+image+'" width="100%"></div><div class="col-md-8 info_wishlist"><p>'+name+'</p><p style="color:#FE980F">'+price+'</p><a href="'+url+'">?????t h??ng</a></div></div>');
			}
		}
	}
	view();
	function add_wishlist(clicked_id){
		var id = clicked_id;
		var name = document.getElementById('wishlist_productname'+id).value;
		var price = document.getElementById('wishlist_productprice'+id).value;
		var image = document.getElementById('wishlist_productimage'+id).src;
		var url = document.getElementById('wishlist_producturl'+id).href;
		var newItem = {
			'url':url,
			'id':id,
			'name':name,
			'price':price,
			'image':image
		}
		if(localStorage.getItem('data')==null){
			localStorage.getItem('data','[]');
		}
		var old_data = JSON.parse(localStorage.getItem('data'));
		var matches = $.grep(old_data, function(obj){
			return obj.id == id;
		})
		if(matches.length){
			alert('S???n ph???m n??y ???? c?? m???c trong m???c y??u th??ch c???a b???n');
		}else{
			old_data.push(newItem);
			$('#row_wishlist').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img src="'+newItem.image+'" width="100%"></div><div class="col-md-8 info_wishlist"><p>'+newItem.name+'</p><p style="color:#FE980F">'+newItem.price+'</p><a href="'+newItem.url+'">?????t h??ng</a></div></div>');
		}
		localStorage.setItem('data', JSON.stringify(old_data));
	}
</script>

<!-- S???p x???p s???n ph???mmmmmmmmmmmmmmmmmmmmmmmm -->
<script>
$(document).ready(function(){
	$('#sort').on('change',function(){
		var url = $(this).val();
		if(url){
			window.location = url;
		}
		return false;
	});
});
</script>
<!-- L???c gi??aaaaaaaaaaaa -->
<script>
$(document).ready(function(){
	$( "#slider-range" ).slider({
      range: true,
      min: {{$min_price}},
      max: {{$max_price_range}},
	  steps:100000,
      values: [ {{$min_price}}, {{$max_price}} ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "VN??" + ui.values[ 0 ] + " - VN??" + ui.values[ 1 ] );
		$( "#start_price" ).val(ui.values[ 0 ]);
		$( "#end_price" ).val(ui.values[ 1 ]);
      }
    });
    $( "#amount" ).val( "VN??" + $( "#slider-range" ).slider( "values", 0 ) +
      " - VN??" + $( "#slider-range" ).slider( "values", 1 ) );
});
</script>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" 
	src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="CEmkr2CB">
	</script>

</body>

</html>