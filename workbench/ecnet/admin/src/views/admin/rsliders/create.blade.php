@extends('admin::layouts.scaffold')
@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Create Rslider</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/rsliders')}}">rsliders</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Create Rslider
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="portlet box green">
			<div class="portlet-title">
				<h4> <i class="icon-reorder"></i>
					Create Rslider
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
				</div>
			</div>
        <div class="portlet-body">

{{ Form::open(array('route' => 'admin.rsliders.store')) }}
            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('transiton', 'Transiton:') }}</div>
                        <div class="controls">{{ Form::select('transiton',array('fade'=>'Fade','slideleft'=>'Slide Left','slideup'=>'Slider Up','slideright'=>'Slider Right')) }}</div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('thumb', 'Thumb:') }}</div>
                        <div class="controls">{{ Form::select('thumb',array(
                            'images/sliders/revolution/slider-bg1.jpg'=>'Background 1',
                            'images/sliders/revolution/slider-bg2.jpg'=>'Background 2',
                            'images/sliders/revolution/slider-bg3.jpg'=>'Background 3',
                            'images/sliders/revolution/slider-bg4.jpg'=>'Background 4',
                        )) }}</div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('order', 'Order:') }}</div>
                        <div class="controls">{{ Form::input('number', 'order',0) }}</div>
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

