@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục sản phẩm
    </div>

    <div class="table-responsive">
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
          
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên danh mục</th>
            <th>Hiển thị</th>
            <th>Hành động</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody >
          @foreach($all_category_product as $key => $category_product)
          <tr id="{{$category_product->category_id}}">
            <td>{{$category_product->category_name}}</td>
            <td><span class="text-ellipsis">
            <?php
            if($category_product->category_status==0){
            ?>
               <a href="{{URL::to('/unactive-category-product/'.$category_product->category_id)}}"><span class="alert alert-danger" role="alert">Ẩn</span></a>
              <?php
            }else{
              ?>
               <a href="{{URL::to('/active-category-product/'.$category_product->category_id)}}"><span class="alert alert-success" role="alert">Hiện</span></a>
              <?php
            }
            ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-category-product/'.$category_product->category_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a onClick="return confirm('Bạn có chắc muốn xóa danh mục này không')" href="{{URL::to('/delete-category-product/'.$category_product->category_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

            <!--them xuat du lieu bang excel--> 
      <!-- <form action="{{url('/import-csv')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <input type="file" name="file" accept=".xlsx"><br>
       <input type="submit" value="Import CSV" name="import_csv" class="btn btn-warning">
        </form>
       <form action="{{url('/export-csv')}}" method="POST">
          @csrf
       <input type="submit" value="Export CSV" name="export_csv" class="btn btn-success">
      </form> -->


    </div>
    <footer class="panel-footer">
      <div class="row">
        
      
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('#category_order').sortable({
      placeholder: 'ui-state-highlight',
      update: function(event, ui){
        var page_id_array = new Array();
        var _token = $('input[name="_token"]').val();
        $('#category_order_tr').each(function(){
          page_id_array.push($(this).attr('id'));
        });
        $.ajax({
          url:"{{url('/arrange-category')}}";
          method: "post",
          data:{page_id_array:page_id_array,_token:_token},
          success:function(data){
            alert(data);
          }
        });
      }
    });
  });
</script>
@endsection