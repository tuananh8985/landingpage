
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>@if(isset($title))
		{{$title}}
		@else
		Rikagaku Admin Control panel
		@endif

	</title>
	<script src="{{URL::to('/')}}/packages/ecnet/admin/assets/js/jquery-1.8.3.min.js"></script>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="{{URL::to('/')}}/packages/ecnet/admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="{{URL::to('/')}}/packages/ecnet/admin/assets/css/metro.css" rel="stylesheet" />
	<link href="{{URL::to('/')}}/packages/ecnet/admin/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="{{URL::to('/')}}/packages/ecnet/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="{{URL::to('/')}}/packages/ecnet/admin/assets/css/style.css" rel="stylesheet" />
	<link href="{{URL::to('/')}}/packages/ecnet/admin/assets/css/style_responsive.css" rel="stylesheet" />
	<link href="{{URL::to('/')}}/packages/ecnet/admin/assets/css/style_default.css" rel="stylesheet" id="style_color" />
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/packages/ecnet/admin/assets/chosen-bootstrap/chosen/chosen.css" />
	<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/packages/ecnet/admin/assets/uniform/css/uniform.default.css" />
	@yield('head')
	<!-- <link rel="shortcut icon" href="favicon.ico" /> -->

	<style>
		.page-content {
			padding-top: 20px;
		}
	</style>
</head>
<!-- END HEAD -->