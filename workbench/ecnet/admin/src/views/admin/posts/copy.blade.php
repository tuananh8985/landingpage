@extends('admin::layouts.scaffold')

@section('head')
<link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/packages/ecnet/admin/assets/jquery-tags-input/jquery.tagsinput.css" />
@stop
@section('footer')
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/js/slug.js"></script>
<script type="text/javascript">
$('#title').keyup(function() {
    var slug = $.slug( $(this).val() );
    $('#slug').val(slug);
});
    $('#post_tag').tagsInput({
            width: 'auto',
            'onAddTag': function (e) {
                $.ajax({
                    url: "{{URL::to('admin/tags/add')}}",
                    type: 'POST',
                    data: {tag: e},
                })
                .done(function(e) {
                    console.log(e);
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
                
            },
        });
</script>
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/ckeditor/ckeditor.js"></script>
@include('admin::admin/widgets/crop-image-js')
@stop

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">{{$post->title}}</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/posts')}}">posts</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>Sửa bài viết</li>
        </ul>
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="portlet box green">
            <div class="portlet-title">
                <h4>
                    <i class="icon-reorder"></i>
                    Bạn hãy sửa bài viết copy để lưu và dữ liệu
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row-fluid">
                    <div class="span12">
                        @if ($errors->any())
            <ul>
                {{ implode('', $errors->all('
                <li class="error">:message</li>
                ')) }}
            </ul>
            @endif
                    </div>
                </div>
                {{View::make('admin::admin.widgets.crop-image')->with('image',$post->image)->with('img_option',$img_option)}}

{{ Form::open(array('route' => 'admin.posts.copy_post','files'=>'true')) }}
{{Form::hidden('image','',array('id'=>'image'))}}
{{Form::hidden('old_image',$post->image)}}
                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('title', 'Tên bài viết:') }}</div>
                            <div class="controls">
                                {{ Form::text('title',$post->title,array('class'=>'m-wrap span10','id'=>'title')) }}
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('slug', 'Slug:') }}</div>
                            <div class="controls">
                                {{ Form::text('slug',$post->slug,array('class'=>'m-wrap span10','id'=>'slug')) }}
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="portlet box">
                            <div class="portlet-title">
                                <h4>Thuộc tính bài viết</h4>
                            </div>
                            <div class="portlet-body">
                                <div class="row-fluid">
                                    <div class="span12">
                                        <div class="control-group">
                                            <div class="control-label">{{ Form::label('parent', 'Phân mục bài viết:') }}</div>
                                            <div class="controls">
                                                {{Form::select('parent',Page::array_list(0,0,1),$post->parent,array('m-wrap span12'))}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="control-group">
                                            <div class="control-label">{{Form::label('template','Template:')}}</div>
                                            <div class="controls">
                                                {{Form::select('template',Config::get('admin::website.post_templates'),$post->template,array('m-wrap span12'))}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span3">
                                        <div class="control-group">
                                            <div class="controls">{{Form::checkbox('featured',$post->featured,true)}} Nổi bật</div>
                                        </div>
                                    </div>
                                    <div class="span3">
                                        <div class="control-group">
                                            <div class="controls">{{Form::checkbox('published',$post->published,true)}} Đăng</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('body', 'Body:') }}</div>
                            <div class="controls">
                                {{ Form::textarea('body',$post->body,array('class'=>'m-wrap span12 ckeditor','id'=>'drop_test','rows'=>'20')) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                </div>
                <div class="row-fluid">
                    <div class="span12">
                    <div class="span6">
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('description', 'Mô tả ngắn cho bài viết:') }}</div>
                            <div class="controls">
                                {{ Form::textarea('description',$post->description,array('class'=>'m-wrap span12','rows'=>'2')) }}
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('keywords', 'Tags:') }}</div>
                            <div class="controls">
                                {{ Form::textarea('keywords',$post->keywords,array('class'=>'m-wrap span12','rows'=>'2')) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
</div>
<!-- Seo input -->
<div class="row-fluid">
    <div class="span12">
    <div class="portlet box blue">
        <div class="portlet-title">
            <h4>
                <i class="icon-reorder"></i>
                Thông số hỗ trợ công cụ tìm kiếm
            </h4>
            <div class="tools">
                <a class="collapse" href="javascript:;"></a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('meta_title', 'Title:') }}</div>
                        <div class="controls">
                            {{ Form::text('meta_title',$post->meta_title,array('class'=>"m-wrap span12")) }}
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('meta_keywords', 'Keywords:') }}</div>
                        <div class="controls">
                            {{ Form::text('meta_keywords',$post->meta_keywords,array('class'=>'m-wrap span12')) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('meta_description', 'Description:') }}</div>
                        <div class="controls">
                            {{ Form::textarea('meta_description',$post->meta_description,array('class'=>"m-wrap span6",'rows'=>'3')) }}
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
</div>
<div class="row-fluid">
<div class="span12">
    <div class="control-group">
        <div class="controls offset4">{{ Form::submit('Tạo', array('class' => 'btn green')) }}</div>
    </div>
</div>
</div>
{{ Form::close() }}
@stop