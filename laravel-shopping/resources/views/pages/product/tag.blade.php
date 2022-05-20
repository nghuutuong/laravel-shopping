@section('content2')
@extends('layoutfp')
<!-- <div class="fb-like" data-href="http://localhost:8000/danh-muc-san-pham/3" data-width="" data-layout="button_count" 
data-action="like" data-size="small" data-share="false"></div>
<div class="fb-comments" data-href="http://localhost:8000/danh-muc-san-pham/3"
 data-numposts="30" data-width=""></div> -->
    <!-- Loc gia, sap xepppppppppppppppppppppppppp--->
    <!-- <div class="row">
        <div class="col-md-4">
            <label for="amount">Sắp xếp theo</label>
            <form>
                @csrf
                <select name="sort" id="sort" class="form-control">
                    <option value="{{Request::url()}}?sort_by=none">Lọc</option>
                    <option value="{{Request::url()}}?sort_by=tang_dan">Giá tăng dần</option>
                    <option value="{{Request::url()}}?sort_by=giam_dan">Giá giảm dần</option>
                    <option value="{{Request::url()}}?sort_by=kytu_az">Lọc theo A đến Z</option>
                    <option value="{{Request::url()}}?sort_by=kytu_za">Lọc theo Z đến A</option>
                </select>
            </form>
        </div>
        <div class="col-md-4">
            <label for="amount">Lọc giá</label>
            <form>
                @csrf
                <div id="slider-range"></div>
                <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                <input type="hidden" name="start_price" id="start_price" >
                <input type="hidden" name="end_price" id="end_price" >
                <input type="submit" name="filter-price" value="Lọc giá" class="btn btn-default btn-sm">
            </form>
        </div>
    </div> -->
    <!-- Loc gia, sap xepppppppppppppppppppppppppp--->

<div class="modal fade" id="xemnhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title product_quickview_title" id="exampleModalLabel">Modal title</h5>
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
                <div id="product_quickview_value"></div>
                <div class="col-md-7">
                    <h2><span id="product_quicview_title"></span></h2>
                    <p>Mã ID: <span id="product_quickview_id"></span></p>
                    <span>
                        <h2>Giá sản phẩm<span id="product_quickview_price"></span></h2></br>
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
<!-- Featured Section End -->
    <!-- Breadcrumb Section Begin -->
    <!-- <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Danh mục sản phẩm</h4>
                            <ul>
                                @foreach($category as $key => $cate)
                                    <li><a href="{{URL('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <hr style="border:2px solid">
                        <div class="sidebar__item">
                            <h4>Thương hiệu</h4>
                            <ul>
                                @foreach($brand as $key => $brand)
                                    <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    
                    <div class="section-title product__discount__title">
                        <h2>Tag tìm kiếm: {{$product_tags}}</h2>
                    </div>
                  
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sắp xếp theo</span>
                                        <form>
                                        @csrf
                                        <select name="sort" id="sort" class="form-control">
                                            <option value="{{Request::url()}}?sort_by=none">Lọc</option>
                                            <option value="{{Request::url()}}?sort_by=tang_dan">Giá tăng dần</option>
                                            <option value="{{Request::url()}}?sort_by=giam_dan">Giá giảm dần</option>
                                            <option value="{{Request::url()}}?sort_by=kytu_az">Lọc theo A đến Z</option>
                                            <option value="{{Request::url()}}?sort_by=kytu_za">Lọc theo Z đến A</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-4" style="margin-top:25px">
                                <div class="filter__found">
                                    <form>
                                        @csrf
                                        <div id="slider-range"></div>
                                        <input type="hidden" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                        <input type="hidden" name="start_price" id="start_price" >
                                        <input type="hidden" name="end_price" id="end_price" >
                                        <input type="submit" name="filter-price" value="Lọc giá" class="btn btn-default btn-sm">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    @foreach($pro_tags as $key => $pro_tag)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$pro_tag->product_id)}}">
                                <form>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" class="cart_product_id_{{$pro_tag->product_id}}" value="{{$pro_tag->product_id}}">
                                    <input type="hidden" id="wishlist_productname{{$pro_tag->product_id}}" class="cart_product_name_{{$pro_tag->product_id}}" value="{{$pro_tag->product_name}}">
                                    <input type="hidden" class="cart_product_image_{{$pro_tag->product_id}}" value="{{$pro_tag->product_image}}">
                                    <input type="hidden" id="wishlist_productprice{{$pro_tag->product_id}}" class="cart_product_price_{{$pro_tag->product_id}}" value="{{$pro_tag->product_price}}">
                                    <input type="hidden" class="cart_product_quantity_{{$pro_tag->product_id}}" value="{{$pro_tag->product_quantity}}">
                                    <input type="hidden" class="cart_product_qty_{{$pro_tag->product_id}}" value="1">
                                </form>
                            <div class="product__item">
                                <div class="product__item__pic set-bg" style ="border:1px solid;border-radius: 3px;">
                                    <img id="wishlist_productimage{{$pro_tag->product_id}}" src="{{URL::to('uploads/product/'.$pro_tag->product_image)}}" alt="" />
                                    <!-- <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul> -->
                                </div>
                                <div class="product__item__text">
                                    <h5><a href="{{URL::to('/chi-tiet-san-pham/'.$pro_tag->product_id)}}">{{$pro_tag->product_name}}</a></h5>
                                    <h5 style="color:red">{{number_format($pro_tag->product_price).' '.'VNĐ'}}</h5>
                                </div>
                                    <style>
                                        button.btn.add-to-cart:hover {
                                            color: black;
                                            background-color: #ebebeb
                                        }
                                    </style>
                                    <button type="button" class="btn add-to-cart" name="add-to-cart" data-id_product="{{$pro_tag->product_id}}"
                                    style="margin-bottom: 0;
                                    font-size: 14px;
                                    cursor: pointer; 
                                    border: 1px solid;
                                    border-radius: 4px; background-color:white">
                                    Thêm giỏ hàng</button>
                                    <button class="btn btn-default button_wishlist" id="{{$pro_tag->product_id}}"
                                    onclick="add_wishlist(this.id);"><i class="fa fa-heart" style="color:red"></i></button>
                                    <button style="border:1px solid" type="button" data-toggle="modal" data-target="#xemnhanh" value="Xem nhanh"
                                    class="btn btn-default xemnhanh" data-id_product="{{$pro_tag->product_id}}" 
                                    data-id_product="{{$pro_tag->product_id}}" name="" >Xem nhanh</button>
                            </div>
                            <a>
                        </div>
                        @endforeach
                    </div>
                    <div class="product__pagination">
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

@endsection
