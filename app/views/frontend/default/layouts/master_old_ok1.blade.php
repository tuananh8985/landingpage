<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo2.transvelo.in/html/unicase/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Jun 2017 09:01:28 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<!-- head -->
@include('frontend.default.partials.head')
<!-- End head -->
<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    @include('frontend.default.partials.header_content')
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <!-- ============================================== SIDEBAR ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                    <!-- sidebar-->
                    <!-- list category -->
                    @include('frontend.default.partials.sidebar')
                    <!-- /list category -->
                    <!-- list product new-->
                    @include('frontend.default.partials.sidebar_special1')
                    <!-- /list product new-->
                    <!-- list product fetured-->
                    @include('frontend.default.partials.sidebar_special2')
                    <!-- /list product fetured-->
                    <!-- list product fetured-->
                    @include('frontend.default.partials.sidebar_new_featured')
                    <!-- /list product fetured-->

                    @include('frontend.default.partials.sidebar_hot_deals')
                    @include('frontend.default.partials.sidebar_caption')
                </div><!-- /.sidemenu-holder -->
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                    <!-- ========================================== SECTION – HERO ========================================= -->
                    @include('frontend.default.partials.slider')
                    @include('frontend.default.partials.home.banner_slide')
                    @yield('content')
                </div><!-- /.homebanner-holder -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /#top-banner-and-menu -->
    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.default.partials.footer_content')
    @include('frontend.default.partials.footer')
</body>

</html>