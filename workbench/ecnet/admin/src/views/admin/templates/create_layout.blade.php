@extends('admin::layouts.scaffold')
@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Create Postcatalog</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/templates')}}">Templates</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Create Layout
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="portlet box green">
			<div class="portlet-title">
				<h4> <i class="icon-reorder"></i>
					Create Postcatalog
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
				</div>
			</div>
        <div class="portlet-body">

{{ Form::open(array('url' => 'admin/templates/create-layout','method'=>'post','class'=>'form-horizontal')) }}
<div class="row-fluid">
    <div class="span12">
        <div class="control-label">
            {{Form::label('title','Tên Layout',array('class'=>'control-label'))}}
        </div>
        
        <div class="controls">
        {{Form::text('title',Input::old('title'),array('class'=>'m-wrap span6'))}}
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="control-label">
            {{Form::label('template','Template',array('class'=>'control-label'))}}
        </div>
        
        <div class="controls">
        {{Form::select('template',Template::array_list(),$template->id,array('class'=>'m-wrap span6'))}}
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="control-label">
            {{Form::label('type','Type',array('class'=>'control-label'))}}
        </div>
        
        <div class="controls">
        {{Form::select('type',array('0'=>'Bình thường','1'=>'Master'),Input::old('type'),array('class'=>'m-wrap span6'))}}
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="control-label">
            {{Form::label('body','Body',array('class'=>'control-label'))}}
        </div>
        
        <div class="controls">
        {{Form::textarea('body',Input::old('body'),array('class'=>'m-wrap span12'))}}
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

