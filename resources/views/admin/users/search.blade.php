@extends('admin.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Danh sách người dùng

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="{{route('admin.list-user')}}">Quản lí người dùng</a></li>
            <li class="active">Tìm kiếm người dùng</li>
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





                    <div class="box-body">

                        <div>
                        </div>
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <h4>Tìm thấy {{count($user_search)}} người dùng</h4>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID người dùng</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tên người dùng</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Mật Khẩu</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Level</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Hành động</th>


                                        </tr>
                                        </thead>

                                        <tbody>


                                            @foreach($user_search as $user)
                                                <tr role="row" class="odd">
                                                    <td>{{$user->id}}</td>
                                                    <td>{{ $user->name}}</td>
                                                    <td>{{ $user->email}}</td>
                                                    <td>{{ $user->password}}</td>


                                                    <td>@if($user->level == 0)
                                                            Member
                                                        @elseif($user->level == 1)
                                                            Admin
                                                        @else
                                                            SuperAdmin
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="">
                                                            <button type="button" class="btn btn-warning" ><i class="fa fa-edit"> Chỉnh sửa</i></button>
                                                        </a>

                                                        <a href=" {{ route ('admin.delete-user',$user->id ) }} ">
                                                            <button type="button" class="btn btn-danger"><i class="fa fa-close"> Xóa</i></button>
                                                        </a>





                                                    </td>
                                        @endforeach


                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <a href="{{route('admin.list-user')}}">
                                <button type="button" class="btn btn-danger col-md-offset-6"><i class="fa fa-success"> Quay lại</i></button>
                            </a>
                        </div>
                    </div>

                </div>
                <!-- /.box -->
            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection