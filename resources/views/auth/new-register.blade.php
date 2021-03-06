<!doctype html>
<html lang="en" dir="ltr">
  <head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Volgh –  Bootstrap 4 Responsive Application Admin panel Theme Ui Kit & Premium Dashboard Design Modern Flat HTML Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="analytics dashboard, bootstrap 4 web app admin template, bootstrap admin panel, bootstrap admin template, bootstrap dashboard, bootstrap panel, Application dashboard design, dashboard design template, dashboard jquery clean html, dashboard template theme, dashboard responsive ui, html admin backend template ui kit, html flat dashboard template, it admin dashboard ui, premium modern html template">

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" />

		<!-- TITLE -->
		<title>Volgh –  Bootstrap 4 Responsive Application Admin panel Theme Ui Kit & Premium Dashboard Design Modern Flat HTML Template</title>

		<!-- BOOTSTRAP CSS -->
		<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="../assets/css/style.css" rel="stylesheet"/>
		<link href="../assets/css/skin-modes.css" rel="stylesheet"/>

		<!-- SIDE-MENU CSS -->
		<link href="../assets/plugins/sidemenu/sidemenu.css" rel="stylesheet">

		<!-- SINGLE-PAGE CSS -->
		<link href="../assets/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">

		<!--C3 CHARTS CSS -->
		<link href="../assets/plugins/charts-c3/c3-chart.css" rel="stylesheet"/>

		<!-- CUSTOM SCROLL BAR CSS-->
		<link href="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

		<!--- FONT-ICONS CSS -->
		<link href="../assets/css/icons.css" rel="stylesheet"/>

		<!-- COLOR SKIN CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="../assets/colors/color1.css" />

	</head>

	<body>

		<!-- BACKGROUND-IMAGE -->
		<div class="login-img">

			<!-- GLOABAL LOADER -->
			<div id="global-loader">
				<img src="../assets/images/loader.svg" class="loader-img" alt="Loader">
			</div>
			<!-- /GLOABAL LOADER -->

			<!-- PAGE -->
			<div class="page">
				<div class="">
				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto">
						{{-- <div class="text-center">
							<img src="../assets/images/brand/logo.png" class="header-brand-img" alt="">
						</div> --}}
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-6">
							<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                                @csrf
								<span class="login100-form-title">
									Register
								</span>

                                <div class="wrap-input100 validate-input" data-validate = "Valid name is required">
									<input class="input100" type="text" name="name" placeholder="Name">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-email" aria-hidden="true"></i>
									</span>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								</div>

								<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
									<input class="input100" type="text" name="email" placeholder="Email">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-email" aria-hidden="true"></i>
									</span>
								</div>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

								<div class="wrap-input100 validate-input" data-validate = "Password is required">
									<input class="input100" type="password" name="password" placeholder="Password">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-lock" aria-hidden="true"></i>
									</span>
								</div>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                                <div class="wrap-input100 validate-input" data-validate = "Password is required">
									<input class="input100" type="password" name="password-confirm" placeholder="Password Confirm">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-lock" aria-hidden="true"></i>
									</span>
								</div>

                                @error('password-confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
								<div class="container-login100-form-btn">
									<button type="submit" class="login100-form-btn btn-primary">
										Sign Up
									</button>
								</div>
								{{-- <div class="text-center pt-3">
									<p class="text-dark mb-0">Not a member?<a href="register.html" class="text-primary ml-1">Sign UP now</a></p>
								</div> --}}
								{{-- <div class=" flex-c-m text-center mt-3">
								    <p>Or</p>
									<div class="social-icons">
										<ul>
											<li><a class="btn  btn-social btn-block"><i class="fa fa-google-plus text-google-plus"></i> Sign up with Google</a></li>
											<li><a class="btn  btn-social btn-block mt-2"><i class="fa fa-facebook text-facebook"></i> Sign in with Facebook</a></li>
										</ul>
									</div>
								</div> --}}
							</form>
						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>
			<!-- End PAGE -->

		</div>
		<!-- BACKGROUND-IMAGE CLOSED -->

		<!-- JQUERY JS -->
		<script src="../assets/js/jquery-3.4.1.min.js"></script>

		<!-- BOOTSTRAP JS -->
		<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="../assets/plugins/bootstrap/js/popper.min.js"></script>

		<!-- SPARKLINE JS -->
		<script src="../assets/js/jquery.sparkline.min.js"></script>

		<!-- CHART-CIRCLE JS -->
		<script src="../assets/js/circle-progress.min.js"></script>

		<!-- RATING STAR JS -->
		<script src="../assets/plugins/rating/jquery.rating-stars.js"></script>

		<!-- INPUT MASK JS -->
		<script src="../assets/plugins/input-mask/jquery.mask.min.js"></script>

		<!-- CUSTOM SCROLL BAR JS-->
		<script src="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- CUSTOM JS-->
		<script src="../assets/js/custom.js"></script>

	</body>
</html>
