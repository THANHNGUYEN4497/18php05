@extends('admin.layoutsadmin')
@if (session('notifyDelete'))
    <div class="alert alert-danger text-center" role="alert">
            <strong style="font-size: 15px;">{{session('notifyDelete')}}</strong>
    </div>
@endif
@section('content')
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">LIST DATA USERS</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>FullName</th>
                  <th>UserName</th>
                  <th>Email</th>
                  <th>Birthday</th>
                  <th>Address</th>
                  <th>Role</th>
                  <th>Avatar</th>
                  <th>Action</th>
                </tr>
                @foreach ($dataUser as $value)
                <tr>
                    <td>{{$value['id_user']}}</td>
                    <td>{{$value['fullname']}}</td>
                    <td>{{$value['username']}}</td>
                    <td>{{$value['email']}}</td>
                    <td>{{$value['birthday']}}</td>
                    <td>{{$value['address']}}</td>
                    <td>
                    @if ($value['is_admin'] == 0)
                        {{'User'}}
                     @else{{'Admins'}}
                    @endif
                    </td>
                    <td>{{'Avatar'}}</td>
                    <td>
                        <a class="btn btn-primary" href="DeleteUser/{{$value['id_user']}}"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-danger" href="admin/UserAction/EditUser/{{$value['id_user']}}"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
@endsection
