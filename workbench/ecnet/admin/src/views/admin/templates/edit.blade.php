@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Edit Template</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/templates')}}">templates</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>Edit Template</li>
        </ul>
    </div>
</div>
<!-- Hiển thị thông báo -->
@if(Session::has('message'))
<div class="row-fluid">
    <div class="span12">
        <div class="alert alert-success">
            <button data-dismiss="alert" class="close"></button>
            {{Session::get('message')}}
        </div>
    </div>
</div>
@endif
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <h4>
                    <i class="icon-reorder"></i>
                    Edit Template
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
                {{ Form::model($template, array('method' => 'PATCH', 'route' => array('admin.templates.update', $template->id))) }}
                <div class="row-fluid">
                    <div class="span12">
                        @if ($errors->any())
                        <ul>
                            {{ implode('', $errors->all('
                            <li class="error">:message</li>
                            ')) }}
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('name', 'Name:') }}</div>
                            <div class="controls">{{ Form::text('name') }}</div>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('folder', 'Folder:') }}</div>
                            <div class="controls">{{ Form::text('folder') }}</div>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('actived', 'Actived:') }}</div>
                            <div class="controls">{{ Form::checkbox('actived') }}</div>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="controls">
                        {{ Form::submit('Update', array('class' => 'btn btn blue')) }}
            {{ link_to_route('admin.templates.show', 'Cancel', $template->id, array('class' => 'btn')) }}
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
 <!-- Quản lý asset -->
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box green">
            <div class="portlet-title">
                <h4>
                    <i class="icon-reorder"></i>
                    Upload Assets
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row-fluid">
                    <div class="span12"><div class="label label-success">Current asset folder:</div><strong> {{$template->asset_folder}}</strong></div>
                </div>
                {{Form::open(
                    array(
                    'url'=>URL::to('admin/templates/upload_asset'),
                    'method'=>'post',
                    'files'=>'true',
                    'class'=>'horizonalform'
                    )
                )}}
                <div class="row-fluid">
                    <div class="span12">
                        {{Form::label('assets','Select Zip file',array('class'=>'control-label'))}}
                        <div class="controls">
                            {{Form::file('asset',Input::old('asset'),array('class'=>'fileupload fileupload-new'))}} {{Form::submit('Upload',array('class'=>'btn green'))}}
                            {{Form::hidden('id',$template->id)}}
                        </div>
                    </div>

                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <h4>
                Quản lý layouts
                </h4>
                <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                </div>
                <div class="actions">
                    <a href="#" title="" class ="btn mini green">Thêm layout</a>
                </div>

                
            </div>
            <div class="portlet-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>Theme</th>
                            <th>postion</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                            <td>
                                <div class="pull-right">
                                    <a href="#" class="btn blue" title="">Edit</a>
                                    <a href="#" class="btn red" title="">Delete</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@stop