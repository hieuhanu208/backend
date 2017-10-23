@extends('admin.dashboard')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
        Danh sách sản phẩm
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li><a href="#">Quản lí sản phẩm</a></li>
        <li class="active">Danh sách sản phẩm</li>
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
                           <a href="{{ route('admin.add-product')}}">
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
                                   <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ảnh sản phẩm</th>

                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tên sản phẩm</th>

                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Danh mục</th>

                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Mô tả</th>
                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Giá </th>
                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Giảm giá </th>
                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">San phẩm mới </th>
                                   
                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Tình trạng </th>

                                   <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Hành Động</th>
                                   
                                </tr>
                             </thead>
                             <?php $stt =0 ?>
                             <tbody>
                              @if(isset($product))
                                @foreach($product as $listproduct)
                                  <tr role="row" class="odd">
                                     <td class="sorting_1"><?php echo $stt = $stt +1 ?></td>
                                     <td> 
                                         <img width="80" height="80" class="attachment-img" src="/source/image/product/{{ $listproduct->image }}" alt="Attachment Image"> 
                                     </td>
                                     <td>{{ $listproduct->name }}</td>
                                     <td>{{ $listproduct->namecate }}</td>
                                     <td>{{ $listproduct->description }}</td>
                                     <td>{{ number_format($listproduct->unit_price) }} VND</td>
                                     <td>{{ number_format($listproduct->promotion_price) }} VND</td>
                                     <td> @if($listproduct->new == 1) Có @elseif($listproduct->new == 0) Không @endif</td>
                                     <td> @if($listproduct->top_product == 1) Bán chạy @elseif($listproduct->top_product == 0) Không @endif</td>
                                     <td>

                                     
                    <a href="{{ route('admin.edit-product',$listproduct->id) }}">
                      <button type="button" class="btn btn-warning"><i class="fa fa-edit">Chỉnh Sửa </i></button>
                      
                    </a>
                    <a class="btn btn-danger btn-ok" href= "{{route('admin.delete-product',$listproduct->id)}}"><i class = "fa fa-close">Xóa</i></a>
                    
                            
                                      
                                   </td>
                                  </tr>
                                @endforeach
                              @endif
                               
                             </tbody>
                             
                          </table>
                       </div>
                    </div>
                    <div class="row">
                    <div class ='row text-center' style ="padding-top:20px;">{{ $product->links() }}</div>
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