@extends('frontend.default.layouts.master')
@section('content')
<!-- ============================================== HEADER : END ============================================== -->
<?php
$danh_muc_cha = Page::where('id', $page->parent)->first();
?>
<div class="breadcrumb" id="link_path_detail_product">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled" style="text-align:left;">
                <li><a href="{{route('home')}}">Trang chủ</a></li>
                <li><a href="{{$danh_muc_cha->link()}}">{{$danh_muc_cha->title}}</a></li>
                <li class='active'>{{$page->title}}</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs" id="detail_product">
    <div class='container'>
        <div class='row single-product outer-bottom-sm '>
            <div class='col-md-9'>
                <!-- 1.slide image gallery-->
                @include('frontend.default.element.product.detail.product_content')
                @include('frontend.default.element.product.detail.product_info')
                @include('frontend.default.element.product.detail.product_related')
            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.body-content -->



<script type="text/javascript">



</script>
@endsection