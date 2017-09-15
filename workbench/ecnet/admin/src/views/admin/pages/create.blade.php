@extends('admin::layouts.scaffold')
@section('head')
<link rel="stylesheet" href="{{URL::to('/')}}/packages/ecnet/admin/assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />

@stop
@section('footer')
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/ckeditor/ckeditor.js"></script>
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
        <h3 class="page-title">Tạo trang đơn</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/pages')}}">Quản lý trang đơn</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>Tạo trang đơn</li>
        </ul>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box green tabbable">
            <div class="portlet-title">
                <h4>
                    <i class="icon-reorder"></i>
                    Tạo Trang mới
                </h4>
            </div>
            <div class="portlet-body">
                {{ Form::open(array('route' => 'admin.pages.store','class'=>'form-horizontal')) }}
                <div class="tabbable portlet-tabs">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="#portlet_tab3" data-toggle="tab">Plugin</a>
                        </li>
                        <li>
                            <a href="#portlet_tab2" data-toggle="tab">SEO</a>
                        </li>
                        <li class="active">
                            <a href="#portlet_tab1" data-toggle="tab">Nội dung</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="portlet_tab1">
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <div class="control-label">
                                            <div class="control-label">{{ Form::label('parent', 'Danh mục:') }}
                                            </div>
                                           <div class="controls">
                                             {{Form::select('parent',Page::array_list())}}
                                           </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        {{Form::label('type','Kiểu',array('class'=>'control-label'))}}
                                        <div class="controls">
                                            <select name="type">
                                                <option value="0"> Bình thường</option>
                                                <option value="1">Trang chủ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span7">
                                    <div class="control-group">
                                        <div class="control-label">{{ Form::label('title', 'Tựa đề:') }}</div>
                                        <div class="controls">{{ Form::text('title',Input::old('title'),array('class'=>'m-wrap span12','id'=>'title')) }}
                                        </div>

                                    </div>
                                </div>
                                <div class="span5">
                                    <div class="control-label">
                                        {{Form::label('homepage','Đặt làm trang chủ')}}
                                    </div>
                                    <div class="controls" style="margin-top: 5px">
                                        {{Form::checkbox('homepage',1,0)}}
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span7">
                                    <div class="control-group">
                                        <label class="control-label">Đường dẫn</label>
                                        <div class="controls">
                                            {{Form::text('slug',Input::old('slug'),array('class'=>'m-wrap span12','id'=>'slug'))}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fuild">
                                <div class="span12">
                                    <div class="control-group">
                                        <div class="control-label">
                                            {{Form::label('template','Template')}}
                                        </div>
                                        <div class="controls">
                                            {{Form::select('template',Config::get('admin::website.templates',array('class'=>'m-wrap span6')))}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="control-group">
                                        <div class="control-label">{{ Form::label('body', 'Code:') }}</div>
                                        <div class="controls">{{ Form::textarea('body',Input::old('body'),array('class'=>'m-wrap span12','rows'=>10)) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="portlet_tab2">
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="control-group">
                                        <div class="control-label">{{ Form::label('meta_title', 'Title:') }}</div>
                                        <div class="controls">{{ Form::text('meta_title',Input::old('meta_title'),array('class'=>"m-wrap span6")) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="control-group">
                                        <div class="control-label">{{ Form::label('meta_description', 'Description:') }}</div>
                                        <div class="controls">{{ Form::textarea('meta_description',Input::old('meta_description'),array('class'=>"m-wrap span6",'rows'=>'3')) }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="control-group">
                                        <div class="control-label">{{ Form::label('meta_keywords', 'Keywords:') }}</div>
                                        <div class="controls">{{ Form::text('meta_keywords',Input::old('meta_keywords'),array('class'=>'m-wrap span6')) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="portlet_tab3">
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="control-group">
                                        <div class="control-label">{{ Form::label('custom_head', 'Custom head:') }}</div>
                                        <div class="controls">{{ Form::textarea('custom_head',Input::old('custom_head'),array('class'=>'m-wrap span6','rows'=>'5')) }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="control-group">
                                        <div class="control-label">{{ Form::label('custom_footer', 'Custom footer:') }}</div>
                                        <div class="controls">{{ Form::textarea('custom_footer',Input::old('custom_footer'),array('class'=>'m-wrap span6','rows'=>'5')) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="control-group">
                                <div class="controls">{{ Form::submit('Submit', array('class' => 'btn green')) }}
                                </div>
                            </div>
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