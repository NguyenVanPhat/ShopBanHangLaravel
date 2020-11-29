@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê users
    </div>
    <div class="row w3-res-tb">
     
      
    </div>
    <div class="table-responsive">
        <?php
        $message=Session::get('message');

        if($message){
            echo '<span style="width: 100%;text-align:center;color: red;">'.$message.' </span>';
            Session::put('message',null);
        }
    ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
          
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
               
              
                <td>{{ $user->admin_name }}</td>
                <td>{{ $user->admin_email }} <input type="hidden" name="admin_email" value="{{ $user->admin_email }}"> <input type="hidden" name="admin_id" value="{{ $user->admin_id}}"></td>
                <td>{{ $user->admin_phone }}</td>
                <td>{{ $user->admin_password }}</td>
                <td><input type="checkbox" name="author_role" {{$user->hasRole('author') ? 'checked' : ''}}></td>
                <td><input type="checkbox" name="admin_role"  {{$user->hasRole('admin') ? 'checked' : ''}}></td>
                <td><input type="checkbox" name="user_role"  {{$user->hasRole('user') ? 'checked' : ''}}></td>

              <td>                                    
                <p style="margin: 0 0 12px 0"> <input type="submit" value="Phân Quyền" class="btn btn-sm btn-default"></p>

                <a href=" {{ URL::To('/delete-user-roles/'.$user->admin_id) }}" class="btn btn-sm btn-danger"> Xóa Người Dùng </a>               
              </td> 

              </tr>
            </form>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$admin->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection