@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        Thông tin khách hàng
    </div>
    <div class="table-responsive">
          <?php
              $message = Session::get('message');
              if($message){
                  echo '<span class="text-alert">'.$message.'</span>';
                  Session::put('message');
              }
          ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$customer->customer_name}}</td>
            <td>{{$customer->customer_phone}}</td>
            <td>{{$customer->customer_address}}</td>
            <td>{{$customer->customer_email}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<br>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
        Thông tin vận chuyển
    </div>
    <div class="table-responsive">
          <?php
              $message = Session::get('message');
              if($message){
                  echo '<span class="text-alert">'.$message.'</span>';
                  Session::put('message');
              }
          ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên người vận chuyển</th>
            <th>Ghi chú của khách hàng</th>
            <th>Hình thức thanh toán</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>

          <tr>
            <td>{{$shipping->shipping_name}}</td>
            <td>{{$shipping->shipping_note}}</td>
            <td>
            @if($shipping->shipping_method==0)
              Thanh toán khi nhận
            @else
              Thanh toán online
            @endif
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>

<br><br>

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết đơn hàng
    </div>
    <!-- <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div> -->
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
              
            </th>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Số lượng kho còn</th>
            <th>Mã giảm giá</th>
            <th>Phí ship</th>
            <th>Số lượng</th>
            <th>Giá bán</th>
            <th>Giá gốc</th>
            <th>Tổng tiền</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @php
          $i=0;
          $total = 0;
        @endphp
        @foreach($order_details as $key => $odetail)
        @php
          $i++;
          $subtotal = $odetail->product_price*$odetail->product_sales_quantity;
          $total += $subtotal;
        @endphp
          <tr class="color_qty_{{$odetail->product_id}}">
            <td>{{$i}}</td>
            <td>{{$odetail->product_name}}</td>
            <td>{{$odetail->product->product_quantity}}</td>
            <td>@if($odetail->product_coupon != 'no')
                  {{$odetail->product_coupon}}
                @else
                  Không mã
                @endif
            </td>
            <td>{{number_format($odetail->product_feeship,0,',','.')}} VNĐ</td>
            <td>
            
            <input type="number" {{$order_status==3 ? 'disabled' : ''}} class="order_qty_{{$odetail->product_id}}" min="1" value="{{$odetail->product_sales_quantity}}" name="product_sales_quantity" style="width:40px">
            <input type="hidden" name="order_qty_storage"  class="order_code_storage_{{$odetail->product_id}}" value="{{$odetail->product->product_quantity}}">
            <input type="hidden" name="order_code"  class="order_code" value="{{$odetail->order_code}}">
            <input type="hidden" name="order_product_id"  class="order_product_id" value="{{$odetail->product_id}}">
            @if($order_status != 3)
            <button class="btn btn-default update_quantity_order" id="update_quantity_order" data-product_id="{{$odetail->product_id}}" name="update_quantity_order" >Cập nhật</button>
            @endif
            </td>
            <td>{{number_format($odetail->product_price,0,',','.')}} VNĐ</td>
            <td>{{number_format($odetail->product->price_cost,0,',','.')}} VNĐ</td>
            <td>{{number_format($subtotal,0,',','.')}}<span> VNĐ</span></td>
          </tr>
        @endforeach
          <tr>
            <td colspan="3">
              @php
                $total_coupon = 0;
              @endphp
              @if($coupon_option == 0)
                @php
                  $total_after_coupon = ($total*$coupon_value)/100;               
                  echo '<span>Tổng giảm : '.number_format($total_after_coupon,0,',','.').' VNĐ'.'</span>';
                  $total_coupon = $total + $odetail->product_feeship - $total_after_coupon;
                @endphp
              @else
                @php                
                  echo '<hr><span>Tổng giảm : '.number_format($coupon_value,0,',','.').' VNĐ'.'</span>';
                  $total_coupon = $total - $coupon_value + $odetail->product_feeship;
                 @endphp 
              @endif
              <hr>
              <span>Phí ship: {{number_format($odetail->product_feeship,0,',','.')}} VNĐ</span>
              <hr>
              <span>Thanh toán: {{number_format($total_coupon,0,',','.')}} VNĐ<span>
            </td>
          </tr>
          <tr>
            <td colspan="6">
            @foreach($order as $key => $ord)
              @if($ord->order_status ==1 )
              <form>
                @csrf
                <select id="order_detail" class="form-control order-statuss">
                  <option value="">-----Chọn hình thức đơn hàng-----</option>
                  <option value="1" selected id="{{$ord->order_id}}">Chưa xử lý</option>
                  <option value="2" id="{{$ord->order_id}}">Đang chuyển hàng</option>
                  <option value="3" id="{{$ord->order_id}}">Đã giao hàng</option>
                </select>
                </form>
            @elseif($ord->order_status == 2 )
              <form>
                @csrf
                <select id="order_detail" class="form-control order-statuss">
                  <option value="">-----Chọn hình thức đơn hàng-----</option>
                  <option value="1"  id="{{$ord->order_id}}">Chưa xử lý</option>
                  <option value="2" selected id="{{$ord->order_id}}">Đang chuyển hàng</option>
                  <option value="3" id="{{$ord->order_id}}">Đã giao hàng</option>
                </select>
                </form>
            @else
              <form>
                @csrf
                <select id="order_detail" disabled class="form-control order-statuss">
                  <option value="">-----Chọn hình thức đơn hàng-----</option>
                  <option value="1" disabled  id="{{$ord->order_id}}">Chưa xử lý</option>
                  <option value="2" disabled  id="{{$ord->order_id}}">Đang chuyển hàng</option>
                  <option value="3" selected id="{{$ord->order_id}}">Đã giao hàng</option>
                </select>
                </select>
                </form>
              @endif
            @endforeach
            </td>              
          </tr>
        </tbody>
      </table>
      <footer class="panel-footer">
        <div class="row">
          <div class="col-md-6" style="text-align: -webkit-right;">
             <a style="border: 1px solid;padding: 10px;background-color: aliceblue;border-radius: 5px;" href="{{'/print-order/'.$odetail->order_code}}">In đơn hàng</a>
           </div>
        </div>
      </div>
    </footer>
  </div>
</div>
<div class="col-sm-7 text-right text-center-xs">                       
  {!!$order_details->links('name')!!}
</div>
<table>

<thead>
  <tr>
    <th></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td></td>
  </tr>
</tbody>
</table>
@endsection