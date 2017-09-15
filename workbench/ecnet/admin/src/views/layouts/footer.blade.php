<div class="footer">
		{{date('Y')}} &copy; Phát triển bởi Rikagaku Việt Nam.
		<div class="span pull-right">
			<span class="go-top"><i class="icon-angle-up"></i></span>
		</div>
	</div>
	<script type="text/javascript">
	</script>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS -->
	<!-- Load javascripts at bottom, this will reduce page load time -->
	<!-- <script src="{{URL::to('/')}}/packages/ecnet/admin/assets/js/jquery-1.8.3.min.js"></script> -->
	<script src="{{URL::to('/')}}/packages/ecnet/admin/assets/breakpoints/breakpoints.js"></script>
	<script src="{{URL::to('/')}}/packages/ecnet/admin/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
	<script src="{{URL::to('/')}}/packages/ecnet/admin/assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{URL::to('/')}}/packages/ecnet/admin/assets/js/jquery.blockui.js"></script>
	<script src="{{URL::to('/')}}/packages/ecnet/admin/assets/js/jquery.cookie.js"></script>
<script src="/packages/ecnet/shop/plugins/bootbox/bootbox.min.js"></script>
	<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
	@yield('footer')
	<!-- ie8 fixes -->
	<!--[if lt IE 9]>
	<script src="{{URL::to('/')}}/packages/ecnet/admin/assets/js/excanvas.js"></script>
	<script src="{{URL::to('/')}}/packages/ecnet/admin/assets/js/respond.js"></script>
	<![endif]-->
	<script src="{{URL::to('/')}}/packages/ecnet/admin/assets/js/app.js"></script>
	<script>
		jQuery(document).ready(function() {
			App.init();
			App.setPage("table_managed");
			App.initUniform('.fileupload-toggle-checkbox'); // initialize uniform 
		});
	</script>
	<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>