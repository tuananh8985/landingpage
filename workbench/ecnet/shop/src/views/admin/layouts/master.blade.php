@include('shop::admin.layouts.head')
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
@include('shop::admin.layouts.header_content')
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<!-- BEGIN SIDEBAR -->
@include('shop::admin.layouts.sidebar')
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
@yield('content')
<!-- END CONTAINER -->

@include('shop::admin.layouts.footer')