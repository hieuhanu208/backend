@extends('admin.dashboard')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
        Danh sách slide
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="{{route('admin.list-slide')}}">Quản lí slide</a></li>
        <li class="active">Danh sách slide</li>
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
           
            
            <div class="box-body">
            <div class="input-group col-sm-9 col-md-offset-2 " style="margin-bottom: 25px;">
            <form role="search" method="get" id="searchform" action="{{route('admin.search')}}">
                <input type="text" name="keyword" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                
                  <!-- <button type="submit" name="search" id="search-btn" class="btn btn-flat" href="{{route('admin.search')}}"> -->
                    <i class="fa fa-search"></i>
                  </button>
                </span>
                </form>
              </div>
            <div>
                           <a href="{{ route('admin.add-slide')}}">
                  <button type="button" class="btn btn-success col-md-1" style="margin-left: 10px; margin-bottom: 15px;"><i class="fa fa-plus"> Thêm Mới</i></button>
                </a>
              </div>
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
                                   <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">STT</th>
                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Url</th>
                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Image</th>
                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Hành Động</th>
                                   
                                </tr>
                             </thead>
                             
                             <tbody>
                              @if(isset($slide))
                                @foreach($slide as $listslide)
                                  <tr role="row" class="odd">
                                     <td>{{$listslide->id}}</td>
                                     <td>{{ $listslide->url }}</td>
                                     <td> 
                                         <img width="80" height="80" class="attachment-img" src="/source/image/slide/{{ $listslide->image }}" alt="Attachment Image"> 
                                     </td>

                                     <td>
                                      <a href="{{ route('admin.get-edit-slide',$listslide->id) }}"> 
                                          <button type="button" class="btn btn-warning"><i class="fa fa-edit"> Chỉnh sửa</i></button>
                                      </a>
                                      <a href="{{ route('admin.delete-slide',$listslide->id) }}"> 
                                          <button type="button" class="btn btn-danger"><i class="fa fa-close"> Xóa</i></button>
                                      </a>
                                      
                                     
                                   </td>
                                  </tr>
                                @endforeach
                              @endif
                               
                             </tbody>
                             
                          </table>
                       </div>
                    </div>
                    
                    <div class ='row text-center' style ="padding-top:20px;">{{ $slide->links() }}</div>

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