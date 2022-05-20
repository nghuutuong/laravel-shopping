@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm mã giảm giá
                </header>
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form id="add_category_form" role="form" action="{{URL::to('/add-coupon-code')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên mã giảm giá</label>
                            <input type="text" class="form-control" name="coupon_name" id="exampleInputEmail1" placeholder="Điền tên mã">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mã giảm giá</label>
                            <!-- <textarea style="resize:none" rows="5" name="coupon_code" 
                            class="form-control" id="ckeditor3" placeholder="Mô tả danh mục">
                            </textarea> -->
                            <input type="text" class="form-control" name="coupon_code" id="exampleInputEmail1" placeholder="Điền mã">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số lượng mã</label>
                            <!-- <textarea style="resize:none" rows="5" name="coupon_times" 
                            class="form-control" id="ckeditor3" placeholder="Mô tả danh mục">
                            </textarea> -->
                            <input type="text" class="form-control" name="coupon_times" id="exampleInputEmail1" placeholder="Điền số lượng mã">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày bắt đầu</label>
                            <input type="text" class="form-control" name="coupon_start" id="start_coupon" placeholder="Điền tên mã">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày kết thúc</label>
                            <input type="text" class="form-control" name="coupon_end" id="end_coupon" placeholder="Điền tên mã">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tính năng mã</label>
                            <select name="coupon_option" class="form-control input-sm m-bot15">
                                <option value="0">Giảm theo phầm trăm</option>
                                <option value="1">Giảm theo tiền</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số tiền giảm</label>
                            <input type="text" class="form-control" name="coupon_value" id="exampleInputEmail1" placeholder="Nhập giá trị mã">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tính năng mã</label>
                            <select name="coupon_status" class="form-control input-sm m-bot15">
                                <option value="1">Dùng được</option>
                                <option value="0">Không dùng được</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="add_coupon">Thêm mã</button>
                    </form>
                    </div>
                </div>
            </section>
    </div>
</div>


<script>
    $().ready(function() {
	$("#add_category_form").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"category_product_name": {
				required: true,
			},
			"category_product_desc": {
				required: true
			// },
			// "re-password": {
			// 	equalTo: "#password",
			// 	minlength: 8
			}
		},
		messages: {
			"brand_product_name": {
				required: "Bạn chưa nhập tên danh mục"
			},
			"brand_product_desc": "Bạn chưa nhập ghi chú về danh mục"
		}
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

<script src="{{asset('backend/js/jquery.validate.min.js')}}"></script>

@endsection