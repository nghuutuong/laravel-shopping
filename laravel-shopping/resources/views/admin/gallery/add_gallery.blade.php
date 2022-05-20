@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê thương hiệu sản phẩm
    </div>
    <div class="table-responsive">
 
          <?php
              $message = Session::get('message');
              if($message){
                  echo '<span class="text-alert">'.$message.'</span>';
                  Session::put('message');
              }
          ?>
          <form action="{{url('/insert-gallery/'.$pro_id)}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row">
              <div class="rol-md-3" align="right">
              
              </div>
              <div class="col-md-6">
                <input type="file" class="form-control" id="file" name="file[]" accept="image/" multiple>
                <span id="error-gallery"></span>
              </div>
              <div class="rol-md-3">
                <input type="submit" name="upload" name="taianh" value="Tải ảnh" class="btn btn-succes btn-xs">
              </div>
          </div>
          </form>
    </div>
  </div>
  <div class="panel-body">
              <input type="hidden" value="{{$pro_id}}" name="pro_id" class="pro_id">
              <form>
              @csrf
              <div id="gallery_load">
              
        </div>
        </form>
  </div>
</div>
@endsection