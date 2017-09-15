@extends('admin::layouts.scaffold')
@section('main')
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">Create New Page Property</h3>
            <ul class="breadcrumb">
                <li> <i class="icon-home"></i>
                    <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="{{URL::to('admin/properties')}}">properties</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>Create New Page Property</li>
            </ul>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <h4>
                        <i class="icon-reorder"></i>
                        Create Group
                    </h4>
                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    {{ Form::model($property,array('route' => 'admin.propertytemplates.store')) }}
                    @include('admin::admin.propertytemplates.form')
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="control-group">
                                <div class="controls">{{ Form::submit('Submit', array('class' => 'btn green')) }}</div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}

                    @if ($errors->any())
                        <ul>
                            {{ implode('', $errors->all('
                            <li class="error">:message</li>
                            ')) }}
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop