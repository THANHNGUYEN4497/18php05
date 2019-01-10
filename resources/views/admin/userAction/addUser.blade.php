@extends('admin.layoutsadmin')

@section('content')
    @if (session('notify'))
        .<div class="alert alert-success text-center" role="alert">
            <strong style="font-size: 15px;">{{session('notify')}}</strong>
        </div>
    @endif
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>Add Info User</strong></h3>
            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
    </div>
        <!-- /.box-header -->
        <div class="box-body">
        <form action="AddUser" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>FullName:</label>
                <input type="text" class="form-control" name="fullname" id="">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>UserName:</label>
                <input type="text" class="form-control" name="username" id="">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password" id="">
              </div>
            </div>
             <div class="col-md-6">
              <div class="form-group">
                <label>Confirm Password</label>
                    <input type="password" class="form-control" name="confPassword" id="">
              </div>
              <!-- /.form-group -->
             </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>E-mail</label>
                    <input type="email" class="form-control" name="email" id="">
              </div>
              <!-- /.form-group -->
            </div>
             <div class="col-md-6">
              <div class="form-group">
                <label>Address</label>
                    <input type="text" class="form-control" name="address" id="">
              </div>
              <!-- /.form-group -->
             </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="birthday" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Avatar</label>
                    <input type="file" class="form-control" name="avatar" id="">
              </div>
              <!-- /.form-group -->
             </div>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <label>
                Admin
                  <input type="radio" name="checkadmin" value="1" class="minimal-red" checked>
                </label>&nbsp;
                <label>
                User
                  <input type="radio" name="checkadmin" value="0"  class="minimal-red">
                </label>

              </div>
            </div>
          </div>
          <!-- /.row -->
          <button type="submit" class="btn btn-primary btn-block"><strong style="font-size: 15px;">Submit Server</strong></button>
          </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
          the plugin.
        </div>
      </div>
      <!-- /.box -->
@endsection

