@extends('admin.dashboard')
@section('content')

<section class="content-header">
      <h1>
        Danh sách người dùng
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="{{route('admin.list-user')}}">Quản lí người dùng</a></li>
        <li class="active">Danh sách người dùng</li>
      </ol>
  </section>

     <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Quản lí người dùng</h3>
            </div>
            @if(Session::has('flash_message'))

                <div class="alert alert-{!! Session::get('flash_lavel') !!}">

                    {!! Session::get('flash_message') !!}
                  
                </div>

            @endif

              <form role="search" method="get" id="searchform" action="{{asset('admin/search-user')}}">
              <div class="input-group col-sm-9 col-md-offset-2 " style="margin-bottom: 25px;">
                <input type="text" name="keyword" class="form-control" placeholder="Search...">
               
                
              </div>
              </form>
              <div>

                <a href="{{route('admin.add-user')}}">
                  <button type="button" class="btn btn-success col-md-1" style="margin-left: 10px; margin-bottom: 40px;">Add</button>
                </a>
              </div>
              

             

            <!-- /.box-header -->
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                       <div class="col-sm-6"></div>
                       <div class="col-sm-6"></div>
                    </div>
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

                                @foreach($user as $user)
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
                                      <a href="{{ route('admin.get-edit-user',$user->id) }}">
                                          <button type="button" class="btn btn-warning" ><i class="fa fa-edit"> Chỉnh sửa</i></button>
                                      </a>

                                      <a href=" {{ route ('admin.delete-user',$user->id ) }} ">
                                          <button type="button" class="btn btn-danger"><i class="fa fa-close"> Xóa</i></button>
                                      </a>

                                   </td>
                                  </tr>

                                @endforeach

                               
                             </tbody>
                             
                          </table>
                       </div>
                    </div>

                {{--<div class ='row text-center' style ="padding-top:20px;"> {{ $users->render() }} </div>--}}

                 </div>
             
    
            <!-- /.box-body -->
          </div>
        </div>
          <!-- /.box -->

        
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
                  <td></td>
                </tr>
                <tr>
                  
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
               
    </section>
    <!-- /.content -->
    <div class="pagination-table text-center">
     
 
  </div>
  </div>
  <!-- /.content-wrapper -->
  
  @endsection