@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>

    <div class="table-responsive">
    <div class="table-responsive">
                        @if(Session()->has('message'))
						<div class="alert alert-success">
							{!! session()->get('message') !!}
						</div>
						@elseif(session()->has('error'))
						<div class="alert alert-danger">
							{!! session()->get('error') !!}
						</div>
					    @endif
                    </div>
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
          @foreach($order as $key => $order)
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
              <a href="{{URL::to('/view-order/'.$order->order_code)}}" class="active" ui-toggle-class="">
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
</div>
@endsection