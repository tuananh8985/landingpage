@extends('admin::layouts.scaffold')
@section('head')
<link href="{{URL::to('/')}}/packages/ecnet/admin/assets/dropzone/css/dropzone.css" rel="stylesheet"/>
@stop

@section('footer')
<script src="{{URL::to('/')}}/packages/ecnet/admin/assets/dropzone/dropzone.js"></script>
@stop

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý Images</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/images')}}">images</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>Danh sách images</li>
        </ul>
    </div>
</div>

<div class="row-fluid">
    <form>
        <div class="span12">
            {{Form::label('new_category','Tạo nhóm hình ảnh',array('class'=>'control-label'))}}
            <div class="controls">
                {{Form::text('category',Input::old('new_category'),array('class'=>'m-wrap span4'))}}
                    {{Form::submit('Add',array('class'=>'btn green'))}}
            </div>
        </div>
    </div>  
        <div class="row-fluid">
        <div class="span12">
            {{Form::label('select_cat','Lựa chọn nhóm',array('class'=>'control-label'))}}
            <div class="controls">
            {{Form::text('category',Input::old('category'),array('class'=>'m-wrap span4'))}}
            </div>
        </div>
    </form>
    </div>
    <div class="row-fluid">
    <div class="span12">
        <form action="{{URL::to('admin/upload_image')}}" class="dropzone" id="dropzone" style="display: none">
            {{Form::token()}}
            {{Form::hidden('category')}}
        </form>
        <div class="fallback"></div>
    </div>
</div>
@stop