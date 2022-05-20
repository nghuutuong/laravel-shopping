@extends('layoutfp')
@section('content2')

 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>THANH KIU VẾ RY MỨC</h2>
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

	<img src="{{asset('frontend/images/icon/logo.png')}}" style="margin: auto; display: block; width:10%" alt="">
    <h2 style="text-align:center; padding: 50px;">Cảm ơn bạn đã mua hàng của chúng tôi, bạn hãy đợi nhận hàng nhé ! <i class="fa fa-heart" style="color:red"></i></h2>
    <a style="text-align:center; margin-top:0px;  text-decoration:underline" href="{{'/'}}"><h3 style="padding: 0 0 150px 0;">Ấn vào đây để quay về trang chủ</h3></a>
    <!-- Shoping Cart Section End -->


@endsection