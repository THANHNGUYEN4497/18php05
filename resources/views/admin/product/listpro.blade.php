<style type="text/css" media="screen">
img {
    width: 40px;
    height: 50px;
    overflow: hidden;
    object-fit: cover;
    object-position: center;
    border: 0.3px solid #333;
}
</style>
@extends('admin.layoutsadmin')
@section('title_action')
    <h1>
        ProductAction
        <small>List Data Product</small>
    </h1>
@endsection
@section('content')
    @if (session('notifyDelete'))
        <div class="alert alert-danger text-center" role="alert">
                <strong style="font-size: 15px;">{{session('notifyDelete')}}</strong>
        </div>
    @endif
    @if (session('editSuccess'))
        <div class="alert alert-success text-center" role="alert">
            <strong style="font-size: 15px;">{{session('editSuccess')}}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">LIST DATA PRODUCT</h3>

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
                  <th>NameProduct</th>
                  <th>PriceProdut</th>
                  <th>ContentProduct</th>
                  <th>Sales</th>
                  <th>Status</th>
                  <th>Category Product</th>
                  <th>Brand Product</th>
                  <th>ImageProduct</th>
                  <th>Action</th>
                </tr>
                @foreach ($dataproduct as $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->namepro}}</td>
                    <td>{{$value->pricepro}}</td>
                    <td>{{$value->contentpro}}</td>
                    <td>{{$value->salepro}}</td>
                    <td>{{$value->statuspro}}</td>
                    <td>{{$value->connectBrand->connectCategory->titleCate}}</td>
                    <td>{{$value->connectBrand->namebrand}}</td>
                    {{-- <td>thanhs</td>
                    <td>thanhs</td> --}}
                    <td>
                        <img src="{{asset('images/product/').'/'}}{{$value->imagePro}}" class="avartarShow" alt="">
                    </td>
                    <td>
                        <a class="btn btn-primary" href="EditProduct/{{$value->id}}"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-danger" href="DeleteProduct/{{$value->id}}"><i class="fa fa-remove"></i></a>
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
