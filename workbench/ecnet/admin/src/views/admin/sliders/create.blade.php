@extends('admin::layouts.scaffold')
@section('head')

<link rel="stylesheet" href="{{URL::to('/')}}/packages/ecnet/admin/assets/css/jquery.Jcrop.min.css" />
<link href="{{URL::to('/')}}/packages/ecnet/admin/assets/bootstrap-fileupload/bootstrap-fileupload.css" rel="stylesheet" />

@endsection
@section('footer')
<script type="text/javascript" src="{{URL::to('')}}/packages/ecnet/admin/assets/ckeditor/ckeditor.js"></script>
@include('admin::admin/widgets/crop-image-js')
@stop
@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Create Slider</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/sliders')}}">sliders</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>Create Slider</li>
        </ul>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <h4>
                    <i class="icon-reorder"></i>
                    Create new Slider
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
                <!-- Hình ảnh cho Slider -->
                @include('admin::admin.widgets.crop-image')
                {{ Form::open(array('route' =>array( 'admin.sliderspacks.sliders.store','sliderspacks'=>$pack->id),'files'=>'true')) }}
                {{Form::hidden('image','',array('id'=>'image'))}}
                <div class="row-fluid">

                    @if ($errors->any())
                    <div class="span12">
                        <ul>
                            {{ implode('', $errors->all('
                            <li class="error">:message</li>
                            ')) }}
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('title', 'Title:') }}</div>
                            <div class="controls">
                            {{ Form::text('title',Input::old('title'),array('class'=>'m-wrap span12','required'=>'true')) }}
                            </div>
                        </div>
                    </div>
                    <div class="span1">
                        <div class="control-group">
                            <div class="control-label"> <strong>{{ Form::label('order', 'Xắp xếp:') }}</strong>
                            </div>
                            <div class="controls">
                                {{ Form::input('number', 'order',0,array('class'=>'m-wrap span12')) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group span6">
                            <div class="control-label">{{ Form::label('pack', 'Pack:') }}</div>
                            <div class="controls">{{ Form::select('pack',Sliderspack::list_array(),$pack->id) }}</div>
                        </div>
                        <div class="control-group span6">
                            <div class="control-label">{{ Form::label('link', 'Link:') }}</div>
                            <div class="controls">{{ Form::text('link',Input::old('link'),array('class'=>'m-wrap span12')) }}</div>
                            </div
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6"></div>

                        <div class="control-group" style="display:none;">
                            <div class="control-label">{{ Form::label('description', 'Description:') }}</div>
                            <div class="controls">
                                {{ Form::textarea('description',Input::old('title'),array('class'=>'m-wrap span12','rows'=>'3')) }}
                            </div>
                        </div>
                        <div class="row-fluid" style="display:none;">
                            <div class="control-group">
                                <div class="control-label">{{ Form::label('body', 'Body:') }}</div>
                                <div class="controls">
                                    {{ Form::textarea('body',Input::old('body'),array('class'=>'m-wrap ckeditor span12')) }}
                                </div>
                            </div>
                        </div>

                        <div class="row-fluid">
                            <div class="control-group">
                                <div class="controls">{{ Form::submit('Submit', array('class' => 'btn')) }}</div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop