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
    <!-- <link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.min.css')}}" type="text/css"> -->
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" type="text/css">
	<link href="{{asset('frontend/css/sweetalert.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('frontend/css/login-register.css')}}" type="text/css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
                            <!-- <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> -->
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
                                </div>
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form id="customer_login_form" action="{{URL('/login-customer')}}" accept-charset="UTF-8">
                                    @csrf
                                        <input id="email" name="email_account" class="form-control" type="text" placeholder="Email">
                                        <input id="password" class="form-control" type="password" placeholder="Password" name="password_account">
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
                                    <input class="btn btn-default btn-register" type="button" value="Đăng ký" name="commit">
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
                            <li class="active"><a href="{{URL('/')}}">Trang chủ</a></li>
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
                            <!-- <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i> <span> -->
										<!-- <li><a href="{{URL('/gio-hang')}}"><i class="fa fa-shopping-cart"></i><span>{{Cart::count()}}</span></a></li> -->
								
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
 
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{url('/search')}}" autocomplete="off" method="post" style="display:flex; justify-content: space-between;">
                                @csrf
                                <input type="text" name="keyworks_submit" id="keywords" placeholder="Tìm kiếm sản phẩm">
                                <div id="search-ajax"></div>
                                <!-- <button type="submit" name="search_item" class="site-btn">Tìm kiếm</button> -->
                                <!-- <input type="submit" name="search_item" class="site-btn" value="Tìm kiếm"> -->
                                <input type="submit" name="search_item" class="btn btn-outline-success my-2 my-sm-0" value="Tìm kiếm" 
							style="background:#7fad39;color: aliceblue; width:120px;"/>
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
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
	
	@yield('content2')
    

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
		<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    <script>
    var botmanWidget = {
        frameEndpoint: '/botman/tinker',
        title: 'CHAT BOT',
        introMessage: 'Chào bạn đến cửa hàng, ABC bot rất vui được giúp bạn',
        placeholderText: 'Nhập câu hỏi ...',
        
    };
    </script>
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
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="{{asset('frontend/js/sweetalert.min.js')}}"></script>
	<script src="{{asset('frontend/js/login-register.js')}}"></script>
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
<!--------------------------------------------------------->
<!--Send Orderrrrrrrrrrrrrrrrrrrr--------->
<!-- <script>
$(document).ready(function(){
	$('.send_order').click(function(){
			swal({
				title: "Xác nhận đặt hàng?",
				text: "Đơn hàng",
				type: "success",
				showCancelButton: true,
				confirmButtonClass: "btn-success",
				confirmButtonText: "Đặt hàng",
				cancelButtonText: "Chưa mua vội",
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
						swal("Đơn hàng", "Đơn hàng đã đặt thành công", "success");
                    	
						}
					});
					window.setTimeout(function(){
						location.reload();
					}, 1000);
				}else{
					swal("Đóng lại", "Đặt hàng thất bại", "error");
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
			alert('Bạn đã đặt hàng thành công, vui lòng chờ nhận hàng');
			window.location.href = "{{'/tksfbuying'}}";
			}
		});
	});
});
</script>

<script>
$(document).ready(function(){
	$('.send_order_bank').click(function(){
		var shipping_name = $('.shipping_name').val();
		var shipping_note = $('.shipping_note').val();
		var shipping_method = 0;
		var order_fee = $('.order_fee').val();
		var order_coupon = $('.order_coupon').val();
		var _token = $('input[name="_token"]').val();
		$.ajax({
			url: '{{url('/confirm-order-bank')}}',
			method: 'post',
			data:{shipping_name:shipping_name,
				shipping_note:shipping_note,order_fee:order_fee,order_coupon:order_coupon,
				shipping_method:shipping_method,_token:_token},
			success:function(){					
			alert('Mời bạn thanh toán qua ngân hàng');
			// window.location.href = "{{'/tksfbuying'}}";
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
$(document).on('click', '.li_search', function(){
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
			// document.getElementById('row_wishlist').style.overflow = 'scroll';
			document.getElementById('row_wishlist').style.height = '500px';
			for(i=0;i<data.length;i++){
				var name = data[i].name;
				var price = data[i].price;
				var image = data[i].image;
				var url = data[i].url;
				$('#row_wishlist').append('<div class="row" style="margin:10px 0"><hr><div class="col-md-4"><img src="'+image+'" width="100px" height="100px"></div><div class="col-md-6 info_wishlist"><p><span style="text-transform:uppercase;font-weight:bold">Tên sản phẩm :</span> '+name+'</p><p style="color:#FE980F"><span style="text-transform:uppercase;font-weight:bold">Giá :</span> '+price+'</p><a href="'+url+'">Đặt hàng</a></div><div class="col-md-2"><i class="fa fa-heart" style="color:red;font-size: 26px;margin-top:40px;"></i></div></div>');
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
			$('#row_wishlist').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img src="'+newItem.image+'"></div><div class="col-md-8 info_wishlist"><p>'+newItem.name+'</p><p style="color:#FE980F">'+newItem.price+'</p><a href="'+newItem.url+'">Đặt hàng</a></div></div>');
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
			orientation: "horizontal",
			range: true,
			min: 100000,
			max: 50000000,
			steps:100000,
			values: [100000, {{$max_price}} ],
			slide: function( event, ui ) {
				$( "#amount" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] ) + " VNĐ";
				$( "#start_price" ).val(ui.values[ 0 ]);
				$( "#end_price" ).val(ui.values[ 1 ] ) ;
			}
		});
		$( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
		" - " + $( "#slider-range" ).slider( "values", 1 ) + " VNĐ" );
	});
</script>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" 
	src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="CEmkr2CB">
	</script>

</body>

</html>