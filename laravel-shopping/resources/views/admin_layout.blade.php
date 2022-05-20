<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}" >
<meta name="csrf-token" content="{{csrf_token()}}">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('backend/css/jquery-ui.min.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet"/>
<link href="{{asset('backend/css/jquery.dataTables.min.css')}}" rel="stylesheet"/>
<link href="{{asset('backend/css/bootstrap-tagsinput.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('backend/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('backend/css/monthly.css')}}">
<link rel="stylesheet" href="{{asset('backend/css/w3.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('frontend/js/jquery.js')}}"></script>

<script src="{{asset('backend/js/raphael-min.js')}}"></script>

</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars" style=" background-color: #000000; border-radius: 20px; margin-left: 2px;"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li> -->
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="">
                <span class="username">
				<?php
					$name = Auth::user()->admin_name;
					if($name){
						echo $name;
					}
				?>
				</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Thông tin cá nhân</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
                <li><a href="{{URL::to('/logout-auth')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation" style="background-color:#00000096">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{url('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Thống kê</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="{{URL::to('/manage-order')}}">
                        <i class="fa fa-archive"></i>
                        <span>Đơn hàng</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-cube"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
						<li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fas fa-copyright"></i>
                        <span>Thương hiệu sản phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu sản phẩm</a></li>
						<li><a href="{{URL::to('/all-brand-product')}}">Liệt kê thương hiệu sản phẩm</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                    <i class="fa fa-eye"></i>
                        <span>Mã giảm giá</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-coupon')}}">Thêm mã giảm giá</a></li>
                        <li><a href="{{URL::to('/list-coupon')}}">Liệt kê mã giảm giá</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="{{URL::to('/delivery')}}">
                        <i class="fa fa-truck"></i>
                        <span>Vận chuyển</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-heart"></i>
                        <span>Slider</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manage-slider')}}">Liệt kê slider</a></li>
                        <li><a href="{{URL::to('/add-slider')}}">Thêm slider</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fab fa-angellist"></i>
                        <span>Danh mục bài viết</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/all-category-post')}}">Liệt kê danh mục bài viết</a></li>
                        <li><a href="{{URL::to('/add-category-post')}}">Thêm danh mục bài viết</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-sticky-note"></i>
                        <span>Bài viết</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/all-post')}}">Liệt kê bài viết</a></li>
                        <li><a href="{{URL::to('/add-post')}}">Thêm bài viết</a></li>
                    </ul>
                </li>
                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Bình luận</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/all-post')}}">Liệt kê bình luận</a></li>
                        <li><a href="{{URL::to('/add-post')}}">Thêm bài viết</a></li>
                    </ul>
                </li> -->
                <li>
                    <a href="{{url('/add-contact')}}">
                        <i class="fa fa-phone"></i>
                        <span>Thông tin liên hệ</span>
                    </a>
                </li>

                @impersonate
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span><a href="{{url::to('/impersonate-destroy')}}">Chuyển quyền</a></span>
                    </a>
                </li>
                @endimpersonate

                @hasrole(['Admin'])
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>User</span>
                    </a>
                    <ul class="sub">
                         <li><a href="{{URL::to('/add-users')}}">Thêm user</a></li>
                        <li><a href="{{URL::to('/users')}}">Liệt kê user</a></li>
                      
                    </ul>
                </li>
                @endhasrole
            </ul>           
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		@yield('admin_content')
	</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>...</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<script src="{{asset('backend/js/raphael-min.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.js')}}"></script>
<script src="{{asset('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('backend/js/scripts.js')}}"></script>
<script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('backend/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('backend/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('backend/js/morris.min.js')}}"></script>
<script src="{{asset('backend/js/widget.js')}}"></script>
    <script>
    var botmanWidget = {
        frameEndpoint: '/chatify',
        title: 'Chat',   
        desktopHeight: 600, 
        desktopWidth: 450, 
        aboutLink:'localhost:8000/chattify'
    };
    </script>
<script>
    $('#order_detail').change(function(){
        var order_status = $(this).val();
        var order_id = $(this).children(':selected').attr("id");
        var _token = $('input[name="_token"]').val();
        // alert('da change');
        // alert(order_status);
        // alert(order_id);
        quantity = [];
        $("input[name='product_sales_quantity']").each(function(){
            quantity.push($(this).val());
        });
        order_product_id = [];
        $("input[name='order_product_id']").each(function(){
            order_product_id.push($(this).val());
        });
        // alert(quantity);
        // alert(order_product_id);
        j=0;
        for(i=0;i<order_product_id.length;i++){
            var order_qty = $('.order_qty' + order_product_id[i]).val();
            var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();
            if(parseInt(order_qty) > parseInt(order_qty_storage)){
                j = j + 1;
                if(j==1){
                    alert('Số lượng sản phẩm trong kho không đủ');
                }
                $('.color_qty' + order_product_id[i].css('background','#000'));
            }
        }
        if(j==0){   
            $.ajax({
                    url : '{{url('/update-order-qty')}}',
                    method: 'POST',
                    data:{order_status:order_status,order_id:order_id,quantity:quantity,order_product_id:order_product_id,_token:_token},
                    success:function(data){
                        alert('Thay đổi trạng thái đơn hàng thành công');
                        location.reload();     
                }
            });
        }
    });
</script>
<!-- <script type="text/javascript">
    $('#order').change(function(){
        alert('123');
    });
</script> -->
<script>
    $('.comment_duyet_btn').click(function(){
        var comment_status = $(this).data('comment_status');
        var comment_id = $(this).data('comment_id');
        var comment_product_id = $(this).attr('id');
        if(comment_status==0){
            var alert = 'Thay đổi trạng thái thành duyệt thành công';
        }else{
            var alert = 'Thay đổi trạng thái thành bỏ duyệt thành công';
        }
        $.ajax({
            url:'{{url('/allow-comment')}}',
            method: 'post',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{comment_status:comment_status,comment_id:comment_id,comment_product_id:comment_product_id},
            success:function(data){
                location.reload();
                $('#notify_comment').html('<span class="text-danger">'+alert+'/span>');
            }
        });
    });
    $('.btn_reply_comment').click(function(){
        var comment_id = $(this).data('comment_id');
        var comment = $('.reply_comment' + comment_id).val();
        var comment_product_id = $(this).data('product_id');
        $.ajax({
            url:'{{url('/reply-comment')}}',
            method: 'post',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{comment:comment,comment_id:comment_id,comment_product_id:comment_product_id},
            success:function(data){
                $('.reply_comment' + comment_id).val('');
                $('#notify_comment').html('<span class="text-danger">Trả lời bình luận thành công/span>');
            }
        });
    })
</script>

<script type="text/javascript">
    $(document).ready(function(){
        fetch_delivery();
        function fetch_delivery(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : '{{url('/select-feeship')}}',
                method: 'POST',
                data:{_token:_token},
                success:function(data){
                   $('#load_delivery').html(data);    
                }
            });    
        }
        $(document).on('blur','.fee_feeship_edit',function(){
            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : '{{url('/update-delivery')}}',
                method: 'POST',
                data:{feeship_id:feeship_id,fee_value:fee_value,_token:_token},
                success:function(data){
                    fetch_delivery();    
                }
            });
        });
        $('.add_delivery').click(function(){
            var city = $('.city').val();
            var province = $('.province').val();
            var wards = $('.wards').val();
            var fee_ship = $('.fee_ship').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : '{{url('/add-delivery')}}',
                method: 'POST',
                data:{city:city,province:province,wards:wards,fee_ship:fee_ship,_token:_token},
                success:function(data){
                    fetch_delivery();    
                }
            });
        });
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajaxSetup({
    			headers: {
        			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    				}
				});
            $.ajax({
                url : '{{url('/select-delivery')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        }); 
    });
</script>
<script>
    CKEDITOR.replace('ckeditor');
    CKEDITOR.replace('ckeditor1');
    CKEDITOR.replace('ckeditor2',{
        filebrowserImageUploadUrl: "{{url('uploads-ckeditor?_token='.csrf_token())}}",
        filebrowserBrowseUrl : "{{url('file-browser?_token='.csrf_token())}}",
        filebrowserUploadMethod: 'form'
    });
    CKEDITOR.replace('ckeditor3');
</script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('backend/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->	

<script type="text/javascript" src="{{asset('backend/js/monthly.js')}}"></script>
<script>
    $('#update_quantity_order').click(function(){
        var order_product_id = $(this).data('product_id');
        var order_qty = $('.order_qty_'+order_product_id).val();
        var order_code = $('.order_code').val();
        var _token = $('input[name="_token"]').val();
        // alert(order_product_id);
        // alert(order_qty);
        // alert(order_code);
        $.ajax({
                url : '{{url('/update-qty')}}',
                method: 'POST',
                data:{order_product_id:order_product_id,order_qty:order_qty,order_code:order_code,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
    });
</script>



<script>
$(document).ready(function(){
    load_gallery();
    function load_gallery(){
        var pro_id = $('pro_id').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:'{{url('/select-gallery')}}',
            method: 'post',
            data:{pro_id:pro_id,_token:_token},
            success:function(data){
                $('#gallery_load').html(data);
            }
        });
    }
    $('#file').change(function(){
        var error = '';
        var files = $('#file')[0].files;
        if(files.length>5){
            error .= '<p>Bạn chỉ phép chọn tối đa 5 ảnh</p>';
        }elseif(files.length==''){
            error .= '<p>Bạn không được bỏ trống</p>';
        }elseif(files.size > 200000){
            error .= '<p>Dung lượng ảnh vượt 2MB</p>';
        }else{
            $('#file').val();
            $('#error.gallery').html('<span class="text-danger">'+error+'</span>');
            return false;
        }
    });
    $(document).on('blur','.edit_gallery_name',function(){
        var gallery_id = $(this).data('gallery_id');
        var gallery_text = $(this).text();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:'{{url('/update-gallery-name')}}',
            method: 'post',
            data:{gallery_id:gallery_id,gallery_text:gallery_text,_token:_token},
            success:function(data){
                load.gallery();
                $('#error.gallery').html('<span class="text-danger">Cập nhật hình ảnh thành công</span>');
            }
        });
    });
    $(document).on('click','.delete_gallery',function(){
        var gallery_id = $(this).data('gallery_id');
        var _token = $('input[name="_token"]').val();
        if(comfirm('Bạn có muốn xóa hình ảnh này không ?')){
            $.ajax({
                url:'{{url('/delete-gallery')}}',
                method: 'post',
                data:{gallery_id:gallery_id,_token:_token},
                success:function(data){
                    load.gallery();
                    $('#error.gallery').html('<span class="text-danger">Xóa hình ảnh thành công</span>');
                }
            });
        }
    });
    $(document).on('change','.file_image',function(){
        var gallery_id = $(this).data('gallery_id');
        var image = document.getElementById('file-' + gallery_id).files[0];
        
        var form_data = new FormData();
        form_data.append('file',document.getElementById('file-' + gallery_id).files[0]);
        form_data.append('gallery_id',gallery_id); 
        $.ajax({
            url:'{{url('/update-gallery')}}',
            method: 'post',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:form_data,
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                load.gallery();
                $('#error.gallery').html('<span class="text-danger">Cập nhật ảnh thành công</span>');
            }
        });
    });
});
</script>

<script>
  $( function(){
    $( "#start_coupon" ).datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat:"yy-mm-dd",
        dateNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
        duration:"slow"

  });
    $( "#end_coupon" ).datepicker({
        prevText: "Tháng trước",
        nextText: "Tháng sau",
        dateFormat:"yy-mm-dd",
        dateNamesMin: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ Nhật"],
        duration:"slow"
  });
});
</script>
</body>
</html>
