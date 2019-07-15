<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{url('favicon.ico')}}">

    <title>{{env('APP_NAME')}} | Login </title>

	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}">

	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="{{asset('login_asset/bootstrap-extend.css')}}">

	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('login_asset/master_style.css')}}">

	<!-- Fab Admin skins -->
	<link rel="stylesheet" href="{{asset('login_asset/_all-skins.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('login_asset/toastr.min.css')}}"/>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body class="hold-transition login-page">

	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">
			<div class="col-lg-3 col-md-8 col-12 d-none d-lg-block">
				<div class="box mb-0 b-0 bg-transparent">
					<div class="box-body login-slider p-0">
						<div id="carousel-example-generic-captions" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						  <ol class="carousel-indicators">
							<li data-target="#carousel-example-generic-captions" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic-captions" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic-captions" data-slide-to="2"></li>
						  </ol>
						  <!-- Wrapper for slides -->
						  <div class="carousel-inner" role="listbox">
							<div class="carousel-item active">
							  <img src="{{asset('login_asset/1.png')}}" class="img-fluid" alt="slide-1">
							  <div class="carousel-caption">

							  </div>
							</div>
							<div class="carousel-item">
							  <img src="{{asset('login_asset/2.png')}}" class="img-fluid" alt="slide-2">
							  <div class="carousel-caption">

							  </div>
							</div>
							<div class="carousel-item">
							  <img src="{{asset('login_asset/3.png')}}" class="img-fluid" alt="slide-3">
							  <div class="carousel-caption">

							  </div>
							</div>
						  </div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-8 col-12">
				<div class="login-box">
				  <div class="login-box-body">
					<h3 class="text-center">Selamat Datang</h3>


					<form action="{{ route('login') }}" method="post">
						@csrf
					  <div class="form-group has-feedback">
						<input type="text" class="form-control rounded" placeholder="Email/username" autocomplete="off" name="email" required>
						<span class="ion ion-email form-control-feedback"></span>
					  </div>
					  <div class="form-group has-feedback">
						<input type="password" class="form-control rounded" placeholder="Password" name="password" required>
						<span class="ion ion-locked form-control-feedback"></span>
					  </div>
					  <div class="row">
						<div class="col-6">
						  <div class="checkbox">
							<input type="checkbox" id="basic_checkbox_1" name="remember">
							<label for="basic_checkbox_1">Ingat Broswer</label>
						  </div>
						</div>
						<!-- /.col -->
						<div class="col-6">
						 <div class="fog-pwd text-right">
							<a href="javascript:void(0)" class="text-danger"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
						  </div>
						</div>
						<!-- /.col -->
						<div class="col-12 text-center">
						  <button type="submit" class="btn btn-info btn-block margin-top-10">SIGN IN</button>
						</div>
						<!-- /.col -->
					  </div>
					</form>


					<!-- /.social-auth-links -->

					<div class="margin-top-30 text-center">
						<p>Belum Punya Akun? <a href="register.html" class="text-warning ml-5">Daftar Disini</a></p>
					</div>

				  </div>
				  <!-- /.login-box-body -->
				</div>
				<!-- /.login-box -->

			</div>
		</div>
	</div>


	<!-- jQuery 3 -->
	<script src="{{asset('login_asset/jquery/dist/jquery.min.js')}}"></script>

	<!-- popper -->
	<script src="{{asset('login_asset/popper/dist/popper.min.js')}}"></script>

	<!-- Bootstrap 4.0-->
	<script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('login_asset/toastr.min.js')}}"></script>
	<script type="text/javascript">

	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "positionClass": "toast-top-center",
	  "onclick": null,
	  "showDuration": "1000",
	  "hideDuration": "1000",
	  "timeOut": "5000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	};
	//toastr.success("xxxxxxx");
	</script>
	@if ($errors->has('email') || $errors->has('username'))
	<script type="text/javascript">
	toastr.error("Email / username / Password Salah !");
	</script>
	@endif
</body>
</html>
