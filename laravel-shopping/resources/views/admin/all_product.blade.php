@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>

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
          
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá bán</th>
            <th>Giá gốc</th>
            <th>Thư viện ảnh</th>
            <th>Ảnh sản phẩm</th>
            <th>Mô tả</th>
            <!-- <th>Nội dung</th> -->
            <th>Danh mục</th>
            <th>Tên thương hiệu</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key => $product)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->product_quantity}}</td>
            <td>{{$product->product_price}}</td>
            <td>{{$product->price_cost}}</td>
            <td><a style="text-decoration: underline; font-weight:bold" href="{{url('/add-gallery/'.$product->product_id)}}">Thêm</a></td>
            <td><img src="uploads/product/{{$product->product_image}}" width="100" height="100" style="border:1px solid "></td>
            <!-- <td>{!!$product->product_content!!}</td> -->
            <td>{!!$product->product_desc!!}</td>
            <td>{{$product->category_name}}</td>
            <td>{{$product->brand_name}}</td>
            <td><span class="text-ellipsis">
            <?php
            if($product->product_status==0){
            ?>
               <a href="{{URL::to('/unactive-product/'.$product->product_id)}}"><span class="alert alert-danger" role="alert">Ẩn</span></a>
              <?php
            }else{
              ?>
               <a href="{{URL::to('/active-product/'.$product->product_id)}}"><span class="alert alert-success" role="alert">Hiện</span></a>
              <?php
            }
            ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-product/'.$product->product_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a onClick="return confirm('Bạn có chắc muốn xóa sản phẩm này không')" href="{{URL::to('/delete-product/'.$product->product_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {{$all_product->links('name')}}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection