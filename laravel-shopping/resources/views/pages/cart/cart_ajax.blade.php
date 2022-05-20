@extends('layoutfp')
@section('content2')

 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
   <!-- Shoping Cart Section Begin -->
   @if(Session::get('cart'))
   <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
				@if(Session()->has('message'))
						<div class="alert alert-success">
							{!! session()->get('message') !!}
						</div>
						@elseif(session()->has('error'))
						<div class="alert alert-danger">
							{!! session()->get('error') !!}
						</div>
					@endif
                <div class="col-lg-12">
					<div class="shoping__cart__table">
						<form action="{{url('/update-cart')}}" method="POST">
						@csrf
						<table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng từng món</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
							@php
								$total = 0;
							@endphp
							@if(!empty(Session::get('cart')) && count(Session::get('cart')) > 0)
							@foreach(Session::get('cart') as $key => $cart)
							@php
								$subtotal = $cart['product_price']*$cart['product_qty'];
								$total += $subtotal;
							@endphp
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{asset('/uploads/product/'.$cart['product_image'])}}" width="80px" alt="">
                                        <h5>{{$cart['product_name']}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
									{{number_format($cart['product_price'],0,',','.')}} VNĐ
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
											<input class="cart_quantity" type="number" name="cart_quantity[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}"   min="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
									{{number_format($subtotal,0,',','.')}} VNĐ
                                    </td>
                                    <td class="shoping__cart__item__close ">
                                        <a class="cart_quantity_delete" href="{{url('/delete-cart-product/'.$cart['session_id'])}}"><span class="icon_close"></span></a>
									</td>								
                               	</tr>
									@endforeach
								<tr>
									<td>
										<a class="btn btn-danger" href="{{url('/delete-all-cart-product')}}" style="padding: 15px 40px; float: left;">Xóa tất cả</a>
									</td>
									<td>
										<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-success" style="padding: 15px 40px;">
									</td>
								</tr>
								@endif
							</tbody>
						</form>
						</table>							
                    </div>
                </div>
            </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
							@if(Session::get('cart'))
							<h5>Mã giảm giá</h5>
								<form action="{{url('/check-coupon')}}" method="post">
									@csrf
									<input type="text" name="coupon" placeholder="Nhập mã giảm giá">
									<input type="submit" name="check-coupon" class="site-btn check-coupon" value="Kích hoạt" style="float: right;color: white;">
									
									<!-- <button type="submit" name="check-coupon" class="site-btn">Dùng mã</button> -->
								</form>
							@endif
							
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Thanh toán giỏ hàng</h5>
                        <ul>
							
							<li>Giá <span>{{number_format($total,0,',','.')}} VNĐ</span></li>
							@if(Session::get('coupon'))
								@foreach(Session::get('coupon') as $key => $cou)
									@if($cou['coupon_option']==0)
										<li>Mã giảm :<span> {{$cou['coupon_value']}} %</span></li>
										
											@php 
												$total_coupon = ($total*$cou['coupon_value'])/100;
												echo '<li>Tổng giảm:<span>'.number_format($total_coupon,0,',','.').' VNĐ'.'</span></li>';
											@endphp
										

										<li>Phí ship <span>{{number_format( 30000,0,',','.')}} VNĐ</span></li>
										<li>Tổng sau mã :<span>{{number_format($total-$total_coupon,0,',','.')}} VNĐ</span></li>
                            			<li>Tổng thanh toán <span>{{number_format($total-$total_coupon + 30000,0,',','.')}} VNĐ</span></li>
									@elseif($cou['coupon_option']==1)
										<li>Mã giảm :<span> {{number_format($cou['coupon_value'],0,',','.')}} VNĐ</span></li>
										
											@php 
												$total_coupon = $total - $cou['coupon_value'];
											@endphp
										
										<li>Phí ship <span>{{number_format( 30000,0,',','.')}} VNĐ</span></li>
										<li>Tổng sau mã :<span>{{number_format($total_coupon,0,',','.')}} VNĐ</span></li>
                            			<li>Tổng thanh toán :<span>{{number_format($total-$total_coupon + 30000,0,',','.')}} VNĐ</span></li>
									@endif
								@endforeach
							@else
							<li>Phí ship <span>{{number_format( 30000,0,',','.')}} VNĐ</span></li>
                            <li>Tổng thanh toán <span>{{number_format($total + 30000,0,',','.')}} VNĐ</span></li>
							@endif
						</ul>
						@if(Session::get('customer_id'))
						<a href="{{url('/checkout')}}" class="primary-btn">Tiếp tục thanh toán</a>
						@else
						<h4 style="color:red">Bạn không thể thanh toán khi chưa đăng nhập</h4>
						@endif
                    </div>
                </div>
            </div>
        </div>
    </section>
	@else
	<img src="{{asset('frontend/images/icon/sign-in-empty-cart-ico-11562967535voa6c4c2bg.png')}}" style="margin: auto; display: block;" alt="">
	<h2 style="text-align:center; padding: 80px;">Giỏ hàng của bạn hiện đang trống</h2>
	@endif
    <!-- Shoping Cart Section End -->
<!-- <section id="cart_items">
	<div >
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				<li class="active">Giỏ hàng</li>
			</ol>
		</div>
        @if(Session()->has('message'))
            <div class="alert alert-success">
                {!! session()->get('message') !!}
            </div>
            @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {!! session()->get('error') !!}
            </div>
        @endif    
		<div class="table-responsive cart_info" style="text-align:center">
        <form action="{{url('/update-cart')}}" method="post">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Hình ảnh</td>
						<td class="description">Tên sản phẩm</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="description">Số lượng tồn kho</td>
						<td class="total">Thành tiền</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
                        @php
                            $total = 0;
                        @endphp
                		@if(!empty(Session::get('cart')) && count(Session::get('cart')) > 0)
                    	@foreach(Session::get('cart') as $key => $cart)
                        @php
                            $subtotal = $cart['product_price']*$cart['product_qty'];
                            $total += $subtotal;
                        @endphp
					<tr>
						<td class="cart_product">
							<a href=""><img src="{{asset('/uploads/product/'.$cart['product_image'])}}" alt="{{$cart['product_name']}}" width="80" style="margin-right:80px"></a>
						</td>
						<td class="cart_description">
							<h4><a href=""></a></h4>
                            <p>{{$cart['product_name']}}</p>
						</td>
						<td class="cart_price">
							<p style="margin-top:2.4rem"><span>{{number_format($cart['product_price'],0,',','.')}} VNĐ</span></p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">	
									{{csrf_field()}}
								<input class="cart_quantity" type="number" name="cart_quantity[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" style="margin-top:1.4rem; width:35px"  min="1">
							</div>
						</td>
						<td class="product_quantity">
							<h4><a href=""></a></h4>
                            <p>{{$cart['product_quantity']}}</p>
						</td>
						
						<td class="cart_total">
							<p class="cart_total_price" style="margin-top:2rem">
                            {{number_format($subtotal,0,',','.')}} VNĐ
							</p>
						</td>
						<td class="cart_delete" style="margin-top:2.5rem; margin-right:1px">
							<a class="cart_quantity_delete" href="{{url('/delete-cart-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
                    @endforeach
               
                    <tr>
                        <td>
                        	<input type="submit" value="cập nhật" name="update_qty" class="btn btn-success" >
                        </td>
                        <td>
                        	<a class="btn btn-danger" href="{{url('/delete-all-cart-product')}}">Xóa tất cả</a>
                        </td>
						<td>
							@if(Session::get('coupon'))
								<a class="btn btn-danger" href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
							@endif
						</td>
						<td>
							@if(Session::get('customer'))
								<a class="btn btn-danger" href="{{url('/checkout')}}">Đặt hàng</a>
							@else
							<a class="btn btn-danger" href="{{url('/login-checkout')}}">Đặt hàng</a>
							@endif
						</td>

                        <tr>
                            <td colspan="5">
                            <center>
                            @php
                                echo 'Giỏ hàng của bạn hiện đang trống';
                            @endphp
                            </center>
                            </td>
                        </tr>
                    </tr>
                @endif
				</tbody>
				</form>
			</table>
		</div>
	</div>
</section> /#cart_items -->


@endsection