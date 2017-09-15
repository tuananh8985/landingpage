@extends('admin::layouts.scaffold')
@section('head')

@stop
@section('footer')
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/js/slug.js"></script>

<script type="text/javascript">
$('#title').keyup(function() {
    var slug = $.slug( $(this).val() );
    $('#slug').val(slug);
});
</script>
@stop
@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Create Pagecat</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/pagecats')}}">pagecats</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Create Pagecat
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
	<div class="span12">
		<div class="portlet box green">
			<div class="portlet-title">
				<h4> <i class="icon-reorder"></i>
					Create Pagecat
				</h4>
				<div class="tools">
					<a class="collapse" href="javascript:;"></a>
				</div>
			</div>
        <div class="portlet-body">

{{ Form::open(array('route' => 'admin.pagecats.store')) }}
            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('title', 'Title:') }}</div>
                        <div class="controls">{{ Form::text('title',Input::old('title'),array('class'=>'m-wrap span6','id'=>'title')) }}</div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('slug', 'Slug:') }}</div>
                        <div class="controls">{{ Form::text('slug',Input::old('slug'),array('class'=>'m-wrap span6','id'=>'slug')) }}</div>
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('parent', 'Parent:') }}</div>
                        <div class="controls">{{ Form::select('parent',Pagecat::child_list(),Input::old('parent')) }}</div>
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

