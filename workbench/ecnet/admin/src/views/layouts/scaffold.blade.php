@include('admin::layouts.head')
<body class="fixed-top">
	<!-- BEGIN HEADER -->
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		@include('admin::layouts.top_nav')
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->	
	<div class="page-container row-fluid">
		<!-- BEGIN SIDEBAR -->
		@include('admin::layouts.sidebar')
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<div class="container-fluid">
			<!-- BEGIN PAGE CONTAINER-->
			@yield('main')
			<!-- END PAGE CONTAINER-->
			</div>	
		</div>
		<!-- END PAGE -->	 	
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<script>
		var base_url = '{{URL::to('/')}}'
	</script>
	@include('admin::layouts.footer')