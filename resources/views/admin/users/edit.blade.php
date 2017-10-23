@extends('admin.edit')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chỉnh sửa người dùng

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="{{route('admin.list-user')}}">Quản lí người dùng</a></li>
            <li class="active"> Chỉnh sửa người dùng</li>
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

                    @if(isset($user))
                        <form class="form-horizontal" method="post" action="{{ route('admin.post-edit-user',$user->id) }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="box-body">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="usr">ID:</label>
                                        <input type="text" class="form-control" name="id" disabled="" value="{{$user->id}} ">

                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Name:</label>
                                        <input type="text" class="form-control" id="pwd" name="name" value="{{$user->name}}">
                                        <span class="help-block" style="color:red;">{{ $errors->first('name') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="usr">Email:</label>
                                        <input type="text" class="form-control" id="usr" name="email" value="{{$user->email}}">
                                        <span class="help-block" style="color:red;">{{ $errors->first('email') }}</span>
                                    </div>




                                    <div class="form-group" style=" padding-left: 15px">
                                        <label>User_role:</label>
                                        <div>
                                        <label class="radio-inline">
                                            <input name ="level" value="0" type="radio"   @if(($user->level) == 0)
                                            checked="checked"
                                                    @endif>

                                                0.User

                                        </label>
                                            <label class="radio-inline">
                                                <input name ="level" value="1" type="radio"  @if(($user->level) == 1)
                                                checked="checked"
                                                        @endif>
                                                1.Admin

                                            </label>
                                            <label class="radio-inline">
                                                <input name ="level" value="2" type="radio"  @if(($user->level) == 2)
                                                checked="checked"
                                                        @endif>
                                                2.SuperAdmin

                                            </label>
                                        </div>

                                    </div>

                                    <!-- /.box-body -->
                                </div>
                            <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-info pull-right">Chỉnh sửa</button>
                                    </div>
                                </div>
                            <!-- /.box-footer -->

                            </div>
                            </div>
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