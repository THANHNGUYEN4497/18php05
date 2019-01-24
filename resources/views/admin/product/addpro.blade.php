@extends('admin.layoutsadmin')
@section('title_action')
    <h1>
        ProductAction
        <small>Add Product</small>
    </h1>
@endsection
@section('content')
    @if (session('notifyAdd'))
        .<div class="alert alert-success text-center" role="alert">
            <strong style="font-size: 15px;">{{session('notifyAdd')}}</strong>
            {{--  <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>  --}}
        </div>
    @endif
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><strong>Add Info Product</strong></h3>
            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <form action="{{route('AddProduct')}}" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>NameProduct:</label>
                <input type="text" class="form-control" name="namepro" id="">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>PriceProduct:</label>
                <input type="text" class="form-control" name="pricepro" id="">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Sales:</label>
                <input type="text" class="form-control" name="salepro" id="">
              </div>
            </div>
             <div class="col-md-6">
              <div class="form-group">
                  <label>Content Product:</label>
                  <textarea class="form-control" name="contentpro" rows="3" placeholder="Enter ..."></textarea>
                </div>
              <!-- /.form-group -->
             </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Status Product:</label>
                    <input type="text" class="form-control" name="statuspro" id="">
              </div>
              <!-- /.form-group -->
            </div>
             <div class="col-md-6">
              <div class="form-group">
                <label>Images Phone:</label>
                    <input type="file" class="form-control" name="imagespro" id="">
                    @if (session('imgErro'))
                        <div class="alert alert-warning text-center" role="alert">
                            <strong style="font-size: 15px;">{{session('imgErro')}}</strong>
                        </div>
                    @endif
              </div>
              <!-- /.form-group -->
             </div>
             <div class="col-md-6">
              <div class="form-group">
                <label>Category Product:</label>
                    <select class="form-control " name="catepro" id="catePro" style="width: 100%;">
                        @foreach ($dataCategory as $value)
                            <option value="{{$value->id}}">{{$value->titleCate}}</option>
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
                            <option value="{{$value->id}}">{{$value->namebrand}}</option>
                        @endforeach
                    </select>
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

