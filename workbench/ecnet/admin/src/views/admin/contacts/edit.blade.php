@extends('admin::layouts.scaffold')

@section('main')
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">Quản lý Liên hệ</h3>
            <ul class="breadcrumb">
                <li><i class="icon-home"></i>
                    <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="{{URL::to('admin/contacts')}}">contacts</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    Xem tin nhắn của {{$contact->name}}
                </li>
            </ul>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box grey">
                <div class="portlet-title">
                    <h4><i class="icon-reorder"></i>
                        Nội dung
                    </h4>

                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body">
                </div>
            </div>
        </div>
    </div>

@stop