<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US">
<!--<![endif]-->

<!-- Mirrored from wordpress.templaza.net/wp-maniva/meetup/home-header/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Sep 2017 09:51:22 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<!-- header -->
@include('frontend.default.partials.head')
<!-- End header -->
<body id="bd" class="page-template page-template-template-homepage page-template-template-homepage-php page page-id-1363 tribe-no-js wpb-js-composer js-comp-ver-5.1.1 vc_responsive">
  <div id="tzwrapper">
    <div id="loadding"></div>

    <div id="home" class="vc_row wpb_row vc_row-fluid tzSpace_default vc_custom_1469091512737 vc_row-has-fill">
      <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner vc_custom_1450056543208">
          <div class="wpb_wrapper">
            @include('frontend.default.partials.header_content1')


          </div>
        </div>
      </div>
    </div>

    @yield('content')

  </div>
  <!-- 13.Goole map-->
  <!-- 14.REGISTER NOW-->
  @include('frontend.default.partials.footer_content')
  @include('frontend.default.partials.section_livedemo')
  @include('frontend.default.partials.footer')
</body>
<!-- Mirrored from wordpress.templaza.net/wp-maniva/meetup/home-header/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Sep 2017 09:54:39 GMT -->
</html>