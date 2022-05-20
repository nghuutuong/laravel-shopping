@extends('admin_layout')
@section('admin_content')
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<div class="container-fluid">
  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-archive w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $product ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Sản phẩm</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-truck w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $order ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Đơn hàng</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-file-text w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $post ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Bài viết</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $customer ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Khách hàng</h4>
      </div>
    </div>
  </div>
  <hr>
<div class="row">
    <h3 class="title_thongke" style="margin:35px 0 35px;text-align:center">Thống kê doanh số</h3>
    <form autocomplete="off">
        @csrf
        <div class="col-md-3">
            <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
          </div>
          <div class="col-md-3">
            <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>
          </div>
          <div class="col-md-3">
            <p>
              Lọc theo:
              <Select class="dashboard-filter form-control">
                <option value="7ngay">Tuần vừa qua</option>
                <option value="thangtruoc">Tháng trước</option>
                <option value="thangnay">Tháng này</option>
                <option value="365ngayqua">Năm vừa qua</option>
              </Select>
            </p>
          </div>
          <div class="col-md-2">
            <input type="button" id="btn-dashboard-filter"  class="btn btn-primary" style="margin: 15px 10px 0 10px;" value="Lọc kết quả">
          </div>
    </form>

    <div class="col-md-12">
        <div id="chart" style="height:250px"></div>
    </div>
</div>
<hr>
<div class="row"> 
  <div class="col-md-12">
    <p class="title-thongke" style="text-align:center; text-transform:uppercase; font-size:20px">Thống kê truy cập</p>
    <hr><br>
    <table class="table table-bordered " style="border:3px solid black">
      <thead>
        <tr>
          <!-- <th scope="col">Đang online</th> -->
          <th scope="col">Tổng tháng trước</th>
          <th scope="col">Tổng tháng này</th>
          <th scope="col">Tổng năm này</th>
          <th scope="col">Tổng truy cập</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <!-- <td>{{$visitor_count}}</td> -->
          <td>{{$visitor_last_month_count}}</td>
          <td>{{$visitor_this_month_count}}</td>
          <td>{{$visitor_year_count}}</td>
          <td>{{$visitors_total}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<script>
  $( function(){
    $( "#datepicker" ).datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat:"yy-mm-dd",
        dateNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
        duration:"slow"
  });
    $( "#datepicker2" ).datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat:"yy-mm-dd",
        dateNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
        duration:"slow"
    });
  });
</script>

<script>
  $(document).ready(function(){
      chart30daysorder();
      var chart = new Morris.Bar({
          element: 'chart',
          lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
          pointFillColors: ['#ffffff'],
          pointStrokeColors: ['black'],
          fillOpacity: 0.6,
          hideHover: 'auto',
          parseTime: false,
          xkey: 'period',
          ykeys: ['order', 'sales', 'profit', 'quantity'],
          behaveLikeLine: true,
          labels: ['Đơn hàng', 'Doanh thu', 'Lợi nhuận', 'Số lượng']
      });
      function chart30daysorder(){
          var _token = $('input[name="_token"]').val();
          $.ajax({
              url:'{{url('/days-order')}}',
              method: 'POST',
              dataType:'JSON',
              data:{_token:_token},
              success:function(data){
                  chart.setData(data);
              }
          });
      }
      $('.dashboard-filter').change(function(){
          var dashboard_value = $(this).val();
          var _token = $('input[name="_token"]').val();
          $.ajax({
              url:'{{url('/dashboard-filter')}}',
              method: 'post',
              dataType:"JSON",
              data:{dashboard_value:dashboard_value,_token:_token},
              success:function(data){
                  chart.setData(data);
              }
          });
      });
      $('#btn-dashboard-filter').click(function(){
          var _token = $('input[name="_token"]').val();
          var from_date = $('#datepicker').val();
          var to_date = $('#datepicker2').val();
          // alert(from_date);
          // alert(to_date);
          $.ajax({
              url:'{{url('/filter-by-date')}}',
              method: 'post',
              dataType:"JSON",
              data:{from_date:from_date,to_date:to_date,_token:_token},
              success:function(data){
                  chart.setData(data);
              }
          });
      });
  });
</script>

<!-- <script>
  $(document).ready(function(){
    // var colorDanger = "#FF1744";
    var donut =  Morris.Donut({
        element: 'donut',
        resize: true,
        colors: [
          '#00BCD4',
          '#00ACC1',
          '#0097A7',
          '#00838F',
          '#006064'
        ],
        //labelColor:"#cccccc", // text color
        //backgroundColor: '#333333', // border color
        data: [
          {label:"Sản phẩm", value:<?php echo $product ?>},
          {label:"Bài viết", value:<?php echo $post ?>},
          {label:"Đơn hàng", value:<?php echo $order ?>},
          {label:"khách hàng", value:<?php echo $customer ?>}
        ]
      });
  });
</script> -->
@endsection