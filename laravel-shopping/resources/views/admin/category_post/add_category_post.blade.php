@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương danh mục bài viết
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
                        <form id="add_brand_form" role="form" action="{{URL::to('/save-category-post')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục bài viết</label>
                            <input type="text" class="form-control" name="cate_post_name" id="exampleInputEmail1" placeholder="Điền tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục bài viết</label>
                            <textarea style="resize:none" rows="5" name="cate_post_desc" 
                            class="form-control" placeholder="Mô tả danh mục">
                            </textarea>
                        </div>
                        <select name="cate_post_status" class="form-control input-sm m-bot15">
                            <option value="0">Hiển thị</option>
                            <option value="1">Ẩn</option>
                        </select>
                        <button type="submit" class="btn btn-info" name="add_category_post">Thêm danh mục bài viết</button>
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
			"cate_post_name": {
				required: true,
			},
			"cate_post_desc": {
				required: true
			}
		},
		messages: {
			"cate_post_name": {
				required: "Bạn chưa nhập tên danh mục bài viết"
			},
			"cate_post_desc": "Bạn chưa nhập ghi chú danh mục"
		}
	});
});
</script>

<script src="{{asset('backend/js/jquery.validate.min.js')}}"></script>

@endsection