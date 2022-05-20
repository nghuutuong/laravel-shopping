@extends('layout')
@section('content')	
<section id="cart_items">
    <div>
    <div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li>Giỏ hàng</li>
                <li class="active">Thanh toán giỏ hàng</li>
			</ol>
		</div>
        </div><!--/breadcrums-->

        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>
        <div class="table-responsive cart_info" style="text-align:center">
			<?php
			$content = Cart::content();
			?>
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Hình ảnh</td>
						<td class="description">Tên sản phẩm</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Tổng tiền</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach($content as $content)
					<tr>
						<td class="cart_product">
							<a href=""><img src="{{URL::to('uploads/product/.$content->options->image')}}" alt="" width="50"></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{$content->name}}</a></h4>
						</td>
						<td class="cart_price">
							<p style="margin-top:2.4rem">{{number_format($content->price)}}<span> VNĐ</span></p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<form action="{{URL::to('/update-cart-quantity/')}}" method="post">
									{{csrf_field()}}
								<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$content->qty}}" style="margin-top:1.4rem;">
								<input type="hidden" value="{{$content->rowId}}" name="cart_id" class="form-control">
								<input type="submit" value="cập nhật" name="update_qty" class="btn btn-primary btn-sm" style="">
								</form>
							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price" style="margin-top:2rem">
								<?php
								$subtotal = $content->price * $content->qty;
								echo number_format($subtotal).' '.'VNĐ';
								?>
							</p>
						</td>
						<td class="cart_delete" style="margin-top:2.5rem; margin-right:1px">
							<a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$content->rowId)}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<h4 style="margin: 40px 0; font-size: 20px">Chọn hình thức thanh toán</h4>
		<form action="{{URL::to('/order-place')}}" method="post">
		{{csrf_field()}}
        <div class="payment-options">
                <span>
                    <label><input name="payment_option" value="1" type="checkbox"> Trả bằng thẻ ATM</label>
                </span>
                <span>
                    <label><input name="payment_option" value="2" type="checkbox"> Nhận tiền mặt</label>
                </span>
                <span>
                    <label><input name="payment_option" value="3" type="checkbox"> Paypal</label>
                </span>
				<input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
        </div>
		</form>
</section> <!--/#cart_items-->


@endsection