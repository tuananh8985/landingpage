@extends('frontend.default.layouts.master')
@section('content')
<?php

$list_product = Page::where('parent',$page->id)->get(); 
?>
<section id="columns" class="offcanvas-siderbars">
    <div class="container">
        <div class="row">
            <section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="content">

                    <div class="std">
                        <div id="ves-slideshow" class="ves-slideshow hidden-sm hidden-xs">
                            <div class="row">
                                <div class="category-left col-lg-3 col-sm-3 col-xs-12">
                                    @include('frontend.default.partials.sidebar')
                                    <script type="text/javascript">
                                        jQuery(window).ready(function () {

                                            /*  Fix First Click Menu */
                                            jQuery(document.body).on('click', '#verticalmenu [data-toggle="dropdown"]', function (event) {
                                                event.stopImmediatePropagation();
                                                jQuery(this).parent().show();
                                                if (!jQuery(this).parent().hasClass('open') && this.href && this.href != '#') {
                                                    window.location.href = this.href;
                                                }

                                            });
                                            jQuery(document.body).on('dblclick', '#verticalmenu [data-toggle="dropdown"]', function (event) {
                                                event.stopImmediatePropagation();
                                                jQuery(this).parent().show();
                                                if (!jQuery(this).parent().hasClass('open') && this.href && this.href != '#') {
                                                    window.location.href = this.href;
                                                }

                                            });
                                        });
                                    </script>
                                </div>
                                @include('frontend.default.partials.home.slide')
                            </div>
                        </div>
                        
                    </div>
                    <div class="content">
                        @include('frontend.default.element.product.category_product.sidebar')
                        @include('frontend.default.element.product.category_product.content')
                    </div>


                </div>
            </section>
        </div>
    </div>
</section>
<section id="ves-massbottom" class="ves-massbottom">
    <div class="container">
        <script type="text/javascript">
            jQuery('#productcarousel27456361661491548736').carousel({
                interval: false,
                auto: false,
                pause: 'hover',
                cycle: true
            });
        </script>
    </div>
</section>
@endsection