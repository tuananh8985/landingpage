@extends('shop::admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Trang demo Dành cho Lập trình viên
                    <small>Trang demo</small>
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
                            Trang quản trị
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                {{portlet_open('Bảng điều khiển','blue')}}
                <h3>Nội dung ở đây</h3>
                {{portlet_close()}}
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
</div>


@stop