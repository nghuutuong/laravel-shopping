@extends('layoutfp')
@section('content2')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="table-agile-info">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 style="text-align:center">Xem chi tiết đơn hàng</h4>
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
               
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  
                   
                  </th>
                  <th>Tên người vận chuyển</th>
                  <th>Ghi chú</th>
                  <th>Hình thức thanh toán</th>
                  
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

          <div class="table-responsive">
            <table class="table table-striped b-t b-light">
              <thead>
                <tr>
                  
                  </th>
                  <th>STT</th>
                  <th>Sản phẩm</th>
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
                  <td>@if($odetail->product_coupon != 'no')
                        {{$odetail->product_coupon}}
                      @else
                        Không mã
                      @endif
                  </td>
                  <td>{{number_format($odetail->product_feeship,0,',','.')}} VNĐ</td>
                  <td>
                  <input type="number" style="width:35px" min="1" readonly id="{{$odetail->order_status==2 ? 'disable' : ''}}" class="order_qty_{{$odetail->product_id}}" min="1" value="{{$odetail->product_sales_quantity}}" name="product_sales_quantity">
                  <input type="hidden" name="order_qty_storage"  class="order_code_storage_{{$odetail->product_id}}" value="{{$odetail->product->product_quantity}}">
                  <input type="hidden" name="order_code"  class="order_code" value="{{$odetail->product_code}}">
                  <input type="hidden" name="order_product_id"  class="order_product_id" value="{{$odetail->product_id}}">
                
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
                        echo 'Tổng giảm : '.number_format($total_after_coupon,0,',','.').' VNĐ'.'</br>';
                        $total_coupon = $total - $total_after_coupon + $odetail->product_feeship;
                      @endphp
                    @else
                      @php
                        echo 'Tổng giảm : '.number_format($coupon_value,0,',','.').' VNĐ'.'</br>';
                        $total_coupon = $total - $coupon_value + $odetail->product_feeship;

                      @endphp 
                    @endif

                    <span>Phí ship : {{number_format($odetail->product_feeship,0,',','.')}} VNĐ</span><br>
                    <span>Thanh toán : {{number_format($total_coupon,0,',','.')}} VNĐ</span>
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
      </div>
    </div>
  </div>
</div>
@endsection