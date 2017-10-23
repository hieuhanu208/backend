@extends('dashboard')
@section('content')

<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">DANH MỤC SẢN PHẨM</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('index')}}">Trang chủ</a> / <span>Danh mục</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
			
					<div class="col-sm-3">
					
						<ul class="aside-menu">
						@foreach($allCate as $al)
						
							<li><a href={{route('category',$al->cate_id)}}>{{$al->cate_name}}</a></li>
							@endforeach
					</div>
					
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản Phẩm Mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($new_prod)}} thực phẩm mới</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@foreach($new_prod as $np)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('product_detail',$np->id)}}"><img src="source/image/product/{{$np->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$np->name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{$np->promotion_price}}</span>
												<span class="flash-sale">{{$np->unit_price}} VND</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addcart',$np->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('product_detail',$np->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach	
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản Phẩm Bán Chạy</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($top_prod)}}  sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($top_prod as $tp)
								<div class="col-sm-4">

									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('product_detail',$tp->id)}}" ><img src="source/image/product/{{$tp->image}}" alt="" style="padding-top:10px;"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$tp->product_name}}</p>
											<p class="single-item-price">
												<span class="flash-del">{{$tp->promotion_price}}</span>
												<span class="flash-sale">{{$tp->unit_price}} VND</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('addcart',$tp->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('product_detail',$tp->
											id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
    </div> <!-- .container -->
@endsection
