@extends('admin::layouts.scaffold')
@section('head')
<link rel="stylesheet" href="{{URL::to('/')}}/packages/ecnet/admin/assets/css/jquery.Jcrop.min.css" />

<link href="{{URL::to('/')}}/packages/ecnet/admin/assets/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/packages/ecnet/admin/assets/chosen-bootstrap/chosen/chosen.css" />

<body>
@stop
@section('footer')
<script src="http://malsup.github.com/jquery.form.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
@include('admin::admin/widgets/crop-image-js')
@stop

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Thêm Đối tác</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/partners')}}">Đối tác</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Thêm đối tác
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="portlet box green">
			<div class="portlet-title">
				<h4> <i class="icon-reorder"></i>
					Thêm đối tác
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
				</div>
			</div>
        <div class="portlet-body">
         @include('admin::admin.widgets.crop-image')

{{ Form::open(array('route' => 'admin.partners.store')) }}
{{Form::hidden('logo','',array('id'=>'image'))}}
            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('name', 'Tên đối tác:') }}</div>
                        <div class="controls">{{ Form::text('name') }}</div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('description', 'Description:') }}</div>
                        <div class="controls">{{ Form::textarea('description') }}</div>
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
                        <div class="control-label">{{ Form::label('order', 'Order:') }}</div>
                        <div class="controls">{{ Form::input('number', 'order') }}</div>
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

