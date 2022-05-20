@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê Slide
    </div>
  
    <div class="table-responsive">
          @if(Session()->has('message'))
						<div class="alert alert-success">
							{!! session()->get('message') !!}
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
            <th>Tên slide</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Tình trạng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_slide as $key => $slide)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$slide->slider_name}}</td>
            <td><img src="uploads/slider/{{$slide->slider_image}}" width="300" height="125" style="border:1px solid "></td>
            <td>{!!$slide->slider_desc!!}</td>
            <td><span class="text-ellipsis">
            <?php
            if($slide->slider_status==0){
            ?>
               <a href="{{URL::to('/unactive-slider/'.$slide->slider_id)}}"><span class="alert alert-danger" role="alert">Ẩn</span></a>
              <?php
            }else{
              ?>
               <a href="{{URL::to('/active-slider/'.$slide->slider_id)}}"><span class="alert alert-success" role="alert">Hiện</span></a>
              <?php
            }
            ?>
            </span></td>
            <td>
              <a onClick="return confirm('Bạn có chắc muốn xóa danh mục này không')" href="{{URL::to('/delete-slider/'.$slide->slider_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection