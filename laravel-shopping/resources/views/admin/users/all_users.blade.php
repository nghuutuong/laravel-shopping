@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê users
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
          
            <th>Tên user</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Author</th>
            <th>Admin</th>
            <th>User</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($admin as $key => $user)
            <form action="{{url('/assign-roles')}}" method="POST">
              @csrf
              <tr>
               
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{ $user->admin_name }}</td>
                <td>{{ $user->admin_email }} 
                <input type="hidden" name="admin_email" value="{{ $user->admin_email }}"></td>
                <input type="hidden" name="admin_id" value="{{ $user->admin_id }}"></td>
                <td>{{ $user->admin_phone }}</td>
                <td>{{ $user->admin_password }}</td>
                <td><input type="radio" name="author_role" {{$user->hasRole('author') ? 'checked' : ''}}></td>
                <td><input type="radio" name="admin_role"  {{$user->hasRole('admin') ? 'checked' : ''}}></td>
                <td><input type="radio" name="user_role"  {{$user->hasRole('user') ? 'checked' : ''}}></td>
                <td></td>
              <td>
                  
                    
                 <input type="submit" value="Phân quyền" class="btn btn-sm btn-default">
                <a class="btn btn-sm btn-danger" href="{{URL('/delete-user-role/.$user->admin_id')}}">Xóa người dùng</a>
                <!-- <a class="btn btn-sm btn-success" href="{{URL('/impersonate/.$user->admin_id')}}">Chuyển quyền</a> -->

              </td> 

              </tr>
            </form>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Ahihi</small>
          
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$admin->links('name')!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection