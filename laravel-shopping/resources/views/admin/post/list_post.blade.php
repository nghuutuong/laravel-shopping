@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bài viết
    </div>
    <div class="table-responsive">
          <?php
              $message = Session::get('message');
              if($message){
                  echo '<span class="text-alert">'.$message.'</span>';
                  Session::put('message');
              }
          ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên bài viết</th>
            <th>Hình ảnh</th>
            <th>Mô tả bài viết</th>
            <th>Danh mục</th>
            <th>Tình trạng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_post as $key => $post)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$post->post_title}}</td>
            <td><img src="{{asset('uploads/posts/'.$post->post_image)}}" width="100" height="100" style="border:1px solid "></td>
            <td>{!!$post->post_desc!!}</td>
            <td>{{$post->category_post->cate_post_name}}</td>
            <td>
            @if($post->post_status==0)
              <span style="color:green">Hiển thị</span> 
            @else
            <span style="color:red">Ẩn</span> 
            @endif
            </td>
            <td>
              <a href="{{URL::to('/edit-post/'.$post->post_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a onClick="return confirm('Bạn có chắc muốn xóa sản phẩm này không')" href="{{URL::to('/delete-post/'.$post->post_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {!!$all_post->links('name')!!}
  </div>
</div>
@endsection