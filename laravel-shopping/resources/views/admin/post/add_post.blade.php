@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm bài viết
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
                        <form id="add_brand_form" role="form" action="{{URL::to('/save-post')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên bài viết</label>
                            <input type="text" class="form-control" name="post_title" id="exampleInputEmail1" placeholder="Điền tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                            <input type="file" name="post_image" class="form-control">
                         </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                            <textarea style="resize:none" rows="5" name="post_desc" 
                            class="form-control" id="ckeditor2" placeholder="Mô tả danh mục">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung bài viết</label>
                            <textarea style="resize:none" rows="5" name="post_content" 
                            class="form-control" id="ckeditor3" placeholder="Mô tả danh mục">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục bài viết</label>
                            <select name="cate_post_id" class="form-control input-sm m-bot15">
                                @foreach($category_post as $key => $category_post)
                                <option value="{{$category_post->cate_post_id}}">{{$category_post->cate_post_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="post_status" class="form-control input-sm m-bot15">
                                <option value="0">Hiển thị</option>
                                <option value="1">Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="add_post">Thêm bài viết</button>
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