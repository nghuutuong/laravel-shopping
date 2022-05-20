@extends('layoutfp')
@section('content2')	
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                @if(Session()->has('message'))
                <div class="alert alert-success">
                    {!! session()->get('message') !!}
                </div>
                @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {!! session()->get('error') !!}
                </div>
                @endif    
                <div class="login-form"><!--login form-->
                    <h2>Điền email đăng ký để lấy lại mật khẩu</h2>
                    <form id="customer_login_form" action="{{URL::to('/recover-password')}}" method="POST">
                        {{csrf_field()}}
                        <input type="text" name="email_account" placeholder="Nhập email"/>
                        <button type="submit" class="btn btn-default">Gửi</button>
                    </form>
                </div><!--/login form-->
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