@extends('layoutfp')
@section('content2')


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h3>Chi tiết sản phẩm</h3>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    
    @foreach($product_details as $key => $pro_detail)
    <style>
        .ISSlideOuter .ISPager .ISGallery img{
            display:block;
            height:140px;
            max-width:100%;
        }
    </style>
    <!-- Product Details Section Begin -->
    <section class="product-details spad">  
        <div class="container">
            <ol class="breadcrumb" style="background:none">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{url('/danh-muc-san-pham/'.$category_id)}}">{{$product_cate}}</a></li>
                <li class="breadcrumb-item" aria-current="page">{{$product}}</li>
            </ol>
            <div class="row">
                <div class=" col-sm-6">
                    <ul id="imageGallery">
                        @foreach($gallery as $key => $gal)
                        <li data-thumb="{{asset('uploads/gallery/'.$gal->gallery_image)}}" 
                        data-src="{{asset('uploads/gallery/'.$gal->gallery_image)}}">
                            <img id="wishlist_productimage{{$gal->product_id}}" width="100%" alt="{{$gal->gallery_name}}" src="{{asset('uploads/gallery/'.$gal->gallery_image)}}" />
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                    <a id="wishlist_producturl{{$pro_detail->product_id}}" href="{{url('/chi-tiet-san-pham/'.$pro_detail->product_id)}}"></a>
                        <h3>{{$pro_detail->product_name}}                      
                        <div class="fb-like" data-href="http://localhost:8000/danh-muc-san-pham/3" data-width="" data-layout="button_count" 
                        data-action="like" data-size="small" data-share="false"></div>
                        </h3>
                        <ul class="list-inline rating" title="Average Rating">
                        <span>Đánh giá sao</span>
                            @for($count=1; $count<=5; $count++)
                                @php
                                    if($count<=$rating){
                                        $color = 'color:#ffcc00;';
                                    }else{
                                        $color = 'color:#ccc;';
                                    }
                                @endphp
                                <li title="star_rating" id="{{$pro_detail->product_id}}-{{$count}}"
                                data-index="{{$count}}" data-product_id="{{$pro_detail->product_id}}"
                                data-rating="{{$rating}}" class="rating" style="cursor:pointer; {{$color}}
                                font-size:30px;">&#9733;</li>
                                @endfor
                        
                            
                            @for($count=1; $count<=5; $count++)        
                            <li title="Đánh giá sao"
                            id="{{$pro_detail->product_id}}-{{$count}}"
                            data-index="{{$count}}"
                            data-product_id="{{$pro_detail->product_id}}"
                            data-rating="{{$rating}}"
                            class="rating"
                            style="cursor:pointer; {{$color}} font-size: 30px;"></li>   
                            @endfor                
                            </ul>         
                        
                        <p><b>Thương hiệu: </b><span style="border:1px solid orange; border-radius:5px; background-color:orange">{{($pro_detail->brand_name)}}</span></p>
                        <p style="margin-top: -40px;"><b>Danh mục: </b><span style="border:1px solid #69d646; border-radius:5px; background-color:#69d646"> {{($pro_detail->category_name)}}</span></p>
                        <p style="margin-top: -40px;">{!!($pro_detail->product_desc)!!}</p>
                        <div class="product__details__price">{{number_format($pro_detail->product_price).' '.'VNĐ'}}</div>
                        <style>
                            a.tags_style{
                                margin: 3px 2px;
                                border: 1px solid;
                                height:auto;
                                background: #428bca;
                                color:#ffff;
                                padding:0px;
                            }
                            a.tags_style:hover{
                                background:black;
                            }
                        </style>
                        <fieldset>
                            <legend>Tag</legend>
                            <p><i class="fa fa-tag"></i>
                                @php
                                    $tags = $pro_detail->product_tags;
                                    $tags = explode(",",$tags);
                                @endphp
                                    @foreach($tags as $tag)
                                        <a href="{{url('/tag/'.Str::slug($tag))}}" class="tags_style">{{$tag}}</a> 
                                    @endforeach
                            </p>
                        </fieldset> 
                                <form>

                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" class="cart_product_id_{{$pro_detail->product_id}}" value="{{$pro_detail->product_id}}">
                                    <input type="hidden" id="wishlist_productname{{$pro_detail->product_id}}" class="cart_product_name_{{$pro_detail->product_id}}" value="{{$pro_detail->product_name}}">
                                    <input type="hidden" class="cart_product_image_{{$pro_detail->product_id}}" value="{{$pro_detail->product_image}}">
                                    <input type="hidden" id="wishlist_productprice{{$pro_detail->product_id}}" class="cart_product_price_{{$pro_detail->product_id}}" value="{{$pro_detail->product_price}}">
                                    <input type="hidden" class="cart_product_quantity_{{$pro_detail->product_id}}" value="{{$pro_detail->product_quantity}}">
                                    <input type="hidden" class="cart_product_qty_{{$pro_detail->product_id}}" value="1">
                                </form>
                        <span>
                            <input name="productid_hidden" type="hidden" value="{{$pro_detail->product_id}}"/>
                        </span>
                        <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1">
                                    </div>
                                </div>
                            </div>
                        <button type="button" class="primary-btn btn add-to-cart" name="add-to-cart" data-id_product="{{$pro_detail->product_id}}" style="background-color:orange">
                            <i class="fa fa-shopping-cart"></i>
                            
                            Thêm vào giỏ hàng
                        </button>
                        
                        <a href="#" class="heart-icon button_wishlist" id="{{$pro_detail->product_id}}"
                        onclick="add_wishlist(this.id);"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Thông tin</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Information</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Nhận xét</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab"
                                    aria-selected="false">Nhận xét facebook</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Thông tin sản phẩm</h6>
                                    {!!$pro_detail->product_content!!}
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <div class="fb-comments" data-href="http://localhost:8000/chi-tiet-san-pham/3"
                                    data-numposts="30" data-width=""></div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                <!-- Đánh giáaaaaaaaaaaaaaaaaaaaaaaaaâ -->
                                    <ul>
                                        <li><a href=""><i class="fa fa-user"></i> Đánh giá của khách hàng</a></li>
                                        <!-- <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li> -->
                                    </ul>
                                    <style>
                                        .style-comment{
                                            border: 1px solid #ddd;
                                            border-radius: 10px;
                                            background: #F0F0E9;
                                        }
                                    </style>
                                    <form>
                                    @csrf
                                    <input type="hidden" class="comment_product_id" name="comment_product_id" value="{{$pro_detail->product_id}}">
                                    <div id="comment_show"></div>
                                    </form>
                                    <p><b>Đánh giá của bạn về sản phẩm</b></p>
                                        <form action="#">
                                        <span>
                                            <input style="width:30%; margin-left:0;border-radius:10px" name="comment_name" class="comment_name" type="text" placeholder="Vui lòng nhập tên để bình luận"/>
                                        </span>
                                        <textarea name="comment" class="comment_content" style="margin-top:10px;border-radius:10px;height:200px"></textarea>
                                        <button type="button" class="btn btn-dark pull-right send-comment" style="margin-top:10px">
                                            Thêm bình luận
                                        </button>
                                        <div id="notify_comment"></div>
                                    </form>
                                    <!-- Đánh giáaaaaaaaaaaaaaaaaaaaaaaaaâ -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row" style="border:2px solid; border-color:orange">
                    @foreach($relate as $key => $relate)
                <a href="{{url('/chi-tiet-san-pham/'.$relate->product_id)}}">
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" style="height:200px" >
                            <img src="{{URL('uploads/product/'.$relate->product_image)}}" alt="" />
                        </div>
                        <div class="product__item__text">
                            <h6 style="height:25px"><a href="#">{{$relate->product_name}}</a></h6>
                            <h5>{{number_format($relate->product_price).' '.'VNĐ'}}</h5>
                        </div>
                    </div>
                </div>
                </a>
             @endforeach
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

@endsection