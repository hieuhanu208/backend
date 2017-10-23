@extends('dashboard')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Trang chủ</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('signup')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="row">
					<div class="col-sm-3"></div>
					@if(count($errors)>0)
					<div class ="alert alert-danger">
						@foreach($errors->all() as $err)
						{{$err}}
						@endforeach
					</div>
					@endif
					@if(Session::has('thanhcong'))
					<div class= 'alert alert-success'>{{Session::get('thanhcong')}}</div>
					@endif
					<div class="col-sm-6">
						<h4>Đăng kí người dùng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
								<label for="your_last_name">Tên Đăng Nhập*</label>
								<input type="text" name="full_name" required>
							</div>	
						
						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" id="email" required>
						</div>

						<div class="form-block">
							<label for="phone">Mật Khẩu*</label>
							<input type="password" name="password" required>
						</div>
						<div class="form-block">
							<label for="phone">Nhập Lại Mật Khẩu*</label>
							<input type="password" name="re_password" required>
						</div>
						<br><br><br>
						<div class="form-group">
								<div class="col-md-12">
									<div class="col-sm-2 text-center">
										<button id="submit" name="submit" class="btn btn-primary" value="1">Đăng Ký</button>
									</div>
									<div class="col-sm-1 text-center">										
										  <a href="#" id="cancel" name="cancel" class="btn btn-default">Hủy</a>
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