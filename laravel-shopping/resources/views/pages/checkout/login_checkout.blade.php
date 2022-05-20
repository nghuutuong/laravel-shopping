@extends('layout')
@section('content')	
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng nhập tài khoản</h2>
                    <form id="customer_login_form" action="{{URL::to('/login-customer')}}">
                        {{csrf_field()}}
                        <input type="text" name="email_account" placeholder="Tài khoản"/>
                        <input type="password" name="password_account" placeholder="Password"/>
                        <span>
                            <input type="checkbox" class="checkbox">
                            Ghi nhớ đăng nhập
                        </span>
                        <span>
                            <a href="{{url('/forget-password')}}">Quên mật khẩu</a>
                        </span>
                        <button type="submit" class="btn btn-default">Đăng nhập</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Đăng ký tài khoản</h2>
                    <form id="customer_registion_form" action="{{URL::to('/add-customer')}}" >
                        {{csrf_field()}}
                        <input type="email" name="customer_email" placeholder="Email"/>
                        <input type="text" name="customer_name" placeholder="Họ và tên"/>
                        <input type="text" name="customer_phone" placeholder="Phone"/>
                        <input type="password" name="customer_password" placeholder="Mật khẩu"/>
                        <button type="submit" class="btn btn-default">Đăng ký</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->


<script>
    $(document).ready(function() {
	$("#customer_registion_form").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"customer_email": {
				required: true,
                email: true
			},
			"customer_name": {
				required: true,
                minlength: 6
			},
            "customer_phone": {
				required: true,
                number: true
			},
            "customer_password": {
				required: true,
                minlength: 6
			}
		},
		messages: {
			"customer_email": {
				required: "Bạn chưa nhập tài khoản email",
                email: "Nhập chưa đúng mẫu example@gmail.com"
			},
			"customer_name":{
                required: "Bạn chưa nhập mật khẩu",
                minlength: "Tên phải có ít nhất 6 ký tự"
            },
            "customer_phone": {
				required: "Bạn chưa nhập tài khoản email",
                email: "Nhập chưa đúng mẫu example@gmail.com"
			},
            "customer_password": {
				required: "Bạn chưa nhập password",
                email: "Password phải có ít nhất 6 ký tự"
			}
		}
	});
});
</script>

<script>
    $(document).ready(function() {
	$("#customer_login_form").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"email_account": {
				required: true,
                email: true
			},
			"password_account": {
				required: true,
                // minlength: 6
			}
		},
		messages: {
			"email_account": {
				required: "Bạn chưa nhập tài khoản email",
                email: "Nhập chưa đúng mẫu example@gmail.com"
			},
			"password_account": {
                required: "Bạn chưa nhập mật khẩu",
                minlength: "Nhập sai mật khẩu vui lòng nhập lại"
            } 
		}
	});
});
</script>

@endsection