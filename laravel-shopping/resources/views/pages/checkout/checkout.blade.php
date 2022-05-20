@extends('layoutfp')
@section('content2')	

    <!-- Checkout Section Begin -->
    @if(Session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
            @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {{session()->get('error')}}
            </div>
        @endif 
    <section class="checkout spad">
        <div class="container">
            @if(Session::get('cart'))
            <div class="checkout__form">
                <h4>Thông tin khách hàng</h4>
                <form>
                @csrf
                    <div class="row">
                    @foreach($customer as $key => $cus)
                        <div class="col-lg-7 col-md-6">

                            <div class="checkout__input">
                                <p>Họ và tên <span>*</span></p>
                                <input type="text" value="{{$cus->customer_name}}"   placeholder="Điền họ và tên của bạn">
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ <span>*</span></p>
                            
                                <input type="text" value="{{$cus->customer_address}}"  placeholder="Apartment, suite, unite ect (optinal)">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Số điện thoại <span>*</span></p>
                                        <input type="text" value="{{$cus->customer_phone}}" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email <span>*</span></p>
                                        <input type="text" value="{{$cus->customer_email}}">
                                    </div>
                                </div>
                                @if(Session::get('fee'))
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
                                    </div>
                                </div>
                                @else
                                <div class="col-lg-6">
                                    <div class="checkout__input">                                      
                                        <input type="hidden" name="order_fee" class="order_fee" value="30000">
                                    </div>
                                </div>                         
                                @endif

                                @if(Session::get('coupon'))
                                    @foreach(Session::get('coupon') as $key => $coupon)
                                <div class="col-lg-6">
                                    <div class="checkout__input">    
                                        <input type="hidden" name="order_coupon" class="order_coupon" value="{{$coupon['coupon_code']}}">
                                    </div>
                                </div>               
                                    @endforeach
                                @else
                                <div class="col-lg-6">
                                    <div class="checkout__input">         
                                        <input type="hidden" name="order_coupon" class="order_coupon" value="Không có">
                                    </div>
                                </div>                                   
                                @endif
                            </div>
                            <div class="checkout__input">
                                <p>Ghi chú đơn hàng <span>*</span></p>
                                <input type="text" name="shipping_note" class="shipping_note"
                                    placeholder="Ghi chú của bạn để dễ dàng giao dịch.">
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-5 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn hàng của bạn</h4>
                                @php
								    $total = 0;
                                @endphp
                                    @if(!empty(Session::get('cart')) && count(Session::get('cart')) > 0)
                                @foreach(Session::get('cart') as $key => $cart)
                                @php
                                    $subtotal = $cart['product_price']*$cart['product_qty'];
                                    $total += $subtotal;
                                @endphp  
                                @endforeach
                                @endif
                            <!-- <div class="checkout__order__subtotal">Giá <span>{{number_format($total,0,',','.')}} VNĐ</span></div> -->
							@if(Session::get('coupon'))
								    @foreach(Session::get('coupon') as $key => $cou)
									    @if($cou['coupon_option']==0)
                                        <div class="checkout__order__subtotal">Giá <span>{{number_format($total,0,',','.')}} VNĐ</span></div>
                                        <div class="checkout__order__subtotal">Mã giảm<span>{{$cou['coupon_value']}} %</span></div>
										
											@php 
												$total_coupon = ($total*$cou['coupon_value'])/100;
                                                echo '<div class="checkout__order__total">Tổng giảm:<span>'.number_format($total_coupon,0,',','.').'VNĐ'.'</span></div>'
											@endphp
                                        <div class="checkout__order__subtotal">Phí ship :<span>{{number_format(30000,0,',','.')}} VNĐ</span></div>
                                        <div class="checkout__order__subtotal">Tổng sau mã :<span>{{number_format($total-$total_coupon,0,',','.')}} VNĐ</span></div>
                                        <div class="checkout__order__subtotal">Tổng thanh toán :<span>{{number_format($total-$total_coupon+30000,0,',','.')}} VNĐ</span></div>
									    @elseif($cou['coupon_option']==1)
                                        <div class="checkout__order__subtotal">Giá <span>{{number_format($total,0,',','.')}} VNĐ</span></div>
                                        <div class="checkout__order__subtotal">Mã giảm : <span>{{number_format($cou['coupon_value'],0,',','.')}} VNĐ</span></div>
										
											@php 
												$total_coupon = $total - $cou['coupon_value'];
											@endphp
                                        <div class="checkout__order__subtotal">Phí ship :<span>{{number_format(30000,0,',','.')}} VNĐ</span></div>
                                        <div class="checkout__order__subtotal">Tổng sau mã :<span>{{number_format($total_coupon,0,',','.')}} VNĐ</span></div>
                                        <div class="checkout__order__subtotal">Tổng thanh toán :<span>{{number_format($total-$total_coupon+30000,0,',','.')}} VNĐ</span></div>
									    @endif
								    @endforeach
							    @else
                                        <div class="checkout__order__subtotal">Giá <span>{{number_format($total,0,',','.')}} VNĐ</span></div>
                                        <div class="checkout__order__subtotal">Phí ship <span>{{number_format(30000,0,',','.')}} VNĐ</span></div>
                                        <div class="checkout__order__total">Tổng thanh toán <span>{{number_format($total + 30000,0,',','.')}} VNĐ</span></div>
							    @endif
                                  
                                    @php
                                        $usd_to_vnd = $total/23000; 
                                    @endphp
                                <div class="checkout__input__checkbox">
                                    <label for="">Chọn hình thức thanh toán</label>                           
                                    <select class="payment_select">
                                        <option value="0">Thanh toán khi nhận</option>
                                        <option value="1">Thanh toán online</option>
                                    </select>
                                </div>
                            <div class="row" >
                                <div class="col-sm-4">
                                    <input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-md send_order">
                                    
                                </div>                  
                                <div class="col-sm-8">
                                    <div style="margin:18px 40px 18px 40px" id="paypal-button">
                                    
                                </div>
                                    <input type="hidden" value="{{round($usd_to_vnd,2)}}" id="usd_to_vnd">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @else
            <div class="container">
            <div class="row">
                <div class="rol-md-6">
                    <h3 style="text-align:center">Bạn hãy thêm sản phẩm để thanh toán</h3>
                
                </div>
            </div>
            </div>
            @endif
        </div>
    </section>
<script src="{{asset('frontend/js/checkout.js')}}"></script>
<script>
    var tien = document.getElementById("usd_to_vnd").value;
    paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
        sandbox: 'AaDTxSNDWyHBBPhCqFZukpzWE7jQp5fgYNq2gD-Td7eKvmCyMSWbZY1quiFgDIHTllJqa0WOiv_6AD2D',
        production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
        size: 'small',
        color: 'blue',
        shape: 'rect',
        label:'paypal',
        },

        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function(data, actions) {
        return actions.payment.create({
            transactions: [{
            amount: {
                total: `${tien}`,
                currency: 'USD',
            }
            }]
        });
        },
        // Execute the payment
        onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function() {
            // Show a confirmation message to the buyer
            window.alert('Cảm ơn đã mua hàng');
            window.location.href = "{{'/tksfbuying'}}";
        });
        }
    }, '#paypal-button');

</script>
    <!-- Checkout Section End -->
@endsection