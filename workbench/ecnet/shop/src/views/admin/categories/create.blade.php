@extends('shop::admin.layouts.master')
@section('footer')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="/packages/ecnet/shop/plugins/select2/select2.min.js"></script>
    <script type="text/javascript" src="/packages/ecnet/shop/plugins/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="/packages/ecnet/shop/plugins/data-tables/DT_bootstrap.js"></script>
    <script type="text/javascript"
            src="/packages/ecnet/shop/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript"
            src="/packages/ecnet/shop/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="/packages/ecnet/shop/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"
            type="text/javascript"></script>
    <script src="/packages/ecnet/shop/plugins/bootstrap-touchspin/bootstrap.touchspin.js"
            type="text/javascript"></script>
    <script type="text/javascript" src="/packages/ecnet/shop/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
    <script src="/packages/ecnet/shop/plugins/plupload/js/plupload.full.min.js" type="text/javascript"></script>
    <script src="/packages/ecnet/shop/scripts/custom/ecommerce-products-edit.js"></script>

    <!-- END PAGE LEVEL PLUGINS -->

@stop
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">


            <!-- BEGIN PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        Thêm sản phẩm mới
                    </h3>
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="{{URL::route('admin')}}">
                                Trang chủ
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="/admin/shop">
                                Quản lý Shop
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="/admin/shop/categories">
                                Quản lý Danh mục
                            </a>
                        </li>

                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    @include('flash::message')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{Form::open(['route'=>'admin.shop.categories.store','class'=>'form-horizontal form-row-seperated'])}}
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-shopping-cart"></i>Thông tin sản phẩm mới
                                </div>
                                <div class="actions btn-set">
                                    <button type="button" name="back" class="btn default"><i
                                                class="fa fa-angle-left"></i> Back
                                    </button>
                                    <button class="btn green"><i class="fa fa-check"></i> Save</button>

                                    <button class="btn green" type="submit"><i class="fa fa-check-circle"></i> Save & Continue Edit
                                    </button>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_general" data-toggle="tab">
                                                General
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#tab_meta" data-toggle="tab">
                                                SEO
                                            </a>
                                        </li>

                                    </ul>
                                    <div class="tab-content no-space">
                                        @include('shop::admin.categories.create-tabs.general')
                                        @include('shop::admin.categories.create-tabs.meta')

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END PAGE HEADER-->

        </div>
    </div>
    <!-- END CONTENT -->
    </div>


@stop