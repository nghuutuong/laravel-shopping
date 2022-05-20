@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
                </header>
                @if(Session()->has('message'))
						<div class="alert alert-success">
							{!! session()->get('message') !!}
						</div>
					@endif
                <div class="panel-body">
                    <div class="position-center">
                        <form id="add_category_form" role="form" action="{{URL::to('/save-category-product')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" name="category_product_name" id="exampleInputEmail1" placeholder="Điền tên sản phẩm">
                        </div>                     
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <input type="text" class="form-control" name="category_product_desc" id="exampleInputEmail1" placeholder="Điền tên sản phẩm">
                        </div>
                        <select name="category_product_status" class="form-control input-sm m-bot15">
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                        <button style="" type="submit" class="btn btn-info" name="add_category_product">Thêm danh mục sản phẩm</button>
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

<script src="{{asset('backend/js/jquery.validate.min.js')}}"></script>

@endsection