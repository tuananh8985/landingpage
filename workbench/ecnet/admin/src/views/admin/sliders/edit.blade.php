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
        <h3 class="page-title">Sửa slider</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/Sliderspacks')}}">sliders</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>Edit</li>
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
                {{View::make('admin::admin.widgets.crop-image')->with('image',$slider->image)->with('img_option',$img_option)}}
                <!-- Kết thúc hình ảnh cho slider -->
                {{ Form::model($slider, array('method' => 'PATCH', 'route' => array('admin.sliderspacks.sliders.update', 'sliderspacks'=>$pack->id,'sliders'=>$slider->id))) }}
                {{Form::hidden('image','',array('id'=>'image'))}}
                {{Form::hidden('old_image',$slider->image)}}
                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('title', 'Title:') }}</div>
                            <div class="controls">
                                {{ Form::text('title',$slider->title,array('class'=>'m-wrap span12')) }}
                            </div>
                        </div>
                    </div>
                    <div class="span1">
                        <div class="control-group">
                            <div class="control-label"> <strong>{{ Form::label('order', 'Xắp xếp:') }}</strong>
                            </div>
                            <div class="controls">
                                {{ Form::input('number', 'order',$slider->order,array('class'=>'m-wrap span12')) }}
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
                            <div class="controls">{{ Form::text('link',$slider->link,array('class'=>'m-wrap span12')) }}</div>
                            </div
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6"></div>

                        <div class="control-group">
                            <div class="control-label">{{ Form::label('description', 'Description:') }}</div>
                            <div class="controls">
                                {{ Form::textarea('description',$slider->description,array('class'=>'m-wrap span12','rows'=>'3')) }}
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="control-group">
                                <div class="control-label">{{ Form::label('body', 'Body:') }}</div>
                                <div class="controls">
                                    {{ Form::textarea('body',$slider->body,array('class'=>'m-wrap ckeditor span12')) }}
                                </div>
                            </div>
                        </div>

                        <div class="row-fluid">
                            <div class="control-group">
                                <div class="controls">{{ Form::submit('Submit', array('class' => 'btn')) }}</div>
                            </div>
                        </div>
                        {{ Form::close() }}

                        @if ($errors->any())
                        <ul>
                            {{ implode('', $errors->all('
                            <li class="error">:message</li>
                            ')) }}
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop