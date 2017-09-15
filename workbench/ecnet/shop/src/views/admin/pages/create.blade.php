@extends('admin.layouts.master')
@section('head')
<style>
    #body_code {
        height: 300px;
    }
</style>

@stop
@section('footer')
<script src="/admin_assets/plugins/ace/ace.js" type="text/javascript"></script>
<script>


    jQuery(document).ready(function($) {
        var editor = ace.edit("body_code");
           editor.setTheme("ace/theme/monokai");
        editor.getSession().setMode("ace/mode/html");
        $("#before-submit-form-btn").click(function() {
            $("#body").val(editor.getValue());
            $("#submit-form-btn").click();
        });


    });
</script>

@stop
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">


        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Create Page
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
                        <a href="{{URL::route('admin.pages.index')}}">
                            pages
                        </a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">
                            Tạo mới Page
                        </a>
                    </li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>

        {{portlet_open('Thông tin trang','green')}}
        {{ Form::open(array('route' => 'admin.pages.store','class'=>'form-horizontal')) }}
        <div class="row">
            <div class="col-md-12">
                <!-- Tựa đề Form Input -->
                <div class="form-group col-md-12">
                        {{Form::text('title',null,['class'=>'form-control','placeholder'=>'Tựa đề trang'])}}
                        {{error_for('title',$errors)}}
                </div>

                <!-- Body Form Input -->
                <div class="form-group col-md-12">
                  <div class="col-md-12">
                    {{Form::label('body','Nội dung:')}}  {{error_for('body',$errors)}}

                </div>
                <div class="col-md-12" style="padding: 5px;border: 1px solid; border-radius: 5px !important;">
                    <div id="body_code">
                    </div>

                    {{Form::textarea('body',null,['class'=>'hide'])}}

                </div>
            </div>



                <!-- Description Form Input -->
                <div class="form-group col-md-12">
                                  <hr/>

                    <div class="col-md-2">
                        {{Form::label('description','Mô tả trang:',['class'=>'control-label'])}}
                    </div>
                    <div class="col-md-10">
                        {{Form::textarea('description',null,['class'=>'form-control','rows'=>3])}}
                    </div>
                </div>
                <!-- Template Form Input -->
                <div class="col-md-12">
                    <legend>Giao diện</legend>
                </div>
                <div class="form-group col-md-6">
                    <div class="col-md-2">
                        {{Form::label('template','Template:',['class'=>'control-label'])}}
                    </div>
                    <div class="col-md-10">
                        {{Form::select('template',['0'=>'Mặc định'],null,['class'=>'form-control'])}}
                        {{error_for('template',$errors)}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="col-md-2">
                        {{Form::label('layout','Layout:',['class'=>'control-label'])}}
                    </div>
                    <div class="col-md-10">
                        {{Form::select('layout',['0'=>'Trang trắng','1'=>'Trang đơn mặc định'],null,['class'=>'form-control'])}}
                        {{error_for('layout',$errors)}}
                    </div>
                </div>

            <div class="col-md-12 form-actions fluid">
                <div class="col-md-offset-5">
                    <a title="Tạo trang mới" id="before-submit-form-btn" class="btn green">Tạo trang mới</a>

                    {{Form::submit('Tạo trang mới',['class'=>'hide','id'=>'submit-form-btn'])}}
                    <a class="btn default" href="{{URL::route('admin.pages.index')}}">Quay trở lại</a>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
    {{portlet_close()}}
</div>
</div>


@stop


