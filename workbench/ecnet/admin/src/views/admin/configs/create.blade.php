@extends('admin::layouts.scaffold')
@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Create config</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/configs')}}">configs</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Create config
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="portlet box green">
			<div class="portlet-title">
				<h4> <i class="icon-reorder"></i>
					Create config
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
				</div>
			</div>
            <div class="portlet-body">

                {{ Form::open(array('route' => 'admin.configs.store')) }}
                <div class="control-group">
                  <label for="group" class="control-label col-sm-2">Group</label>
                  <div class="controls col-sm-10">
                      {{Form::text('group',(Input::old('group'))?Input::old('group'):"Generate",
                      ['class'=>'m-wrap span6','placeholder'=>"Group"])}}

                  </div>
              </div>  
              <div class="control-group">
                  <label for="key" class="control-label col-sm-2">Key</label>
                  <div class="controls col-sm-10">
                      {{Form::text('key',Input::old('key'),
                      ['class'=>'m-wrap span6','placeholder'=>"Key"])}}

                  </div>
              </div>
              <div class="control-group">
                <label for="value" class="control-label col-sm-2">Value</label>
                <div class="controls col-sm-10">
                    {{Form::text('value',Input::old('value'),
                    ['class'=>'m-wrap span6','placeholder'=>"Value"])}}

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

