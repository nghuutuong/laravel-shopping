@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê mã giảm giá
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
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên mã giảm giá</th>
            <th>Mã giảm giá</th>
            <th>Số lượng mã</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Phương thức giảm</th>
            <th>Tình trạng</th>
            <th>Giá trị mã</th>
            <th>Hạn</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($coupon as $key => $coupon)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$coupon->coupon_name}}</td>
            <td>{{$coupon->coupon_code}}</td>
            <td>{{$coupon->coupon_times}}</td>
            <td>{{$coupon->coupon_start}}</td>
            <td>{{$coupon->coupon_end}}</td>
            <td><span class="text-ellipsis">
              <?php
                  if($coupon->coupon_option==0){
              ?>
                Giảm theo %
              <?php
              }else{
              ?>
                Giảm theo tiền
              <?php
              }
              ?>
            </span></td>
            <td><span class="text-ellipsis">
              <?php
                  if($coupon->coupon_status==1){
              ?>
               <span style="color:green">Đang kích hoạt</span> 
              <?php
              }else{
              ?>
                <span style="color:red">Vô hiệu</span> 
              <?php
              }
              ?>
            </span></td>
            <td><span class="text-ellipsis">
            
            @if($coupon->coupon_option==0)
            
               Giảm {{$coupon->coupon_value}} %
              
            @else
            
               Giảm {{number_format($coupon->coupon_value),0,' ',' '}} VNĐ
            @endif
            
            </span></td>
            <td>
              
                @if($coupon->coupon_end>$today)
                  <span style="color:green">Còn hạn</span>
                @else
                <span style="color:red">Hết hạn</span>
                @endif
            </td>
            <td>
              <a onClick="return confirm('Bạn có chắc muốn xóa danh mục này không')" href="{{URL::to('/delete-coupon/'.$coupon->coupon_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection