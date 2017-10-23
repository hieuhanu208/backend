@extends('admin.dashboard')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
        Danh sách danh mục 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="#">Quản lí danh mục </a></li>
        <li class="active">Danh sách danh mục</li>
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
                           <a href="{{ route('admin.category') }}">
                  <button type="button" class="btn btn-success col-md-1" style="margin-left: 10px; margin-bottom: 15px;"><i class="fa fa-plus"> Thêm Mới </i></button>
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
                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Id</th>
                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tên Danh Mục(s)</th>
                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Sulg</th>
                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Hành Động</th>
                                   
                                </tr>
                             </thead>
                             <?php $stt =0 ?>
                             <tbody>
                              @if(isset($category))
                                @foreach($category as $listCategory)
                                  <tr role="row" class="odd">
                                     <td class="sorting_1"><?php echo $stt = $stt +1 ?></td>
                                     <td>{{ $listCategory->cate_id }}</td>
                                     <td>{{ $listCategory->cate_name }}</td>
                                     <td>{{ $listCategory->cate_slug }}</td>
                                     <td>

                                     
                    <a href="{{ route('admin.edit-category',$listCategory->cate_id) }}">
                      <button type="button" class="btn btn-warning"> <i class="fa fa-edit"> Chỉnh Sửa </i></button>
                    </a>
                    <a href="{{ route('admin.delete-category',$listCategory->cate_id) }}">
                      <button type="button" class="btn btn-danger"> <i class="fa fa-close"> Xóa</i></button>
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
                    <div class ='row text-center' style ="padding-top:20px;">{{ $category->links() }}</div>
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