@extends('admin.layoutsadmin')
<style type="text/css" media="screen">
img.slider {
    width: 180px;
    height: 70px;
    overflow: hidden;
    object-fit: cover;
    object-position: center;
}
</style>
@section('title_action')
    <h1>
        SliderAction
        <small>List Data Slider</small>
    </h1>
@endsection
@section('content')
    @if (session('notifyDelete'))
        <div class="alert alert-danger text-center" role="alert">
            <strong style="font-size: 15px;">{{session('notifyDelete')}}</strong>
        </div>
    @endif
    @if (session('notifysuccess'))
        <div class="alert alert-success text-center" role="alert">
            <strong style="font-size: 15px;">{{session('notifysuccess')}}</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">LIST DATA SLIDER</h3>
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
                  <th>TitleSlider</th>
                  <th>BrandSlider</th>
                  <th>ImageSlider</th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                  <th>Action</th>
                </tr>
                @foreach ($dataSlider as $value)
                <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->titleslider}}</td>
                    <td>{{$value->connectBrand->namebrand}}</td>
                    <td>
                        <img src="{{asset('images/slider/')}}{{"/".$value->imageslider}}" class="img slider" alt="">
                    </td>
                    <td>{{$value->created_at}}</td>
                    <td>{{$value->updated_at}}</td>
                    <td>
                        <a class="btn btn-primary" href="EditSlider/{{$value->id}}"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-danger" href="DeleteSlider/{{$value->id}}"><i class="fa fa-remove"></i></a>
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
