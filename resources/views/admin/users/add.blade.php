@extends('admin.dashboard')
@section('content')

      <section class="content-header">
        <h1>
         Thêm mới người dùng
        </h1>
        <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="{{route('admin.list-user')}}">Quản lí người dùng</a></li>
        <li class="active">Danh sách người dùng</li>
          <li class="active">Thêm mới</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">

              <form class="form-horizontal" method="POST" action="#" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                  <div class="form-group">
                    <label for="pwd">Tên người dùng</label>
                    <input type="text" class="form-control" id="pwd" name ="txtUser" >
                    <span class="help-block" style="color:red;">{{ $errors->first('txtUUsser')}}</span>
                  </div>
                  <div class="form-group">
                    <label for="usr">Email:</label>
                    <input type="text" class="form-control" id="usr" name="email"  >
                    <span class="help-block" style="color:red;">{{ $errors->first('email')}}</span>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Mật Khẩu</label>
                    <input type="password" class="form-control" id="pwd" name="pass">
                    <span class="help-block" style="color:red;">{{ $errors->first('pass')}}</span>
                  </div>

                  <div class="form-group">
                    <label for="pwd">Thời gian tạo</label>
                    <input type="date" class="form-control" id="usr" name = "timestamp">
                  </div>
                  <div class="form-group">


                    <div class="form-group" style=" padding-left: 15px">
                      <label>User_role:</label>
                      <div>
                        @if(\Illuminate\Support\Facades\Auth::user()->level !=2)
                        <label class="radio-inline">
                          <input name ="level" value="0" type="radio"  >

                          0.User

                        </label>
                        <label class="radio-inline">
                          <input name ="level" value="1" type="radio"  >
                          1.Admin

                        </label>
                        <label class="radio-inline">
                          <input name ="level" value="2" type="radio" disabled>
                          2.SuperAdmin

                        </label>
                        @else
                          <label class="radio-inline">
                            <input name ="level" value="0" type="radio"  >

                            0.User

                          </label>
                          <label class="radio-inline">
                            <input name ="level" value="1" type="radio"  >
                            1.Admin

                          </label>
                          <label class="radio-inline">
                            <input name ="level" value="2" type="radio"  >
                            2.SuperAdmin

                          </label>
                          @endif


                      </div>

                    </div>
                  <div class="box-footer">
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-info pull-right">Thêm mới</button>
                    </div>
                  </div>
                </div>

                <!-- /.box-body -->
                <!-- /.box -->
                </div>
              </form>

            </div>
            
            <!-- /.box -->
          
          </div>

          
          <!-- /.col -->
        </div>
       
        <!-- /.row -->
      </section>
      <!-- /.content -->
      
      

    @endsection
 