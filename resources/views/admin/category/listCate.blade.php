<style type="text/css" media="screen">
img {
    width: 40px;
    height: 40px;
    overflow: hidden;
    object-fit: cover;
    object-position: center;
    border: 0.3px solid #333;
}
</style>
@extends('admin.layoutsadmin')
@section('title_action')
    <h1>
        CategoryAction
        <small>List Data Category</small>
    </h1>
@endsection
@section('content')
    @if (session('delecate'))
        <div class="alert alert-danger text-center" role="alert">
            <strong style="font-size: 15px;">{{session('delecate')}}</strong>
        </div>
    @endif
    @if (session('editcate'))
        <div class="alert alert-success text-center" role="alert">
            <strong style="font-size: 15px;">{{session('editcate')}}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">LIST DATA CATEGORY</h3>

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
                  <th>Category</th>
                  <th>Created_at</th>
                  <th>Update_at</th>
                  <th>Action</th>
                </tr>
                @foreach ($dataCategory as $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->titleCate}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>{{$value->updated_at}}</td>
                    <td>
                        <a class="btn btn-primary" href="EditCategory/{{$value->id}}"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-danger" href="DeleteCategory/{{$value->id}}"><i class="fa fa-remove"></i></a>
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
