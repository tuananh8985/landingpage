@extends('admin::layouts.scaffold')
@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Create Media</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/medias')}}">medias</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Create Media
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="portlet box green">
			<div class="portlet-title">
				<h4> <i class="icon-reorder"></i>
					Create Media
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
				</div>
			</div>
        <div class="portlet-body">
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
@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif
{{ Form::open(array('route' => 'admin.medias.store')) }}
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
                        <div class="control-label">{{ Form::label('cat', 'Cat:') }}</div>
                        <div class="controls">{{ Form::input('number', 'cat') }}</div>
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


</div>
        </div>
    </div>
</div>
@stop

