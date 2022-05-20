@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                @if(Session()->has('message'))
						<div class="alert alert-success">
							{!! session()->get('message') !!}
						</div>
					@endif
                    
                <div class="panel-body">
                    <div class="position-center">
                        <form id="add_product_form" role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" 
                            class="form-control" name="product_name" placeholder="Điền tên sản phẩm" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                            <input type="text" class="form-control" name="product_quantity" placeholder="Điền số lượng">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" class="form-control" name="product_price" placeholder="Điền giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá gốc</label>
                            <input type="text" class="form-control" name="price_cost" placeholder="Điền giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control">
                         </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <input type="text" name="product_desc" class="form-control">
                        </div>
                        <input type="hidden" name="product_sold" value="0">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                            <textarea style="resize:none" rows="5" name="product_content" 
                            class="form-control" id="ckeditor3" placeholder="Nội dung sản phẩm" required>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                            @foreach($cate_product as $key => $cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                            @endforeach  
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tags của sản phẩm</label>
                            <input type="text" data-role="tagsinput" name="product_tags" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thương hiệu sản phẩm</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                            @foreach($brand_product as $key => $brand)
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                            @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hiển thị</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="add_product">Thêm sản phẩm</button>
                    </form>
                    </div>
                </div>
            </section>
    </div>
</div>

<script>
    $().ready(function() {
	$("#add_product_form").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"product_name": {
				required: true,
				minlength: 10
			},
			"product_price": {
                required: true,
                number: true
			},
            "product_image": {
                required: true
            },
            "product_desc": {
                required: true
            }
		},
		messages: {
			"product_name": {
				required: "Bạn chưa điền tên sản phẩm",
                minlength: "Bạn chưa nhập ít nhất 3 ký tự"
			},
            "product_quantity": {
                required: "Bạn chưa nhập số lượng",
                number: "Giá tiền phải điền vào kiểu số"
            },
            "price_cost": {
                required: "Bạn chưa nhập tiền gốc",
                number: "Giá tiền phải điền vào kiểu số"
            },
            "product_tags": {
                required: "Bạn chưa thêm tag sản phẩm"
            },
            "product_content": {
                required: "Bạn chưa nhập giá tiền"
            },
            "product_image":{
                required: "Sản phẩm chưa có hình ảnh"
            },
            "product_desc":{
                required: "Chưa ghi chú sản phẩm"
            }
		}
	});
});
</script>

<script src="{{asset('backend/js/jquery.validate.min.js')}}"></script>

@endsection