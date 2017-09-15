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
  @if(Session::has('send_contact_successs'))
  <div class="alert alert-success" id="alert_cart" style="text-align:center;font-size:15px;">
    {{Session::get('send_contact_successs')}}
  </div>
  @endif
  <!-- ============================================== HEADER : END ============================================== -->
  <div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
      <div class="row">
        <!-- ============================================== SIDEBAR ============================================== -->
        @yield('content')
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /#top-banner-and-menu -->
  <!-- ============================================================= FOOTER ============================================================= -->
  @include('frontend.default.partials.footer_content')
  @include('frontend.default.partials.footer')
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=1812083242385221";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
</body>

</html>