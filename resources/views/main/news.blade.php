
@extends('dashboard')
@section('content')

<div class="inner-header">
<div class="container">
	<div class="pull-left">
		<h6 class="inner-title">Tin Tức</h6>
	</div>
	<div class="pull-right">
		<div class="beta-breadcrumb font-large">
			<a href="{{route('index')}}">Trang chủ</a> / <span>Tin tức</span>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</div>

<div class="container">
<div id="content">
	<div class="row">
		<div class="col-sm-8">

			<div class="row">
				<div class="col-sm-3">
					<img src="image\Hải sản nhập khẩu\Cá hồi Na Uy\12.jpg" alt="">
				</div>
				<div class="col-sm-9">
					@foreach($news as $news)
					<div class="single-item-body">
						<p class="single-item-title">{{$news->header}}</p>
					</div>

					<div class="clearfix"></div>
					<div class="space20">&nbsp;</div>
					<div class="pull-left auto-width-left">
						<ul class="top-menu menu-beta l-inline">
							<li><a href=""><i class="fa fa-users"></i> Admin</a></li>
							<li><a href=""><i class="fa fa-calendar"></i>10/04/2017</a></li>
							<li><a href=""><i class="fa fa-comments"></i> 0</a></li>
							
							
						</ul>
					</div>
					<div class="clearfix"></div>
					<div class="space20">&nbsp;</div>

					<div class="single-item-desc">
						<p>SIÊU KHUYẾN MẠI: Xương, đầu và lườn cá hồi Na Uy giá chỉ 49.000 VNĐ/1kg.
							Ngày nay, nhu cầu sử dụng xương cá hồi Nauy về làm ruốc, nấu cháo và chế biến những món ăn ngon từ cá hồi như canh chua,…ngày càng nhiều. Bởi thế mà gofood đã đi đầu trong việc cung cấp xương cá hồi tươi tại Hà Nội. Xương cá hồi tại Gofood sạch ngon không tưởng với chất lượng tốt…</p>
					</div>
					<div class="space20">&nbsp;</div>

					<div class="clearfix"></div>
					<div class="space20">&nbsp;</div>
					<button type="button" class="btn btn-danger"><a href="news1.html">Xem Thêm</button>
					@endforeach
				</div>
				
			</div>
			<hr>
		</div>
		
		<div class="col-sm-3 aside">
			<div class="widget">
				<h3 class="widget-title">SẢN PHẨM BÁN CHẠY</h3>
				<div class="widget-body">
					<div class="beta-sales beta-lists">
						@foreach($top_prod as $tp)
						<div class="media beta-sales-item">
							<a class="pull-left" href="{{route('product_detail',$tp->product_id)}}"><img src="resource/image/PD/{{$tp->product_image}}" alt="" width="55px" height="58px"></a>
							<div class="media-body" style="color: #666; font-size: 14px">
								{{$tp->product_name}}<br>
								<span class="beta-sales-price" style="margin-right: 20px; color: #ff3366; font-weight: bold; font-size: 18px;">{{number_format($tp->unit_price)}} VND</span>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div> <!-- best sellers widget -->
			<div class="widget">
				<h3 class="widget-title">Sản phẩm mới</h3>
				<div class="widget-body">
					<div class="beta-sales beta-lists">
						<div class="media beta-sales-item">
						@foreach($new_prod as $np)
						<div class="media beta-sales-item">
							<a class="pull-left" href="{{route('product_detail',$np->product_id)}}"><img src="resource/image/PD/{{$np->product_image}}" alt="" width="55px" height="58px"></a>
							<div class="media-body" style="color: #666; font-size: 14px">
								{{$np->product_name}}<br>
								<span class="beta-sales-price" style="margin-right: 20px; color: #ff3366; font-weight: bold; font-size: 18px;">{{$np->unit_price}} VND</span>
							</div>
						</div>
						@endforeach
						</div>
						
					</div>
				</div>
			</div> <!-- best sellers widget -->
		</div>
	</div>
</div> <!-- #content -->
</div> <!-- .container -->
@endsection
	