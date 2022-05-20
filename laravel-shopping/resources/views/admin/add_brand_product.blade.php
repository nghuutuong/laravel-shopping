@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
                </header>
                @if(Session()->has('message'))
						<div class="alert alert-success">
							{!! session()->get('message') !!}
						</div>
					@endif
                <div class="panel-body">
                    <div class="position-center">
                        <form id="add_brand_form" role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" class="form-control" name="brand_product_name" id="exampleInputEmail1" placeholder="Điền tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <input type="text" class="form-control" name="brand_product_desc" id="exampleInputEmail1" >

                        </div>
                        <select name="brand_product_status" class="form-control input-sm m-bot15">
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                        <button type="submit" class="btn btn-info" name="add_brand_product">Thêm thương hiệu</button>
                    </form>
                    </div>
                </div>
            </section>
    </div>
</div>

<script>
    $().ready(function() {
	$("#add_brand_form").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"brand_product_name": {
				required: true,
			},
			"brand_product_desc": {
				required: true
			}
		},
		messages: {
			"brand_product_name": {
				required: "Bạn chưa nhập tên thương hiệu"
			},
			"brand_product_desc": "Bạn chưa nhập ghi chú về thương hiệu"
		}
	});
});
</script>

<script src="{{asset('backend/js/jquery.validate.min.js')}}"></script>

@endsection