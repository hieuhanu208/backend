@extends('admin.dashboard')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
        Thêm mới tin tức
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="{{ route('admin.list-news')}}">Quản lí tin tức</a></li>
        <li><a href="#" class="active">Thêm tin tức</a></li>
        
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
            <form class="form-horizontal" method="post" action="{{ route('admin.post-news') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Tên tin tức :</label>

                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="header" value="{{ old('header')}}">
                        <span class="help-block" style="color:red;">{{ $errors->first('header') }}</span>
                      </div>
                    </div>


                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Mô tả:</label>

                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="short_description" value="{{ old('short_description')}}">
                        <span class="help-block" style="color:red;">{{ $errors->first('short_description') }}</span>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Nội dung:</label>

                      <div class="col-sm-6">
                        <textarea  class="form-control" name="content" value="{{ old('content')}}" cols ="140" rows = "10"></textarea>
                        <span class="help-block" style="color:red;">{{ $errors->first('content') }}</span>
                      </div>
                    </div>
                    

                    
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label"> Email :</label>

                      <div class="col-sm-6">
                        <select class="form-control" name="email">
                          <option value="">Mời chọn</option>
                          @if(isset($user))
                            @foreach($user as $listUser)
                              <option value="{{ $listUser->id  }}">{{ $listUser->email }}</option>
                            @endforeach
                          @endif

                        </select>
                        <span class="help-block" style="color:red;">{{ $errors->first('email') }}</span>
                      </div>
                    </div>

                    


                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label"> Thành viên :</label>

                      <div class="col-sm-6">
                        <select class="form-control" name="user_id">
                          <option value="">Mời chọn</option>
                          @if(isset($user))
                            @foreach($user as $listUser)
                              <option value="{{ $listUser->id  }}">{{ $listUser->name }}</option>
                            @endforeach
                          @endif

                        </select>
                        <span class="help-block" style="color:red;">{{ $errors->first('user_id') }}</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label"> Ảnh tiêu đề  :</label>

                      <div class="col-sm-6">
                        <input type="file" name="news_img" id="exampleInputFile" accept="image/*">
                        <span class="help-block" style="color:red;">{{ $errors->first('news_img') }}</span>
                      </div>
                    </div>

                 </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-info pull-right">Thêm Mới</button>
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


@push('pageScripts')
<script>
  $(document).ready(function() {
   CKEDITOR.replace('content');
  });
  </script>
@endpush