@extends('admin.layoutsadmin')
@section('title_action')
    <h1>
        CategoryAction
        <small>Add Category</small>
    </h1>
@endsection
@section('content')
    @if (session('addcate'))
        .<div class="alert alert-success text-center" role="alert">
            <strong style="font-size: 15px;">{{session('addcate')}}</strong>
            {{--  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>  --}}
        </div>
    @endif
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>Add Info Category</strong></h3>
            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <form action="{{route('AddCategory')}}" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Category:</label>
                <input type="text" class="form-control" name="category" id="">
              </div>
              <!-- /.form-group -->
            </div>
            {{--  <div class="col-md-6">
              <div class="form-group">
                <label>Avatar</label>
                    <input type="file" class="form-control" name="avatar" id="">
                    @if (session('notify_errorUpload'))
                        <p class="text-danger"><strong>{{session('notify_errorUpload')}}</strong></p>
                    @endif
              </div>
              <!-- /.form-group -->
             </div>
          </div>  --}}
                <div class="col-md-6">
                    <label>Go to server</label>
                    <button type="submit" class="btn btn-primary btn-block"><strong style="font-size: 15px;">Submit Server</strong></button>
                </div>
           </div>
          <!-- /.row -->
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

