@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục bài viết
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
            <th>Tên bài viết</th>
            <th>Hiển thị</th>
            <th>Hành động</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($category_post as $key => $cate_post)
          <tr>
            <td>{{$cate_post->cate_post_name}}</td>
            <td>
              @if($cate_post->cate_post_status==0)
                <span style="color:green">Hiển thị</span> 
              @else
              <span style="color:red">Ẩn</span> 
              @endif
            </td>
            <td>
              <a href="{{URL::to('/edit-category-post/'.$cate_post->cate_post_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a onClick="return confirm('Bạn có chắc muốn xóa danh mục này không')" href="{{URL::to('/delete-category-post/'.$cate_post->cate_post_id)}}" class="active" ui-toggle-class="">
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