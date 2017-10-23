@extends('admin.edit')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
        Chỉnh Sửa Danh Mục
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="{{route('admin.list-category')}}">Danh sách danh mục</a></li>
        <li class="active">General Elements</li>
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

                <div class="alert alert-{!! Session::get('flash_level') !!}">

                    {!! Session::get('flash_message') !!}
                    

                </div>

            @endif

            <form class="form-horizontal" method="post" action="{{ route('admin.post-edit-category',$category-> cate_id) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Tên danh mục :</label>

                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="cate_name" value="{{ $category->  cate_name}}">
                        <span class="help-block" style="color:red;">{{ $errors->first('cate_name') }}</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Slug :</label>

                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="slug" value="{{ $category->  cate_slug}}">
                        <span class="help-block" style="color:red;">{{ $errors->first('slug') }}</span>
                      </div>
                    </div>
               
            
                 </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-info pull-right">Chỉnh sửa</button>
                </div>
              </div>
              <!-- /.box-footer -->
            </form>
            
          </div>
            <!-- /.box -->
       </div>
        <!--/.col (left) -->
       
      </div>
      <!-- /.row -->
    </section>
  <!-- /.content -->
@endsection