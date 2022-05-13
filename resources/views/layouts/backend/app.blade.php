<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head><base href="">
		<title>dashboard</title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
		<link href="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        @stack('css')
	</head>
        
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled aside-fixed aside-default-enabled">
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
                @include('backend.partials.sidebar')
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                     @include('backend.partials.header')
					<div class="content fs-6 d-flex flex-column flex-column-fluid" id="kt_content">
                         @include('backend.partials.breadcrumbs')
						<div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
							<div class="container-xxl">
                                @yield('content')
							</div>
						</div>
					</div>
                    @include('backend.partials.footer')
				</div>
			</div>
		</div>

		<script>var hostUrl = "assets/";</script>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<script src="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
		<script src="{{ asset('assets/js/custom/modals/select-location.js') }}"></script>
		<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
		<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
		<script src="{{ asset('assets/js/custom/modals/create-project.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>
        @stack('js')

	</body>
</html>