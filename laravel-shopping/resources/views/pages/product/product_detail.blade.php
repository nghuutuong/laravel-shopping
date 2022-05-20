@extends('layout')
@section('content')
@foreach($product_details as $key => $pro_detail)
<div class="product-details"><!--product-details-->
   
    <style>
        .ISSlideOuter .ISPager .ISGallery img{
            display:block;
            height:140px;
            max-width:100%;
        }
        li.active{
            border: 2px solid #EE980F;
        }
    </style>
    <nav aria-label="breadcrumb" >
    <ol class="breadcrumb" style="background:none">
        <li class="breadcrumb-item"><a href="{{url('/trang-chu')}}">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{url('/danh-muc-san-pham/'.$category_id)}}">{{$product_cate}}</a></li>
        <li class="breadcrumb-item" aria-current="page">{{$product}}</li>
    </ol>
    </nav>
    <div class="col-sm-5">
        <ul id="imageGallery">
            @foreach($gallery as $key => $gal)
            <li data-thumb="{{asset('uploads/gallery/'.$gal->gallery_image)}}" 
            data-src="{{asset('uploads/gallery/'.$gal->gallery_image)}}">
                <img width="100%" alt="{{$gal->gallery_name}}" src="{{asset('uploads/gallery/'.$gal->gallery_image)}}" />
            </li>
            @endforeach
        </ul>
    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$pro_detail->product_name}}</h2>
            
            <img src="images/product-details/rating.png" alt="" />
            <form action="{{URL::to('/add-to-cart')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="{{$pro_detail->product_id}}" class="cart_product_id_{{$pro_detail->product_id}}">
                <input type="hidden" value="{{$pro_detail->product_name}}" class="cart_product_name_{{$pro_detail->product_id}}">
                <input type="hidden" value="{{$pro_detail->product_image}}" class="cart_product_image_{{$pro_detail->product_id}}">
                <input type="hidden" value="{{$pro_detail->product_quantity}}" class="cart_product_quantity_{{$pro_detail->product_id}}">
                <input type="hidden" value="{{$pro_detail->product_price}}" class="cart_product_price_{{$pro_detail->product_id}}">
            <span>
                <span>{{number_format($pro_detail->product_price).' '.'VNĐ'}}</span>
                <label>Số lượng:</label>
                <input name="qty" type="number" min="1" value="1" />
                <input name="productid_hidden" type="hidden" value="{{$pro_detail->product_id}}"/>
                
            </span>
            </form>
            <p><b>Tình trạng:</b>Còn hàng</p>
            <p><b>Điều kiện:</b> Hàng mới</p>
            <p><b>Thương hiệu:</b> {{($pro_detail->brand_name)}}</p>
            <p><b>Danh mục:</b> {{($pro_detail->category_name)}}</p>
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
            <br>
            <button type="submit" name="add-to-cart" class="btn btn-default cart add-to-cart">
                <i class="fa fa-shopping-cart"></i>
                Thêm vào giỏ hàng
            </button>
        </div><!--/product-information-->
    </div>

<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li><a href="#details" data-toggle="tab">Mô tả</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
            <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade " id="details" >
            {!!$pro_detail->product_desc!!}
        </div>
        
        <div class="tab-pane fade" id="companyprofile" >
            {!!$pro_detail->product_content!!}
        </div>
        
        <div class="tab-pane fade active in" id="reviews" >
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>Admin</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
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
                    <ul class="list-inline " title="Average Rating">
                        @for($count=1; $count<=5; $count++)
                            @php
                                if($count<=$rating){
                                    $color = 'color:#ffcc00;';
                                }else{
                                    $color = 'color:#ccc;';
                                }
                            @endphp
                        <li title="Đánh giá sao"
                        id="{{$pro_detail->product_id}}-{{$count}}"
                        data-index="{{$count}}"
                        data-product_id="{{$pro_detail->product_id}}"
                        data-rating="{{$rating}}"
                        class="rating"
                        style="cursor:pointer; {{$color}} font-size: 30px;"></li>   
                        @endfor              
                    </ul>
                <form action="#">
                    <span>
                        <input style="width:100%; margin-left:0" type="text" placeholder="Nhập tên người bình luận"/>
                    </span>
                    <textarea name="comment" class="comment_content"></textarea>
                    <b>Đánh giá sao: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right send-comment">
                        Thêm bình luận
                    </button>
                    <div id="notify_comment"></div>
                </form>
            </div>
        </div>
        
    </div>
</div><!--/category-tab-->

@endforeach

<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Sản phẩm liên quan</h2>  
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">	
                @foreach($relate as $key => $relate)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('uploads/product/'.$relate->product_image)}}" alt="" />
                                <h2>{{number_format($relate->product_price).' '.'VNĐ'}}</h2>
                                <p>{{$relate->product_name}}</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>			
    </div>
</div><!--/recommended_items-->
@endsection