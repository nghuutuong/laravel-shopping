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
                        <form id="add_brand_form" role="form" action="{{URL::to('/insert-slider')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên slide</label>
                            <input type="text" class="form-control" name="slider_name" id="exampleInputEmail1" placeholder="Điền tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" class="form-control" name="slider_image" id="exampleInputEmail1" placeholder="Điền tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả slide</label>
                            <textarea style="resize:none" rows="5" name="slider_desc" 
                            class="form-control" id="ckeditor2" placeholder="Mô tả danh mục">
                            </textarea>
                        </div>
                        <select name="slider_status" class="form-control input-sm m-bot15">
                            <option value="1">Hiển thị slide</option>
                            <option value="0">Ẩn slide</option>
                        </select>
                        <button type="submit" class="btn btn-info" name="add_slide">Thêm slide</button>
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
			"slider_name": {
				required: true,
			},
			"slider_desc": {
				required: true
			}
		},
		messages: {
			"slider_name": {
				required: "Bạn chưa nhập tên thương hiệu"
			},
			"slider_desc": "Bạn chưa nhập ghi chú về thương hiệu"
		}
	});
});
</script>

<script src="{{asset('backend/js/jquery.validate.min.js')}}"></script>

@endsection