<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop bán đồ công nghệ</title>

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
    <link rel="stylesheet" href="{{asset('frontend/css/login-register.css')}}" type="text/css">
    <link href="{{asset('frontend/css/sweetalert.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> -->
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
                                <li>Nhiệt tình, giá tốt, tận tâm</li>
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
                           
                            <div class="header__top__right__auth">
                                    <?php
								 	$customer_id = Session::get('customer_id');
								 	if($customer_id){
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
                                    <style>
                                        .dropdown-content a:hover{
                                            background-color: antiquewhite;
                                        }
                                    </style>
                                    <div class="dropdown">
                                        
										<button class="dropbtn"><i class="fa fa-user"></i> ABC</button>
                                        
										<div class="dropdown-content">
											<a href="#">Thông tin cá nhân</a>
											<a href="{{URL('/history-order')}}">Lịch sử mua hàng</a>
											<a href="{{URL::to('/logout-checkout')}}"></i> Đăng xuất</a>
										</div>
									</div>
									<!-- <a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-user"></i> Đăng xuất</a> -->
								<?php
									}else{
								?>
									<a href="javascript:void(0)" onclick="openLoginModal();"><i class="fa fa-user"></i> Đăng nhập</a>	
								<?php
									}
								?>			
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------FORM DANG NHAPPPPPPPPPPPPPPPPPPPPPPPPp----------------------------------------------->
        <!-- <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">				
                        <h4 class="modal-title">Đăng nhập</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="customer_login_form" action="{{URL('/login-customer')}}">
                        {{csrf_field()}}
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" name="email_account" placeholder="Tài khoản" required="required">
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
                                Ghi nhớ đăng nhập
                            </span>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">Đăng nhập</button>
                            </div>
                            <p class="hint-text"><a href="{{url('/forget-password')}}">Quên mật khẩu</a></p>
                        </form>
                    </div>
                    <div class="modal-footer">Chưa có tài khoản? <a href="#myModal2" class="trigger-btn" data-toggle="modal">Tạo tài khoản</a></div>
                </div>
            </div>
        </div>   -->
        <!--------------------------------FORM DANG NHAPPPPPPPPPPPPPPPPPPPPPPPPp----------------------------------------------->
        <!--------------------------------FORM DANG KYYYYYYYYYYYYYYYYYYYYYYYYYYY----------------------------------------------->                     
        <!-- <div id="myModal2" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">				
                        <h4 class="modal-title">Đăng ký</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="ccustomer_registion_form" action="{{URL('/add-customer')}}">
                        {{csrf_field()}}
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" name="customer_email" placeholder="Tài khoản" required="required">
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
                                <button type="submit" class="btn btn-primary btn-block btn-lg">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">Đã có tài khoản ? <a href="#myModal" class="trigger-btn" data-toggle="modal">Đăng nhập nào</a></div>
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
                                      <span>Đăng nhập</span>
                                    <div class="line r"></div>
                                </div>
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form id="customer_login_form" action="{{URL('/login-customer')}}" accept-charset="UTF-8">
                                    @csrf
                                        <input name="email_account" class="form-control" type="text" placeholder="Email">
                                        <input class="form-control" type="password" placeholder="Password" name="password_account">
                                        <input class="btn btn-default btn-login" type="submit" value="Đăng nhập">
                                        <p class="hint-text"><a href="{{url('/forget-password')}}">Quên mật khẩu</a></p>
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
                                    <input class="btn btn-default btn-register" type="button" value="Tạo tài khoản" name="commit">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>Chưa có tài khoản
                                 <a href="javascript: showRegisterForm();">Tạo ngay nào</a>
                            ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>Bạn đã có tài khoản?</span>
                             <a href="javascript: showLoginForm();">Đăng nhập thôi</a>
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
                            <li class="active"><a href="{{url('/')}}">Trang chủ</a></li>
                            <li><a href="{{url('/tat-ca-san-pham')}}">Sản phẩm</a></li>
                            <!-- <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> -->
                            <li><a href="#">Tin tức</a>
                                <ul class="header__menu__dropdown">
                                @foreach($category_post as $key => $cate_post)
                                <li><a href="{{url('/category_post/'.$cate_post->cate_post_id)}}">{{$cate_post->cate_post_name}}</a></li>
                                @endforeach
                                </ul>
                            </li>
                           
                            <li><a href="{{url('/lien-he')}}">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            
                            <li><a href="{{url('/show-wishlist')}}"><i class="fa fa-heart"></i></a></li>
                            <!-- <li><a href="{{url('/gio-hang')}}"><i class="fa fa-shopping-cart"></i><span> -->
                            <?php
                                $count = count((array)Session::get('cart'));
                                $link = url('/gio-hang');
                                echo '<li><a href="'.$link.'"><i class="fa fa-shopping-cart"></i><span>'.$count.'</span></a></li>';
                            ?>          
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            
                            <span>Danh mục sản phẩm</span>
                        </div>
                        <ul>
                            @foreach($category as $key => $cate)
                            <li><a href="{{URL('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="hero__categories" style="margin-top:50px">
                        <div class="hero__categories__all">
                            
                            <span>Thương hiệu sản phẩm</span>
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
                                <input type="text" name="keyworks_submit" id="keywords" placeholder="Tìm kiếm sản phẩm">
                                <div id="search-ajax"></div>
                                <!-- <button type="submit" name="search_item" class="site-btn">Tìm kiếm</button> -->
                                <!-- <input type="submit" name="search_item" class="site-btn" value="Tìm kiếm"> -->
                                <input type="submit" name="search_item" class="btn btn-outline-success my-2 my-sm-0" value="Tìm kiếm" 
							style="background:#7fad39;color: aliceblue; width:120px"/>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0123456789</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            
                            <!--Sliderrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr-->
                            <div id="slider-carousel" class="carousel-slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#slider-carousel" data-slide-to="1"></li>
                                    <li data-target="#slider-carousel" data-slide-to="2"></li>
                                </ol>
                                
                                <div class="carousel-inner">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($slider as $key => $slide)
                                        @php
                                            $i++;
                                        @endphp
                                    <div class="item {{$i==1 ? 'active' : ''}}">
                                        <div class="col-sm-12">
                                            <img alt="{{$slide->slider_desc}}" src="uploads/slider/{{$slide->slider_image}}" width="100%" height="500px" class=" girl img-responsive">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                                    <i class="fa fa-angle-right"></i>
                                </a> -->
                            </div>
                            <!--Sliderrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <!-- Categories Section End -->
<!-- <style>
    h2 {
        color: #000;
        font-size: 26px;
        text-align: center;
        position: relative;
        margin: 30px 0 80px;
    }
    h2 b {
        color: #ffc000;
    }
    h2::after {
        content: "";
        width: 100px;
        position: absolute;
        margin: 0 auto;
        height: 4px;
        background: rgba(35, 153, 14, 0.2);
        left: 0;
        right: 0;
        bottom: -20px;
    }
    .carousel {
        margin: 50px auto;
    }
    .carousel .item {
        min-height: 330px;
        text-align: center;
        overflow: hidden;
    }
    .carousel .item .img-box {
        height: 160px;
        width: 100%;
        position: relative;
    }
    .carousel .item img {	
        max-width: 100%;
        max-height: 100%;
        display: inline-block;
        position: absolute;
        bottom: 0;
        margin: 0 auto;
        left: 0;
        right: 0;
    }
    .carousel .item h4 {
        font-size: 18px;
        margin: 10px 0;
        height: 25px;
    }
    .carousel .item .btn {
        color: #333;
        border-radius: 0;
        font-size: 14px;
        /* text-transform: uppercase;
        font-weight: bold; */
        background: none;
        border: 1px solid #ccc;
        padding: 5px 10px;
        margin-top: 5px;
        line-height: 16px;
    }
    .carousel .item .btn:hover, .carousel .item .btn:focus {
        color: #fff;
        background: #000;
        border-color: #000;
        box-shadow: none;
    }
    .carousel .item .btn i {
        font-size: 14px;
        font-weight: bold;
        margin-left: 5px;
    }
    .carousel .thumb-wrapper {
        text-align: center;
    }
    .carousel .thumb-content {
        padding: 15px;
    }
    .carousel .carousel-control {
        height: 100px;
        width: 40px;
        background: none;
        margin: auto 0;
        background: rgba(0, 0, 0, 0.2);
    }
    .carousel .carousel-control i {
        font-size: 30px;
        position: absolute;
        top: 50%;
        display: inline-block;
        margin: -16px 0 0 0;
        z-index: 5;
        left: 0;
        right: 0;
        color: rgba(0, 0, 0, 0.8);
        text-shadow: none;
        font-weight: bold;
    }
    .carousel .item-price {
        font-size: 18px;
        padding: 2px 0;
    }
    /* .carousel .item-price strike {
        color: #999;
        margin-right: 5px;
    } */
    .carousel .item-price span {
        color: #86bd57;
        font-size: 110%;
    }
    .carousel .carousel-control.left i {
        margin-left: -3px;
    }
    .carousel .carousel-control.left i {
        margin-right: -3px;
    }
    .carousel .carousel-indicators {
        bottom: -50px;
    }
    .carousel-indicators li, .carousel-indicators li.active {
        width: 10px;
        height: 10px;
        margin: 4px;
        border-radius: 50%;
        border-color: transparent;
    }
    .carousel-indicators li {	
        background: rgba(0, 0, 0, 0.2);
    }
    .carousel-indicators li.active {	
        background: rgba(0, 0, 0, 0.6);
    }
    .star-rating li {
        padding: 0;
    }
    .star-rating i {
        font-size: 25px;
        color: black;
    }
</style>
<style>
        .col-item
    {
        border: 1px solid #E1E1E1;
        border-radius: 5px;
        background: #FFF;
    }
    .col-item .photo img
    {
        margin: 0 auto;
        width: 100%;
        height: 150px;
    }

    .col-item .info
    {
        padding: 10px;
        border-radius: 0 0 5px 5px;
        margin-top: 1px;
    }

    /* .col-item:hover .info {
        background-color: #F5F5DC;
    } */
    .col-item .price
    {
        /*width: 50%;*/
        float: left;
        margin-top: 5px;
    }

    .col-item .price h5
    {
        line-height: 20px;
        margin: 0;
    }

    .price-text-color
    {
        color: #219FD1;
    }

    .col-item .info .rating
    {
        color: #777;
    }

    .col-item .rating
    {
        /*width: 50%;*/
        float: left;
        font-size: 17px;
        text-align: right;
        line-height: 52px;
        margin-bottom: 10px;
        height: 52px;
    }

    .col-item .separator
    {
        border-top: 1px solid #E1E1E1;
    }

    .clear-left
    {
        clear: left;
    }

    .col-item .separator p
    {
        line-height: 20px;
        margin-bottom: 0;
        margin-top: 10px;
        text-align: center;
    }

    .col-item .separator p i
    {
        margin-right: 5px;
    }
    .col-item .btn-add
    {
        width: 50%;
        float: left;
    }

    .col-item .btn-details
    {
        width: 50%;
        float: left;
        padding-left: 10px;
    }
    .controls
    {
        margin-top: 20px;
    }
        [data-slide="prev"]
    {
        margin-right: 10px;
    }
</style> -->
<style>
    @import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
    .col-item
    {
        border: 1px solid #E1E1E1;
        border-radius: 5px;
        background: #FFF;
    }
    .col-item .photo img
    {
        margin: 0 auto;
        width: 100%;
    }

    .col-item .info
    {
        padding: 10px;
        border-radius: 0 0 5px 5px;
        margin-top: 1px;
    }
    /* 
    .col-item:hover .info {
        background-color: #F5F5DC;
    } */
    .col-item .price
    {
        /*width: 50%;*/
        float: left;
        margin-top: 5px;
    }

    .col-item .price h5
    {
        line-height: 20px;
        margin: 0;
    }

    .price-text-color
    {
        color: red;
    }

    .col-item .info .rating
    {
        color: #777;
    }

    .col-item .rating
    {
        /*width: 50%;*/
        float: left;
        font-size: 17px;
        text-align: right;
        line-height: 52px;
        margin-bottom: 10px;
        height: 52px;
    }

    .col-item .separator
    {
        border-top: 1px solid #E1E1E1;
    }

    .clear-left
    {
        clear: left;
    }

    .col-item .separator p
    {
        line-height: 20px;
        margin-bottom: 0;
        margin-top: 10px;
        text-align: center;
    }

    .col-item .separator p i
    {
        margin-right: 5px;
    }
    .col-item .btn-add
    {
        width: 50%;
        float: left;
    }

    .col-item .btn-add
    {
        border-right: 1px solid #E1E1E1;
    }

    .col-item .btn-details
    {
        width: 50%;
        float: left;
        padding-left: 10px;
    }
    .controls
    {
        margin-top: 20px;
    }
</style>

<!--San pham moiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii-->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-9">
                    <h3>Sản phẩm mới</h3>
                </div>
                <div class="col-md-3">
                    <!-- Controls -->
                    <div class="controls pull-right hidden-xs">
                        <a class="left fa fa-chevron-left btn btn-primary" href="#carousel-example-generic"
                            data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-primary" href="#carousel-example-generic"
                                data-slide="next"></a>
                    </div>
                </div>
            </div>
            <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                        @foreach($product as $pro)
                        @if($loop->first)
                    <div class="item active">
                            @else
                        <div class="item">
                            @endif
                        <div class="row">
                            @foreach($pro as $singlepro)
                        <div class="col-sm-3">
                                <a id="wishlist_producturl{{$singlepro->product_id}}"  href="{{url::to('/chi-tiet-san-pham/'.$singlepro->product_id)}}">
                                    <form>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" class="cart_product_id_{{$singlepro->product_id}}" value="{{$singlepro->product_id}}">
                                    <input type="hidden" id="wishlist_productname{{$singlepro->product_id}}" class="cart_product_name_{{$singlepro->product_id}}" value="{{$singlepro->product_name}}">
                                    <input type="hidden" class="cart_product_image_{{$singlepro->product_id}}" value="{{$singlepro->product_image}}">
                                    <input type="hidden" id="wishlist_productprice{{$singlepro->product_id}}" class="cart_product_price_{{$singlepro->product_id}}" value="{{$singlepro->product_price}}">
                                    <input type="hidden" class="cart_product_quantity_{{$singlepro->product_id}}" value="{{$singlepro->product_quantity}}">
                                    <input type="hidden" class="cart_product_qty_{{$singlepro->product_id}}" value="1">
                                    </form>
                                <div class="col-item">
                                    <div class="photo">
                                        <img id="wishlist_productimage{{$singlepro->product_id}}" src="{{URL::to('uploads/product/'.$singlepro->product_image)}}" style="height: 170px;" class="img-responsive" alt="a" />
                                    </div>
                                    <div class="info">
                                    <div class="row">
                                            <div class="price col-md-12" style="text-align:center; height: 95px;">
                                                <h5 style="height: 70px;">{{$singlepro->product_name}}</h5>
                                                <h5 class="price-text-color" >{{number_format($singlepro->product_price).' '.'VNĐ'}}</h5>
                                                
                                            </div>
                                        </div>
                                        </a>
                                        <div class="separator clear-left">
                                            
                                            
                                            <button style="width:108px" type="button" class="btn btn-default add-to-cart" name="add-to-cart" data-id_product="{{$singlepro->product_id}}">
                                            Thêm giỏ hàng</button>
                                            <button class="btn btn-default button_wishlist" id="{{$singlepro->product_id}}"
                                            onclick="add_wishlist(this.id);"><i class="fa fa-heart" style="color:red"></i></button>
                                            
                                            <button type="button" data-toggle="modal" data-target="#xemnhanh" value="Xem nhanh"
                                            class="btn btn-default xemnhanh" data-id_product="{{$singlepro->product_id}}" 
                                            data-id_product="{{$singlepro->product_id}}" name="">Xem nhanh</button>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!------------------------------------->

<section class="featured spad" style="padding-top: 15px;">
    <div class="container">
        <hr style ="border:solid 3px;border-radius:5px">
        <div class="row">
            <div class="row">
                <div class="col-md-9">
                    <!-- <h3>Thương hiệu Sony</h3> -->
                    <img src="{{asset('uploads/gallery/Symbol-Sony.jpg')}}" style="width:350px; height:100px; 
                    border-radius:10px; margin-bottom:20px; margin-left:400px" alt="">
                </div>
            </div>
            <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                        @foreach($brand_sony as $br_sony)
                        @if($loop->first)
                    <div class="item active">
                            @else
                        <div class="item">
                            @endif
                        <div class="row">
                            @foreach($br_sony as $sony)
                            <div class="col-sm-3">
                                <a id="wishlist_producturl{{$sony->product_id}}" href="{{url::to('/chi-tiet-san-pham/'.$sony->product_id)}}">
                                    <form>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" class="cart_product_id_{{$sony->product_id}}" value="{{$sony->product_id}}">
                                    <input type="hidden" id="wishlist_productname{{$sony->product_id}}" class="cart_product_name_{{$sony->product_id}}" value="{{$sony->product_name}}">
                                    <input type="hidden" class="cart_product_image_{{$sony->product_id}}" value="{{$sony->product_image}}">
                                    <input type="hidden" id="wishlist_productprice{{$sony->product_id}}" class="cart_product_price_{{$sony->product_id}}" value="{{$sony->product_price}}">
                                    <input type="hidden" class="cart_product_quantity_{{$sony->product_id}}" value="{{$sony->product_quantity}}">
                                    <input type="hidden" class="cart_product_qty_{{$sony->product_id}}" value="1">
                                    </form>
                                <div class="col-item">
                                    <div class="photo">
                                        <img id="wishlist_productimage{{$sony->product_id}}" src="{{URL::to('uploads/product/'.$sony->product_image)}}" style="height: 170px;" class="img-responsive" alt="a" />
                                    </div>
                                    <div class="info">
                                    <div class="row">
                                            <div class="price col-md-12" style="text-align:center; height: 100px;">
                                                <h5 style="height: 70px;">{{$sony->product_name}}</h5>
                                                <h5 class="price-text-color" >{{number_format($sony->product_price).' '.'VNĐ'}}</h5>
                                            </div>
                                        </div>
                                        </a>
                                        <div class="separator clear-left">
                                            
                                            <button style="width:108px" type="button" class="btn btn-default add-to-cart" name="add-to-cart" data-id_product="{{$sony->product_id}}">
                                            Thêm giỏ hàng</button>
                                            
                                            <button class="btn btn-default button_wishlist" id="{{$sony->product_id}}"
                                            onclick="add_wishlist(this.id);"><i class="fa fa-heart" style="color:red"></i></button>
                                            <button type="button" data-toggle="modal" data-target="#xemnhanh" value="Xem nhanh"
                                            class="btn btn-default xemnhanh" data-id_product="{{$sony->product_id}}" 
                                            data-id_product="{{$sony->product_id}}" name="">Xem nhanh</button>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="featured spad" style="padding-top: 15px;">
    <div class="container">
    <hr style ="border:solid 3px;border-radius:5px">
        <div class="row">
            <div class="row">
                <div class="col-md-9">
                    <!-- <h3>
                        Thương hiệu Microsoft</h3> -->
                        <img src="{{asset('uploads/gallery/microsoft-logo-1.png')}}" style="width:350px; height:120px; 
                    border-radius:10px; margin-bottom:20px; margin-left:400px" alt="">
                </div>
                <!-- <div class="col-md-3">
                    <div class="controls pull-right hidden-xs">
                        <a class="left fa fa-chevron-left btn btn-primary" href="#carousel-example-generic"
                            data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-primary" href="#carousel-example-generic"
                                data-slide="next"></a>
                    </div>
                </div> -->
            </div>
            <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                        @foreach($brand_microsoft as $br_microsoft)
                        @if($loop->first)
                    <div class="item active">
                            @else
                        <div class="item">
                            @endif
                        <div class="row">
                            @foreach($br_microsoft as $microsoft)
                            <div class="col-sm-3">
                                <a id="wishlist_producturl{{$microsoft->product_id}}" href="{{url::to('/chi-tiet-san-pham/'.$microsoft->product_id)}}">
                                    <form>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" class="cart_product_id_{{$microsoft->product_id}}" value="{{$microsoft->product_id}}">
                                    <input type="hidden" id="wishlist_productname{{$microsoft->product_id}}" class="cart_product_name_{{$microsoft->product_id}}" value="{{$microsoft->product_name}}">
                                    <input type="hidden" class="cart_product_image_{{$microsoft->product_id}}" value="{{$microsoft->product_image}}">
                                    <input type="hidden" id="wishlist_productprice{{$microsoft->product_id}}" class="cart_product_price_{{$microsoft->product_id}}" value="{{$microsoft->product_price}}">
                                    <input type="hidden" class="cart_product_quantity_{{$microsoft->product_id}}" value="{{$microsoft->product_quantity}}">
                                    <input type="hidden" class="cart_product_qty_{{$microsoft->product_id}}" value="1">
                                    </form>
                                <div class="col-item">
                                    <div class="photo">
                                        <img id="wishlist_productimage{{$microsoft->product_id}}" src="{{URL::to('uploads/product/'.$microsoft->product_image)}}" style="height: 170px;" class="img-responsive" alt="a" />
                                    </div>
                                    <div class="info">
                                    <div class="row">
                                            <div class="price col-md-12" style="text-align:center; height: 95px;">
                                                <h5 style="height: 70px;">{{$microsoft->product_name}}</h5>
                                                <h5 class="price-text-color" >{{number_format($microsoft->product_price).' '.'VNĐ'}}</h5>
                                            </div>
                                        </div>
                                        </a>
                                        <div class="separator clear-left">
                                            
                                            <button style="width:108px" type="button" class="btn btn-default add-to-cart" name="add-to-cart" data-id_product="{{$microsoft->product_id}}">
                                            Thêm giỏ hàng</button>
                                            <button class="btn btn-default button_wishlist" id="{{$microsoft->product_id}}"
                                            onclick="add_wishlist(this.id);"><i class="fa fa-heart" style="color:red"></i></button>
                                            <button type="button" data-toggle="modal" data-target="#xemnhanh" value="Xem nhanh"
                                            class="btn btn-default xemnhanh" data-id_product="{{$microsoft->product_id}}" 
                                            data-id_product="{{$microsoft->product_id}}" name="">Xem nhanh</button>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="featured spad" style="padding-top: 15px;">
    <div class="container">
    <hr style ="border:solid 3px;border-radius:5px">
        <div class="row">
            <div class="row">
                <div class="col-md-9">
                        <img src="{{asset('uploads/gallery/apple.png')}}" style="width:350px; height:100px; 
                    border-radius:10px; margin-bottom:20px; margin-left:400px" alt="">
                </div>
            </div>
            <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                        @foreach($brand_apple as $br_apple)
                        @if($loop->first)
                    <div class="item active">
                            @else
                        <div class="item">
                            @endif
                        <div class="row">
                            @foreach($br_apple as $apple)
                            <div class="col-sm-3">
                                <a id="wishlist_producturl{{$apple->product_id}}" href="{{url::to('/chi-tiet-san-pham/'.$apple->product_id)}}">
                                    <form>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" class="cart_product_id_{{$apple->product_id}}" value="{{$apple->product_id}}">
                                    <input type="hidden" id="wishlist_productname{{$apple->product_id}}" class="cart_product_name_{{$apple->product_id}}" value="{{$apple->product_name}}">
                                    <input type="hidden" class="cart_product_image_{{$apple->product_id}}" value="{{$apple->product_image}}">
                                    <input type="hidden" id="wishlist_productprice{{$apple->product_id}}" class="cart_product_price_{{$apple->product_id}}" value="{{$apple->product_price}}">
                                    <input type="hidden" class="cart_product_quantity_{{$apple->product_id}}" value="{{$apple->product_quantity}}">
                                    <input type="hidden" class="cart_product_qty_{{$apple->product_id}}" value="1">
                                    </form>
                                <div class="col-item">
                                    <div class="photo">
                                        <img id="wishlist_productimage{{$apple->product_id}}" src="{{URL::to('uploads/product/'.$apple->product_image)}}" style="height: 170px;" class="img-responsive" alt="a" />
                                    </div>
                                    <div class="info">
                                    <div class="row">
                                            <div class="price col-md-12" style="text-align:center; height: 95px;">
                                                <h5 style="height: 70px;">{{$apple->product_name}}</h5>
                                                <h5 class="price-text-color" >{{number_format($apple->product_price).' '.'VNĐ'}}</h5>
                                            </div>
                                        </div>
                                        </a>
                                        <div class="separator clear-left">
                                            
                                            <button style="width:108px" type="button" class="btn btn-default add-to-cart" name="add-to-cart" data-id_product="{{$apple->product_id}}">
                                            Thêm giỏ hàng</button>
                                            <button class="btn btn-default button_wishlist" id="{{$apple->product_id}}"
                                            onclick="add_wishlist(this.id);"><i class="fa fa-heart" style="color:red"></i></button>
                                            <button type="button" data-toggle="modal" data-target="#xemnhanh" value="Xem nhanh"
                                            class="btn btn-default xemnhanh" data-id_product="{{$apple->product_id}}" 
                                            data-id_product="{{$apple->product_id}}" name="">Xem nhanh</button>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="featured spad" style="padding-top: 15px;">
    <div class="container">
    <hr style ="border:solid 3px;border-radius:5px">
        <div class="row">
            <div class="row">
                <div class="col-md-9">
                <img src="{{asset('uploads/gallery/samsung.png')}}" style="width:350px; height:150px; 
                    border-radius:10px; margin-bottom:20px; margin-left:400px" alt="">
                </div>
            </div>
            <div id="carousel-example-generic" class="carousel slide hidden-xs" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                        @foreach($brand_samsung as $br_samsung)
                        @if($loop->first)
                    <div class="item active">
                            @else
                        <div class="item">
                            @endif
                        <div class="row">
                            @foreach($br_samsung as $samsung)
                            <div class="col-sm-3">
                                <a id="wishlist_producturl{{$samsung->product_id}}" href="{{url::to('/chi-tiet-san-pham/'.$samsung->product_id)}}">
                                    <form>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" class="cart_product_id_{{$samsung->product_id}}" value="{{$samsung->product_id}}">
                                    <input type="hidden" id="wishlist_productname{{$samsung->product_id}}" class="cart_product_name_{{$samsung->product_id}}" value="{{$samsung->product_name}}">
                                    <input type="hidden" class="cart_product_image_{{$samsung->product_id}}" value="{{$samsung->product_image}}">
                                    <input type="hidden" id="wishlist_productprice{{$samsung->product_id}}" class="cart_product_price_{{$samsung->product_id}}" value="{{$samsung->product_price}}">
                                    <input type="hidden" class="cart_product_quantity_{{$samsung->product_id}}" value="{{$samsung->product_quantity}}">
                                    <input type="hidden" class="cart_product_qty_{{$samsung->product_id}}" value="1">
                                    </form>
                                <div class="col-item">
                                    <div class="photo">
                                        <img id="wishlist_productimage{{$samsung->product_id}}" src="{{URL::to('uploads/product/'.$samsung->product_image)}}" style="height: 170px;" class="img-responsive" alt="a" />
                                    </div>
                                    <div class="info">
                                    <div class="row">
                                            <div class="price col-md-12" style="text-align:center; height: 95px;">
                                                <h5 style="height: 70px;">{{$samsung->product_name}}</h5>
                                                <h5 class="price-text-color" >{{number_format($samsung->product_price).' '.'VNĐ'}}</h5>
                                            </div>
                                        </div>
                                        </a>
                                        <div class="separator clear-left">
                                            
                                            <button style="width:108px" type="button" class="btn btn-default add-to-cart" name="add-to-cart" data-id_product="{{$samsung->product_id}}">
                                            Thêm giỏ hàng</button>
                                            <button class="btn btn-default button_wishlist" id="{{$samsung->product_id}}"
                                            onclick="add_wishlist(this.id);"><i class="fa fa-heart" style="color:red"></i></button>
                                            <button type="button" data-toggle="modal" data-target="#xemnhanh" value="Xem nhanh"
                                            class="btn btn-default xemnhanh" data-id_product="{{$samsung->product_id}}" 
                                            data-id_product="{{$samsung->product_id}}" name="">Xem nhanh</button>
                                        </div>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


<!--Xem nhanhhhhhhhhhhhhhhhhhhhhhhhhhhhhh-->
<div class="modal fade" id="xemnhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title product_quickview_title" id="exampleModalLabel">Xem nhanh sản phẩm</h5>
                <span id="product_quickview_title"></span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-5">
                    <span id="product_quickview_image"></span>
                    <span id="product_quickview_gallery"></span>
                </div>
                <form action="">
                @csrf
                <div id="product_quickview_value" style="font-size:25px"></div>
                <div class="col-md-7">
                    <h2><span id="product_quicview_title"></span></h2>
                    <p>Mã ID: <span id="product_quickview_id"></span></p>
                    <span>
                        <h4>Giá sản phẩm</h4><span id="product_quickview_price" style="color:red"></span></br>
                        <label>Số lượng</label>
                        <input type="number" name="qty" min="1" class="cart_product_qty_" value="1" />
                        <input type="hidden" name="product_hidden" value=""/>
                    </span></br>
                    <p class="quickview">Mô tả sản phẩm</p>
                    <fieldset>
                        <p><span style="width:100%" id="product_quickview_desc"></span></p>
                        <p><span style="width:100%" id="product_quickview_content"></span></p>
                        <div id="product_quickview_button"></div>
                        <div id="beforesend_quickview"></div>
                    </fieldset>
                </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary redirect-cart">Đi tới giỏ hàng</button>
        </div>
        </div>
    </div>
</div>
<!--Xem nhanhhhhhhhhhhhhhhhhhhhhhhhhhhhhh-->
    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Tin mới nhất</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($post as $post)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic" style="width:200px">
                            <img src="{{URL::to('uploads/posts/'.$post->post_image)}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">{{$post->post_title}}</a></h5>
                            <p>{!!$post->post_desc!!} </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

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
                            <li>Address: 123 Cộng Hòa. Phường 11, Quận X</li>
                            <li>Phone: +012 456.789</li>
                            <li>Email: xyzshop@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
						<h6>Các điều đơn giản</h6>
                        <ul>
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">Về cửa hàng</a></li>
                            <li><a href="#">Bảo mật</a></li>
                            <li><a href="#">Thông tin ship</a></li>
                            <li><a href="#">Điều khoản</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        
                        <p>Điền email để nhận nhiều ưu đãi</p>
                        <form action="#">
                            <input type="text" placeholder="Điền email của bạn">
                            <button type="submit" class="site-btn">Đăng ký</button>
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
                        <div class="footer__copyright__text"><p>
  							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights | -C-O-D-E-X <i class="fa fa-heart" aria-hidden="true"></i> bởi <a href="https://colorlib.com" target="_blank">Cresi Leyia</a></p></div>
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
	<!-- <script id="botmanWidget" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/chat.js'></script> -->
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    <script>
    var botmanWidget = {
        frameEndpoint: '/botman/tinker',
        title: 'CHAT BOT',
        introMessage: 'Chào bạn đến cửa hàng, ABC bot rất vui được giúp bạn',
        placeholderText: 'Nhập câu hỏi ...',
        
    };
    </script>
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
<script>
$(document).ready(function()
{
    if($('.bbb_viewed_slider').length)
    {
    var viewedSlider = $('.bbb_viewed_slider');

    viewedSlider.owlCarousel(
    {
    loop:true,
    margin:30,
    autoplay:true,
    autoplayTimeout:6000,
    nav:false,
    dots:false,
    responsive:
    {
    0:{items:1},
    575:{items:2},
    768:{items:3},
    991:{items:4},
    1199:{items:6}
    }
    });

    if($('.bbb_viewed_prev').length)
    {
    var prev = $('.bbb_viewed_prev');
    prev.on('click', function()
    {
    viewedSlider.trigger('prev.owl.carousel');
    });
    }

    if($('.bbb_viewed_next').length)
    {
    var next = $('.bbb_viewed_next');
    next.on('click', function()
    {
    viewedSlider.trigger('next.owl.carousel');
    });
    }
    }
});
</script>
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
            // alert(id);
            // alert(cart_product_id);
            // alert(cart_product_name);
            // alert(cart_product_image);
            // alert(cart_product_price);
            // alert(cart_product_quantity);
            // alert(cart_product_qty);

			if(parseInt(cart_product_qty) > parseInt(cart_product_quantity)){
				alert('Số lượng hàng còn lại' + cart_product_quantity);
			}else{
			$.ajax({
				url: '{{url('/add-cart-ajax')}}',
				method: 'POST',
				data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,
					cart_product_quantity:cart_product_quantity,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
				success:function(){

					swal({
							title: "Đã thêm sản phẩm vào giỏ hàng",
							text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
							showCancelButton: true,
							cancelButtonText: "Xem tiếp",
							confirmButtonClass: "btn-success",
							confirmButtonText: "Đi đến giỏ hàng",
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
$(document).ready(function(){
	$('.send_order').click(function(){
			swal({
				title: "Xác nhận đặt hàng?",
				text: "Đơn hàng AHI",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Cảm ơn đã đặt hàng",
				cancelButtonText: "Chưa mua",
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
					$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						url: '{{url('/confirm-order')}}',
						method: 'POST',
						data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,
							shipping_phone:shipping_phone,shipping_note:shipping_note,order_fee:order_fee,order_coupon:order_coupon,
							shipping_method:shipping_method,_token:_token},
						success:function(){					
					swal("Đơn hàng", "Đơn hàng đã đặt thành công", "success");
						}
					});
					window.setTimeout(function(){
						location.reload();
					}, 3000);
				}else{
					swal("Đóng lại", "Đặt hàng thất bại", "success");
			}
		});
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
				alert('Số lượng hàng còn lại' + cart_product_quantity);
			}else{
			$.ajax({
				url: '{{url('/add-cart-ajax')}}',
				method: 'POST',
				data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,
					cart_product_quantity:cart_product_quantity,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
				beforeSend: function(){
					$('#beforesend_quickview').html("<p class='text text-primary'>Đang thêm sản phẩm vào giỏ hàng</p>");
				},
				success:function(){
					$('#beforesend_quickview').html("<p class='text text-success'>Sản phẩm đã thêm vào giỏ hàng</p>");
					
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
					$('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công</span>');
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
	// Nhả chuột không đánh giá
	$(document).on('mouseleave','.rating',function(){
		var index = $(this).data('index');
		var product_id = $(this).data('product_id');
		var rating = $(this).data('rating');
		remove_background(product_id);
		for(var count = 1; count <= rating; count++){
			$('#'+product_id+'-'+count).css('color','#ffcc00');
		}
	});
	//Click đánh giá sao
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
					alert("Bạn đã đánh giá "+index+" trên 5 sao");
				}else{
					alert("Lỗi đánh giá");
				}
			}
		});
	});
</script>

<!--SẢn phẩm yêu thíchhhhhhhhhhhhhhhhhhhhhhhhh-->
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
				$('#row_wishlist').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img src="'+image+'" width="100%"></div><div class="col-md-8 info_wishlist"><p>'+name+'</p><p style="color:#FE980F">'+price+'</p><a href="'+url+'">Đặt hàng</a></div></div>');
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
        // alert(name);
        // alert(price);
        // alert(image);
        // alert(url);
		var newItem = {
			'url':url,
			'id':id,
			'name':name,
			'price':price,
			'image':image
		}
		if(localStorage.getItem('data')==null){
            localStorage.setItem('data','[]');
        }
		var old_data = JSON.parse(localStorage.getItem('data'));
		var matches = $.grep(old_data, function(obj){
            return obj.id == id;
		})
		if(matches.length){
            alert('Sản phẩm này đã có mục trong mục yêu thích của bạn');
		}else{
            old_data.push(newItem);
			$('#row_wishlist').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img src="'+newItem.image+'" width="100px" height="100px"></div><div class="col-md-8 info_wishlist"><p>'+newItem.name+'</p><p style="color:#FE980F">'+newItem.price+'</p><a href="'+newItem.url+'">Đặt hàng</a></div></div>');
            alert('Đã thêm sản vào sản phẩm yêu thích');
		}
		localStorage.setItem('data', JSON.stringify(old_data));
	}
</script>

<!-- Sẵp xếp sản phẩmmmmmmmmmmmmmmmmmmmmmmmm -->
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
<!-- Lọc giáaaaaaaaaaaaa -->
<script>
$(document).ready(function(){
	$( "#slider-range" ).slider({
      range: true,
      min: {{$min_price}},
      max: {{$max_price_range}},
	  steps:100000,
      values: [ {{$min_price}}, {{$max_price}} ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "VNĐ" + ui.values[ 0 ] + " - VNĐ" + ui.values[ 1 ] );
		$( "#start_price" ).val(ui.values[ 0 ]);
		$( "#end_price" ).val(ui.values[ 1 ]);
      }
    });
    $( "#amount" ).val( "VNĐ" + $( "#slider-range" ).slider( "values", 0 ) +
      " - VNĐ" + $( "#slider-range" ).slider( "values", 1 ) );
});
</script>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" 
	src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="CEmkr2CB">
	</script>

</body>

</html>