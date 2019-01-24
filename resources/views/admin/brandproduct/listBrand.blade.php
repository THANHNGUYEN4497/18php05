<style type="text/css" media="screen">
</style>
@extends('admin.layoutsadmin')
@section('title_action')
    <h1>
        BrandAction
        <small>List Data Brand</small>
    </h1>
@endsection
@section('content')
    @if (session('delebrand'))
        <div class="alert alert-danger text-center" role="alert">
            <strong style="font-size: 15px;">{{session('delebrand')}}</strong>
        </div>
    @endif
    @if (session('editbrand'))
        <div class="alert alert-success text-center" role="alert">
            <strong style="font-size: 15px;">{{session('editbrand')}}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">LIST DATA BRAND</h3>
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
                  <th>BrandProduct</th>
                  <th>CategoryProduct</th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                  <th>Action</th>
                </tr>
                @foreach ($databrand as $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->namebrand}}</td>
                    <td>{{$value->connectCategory->titleCate}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>{{$value->updated_at}}</td>
                    <td>
                        <a class="btn btn-primary" href="EditBrand/{{$value->id}}"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-danger" href="DeleteBrand/{{$value->id}}"><i class="fa fa-remove"></i></a>
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
