@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Edit Rsliderselement</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/rsliderselements')}}">rsliderselements</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Edit Rsliderselement
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="portlet box blue">
			<div class="portlet-title">
				<h4> <i class="icon-reorder"></i>
					Edit Rsliderselement
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
				</div>
			</div>
        <div class="portlet-body">
{{ Form::model($rsliderselement, array('method' => 'PATCH', 'route' => array('admin.rsliderselements.update', $rsliderselement->id))) }}
          <div class="row-fluid">

                <div class="span6">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('class', 'Class:') }}</div>
                        <div class="controls">{{ Form::text('class',$rsliderselement->class,array('class'=>'m-wrap span12')) }}</div>
                    </div>
                </div>
                <div class="span3">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('x', 'X:') }}</div>
                        <div class="controls">{{ Form::input('number', 'x',$rsliderselement->x,array('class'=>'m-wrap span12')) }}</div>
                    </div>
                </div>
                <div class="span3">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('y', 'Y:') }}</div>
                        <div class="controls">{{ Form::input('number', 'y',$rsliderselement->y,array('class'=>'m-wrap span12')) }}</div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span2">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('speed', 'Speed:') }}</div>
                        <div class="controls">{{ Form::input('number', 'speed',$rsliderselement->speed,array('class'=>'m-wrap span12')) }}</div>
                    </div>
                </div>
                <div class="span2">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('start', 'Start:') }}</div>
                        <div class="controls">{{ Form::input('number', 'start',$rsliderselement->start,array('class'=>'m-wrap span12')) }}</div>
                    </div>
                </div>
                <div class="span8">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('easing', 'Easing:') }}</div>
                        <div class="controls">{{ Form::text('easing',$rsliderselement->easing,array('class'=>'m-wrap span12')) }}</div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="control-label">
                        {{Form::label('content','Nội dung Phần tử')}}
                    </div>
                    <div class="constrols">
                    {{Form::textarea('content',$rsliderselement->content,array('class'=>'m-wrap span12','rows'=>'5'))}}
                    </div>
                </div>
            </div>

<div class="row-fluid">
        <div class="controls">
            {{ Form::submit('Cập nhật', array('class' => 'btn btn blue')) }}
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