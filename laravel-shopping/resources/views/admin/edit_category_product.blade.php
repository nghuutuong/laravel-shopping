@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục sản phẩm
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
                        <form role="form" action="{{URL::to('/update-category-product/'.$edit_category_product->category_id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" value="{{$edit_category_product->category_name}}" class="form-control" name="category_product_name" id="exampleInputEmail1" placeholder="Điền tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả danh mục</label>
                            <input type="text" value="{{$edit_category_product->category_desc}}" name="category_product_desc" class="form-control" id="convert_slug" >
                        </div>
                        <div class="form-group">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="category_product_status" class="form-control input-sm m-bot15" >
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                    
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="update_category_product">Cập nhật danh mục</button>
                    </form>
                    </div>
                </div>
            </section>
    </div>
</div>

@endsection