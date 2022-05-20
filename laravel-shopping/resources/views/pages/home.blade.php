@section('content')
@extends('layout')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Sản phẩm mới</h2>
        @foreach($all_product as $key => $all_product)
        <div class="col-sm-4">
            
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                    <form>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" class="cart_product_id_{{$all_product->product_id}}" value="{{$all_product->product_id}}">
                    <input type="hidden" id="wishlist_productname{{$all_product->product_id}}" class="cart_product_name_{{$all_product->product_id}}" value="{{$all_product->product_name}}">
                    <input type="hidden" class="cart_product_image_{{$all_product->product_id}}" value="{{$all_product->product_image}}">
                    <input type="hidden" id="wishlist_productprice{{$all_product->product_id}}" class="cart_product_price_{{$all_product->product_id}}" value="{{$all_product->product_price}}">
                    <input type="hidden" class="cart_product_quantity_{{$all_product->product_id}}" value="{{$all_product->product_quantity}}">
                    <input type="hidden" class="cart_product_qty_{{$all_product->product_id}}" value="1">
                    <a id="wishlist_producturl{{$all_product->product_id}}" href="{{URL::to('/chi-tiet-san-pham/'.$all_product->product_id)}}">
                        <img id="wishlist_productimage{{$all_product->product_id}}" src="{{URL::to('uploads/product/'.$all_product->product_image)}}" alt="" />
                        <h2>{{number_format($all_product->product_price).' '.'VNĐ'}}</h2>
                        <p>{{$all_product->product_name}}</p>
                        </a>
                        <button type="button" class="btn btn-default add-to-cart" name="add-to-cart" data-id_product="{{$all_product->product_id}}">
                        Thêm giỏ hàng</button>
                        <button type="button" data-toggle="modal" data-target="#xemnhanh" value="Xem nhanh"
                        class="btn btn-default xemnhanh" data-id_product="{{$all_product->product_id}}" 
                        data-id_product="{{$all_product->product_id}}" name="">Xem nhanh</button>
                    </form>    
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                    <style>
                      ul.nav.nav-pills.nav-justified li{
                        text-align: center;
                        font-size: 13px;
                      }
                      .button_wishlist{
                        border: none;
                        background: #ffff;
                        color: #B3AFA8;
                      }
                      ul.nav.nav-pills.nav-justified{
                        color:#B3AFA8;
                      }
                      .button_wishlist span:hover{
                        color:#B3AFA8;
                      }
                      .button_wishlist:focus{
                        border:none;
                        outline:none;
                      }
                    </style>
                    <li>
                    <i class="fa fa-plus-square"></i>
                    <button class="button_wishlist" id="{{$all_product->product_id}}"
                    onclick="add_wishlist(this.id);"><span>Yêu thích</span></button>
                    </li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                    </ul>
                </div>
            </div>
           
        </div>
        @endforeach

        
</div>
<!--feature_items-->
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
@endsection