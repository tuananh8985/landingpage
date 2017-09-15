@extends('admin::layouts.scaffold')

@section('head')
<link rel="stylesheet" type="text/css"
href="{{URL::to('/')}}/packages/ecnet/admin/assets/jquery-tags-input/jquery.tagsinput.css"/>
<link href="{{URL::to('/')}}/packages/ecnet/admin/assets/bootstrap-fileupload/bootstrap-fileupload.css"
rel="stylesheet"/>
@stop
@section('footer')
<script type="text/javascript"
src="{{URL::to('/')}}/packages/ecnet/admin/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/js/slug.js"></script>
<script type="text/javascript"
src="{{URL::to('/')}}/packages/ecnet/admin/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/ckeditor/ckeditor.js"></script>
@include('admin::admin/widgets/crop-image-js')
@stop

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">{{$post->title}}</h3>
        <ul class="breadcrumb">
            <li><i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/posts')}}">Quản lý bài viết</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>Sửa bài viết</li>
        </ul>
    </div>
</div>


<div class="row-fluid">
    <div class="span12" style="display:none;">
        <a href="{{URL::route('admin.posts.gallery',$post->id)}}" class="btn blue" style="margin-bottom: 20px;">Thư
            viện hỉnh ảnh</a>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <h4>
                        <i class="icon-reorder"></i>
                        Sửa bài viết
                    </h4>

                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body">

                    @if (Session::has('message'))
                    <div class="row-fluid">
                        <li class="info">{{Session::get('message')}}</li>
                    </div>
                    @endif


                    @if ($errors->any())
                    <div class="row-fluid">
                        <ul>
                            {{ implode('', $errors->all('
                            <li class="error">:message</li>
                            ')) }}
                        </ul>
                    </div>
                    @endif

                    <div class="row-fluid">

                        <div class="span6">
                            {{View::make('admin::admin.widgets.crop-image')->with(['image' =>$post->image,'post'=>$post])->with('img_option',$img_option)}}

                        </div>
                        {{ Form::model($post, array('method' => 'PATCH','files'=>'true','route' => array('admin.posts.update', $post->id))) }}

                        <div class="span6">
                            <div class="portlet box">
                                <div class="portlet-title">
                                    <h4>Thuộc tính bài viết</h4>
                                </div>
                                <div class="portlet-body">
                                    <div class="row-fluid">
                                        <div class="span12">
                                          @if($post->subtype == 'product')
                                          <input type="file" name="input_images[]" multiple="true">
                                          @endif
                                          <div class="control-group">
                                            <div class="control-label">{{ Form::label('title', 'Tên bài viết:') }}</div>
                                            <div class="controls">
                                                {{ Form::text('title',Input::old('title'),array('class'=>'m-wrap span12','id'=>'title')) }}
                                            </div>
                                        </div>
                                        <div class="control-group" hidden>
                                            <div class="control-label">{{ Form::label('slug', 'Đường link:') }}</div>
                                            <div class="controls">
                                                {{ Form::text('slug',Input::old('slug'),array('class'=>'m-wrap span12','id'=>'title')) }}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="control-group">
                                        <div class="control-label">{{ Form::label('description', 'Mô tả ngắn cho bài viết:') }}</div>
                                        <div class="controls">
                                            {{Form::textarea('description',Input::old('description'),array('class'=>'m-wrap span12','rows'=>3,'style'=>'height:100px;'))}}
                                        </div>
                                    </div>

                                    <div class="row-fluid">
                                        <input type="hidden" name="template" value="{{(Input::has('type') && Input::get('type')=='product')?'post_product':'post'}}">
                                        <div class="">
                                            <p>Danh Mục</p>
                                            <select name="featured">
                                                @if($post->featured == 1)
                                                <option value="1" selected>Giới Thiệu</option>
                                                <option value="2">Ban Điều Hành</option>
                                                <option value="3">Tin Tức</option>
                                                @elseif($post->featured == 2)
                                                <option value="1" >Giới Thiệu</option>
                                                <option value="2" selected>Ban Điều Hành</option>
                                                <option value="3">Tin Tức</option>
                                                @elseif($post->featured == 3)
                                                <option value="1">Giới Thiệu</option>
                                                <option value="2">Ban Điều Hành</option>
                                                <option value="3" selected>Tin Tức</option>
                                                @endif
                                            </select>
                                        </div>
                                        <div class="span6">
                                            <div class="control-group" hidden>
                                                <div class="">{{Form::checkbox('published',1,true)}} Đăng</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($post->subtype == 'product')
                                <div class="row-fluid">
                                    <div class="span6">
                                        <div class="control-group">
                                            <div class="control-label">{{ Form::label('parent', 'Phân mục bài viết:') }}</div>
                                            <div class="controls">
                                                {{Form::select('parent',$categories, array($post->parent),array('m-wrap span12'))}}

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Ngôn ngữ Form Input -->
                                </div>
                                @else
                                <input type="hidden" name="parent" value="308">
                                @endif

                             <!--    <div class="row-fluid" hidden>
                                    <input type="hidden" name="template" value="{{(Input::has('type') && Input::get('type')=='product')?'post_product':'post'}}">
                                    <div class="span3">
                                        @if(is_null($post['featured']) || ($post['featured'] == 0)) 
                                        <div class="controls">
                                            {{Form::checkbox('featured')}} Nổi bật
                                        </div>
                                    </div>
                                    @else
                                    <div class="controls">
                                        {{Form::checkbox('featured',$post['featured'],true)}} Nổi bật
                                    </div>
                                </div>
                                @endif -->
                            </div>
                                     <!--    <div class="span3">
                                            <div class="control-group">
                                                <div class="controls">{{Form::checkbox('published',1,true)}} Đăng</div>
                                            </div>
                                        </div> -->
                                    </div>

                                    @if($post->subtype == 'product')
                                    <legend>Thuộc tính bổ sung</legend>
                                    @foreach(PropertyTemplate::productProperties() as $pro)
                                    {{$pro->render($post)}}
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>

                    </div>


                    {{Form::hidden('image','',array('id'=>'image'))}}
                    {{Form::hidden('old_image',$post->image)}}
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
                </div>
            </div>
        </div>
        <!-- Seo input -->
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <div class="controls offset4">{{ Form::submit('Cập nhật bài viết', array('class' => 'btn blue')) }}</div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
    <script type="text/javascript">
        $( document ).ready(function() {
            $('.img_relate span.crop_image_item').click(function(){
               var r = confirm("Bạn có chắc chắn xóa ảnh này không");
               if (r == true) {
                var id_image = $(this).children("img").attr('class');
                var url_route = $(this).children("img").attr('id');
                $.ajax({
                    url : url_route,
                    type : "post",
                    dataType:"json",
                    data : {
                        id_image : id_image
                    },
                    success : function (result){
                        $('.img_relate').html(result);
                        window.location.reload();
                    }
                });
            } else {
                return false;
            }
        });
        });
    </script>
    @stop

    <style type="text/css">
        .crop_image_item{
            padding: 5px 5px;
            display: block;
            float: left;
        }
    </style>


