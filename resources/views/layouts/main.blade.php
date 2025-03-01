

<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<!--Meta data-->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Clain –  Bootstrap4 Admin Dashboard  Responsive MultiPurpose Template" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="admin site template, html admin template,responsive admin template, admin panel template, bootstrap admin panel template, admin template, admin panel template, bootstrap simple admin template premium, simple bootstrap admin template, best bootstrap admin template, simple bootstrap admin template, admin panel template,responsive admin template, bootstrap simple admin template premium"/>

		<!--Favicon -->
		<link rel="icon" href="{{ url('assets/images/brand/favicon.ico') }}" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/images/brand/favicon.ico') }}" />

		<!-- Title -->
		<title>Clain – Multipurpose Responsive Bootstrap  Admin Dashboard HTML Template</title>

		<!-- Dashboard css -->
		<link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />

		<!-- C3 Charts css -->
		<link href="{{ url('assets/plugins/charts-c3/c3-chart.css') }}" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="{{ url('assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />

		<!-- Sidemenu css -->
		<link href="{{ url('assets/plugins/toggle-sidemenu/fullwidth/fullwidth-sidemenu.css') }}" rel="stylesheet" />

		<!---Font icons css-->
		<link  href="{{ url('assets/fonts/fonts/font-awesome.min.css') }}" rel="stylesheet" />
		<link href="{{ url('assets/plugins/web-fonts/plugin.css') }}" rel="stylesheet" />
		<link href="{{ url('assets/plugins/web-fonts/icons.css') }}" rel="stylesheet" />

		<!-- Siderbar css-->
		<link href="{{ url('assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

        <!-- Date Picker css-->
		<link href="{{ url('assets/plugins/date-picker/date-picker.css') }}" rel="stylesheet" />

		<!-- Data table css -->
		<link href="{{ url('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
		<link href="{{ url('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
		<link href="{{ url('assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />

		

		
	</head>
	<body class="app sidebar-mini rtl">


		<!---Global-loader-->
		<div id="global-loader" >
			<img src="{{ url('assets/images/svgs/loader.svg') }}" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">
				@include('partials.header')

				@include('partials.sidebar')
                    <div class="app-content  toggle-content">
                        <div class="side-app">
                            @yield('content')
                        </div>
                    </div>
			</div>

			@include('partials.right_sidebar')

			<!--footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-lg-12 col-sm-12 mt-3 mt-lg-0 text-center">
							Copyright ©  2019 <a href="#">Clain</a>. Designed by <a href="#">Spruko</a> All rights reserved.
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer-->
		</div>

		<!-- Dashboard js -->
		<script src="{{ url('assets/js/vendors/jquery-3.2.1.min.js') }}"></script>
		<script src="{{ url('assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ url('assets/js/vendors/jquery.sparkline.min.js') }}"></script>
		<script src="{{ url('assets/js/vendors/selectize.min.js') }}"></script>
		<script src="{{ url('assets/js/vendors/jquery.tablesorter.min.js') }}"></script>
		<script src="{{ url('assets/js/vendors/circle-progress.min.js') }}"></script>
		<script src="{{ url('assets/plugins/rating/jquery.rating-stars.js') }}"></script>
	
		<!--Side-menu js-->
		<script src="{{ url('assets/plugins/toggle-sidemenu/toggle-sidemenu.js') }}"></script>

		<!-- Custom scroll bar js-->
		<script src="{{ url('assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

		<!-- Sidebar js-->
		<script src="{{ url('assets/plugins/sidebar/sidebar.js') }}"></script>

		<!-- Custom js-->
		<script src="{{ url('assets/js/custom.js') }}"></script>

        <!-- Datepicker js -->
		<script src="{{ url('assets/plugins/date-picker/date-picker.js') }}"></script>
		<script src="{{ url('assets/plugins/date-picker/jquery-ui.js') }}"></script>
		<script src="{{ url('assets/plugins/input-mask/input-mask.js') }}"></script>
        
        <!-- Select js -->
        <script src="{{ url('assets/js/elements.js') }}"></script>

        <!-- Custom js-->
        <script src="{{ url('assets/js/custom.js') }}"></script>

		<!-- Data tables js-->
		<script src="{{ url('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
		<script src="{{ url('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
		<script src="{{ url('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ url('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
		<script src="{{ url('assets/plugins/datatable/js/jszip.min.js') }}"></script>
		<script src="{{ url('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
		<script src="{{ url('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
		<script src="{{ url('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
		<script src="{{ url('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
		<script src="{{ url('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
		{{-- <script src="./../assets/plugins/datatable/dataTables.responsive.min.js"></script>
		<script src="./../assets/plugins/datatable/responsive.bootstrap4.min.js"></script> --}}
		<script src="{{ url('assets/plugins/datatable/datatable.js') }}"></script>

		@yield('scripts') <!-- Scripts section -->

	</body>
</html>