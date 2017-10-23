@extends('dashboard')
@section('content')
<div class="inner-header">
		<div class="container">
			<!-- <div class="pull-left">
				<h6 class="inner-title">Contacts</h6>
			</div> -->
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Trang chủ</a> / <span>Liên hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Liên hệ với chúng tôi</h2>
					<div class="space20">&nbsp;</div>
					
					<div class="space20">&nbsp;</div>
					<form action="contacts.html" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Tên của bạn (bắt buộc)">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Địa chỉ Email (bắt buộc)">
						</div>
						<div class="form-block">
							<input name="your-subject" type="text" placeholder="Chủ đề">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Nội dung lời nhắn"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gửi tin nhắn <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>THỰC PHẨM CAO CẤP GOFOOD</p>

									<p>FBC International Trading Company Limited</p>

									<i class="fa fa-map-marker"></i>     Cs1: Số 413 Thuỵ Khuê, Tây Hồ, Hà Nội<br>
									<i class="fa fa-phone"></i> 02466 863864 - 0898583838<br>
									<i class="fa fa-envelope"></i> Email: contact@gofood.vn<br>
									<i class="fa fa-clock-o"></i> 8:00- 20:00 tất cả các ngày trong tuần</p>
					<!-- <div class="space20">&nbsp;</div>
					<h6 class="contact-title">Business Enquiries</h6>
					<p>
						Doloremque laudantium, totam rem aperiam, <br>
						inventore veritatio beatae. <br>
						<a href="mailto:biz@betadesign.com">biz@betadesign.com</a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Employment</h6>
					<p>
						We’re always looking for talented persons to <br>
						join our team. <br>
						<a href="hr@betadesign.com">hr@betadesign.com</a>
					</p> -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection
		