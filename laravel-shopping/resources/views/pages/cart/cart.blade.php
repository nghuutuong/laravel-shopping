@extends('layout')
@section('content')
<section id="cart_items">
	<div >
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				<li class="active">Giỏ hàng</li>
			</ol>
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
	</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div >
		<div class="row">
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Tổng <span>{{Cart::subtotal()}} VNĐ</span></li>
						<li>Thuế <span>{{Cart::tax()}} VNĐ</span></li>
						<li>Phí vận chuyển <span></span>Free</li>
						<li>Thành tiền <span>{{Cart::total()}} VNĐ</span></li>
						<?php
						$shipping_id = Session::get('shipping_id');
						$customer_id = Session::get('customer_id');
						if($customer_id!=NULL && $shipping_id==NULL){
					?>
						<a class="btn btn-primary" href="{{URL('/checkout')}}">Thanh toán</a>
					<?php
						}elseif($customer_id!=NULL && $shipping_id!=NULL){
					?>
						<a class="btn btn-primary" href="{{URL('/login-checkout')}}">Thanh toán</a>
					<?php
						}
					?>
					</ul>
					
						
				</div>
			</div>
		</div>
	</div>
</section>

@endsection