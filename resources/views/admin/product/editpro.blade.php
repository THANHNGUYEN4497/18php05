<style>
    img {
        height: 140px;
        width: 145px;
        -o-object-fit: cover;
        -o-object-position: center;
        border: 1px solid #000;
        margin-bottom: 10px;
    }
</style>
@extends('admin.layoutsadmin')
@section('title_action')
    <h1>
        UserAction
        <small>Edit User</small>
    </h1>
@endsection
@section('content')
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
        <form action="{{route('postEditProduct')}}" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
          <div class="row">
            <input type="hidden" name="id_pro" value="{{$dataOneProduct->id}}">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name Product:</label>
                <input type="text" class="form-control" name="namepro" value="{{$dataOneProduct->namepro}}" id="">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Price Pro:</label>
                <input type="text" class="form-control" name="pricepro" value="{{$dataOneProduct->pricepro}}" id="">
              </div>
              <!-- /.form-group -->
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Sales</label>
                    <input type="text" class="form-control" name="salepro" value="{{$dataOneProduct->salepro}}" id="">
              </div>
              <!-- /.form-group -->
            </div>
              <div class="col-md-6">
              <div class="form-group">
                  <label>Content Product:</label>
                  <textarea class="form-control" name="contentpro"  placeholder="" rows="3">{{$dataOneProduct->contentpro}}</textarea>
                </div>
              <!-- /.form-group -->
             </div>
             <div class="col-md-6">
              <div class="form-group">
                <label>Category Product</label>
                    <select class="form-control " name="catepro" id="catePro" style="width: 100%;">
                        @foreach ($dataCate as $value)
                            <option value="{{$value->id}}" @if ($value->id == $dataOneProduct->id_cate)
                                {{"selected"}}
                            @endif >
                                {{$value->titleCate}}
                            </option>
                        @endforeach
                </select>
              </div>
              <!-- /.form-group -->
            </div>
             <div class="col-md-6">
              <div class="form-group">
                <label>Brand Product:</label>
                    <select class="form-control " name="brandpro" id="brandPro" style="width: 100%;">
                        @foreach ($dataBrand as $value)
                            <option value="{{$value->id}}" @if ($value->id == $dataOneProduct->id_brand)
                                {{"selected"}}
                            @endif>
                                {{$value->namebrand}}
                            </option>
                        @endforeach
                    </select>
              </div>
              <!-- /.form-group -->
            </div>
             <div class="col-md-6">
              <div class="form-group">
                <label>Status Product</label>
                    <input type="text" class="form-control" name="statuspro" value="{{$dataOneProduct->statuspro}}" id="">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Avatar</label>
                    <img src="{{asset('images/product/').'/'}}{{$dataOneProduct->imagePro}}" class="" alt="">
                    <input type="hidden" class="form-control" name="oldImage" value="{{$dataOneProduct->imagePro}}" id="">
                    <input type="file" class="form-control" name="newImage" id="">
                     @if (session('imageError'))
                        <p class="text-danger"><strong>{{session('imageError')}}</strong></p>
                    @endif
              </div>
              <!-- /.form-group -->
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
@section('processScript')
    <script>
    $(document).ready(function(){
        $("#catePro").change(function(){
            var idCate = $(this).val();
            $.get("http://laravel-dev.com:8000//admin/ProductAction/getDataBrand/"+idCate,function(data){
                $("#brandPro").html(data);
            });
        });
    });
</script>
@endsection

