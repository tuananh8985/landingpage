@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Edit Sliderspack</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/Sliderspacks')}}">Sliderspacks</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Edit Sliderspack
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<h4> <i class="icon-reorder"></i>
					Edit Sliderspack
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
				</div>
			</div>
        <div class="portlet-body">
{{ Form::model($Sliderspack, array('method' => 'PATCH', 'route' => array('admin.sliderspacks.update', $Sliderspack->id))) }}
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
                        <div class="control-label">{{ Form::label('description', 'Description:') }}</div>
                        <div class="controls">{{ Form::text('description') }}</div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('image_width', 'Image_width:') }}</div>
                        <div class="controls">{{ Form::input('number', 'image_width') }}</div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('image_height', 'Image_height:') }}</div>
                        <div class="controls">{{ Form::input('number', 'image_height') }}</div>
                    </div>
                </div>
            </div>

<div class="row-fluid">
        <div class="controls">
            {{ Form::submit('Update', array('class' => 'btn btn blue')) }}
            {{ link_to_route('admin.sliderspacks.show', 'Cancel', $Sliderspack->id, array('class' => 'btn')) }}
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