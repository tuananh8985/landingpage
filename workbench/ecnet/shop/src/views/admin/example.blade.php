@extends('shop::admin.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">


            <!-- BEGIN PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        Quản lý danh mục mặt hàng
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
                            <a href="#">
                                Danh mục mặt hàng
                            </a>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            {{portlet_open('Danh mục mặt hàng','blue')}}

            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
            {{portlet_close()}}

            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
    </div>


@stop