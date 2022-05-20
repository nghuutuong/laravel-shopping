@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật bài viết
                </header>
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-success">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-post/'.$edit_post->post_id)}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên bài viết</label>
                            <input type="text" class="form-control" name="post_title" id="exampleInputEmail1" 
                            value="{{$edit_post->post_title}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                            <input type="file" name="post_image" class="form-control" id="exampleInputEmail1" value="{{'uploads/post/'.$edit_post->post_image}}">
                            <img src="{{URL::to('uploads/posts/'.$edit_post->post_image)}}" width="100" height="100" >
                         </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả bài viết</label>
                            <textarea style="resize:none" id="ckeditor" rows="5" name="post_desc" 
                            class="form-control" id="exampleInputPassword1">
                            {{$edit_post->post_desc}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung bài viết</label>
                            <textarea style="resize:none" id="ckeditor1" rows="5" name="post_content" 
                            class="form-control" id="exampleInputPassword1">
                            {{$edit_post->post_content}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Danh mục bài viết</label>
                            <select name="cate_post_id" class="form-control input-sm m-bot15">
                                @foreach($category_post as $key => $cate)
                                    @if($cate->cate_post_id == $edit_post->cate_post_id)
                                    <option selected value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                                    @else
                                    <option value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tình trạng</label>
                            <select name="post_status" class="form-control input-sm m-bot15">
                            @if($edit_post->post_status == 0)
                                <option selected value="0">Hiển thị</option>
                                <option value="1">Ẩn</option>
                            @else
                                <option value="0">Hiển thị</option>
                                <option selected value="1">Ẩn</option>
                            @endif
                                
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="update_post">Cập nhật bài viết</button>
                    </form>
              
                    </div>
                </div>
            </section>
    </div>
</div>

@endsection