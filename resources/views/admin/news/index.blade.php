@extends('admin.dashboard')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
        Danh sách tin tức
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li><a href="#">Quản lí tin tức</a></li>
        <li class="active">Danh sách tin tức</li>
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
            <div>
                  <a href="{{ route('admin.add-news')}}">
                    <button type ="button" class="btn btn-success col-md-1" style="margin-left: 10px; margin-bottom: 15px;"><i class="fa fa-plus"> Thêm Mới </i></button>
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
                                   <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" >Tên tin tức</th>

                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Mô tả</th>

                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nội dung</th>

                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>

                                   <th class ="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" width="120px">ID thành viên</th>

                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Ảnh tiêu đề </th>

                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Sửa</th>

                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" >Xóa</th>
                                   
                                </tr>
                             </thead>
                             <?php $stt =0 ?>
                             <tbody>
                              @if(isset($news))
                                @foreach($news as $listNews)
                                  <tr role="row" class="odd">
                                     <td class ="sorting_1"><?php echo $stt = $stt +1 ?></td>
                                     <td>{{ $listNews->header }}</td>
                                     <td>{{ $listNews->short_description }}</td>
                                     <td>{{ $listNews->content }}</td>
                                     <td>{{ $listNews->email }}</td>
                                     <td>{{ $listNews->user_id }}</td>
                                     <td>
                                        <img width="80" height="80" class="attachment-img" src="/source/image/news/{{ $listNews->news_img }}" alt="Attachment Image"> 
                                     </td>
                                     <td>
                                      <a href="{{ route('admin.edit-news',$listNews->news_id) }}">
                                          <button type="button" class="btn btn-warning">
                                            <i class="fa fa-edit"></i>
                                          </button>
                                        </a>
                                     </td>
                                     <td>         
                                        <a class="btn btn-danger btn-ok" href= "{{route('admin.delete-news',$listNews->news_id)}}">
                                          <i class = "fa fa-close"></i>
                                        </a>
                                      </td>
                                  </tr>
                                @endforeach
                              @endif
                               
                             </tbody>
                             
                          </table>
                       </div>
                    </div>
                    <div class="row">
                    <div class ='row text-center' style ="padding-top:20px;">{{ $news->links() }}</div>
                    </div>
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
