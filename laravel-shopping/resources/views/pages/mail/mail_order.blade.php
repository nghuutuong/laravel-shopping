<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container" style="background:white; border:1px solid; border-radius:12px; padding:15px">
        <div class="col-md-12">
            <p style="text-align:center; color: black">Đây là mail</p>
            <div class="row" style="background: cadeblue;padding:15px">
                <div class="col-md-6" style="text-align:center; color:black; font-weight:bold;font-size:30px">
                    <h4 style="margin:0px">CONG TY ABCXYZ</h4>
                    <h6 style="margin:0">ZZYYXX</h6>
                </div>
                <div class="col-md-6" style="color:black">
                    <p>Chào bạn <strong style="color:#000;text-decoration:underline">{{$shipping_array['customer_name']}}</strong></p>
                </div>
                <div class="col-md-12">
                    <!-- <p style="color:black;font-size:17px">Thông tin đơn hàng của bạn :</p> -->
                    <h4 style="color:#000; text-transform:uppercase">Thông tin đơn hàng</h4>
                    <p>Mã đơn hàng: <strong style="text-transform: uppercase; color:black">{{$code['order_code']}}</strong></p>
                    <p>Mã khuyến mãi áp dụng: <strong style="text-transform: uppercase; color:black">{{$code['coupon_code']}}</strong></p>
                    <p>Dịch vụ: <strong style="text-transform: uppercase; color:black">Đặt hàng trực tuyến</strong></p>
                    <h4 style="color:#000;text-transform:uppercase;">Thông tin người nhận</h4>
                    <p>Email :
                        @if($shipping_array['customer_email']=='')
                            Không có
                        @else
                            <span>{{$shipping_array['customer_email']}}</span>
                        @endif
                    </p>
                    <p>Tên người nhận :
                        @if($shipping_array['customer_name']=='')
                            Không có
                        @else
                            <span>{{$shipping_array['customer_name']}}</span>
                        @endif
                    </p>
                    <p>Địa chỉ người nhận :
                        @if($shipping_array['customer_address']=='')
                            Không có
                        @else
                            <span>{{$shipping_array['customer_address']}}</span>
                        @endif
                    </p>
                    <p>Số điện thoại :
                        @if($shipping_array['customer_phone']=='')
                            Không có
                        @else
                            <span>{{$shipping_array['customer_phone']}}</span>
                        @endif
                    </p>
                    <p>Ghi chú :
                        @if($shipping_array['shipping_note']=='')
                            Không có
                        @else
                            <span>{{$shipping_array['shipping_note']}}</span>
                        @endif
                    </p>
                    <p>Phương thức thanh toán :
                        @if($shipping_array['shipping_method']== 0)
                            Chuyển khoản
                        @else
                            Thanh toán khi nhận hàng trực tiếp
                        @endif
                    </p>
                    <p>Sản phẩm đã đặt</p>
                        <table class="table table-striped" style="border:1px">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Giá tiền</th>
                                    <th>Số lượng đặt</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sub_total = 0;
                                    $total =0;
                                @endphp
                                @foreach($cart_array as $cart)
                                    @php
                                        $sub_total = $cart['product_qty']*$cart['product_price'];
                                        $total += $sub_total;
                                    @endphp
                                <tr>
                                    <td>{{$cart['product_name']}}</td>
                                    <td>{{number_format($cart['product_price'],0,'.',',')}} VNĐ</td>
                                    <td>{{$cart['product_qty']}}</td>
                                    <td>{{number_format($sub_total,0,'.',',')}} VNĐ</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" align="right">Tổng thanh toán: {{number_format($total,0,'.',',')}} VNĐ</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                <p style="">Mọi chi tiết xin liên hệ tới số 1900.281.271</p>
            </div>
        </div>
    </div>
</body>
</html>