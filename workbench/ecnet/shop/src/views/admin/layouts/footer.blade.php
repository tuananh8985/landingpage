<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="footer-inner">
        {{date('Y')}} &copy; DNS Dashbroad  | <a href="http://stv.vn" title="stv.vn">STV</a>.
    </div>
    <div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{URL::to('packages/ecnet/shop')}}/plugins/respond.min.js"></script>
<script src="{{URL::to('packages/ecnet/shop')}}/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="{{URL::to('packages/ecnet/shop')}}/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="{{URL::to('packages/ecnet/shop')}}/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{URL::to('packages/ecnet/shop')}}/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="{{URL::to('packages/ecnet/shop')}}/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{URL::to('packages/ecnet/shop')}}/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="{{URL::to('packages/ecnet/shop')}}/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{URL::to('packages/ecnet/shop')}}/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{URL::to('packages/ecnet/shop')}}/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="{{URL::to('packages/ecnet/shop')}}/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="{{URL::to('packages/ecnet/shop')}}/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>

<script src="{{URL::to('packages/ecnet/shop')}}/scripts/core/app.js">
</script>
<script>
    jQuery(document).ready(function() {
        App.init();
        $(".delete-button").click(function() {
            var delete_button = $(this);
            bootbox.confirm("Bạn chắc chắn muốn xóa?", function(result) {
                if(result){
                    window.location = delete_button.attr('data-src');
                }
            });
        });
    });
</script>

@yield('footer')
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>