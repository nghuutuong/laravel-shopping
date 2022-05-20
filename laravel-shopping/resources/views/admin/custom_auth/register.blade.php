<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Đăng ký auth</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="{{asset('backend/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>

<div class="form-login">
		<div class="center">
		<div class="container">
			<div class="text">Đăng ký</div>
				<?php
				$message = Session::get('message');
				if($message){
				echo '<span class="text-alert">'.$message.'</span>';
				Session::put('message',null);
				}
				?>
			<form id="admin_login_form" action="{{URL::to('/register')}}" method="post">
			{{csrf_field()}}
                <div class="data">
                    <input type="text" name="admin_name" placeholder="Điền tên" value="{{old('admin_name')}}" class="ggg">
				</div>
                <div class="data">
                    <input type="text" name="admin_email" placeholder="Điền Email">
				</div>
                <div class="data">
                    <input type="text" name="admin_phone" placeholder="Điền phone {{old('admin_phone')}}">
				</div>
			    <div class="data">
					<input type="password" name="admin_password" placeholder="Điền Password">
				</div>

			
				<a href="#">Quên mật khẩu</a>
			<div class="btn">
						<div class="inner"></div>
			<button type="submit" value="Đăng ký" name="register">Đăng ký</button>
					</div>
			<!-- <div class="signup-link">
			Not a member? <a href="#">Signup now</a></div> -->
		</form>
		<a href="{{URL('/login-facebook')}}">Login Facebook</a>
		<a href="{{URL('/register-auth')}}">Đăng ký auth</a>
        <a href="{{URL('/login-auth')}}">Đăng nhập auth</a>
		</div>
	</div>
</div>

<!-- <div class="form-login">
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Đăng nhập</h2>

		<form id="admin_login_form" action="{{URL::to('/admin-dashboard')}}" method="post">
			{{csrf_field()}}
			<input type="text" class="ggg" name="admin_email" placeholder="Điền Email" 
			required messages="Bạn chưa điền Email">
			<input type="password" class="ggg" name="admin_password" placeholder="Điền Password">
			<h6 style="margin-top: 3rem"><a href="#">Quên mật khẩu</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Đăng nhập" name="login">
		</form>
		 <p>Chưa có tài khoản<a href="registration.html">Tạo tài khoản</a></p>
</div>
</div>
</div> -->
<script>
    $().ready(function() {
	$("#admin_login_form").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"admin_email": {
				required: true,
				email: true
			},
			"admin_password": {
				required: true
			// },
			// "re-password": {
			// 	equalTo: "#password",
			// 	minlength: 8
			}
		},
		messages: {
			"admin_email": {
				required: "Bạn chưa nhập Email",
				email: "Bạn chưa nhập email đúng mẫu"
			},
			"admin_password": "Bạn chưa nhập password"
		}
	});
});
</script>

<script src="{{asset('backend/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('backend/js/scripts.js')}}"></script>
<script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('backend/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
