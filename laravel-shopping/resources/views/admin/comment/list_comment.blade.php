@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê comment
    </div>
    <div id="notify_comment"></div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
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
            <th>Duyệt</th>
            <th>Tên người bình luận</th>
            <th>Bình luận</th>
            <th>Ngày gửi</th>
            <th>Sản phẩm</th>
            <th>Quản lý</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($comment as $key => $comment)
          <tr>
            
            <td>
            @if($comment->comment_status){
                <input type="button" data-comment_status="0" data-comment_id="{{$comment->comment_id}}" 
                id="{{$comment->comment_product_id}}" class="btn btn-primary btn-xs comment_duyet_btn" value="Duyệt">
            @else
                <input type="button" data-comment_status="1" data-comment_id="{{$comment->comment_id}}" 
                id="{{$comment->comment_product_id}}" class="btn btn-danger btn-xs comment_duyet_btn" value="Bỏ duyệt">
            @endif
            </td>
            <td>{{$comment->comment_name}}</td>
            <td>{{$comment->comment}}<br>    
            @if($comment->comment_status==0)
                <style>
                    ul.list_rep li{
                        list-style:decimal;
                        color:blue;
                        margin:5px 30px;
                    }
                </style>
                <ul class="list-rep">
                    Trả lời:
                    @foreach($comment_rep as $key => $commment_reply)
                        @if($commment_reply->comment_parent_comment==$comment->comment_id)
                            <li> {{$commment_reply->comment}}</li>
                        @endif
                    @endforeach
                </ul>
                <textarea class="form-control reply_comment_{{$comment->comment_id}}" rows="5"></textarea>
                <button class="btn-primary-default btn-xs btn_reply_comment" data-product_id="{{$comment->comment_product_id}}" 
                data-comment_id="{{$comment->comment_id}}">Trả lời bình luận</button>  
            @else
            
            @endif
            </td>   
            <td>{{$comment->comment_date}}</td>
            <td><a href="{{url('/chi-tiet/'.$comment->product->product_id)}}" target="blank"></a>{{$comment->product->product_name}}</td>
            <td>
              <a href="{{URL::to('/edit-comment/'.$comment->comment_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a onClick="return confirm('Bạn có chắc muốn xóa bình luận này không ?')" href="{{URL::to('/delete-comment/'.$comment->comment_id)}}" class="active" ui-toggle-class="">
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
            {{$all_comment->links()}}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection