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
        <li class="active">Tìm kiếm slide</li>
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
                   <h4>Tìm thấy {{count($slide)}} slide</h4>
                    <div class="row">
                       <div class="col-sm-12">
                          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                             <thead>
                                <tr role="row">
                                   <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">STT</th>
                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Url</th>
                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Image</th>
                                   
                                   
                                </tr>
                             </thead>
                             
                             <tbody>
                              
                                @foreach($slide as $ls)
                                  <tr role="row" class="odd">
                                     <td>{{$ls->id}}</td>
                                     <td>{{ $ls->url }}</td>
                                     <td> 
                                         <img width="80" height="80" class="attachment-img" src="/source/image/slide/{{ $ls->image }}" alt="Attachment Image"> 
                                     </td>

                                     
                                  </tr>
                                @endforeach
                            
                               
                             </tbody>
                             
                          </table>
                       </div>
                    </div>
                    <a href="{{route('admin.list-slide')}}"> 
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