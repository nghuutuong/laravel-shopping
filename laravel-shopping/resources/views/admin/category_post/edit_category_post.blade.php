@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa danh mục bài viết
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
                        <form role="form" action="{{URL::to('/update-category-post/'.$edit_category_post -> cate_post_id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" value="{{$edit_category_post->cate_post_name}}" class="form-control" name="cate_post_name" id="exampleInputEmail1" placeholder="Điền tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả</label>
                            <textarea style="resize:none" rows="5" name="cate_post_desc" 
                            class="form-control"  id="exampleInputPassword1" placeholder="Mô tả danh mục">
                            {{$edit_category_post->cate_post_desc}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="cate_post_status" class="form-control input-sm m-bot15" >
                                    @if($edit_category_post->cate_post_status==0)
                                        <option selected value="0">Hiển thị</option>
                                        <option value="1">Ẩn</option>
                                    @else
                                        <option value="0">Hiển thị</option>
                                        <option selected value="1">Ẩn</option>
                                    @endif
                                    
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info" name="update_category_post">Cập nhật danh mục</button>
                    </form>
                    </div>
                </div>
            </section>
    </div>
</div>

@endsection