@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm vận chuyển
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
                        <form>
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chọn thành phố</label>                           
                            <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                <option value="0">--Chọn thành phố--</option>
                                @foreach($city as $key => $ct)
                                <option value="{{$ct->matp}}">{{$ct->name_city}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chọn quận huyện</label>                           
                            <select name="province" id="province" class="form-control input-sm m-bot15 choose province">
                                <option value="">Chọn quận huyện</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chọn xã phường</label>                           
                            <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                <option value="">Chọn xã phường</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phí vận chuyển</label>
                            <input type="text" class="form-control fee_ship" name="fee_ship" id="exampleInputEmail1" placeholder="Điền tên sản phẩm">
                        </div>
                        <button type="button" class="btn btn-info add_delivery" name="add_delivery">Thêm phí vận chuyển</button>
                    </form>
                    </div>
                    <div id="load_delivery" ></div>
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