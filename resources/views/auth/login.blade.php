<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../">
		<title>login</title>
		<meta charset="utf-8" />
		<meta name="description" content="Craft admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
		<meta name="keywords" content="Craft, bootstrap, bootstrap 5, admin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Craft - Bootstrap 5 HTML Admin Dashboard Theme" />
		<meta property="og:url" content="https://themes.getbootstrap.com/product/craft-bootstrap-5-admin-dashboard-theme" />
		<meta property="og:site_name" content="Keenthemes | Craft" />
		<link rel="canonical" href="https://preview.keenthemes.com/craft" />
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<body id="kt_body" class="auth-bg">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<div class="d-flex flex-column flex-lg-row-auto bg-primary w-xl-600px positon-xl-relative">
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
							<a href="../dist/index.html" class="py-9 pt-lg-20">
								<img alt="Logo" src="{{ asset('assets/media/logos/logo-ellipse.svg') }}" class="h-70px" />
							</a>
							<h1 class="fw-bolder text-white fs-2qx pb-5 pb-md-10">Welcome to Clasic Restaurant</h1>
							<p class="fw-bold fs-2 text-white">Plan your Order with your favourite ! 
							<br />Cheap and best !</p>
						</div>
						<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(assets/media/illustrations/sigma-1/17.png)"></div>
					</div>
				</div>
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<div class="w-lg-500px p-10 p-lg-15 mx-auto">
							<form method="POST" action="{{ route('login') }}" class="form w-100" novalidate="novalidate" id="kt_sign_in_form">
                            @csrf
                            <div class="text-center mb-10">
									<h1 class="text-dark mb-3">Sign In to Clasic</h1>
									<div class="text-gray-400 fw-bold fs-4">New Here?
									<a href="{{ __('register') }}" class="link-primary fw-bolder">Create an Account</a></div>
								</div>
								<div class="fv-row mb-10">
									<label class="form-label fs-6 fw-bolder text-dark">Email</label>
                                    <input id="email" type="email" class="form-control form-control-lg form-control-solid" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
									<!-- <input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="off" /> -->
								</div>
								<div class="fv-row mb-10">
									<div class="d-flex flex-stack mb-2">
										<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
										<a href="../dist/authentication/sign-in/password-reset.html" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
									</div>
                                    <input id="password" type="password" class="form-control form-control-lg form-control-solid" name="password" required autocomplete="current-password">
									<!-- <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" /> -->
								</div>
								<div class="text-center">
									<!-- <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary fw-bolder me-3 my-2">
										<span class="indicator-label">Sign In</span>
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button> -->
                                    <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
									<a href="#" class="btn btn-light-primary btn-lg fw-bolder my-2">
									<img alt="Logo" src="{{ asset('assets/media/svg/brand-logos/google-icon.svg') }}" class="h-20px me-3" />Sign in with Google</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>