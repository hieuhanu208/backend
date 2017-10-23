@extends('dashboard')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Trang chủ</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="#" method="post" class="beta-form-checkout">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
                        <h4>Đăng nhập</h4>
                        
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Tên người dùng*</label>
							<input type="email" id="email" required>
						</div>
						<div class="form-block">
							<label for="phone">Mật khẩu*</label>
							<input type="text" id="phone" required>
						</div>
						<div class="form-block">
							<input type="checkbox" id="c1" name="cc" />
							<label for="c1"><span></span>Nhớ tôi</label>
						</div>
						<br>
						<div class="form-group">
							<div class="col-md-12">
								<div class="col-sm-7"></div>
								<div class="col-sm-3">
									<button id="submit" name="submit" class="btn btn-primary" value="1">Đăng nhập</button>
								</div>
								<div class="col-sm-2">										
									  <a href="login.html" id="cancel" name="cancel" class="btn btn-default">Hủy</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection