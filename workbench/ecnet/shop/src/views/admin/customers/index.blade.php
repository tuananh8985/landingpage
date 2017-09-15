@extends('admin.layouts.master')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Quản lý khách hàng
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
                            Quản lý khách hàng
                        </a>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                {{portlet_open('Danh sách khách hàng','blue')}}

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Gói</th>
                            <th class="col-md-1"></th>
                            <th class="col-md-1"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tester</td>
                            <td>tester@gmail.com</td>
                            <td>Free</td>
                            <td><a href="#" class="btn btn-sm blue">Edit</a></td>
                            <td><a href="#" class="btn btn-sm red">Delete</a></td>
                        </tr>
                    </tbody>
                </table>

                {{portlet_close()}}
            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
</div>
<!-- END CONTENT -->
</div>


@stop