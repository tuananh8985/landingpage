@extends('admin::layouts.scaffold')
@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Create Image</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/images')}}">images</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Create Image
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="portlet box green">
			<div class="portlet-title">
				<h4> <i class="icon-reorder"></i>
					Create Image
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
				</div>
			</div>
        <div class="portlet-body">

{{ Form::open(array('route' => 'admin.images.store')) }}
            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('title', 'Title:') }}</div>
                        <div class="controls">{{ Form::text('title') }}</div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('description', 'Description:') }}</div>
                        <div class="controls">{{ Form::text('description') }}</div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('link', 'Link:') }}</div>
                        <div class="controls">{{ Form::text('link') }}</div>
                    </div>
                </div>
            </div>

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
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif
</div>
        </div>
    </div>
</div>
@stop

