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
                        <form role="form" action="{{URL::to('/update-brand-product/'.$edit_brand_product -> brand_id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" value="{{$edit_brand_product->brand_name}}" class="form-control" name="brand_product_name" id="exampleInputEmail1" placeholder="Điền tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <input type="text" value="{{$edit_brand_product->brand_desc}}" class="form-control" name="brand_product_desc" id="exampleInputEmail1" placeholder="Điền tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="brand_product_status" class="form-control input-sm m-bot15" >
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                    
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="update_brand_product">Cập nhật thương hiệu</button>
                    </form>
                    </div>
                </div>
            </section>
    </div>
</div>

@endsection