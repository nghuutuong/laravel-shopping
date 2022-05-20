@extends('layoutfp')
@section('content2')
<div class="container">
    <div class="row">
      <div class="col-md-12"> 
        <div class="table-agile-info">
          <div class="panel panel-default">
            <div class="panel-heading">
              Liệt kê đơn dặt hàng của bạn
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
                    <th style="width:20px;">
                      STT
                      </label>
                    </th>
                    <th>Mã đơn hàng</th>
                    <th>Tình trạng đơn hàng</th>
                    <th style="width:30px;"></th>
                  </tr>
                </thead>
                <tbody>
                    @php
                      $i = 0;
                    @endphp
                  @foreach($getorder as $key => $order)
                  @php
                  $i++;
                  @endphp
                  <tr>
                    <td><i>{{$i}}</i></td>
                    <td>{{$order->order_code}}</td>
                    <td>
                    @if($order->order_status==1)
                    <span style="color:red">Đơn hàng mới</span>
                    @elseif($order->order_status==2)
                    <span style="color:orange">Đang giao hàng</span>
                    @else
                        <span style="color:green">Đã giao hàng<span>
                    @endif
                    </td>
                    <td>
                      <a href="{{URL::to('/view-history-order/'.$order->order_code)}}" class="active" ui-toggle-class="">
                        <i class="fa fa-eye text-success text-active"></i>
                      </a>
                      <!-- <a onClick="return confirm('Bạn có chắc muốn xóa danh mục này không')" href="{{URL::to('/delete-order/'.$order->order_code)}}" class="active" ui-toggle-class="">
                        <i class="fa fa-times text-danger text"></i>
                      </a> -->
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        
       
              <div class="col-sm-7 text-right text-center-xs">
                         
                      {!!$getorder->links('name')!!}
                   
              </div>
            </div>
      </div>
    </div>
</div>
@endsection