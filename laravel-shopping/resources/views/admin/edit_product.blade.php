@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật sản phẩm
                </header>
                <div class="table-responsive">
                        @if(Session()->has('message'))
						<div class="alert alert-success">
							{!! session()->get('message') !!}
						</div>
						@elseif(session()->has('error'))
						<div class="alert alert-danger">
							{!! session()->get('error') !!}
						</div>
					    @endif
                    </div>
                <div class="panel-body">
                    <div class="position-center">
                    @foreach($edit_product as $key => $pro)
                        <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" 
                            value="{{$pro->product_name}}">
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                            <input type="text" class="form-control" name="product_quantity" id="exampleInputEmail1" 
                            value="{{$pro->product_quantity}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá bán</label>
                            <input type="text" class="form-control" name="product_price" id="exampleInputEmail1" 
                            value="{{$pro->product_price}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá gốc</label>
                            <input type="text" class="form-control" name="price_cost" id="exampleInputEmail1" 
                            value="{{$pro->price_cost}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" value="{{'uploads/product/'.$pro->product_image}}">
                            <img src="{{URL::to('uploads/product/'.$pro->product_image)}}" width="100" height="100" >
                         </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <input type="text" class="form-control" name="product_desc" id="exampleInputEmail1" 
                            value="{{$pro->product_desc}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                            <textarea style="resize:none" id="ckeditor3" rows="5" name="product_content" 
                            class="form-control" id="exampleInputPassword1">
                            {{$pro->product_content}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tags của sản phẩm</label>
                            <input type="text" data-role="tagsinput" value="{{$pro->product_tags}}" name="product_tags" class="form-control">
                        </div>
                        <input type="hidden" name="product_sold" value="{{$pro->product_sold}}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach($category_product as $key => $cate)
                                    @if($cate->category_id==$pro->category_id)
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @else
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thương hiệu sản phẩm</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                            @foreach($brand_product as $key => $brand)
                                @if($brand->brand_id == $pro->brand_id)
                                <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @else
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endif
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
                        <button type="submit" class="btn btn-info" name="update_product">Cập nhật sản phẩm</button>
                    </form>
                    @endforeach
                    </div>
                </div>
            </section>
    </div>
</div>

@endsection