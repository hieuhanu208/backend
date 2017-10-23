@extends('admin.edit')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
       Chỉnh sửa Slide
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="{{route('admin.list-slide')}}">Quản lí slide</a></li>
        <li class="active">Chỉnh sửa slide</li>
      </ol>
  </section>
  <!-- Main content -->
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if(Session::has('flash_message'))
            
                            <div class="alert alert-{!! Session::get('flash_lavel') !!}">
            
                                {!! Session::get('flash_message') !!}
                              
                            </div>
            
                        @endif

            @if(isset($slide))
            <form class="form-horizontal" method="post" action="{{ route('admin.post-edit-slide',$slide->id) }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Link slide :</label>

                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="url" value="{{ $slide->url }}">
                        <span class="help-block" style="color:red;">{{ $errors->first('url') }}</span>
                      </div>
                    </div>

                    
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label"> Image :</label>

                      <div class="col-sm-6">
                        <input type="file" name="image" id="exampleInputFile">
                        <img width="80" height="80" class="attachment-img" src="/source/image/slide/{{ $user->image }}" alt="Attachment Image">
                        <span class="help-block" style="color:red;">{{ $errors->first('image') }}</span>
                      </div>
                    </div>
            
                 </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-warning pull-right">Chỉnh sửa</button>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
            @endif
          </div>
            <!-- /.box -->
       </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
  <!-- /.content -->
@endsection