@extends('dashboard')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản Phẩm Mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($prod)}} sản phẩm mới</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($prod as $np)
								<div class="col-sm-3">
									<div class="single-item">
										@if($np->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Giảm Giá</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('product_detail',$np->product_id)}}"><img src="resource/image/PD/{{$np->product_image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$np->product_name}}</p>
											<p class="single-item-price">
											<p class="single-item-price">
												<span class="flash-del">{{$np->promotion_price}} </span>
												<span class="flash-sale">{{$np->unit_price}} VND</span>
											</p>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('product_detail',$np->product_id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection