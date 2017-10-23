@extends('admin.edit')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
        Chỉnh sửa sản phẩm 
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li><a href="{{ route('admin.list-product')}}">Quản lí sản phẩm</a></li>
        <li><a href="">Chỉnh sửa sản phẩm</a></li>
        
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

                <div class="alert alert-{{!! Session::get('flash_level') !!}}">

                    {!! Session::get('flash_message') !!}
                    

                </div>

            @endif
            <form class="form-horizontal" method="post" action="{{ route('admin.post-edit-product',$product->id) }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Tên sản phẩm :</label>

                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="{{ $product->name}}">
                        <span class="help-block" style="color:red;">{{ $errors->first('name') }}</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label"> Danh mục :</label>

                      <div class="col-sm-6">
                        <select class="form-control" name="cate_id">
                          <option value="">Mời chọn</option>
                          @if(isset($category))
                            @foreach($category as $listCate)
                              <option  value="{{ $listCate->cate_id  }}"  @if( $listCate->cate_id == $product-> cate_id ) selected @endif >{{ $listCate->cate_name }}</option>
                            @endforeach
                          @endif

                        </select>
                        <span class="help-block" style="color:red;">{{ $errors->first('cate_id') }}</span>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Mô tả :</label>

                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="description" value="{{ $product->description }}">
                        <span class="help-block" style="color:red;">{{ $errors->first('description') }}</span>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label"> Giá khuyến mại</label>

                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="unit_price" value="{{ $product->unit_price }}">
                        <span class="help-block" style="color:red;">{{ $errors->first('unit_price') }}</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label"> Gía gốc</label>

                      <div class="col-sm-6">
                        <input type="text" class="form-control" name="promotion_price" value="{{ $product->promotion_price }}">
                        <span class="help-block" style="color:red;">{{ $errors->first('promotion_price') }}</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label"> Sản phẩm mới :</label>

                      <div class="col-sm-6">
                        <select class="form-control" name="new">
                          <option value="">Moi Chon</option>
                          <option value="0" @if($product->new ==0 ) selected @endif>Mặc đinh</option>
                          <option value="1" @if($product->new ==1 ) selected @endif >San pham moi</option>
                       
                        </select>
                      </div>
                    </div>

                    

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Tình trạn sản phẩm :</label>

                      <div class="col-sm-6">
                       <select class="form-control" name="top_product">
                          <option value="">Mời chọn</option>
                          <option  value="1" @if($product->top_product  == 1 ) selected @endif >Bán chạy</option>
                          <option value="0"  @if($product->top_product  == 0 ) selected @endif>Không</option>
                          
                        </select>
                      </div>
                    </div>



                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label"> Image :</label>

                      <div class="col-sm-6">
                        <input type="file" name="image" id="exampleInputFile">

                        <img width="80" height="80" class="attachment-img" src="/source/image/product/{{ $product ->image }}" alt="Attachment Image"> 
                        
                      </div>
                    </div>


               
            
                 </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-info pull-right">Chỉnh sửa</button>
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