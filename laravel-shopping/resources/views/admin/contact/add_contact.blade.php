@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thông tin liên hệ
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
                    @foreach($contact as $key => $contact)
                        <form id="add_brand_form" role="form" action="{{URL::to('/update-contact/'.$contact->contact_id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thông tin liên hệ</label>
                            <textarea style="resize:none" rows="5" value="" name="contact_info" 
                            class="form-control" id="ckeditor1" placeholder="Mô tả danh mục">
                            {{$contact->contact_info}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Bản đồ</label>
                            <textarea style="resize:none" value="" rows="5" name="contact_map" 
                            class="form-control" id="ckeditor2" placeholder="Mô tả danh mục">
                            {{$contact->contact_map}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Fanpage</label>
                            <textarea style="resize:none" rows="5" name="contact_fanpage" 
                            class="form-control" id="ckeditor3" placeholder="Mô tả danh mục">
                            {{$contact->contact_fanpage}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="contact_image" value="{{$contact->contact_image}}" class="form-control">
                            <img src="{{URL::to('uploads/product/contact/'.$contact->contact_image)}}" width="100" height="100" >
                        </div>
                        <button type="submit" class="btn btn-info" name="add_contact">Thêm thông tin liên lạc</button>
                    </form>
                @endforeach
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