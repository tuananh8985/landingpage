@extends('admin::layouts.scaffold')
@section('head')

@stop
@section('footer')
    <script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/js/slug.js"></script>

@stop
@section('main')
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">Sửa danh mục bài viết</h3>
            <ul class="breadcrumb">
                <li><i class="icon-home"></i>
                    <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="{{URL::to('admin/postcatalogs')}}">Danh mục bài viết</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    Sửa danh mục: {{$postcatalog->title}}
                </li>
            </ul>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <h4><i class="icon-reorder"></i>
                        Sửa danh mục
                    </h4>

                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row-fluid">
                        @if ($errors->any())
                            <ul>
                                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                            </ul>
                        @endif
                    </div>
                    {{ Form::model($postcatalog, array(
                    'method' => 'PATCH',
                    'files'=>'true',
                    'route' => array('admin.postcatalogs.update', $postcatalog->id))) }}
                    <div class="row-fluid" style="display:none;">
                        <div class="span4">
                            <label class="control-label" for="">
                                Ảnh đại diện
                            </label>
                            <div class="controls">
                                {{Form::file('image')}}
                            </div>
                        </div>
                        <div class="span4">
                            <div>
                                <img class="thumbnail" src="{{URL::to($postcatalog->image)}}" alt=""/>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <div class="control-label">{{ Form::label('title', 'Title:') }}</div>
                                <div class="controls">{{ Form::text('title',$postcatalog->title,array('class'=>'m-wrap span12','id'=>'title')) }}</div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group" style="display:none;">
                                <div class="control-label">{{ Form::label('parent', 'Parent:') }}</div>
                                <div class="controls">{{ Form::select('parent',$parents,$postcatalog->parent,array('class'=>'m-wrap span12')) }}</div>
                            </div>
                            <div class="control-group" style="display:none;">
                                <div class="control-label">{{ Form::label('subtype', 'Kiểu Danh mục:') }}</div>
                                <div class="controls">
                                    {{ Form::select('subtype',[
                                        'post'=>'Tin tức',
                                        'product'=>'Sản phẩm',
                                    ],(Input::has('type'))?Input::get('type'):Input::old('subtype'),array('class'=>'m-wrap span6','id'=>'subtype')) }}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                        <!--     <div class="control-group span8" style="display:none;">
                                <div class="control-label">{{ Form::label('lang', 'Ngôn ngữ:') }}</div>
                                <div class="controls">
                                    {{ Form::select('lang',[
                                        'vi'=>'Tiếng Việt',
                                        'en'=>'English',
                                    ],Input::old('lang'),array('class'=>'m-wrap span12','id'=>'lang')) }}
                                </div>
                            </div> -->
                            <div class="control-group span4">
                                <div class="control-label">{{ Form::label('order', 'Order:') }}</div>
                                <div class="controls">{{ Form::text('order',(Input::old('order'))?Input::old('order'):$postcatalog->order,array('class'=>'m-wrap span3')) }}</div>
                            </div>
                        </div>

                        <div class="span6" style="display:none;">
                            <div class="control-group">
                                <div class="control-label">{{ Form::label('template', 'Template:') }}</div>
                                <div class="controls">{{ Form::select('template',Config::get('admin::website.category_templates'),$postcatalog->template) }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid" style="display:none;">
                        <div class="span12">
                            <div class="control-group">
                                <div class="control-label">{{ Form::label('description', 'Description:') }}</div>
                                <div class="controls">{{ Form::textarea('description',$postcatalog->description,array('class'=>'m-wrap span12','rows'=>'3')) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box blue">
                <div class="portlet-title" style="display:none;">
                    <h4>
                        <i class="icon-reorder"></i>
                        Thuộc Tính SEO
                    </h4>

                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row-fluid" style="display:none;">
                        <div class="span12">
                            <div class="control-group">
                                <div class="control-label">{{Form::label('meta_title','Meta Title')}}</div>
                                <div class="controls">
                                    {{Form::text('meta_title',$postcatalog->meta_title,array('class'=>'m-wrap span6'))}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid" style="display:none;">
                        <div class="span12">
                            <div class="control-group">
                                <div class="control-label">{{Form::label('meta_description','Meta Description')}}</div>
                                <div class="controls">
                                    {{Form::textarea('meta_description',$postcatalog->meta_description,array('class'=>'m-wrap span6'))}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid" style="display:none;">
                        <div class="span12">
                            <div class="control-group">
                                <div class="control-label">{{Form::label('meta_keywords','Meta Keywords')}}</div>
                                <div class="controls">
                                    {{Form::text('meta_keywords',$postcatalog->meta_keywords,array('class'=>'m-wrap span6'))}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="control-group">
                                <div class="controls">{{ Form::submit('Sửa', array('class' => 'btn blue')) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@stop