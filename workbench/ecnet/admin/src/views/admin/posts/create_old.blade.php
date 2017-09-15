@extends('admin::layouts.scaffold')

@section('head')
    <link rel="stylesheet" type="text/css"
          href="{{URL::to('/')}}/packages/ecnet/admin/assets/jquery-tags-input/jquery.tagsinput.css"/>
@stop
@section('footer')
    <script type="text/javascript"
            src="{{URL::to('/')}}/packages/ecnet/admin/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
    <script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/ckeditor/ckeditor.js"></script>
    @include('admin::admin/widgets/crop-image-js')
    @stop
            <!-- End slug script -->
@endsection

@section('main')
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">Tạo bài viết mới</h3>
            <ul class="breadcrumb">
                <li><i class="icon-home"></i>
                    <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="{{URL::to('admin/posts')}}">Danh sách bài viết </a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>Thêm bài viết:
                </li> {{(Input::has('type') && Input::get('type')=='product')?'Về sản phẩm':'Tin tức'}}
            </ul>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <h4>
                        <i class="icon-reorder"></i>
                        Thêm bài viết: </li>
                        {{(Input::has('type') && Input::get('type')=='product')?'Về sản phẩm':'Tin tức'}}
                        <a style="margin-left: 30px;" class="btn small blue" href="{{(Input::has('type') && Input::get('type')=='product')?
                    URL::route('admin.posts.create'):URL::route('admin.posts.create',['type'=>'product'])}}">
                            chuyển sang thêm bài
                            viết {{(Input::has('type') && Input::get('type')=='product')?'Tin tức':'Về sản phẩm'}}</a>
                    </h4>

                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body">

                    @if ($errors->any())
                        <div class="row-fluid">
                            <ul>
                                {{ implode('', $errors->all('
                                    <div class="alert alert-error">
                                        <button data-dismiss="alert" class="close"></button> <strong>Lỗi!</strong>
                                        :message
                                    </div>
                                    ')) }}
                            </ul>
                        </div>
                    @endif
                    <div class="row-fluid">

                        <div class="span6">
                            @include('admin::admin.widgets.crop-image')
                            <span>Ảnh liên quan<br></span>
                        {{ Form::model($post,array('route' => 'admin.posts.store','files'=>'true')) }}
                        @if(Input::has('type') && Input::get('type')=='product')
                            <input type="file" name="input_images[]" multiple="true">
                        @endif  
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
                                                <div class="control-label">{{ Form::label('title', 'Tên bài viết:') }}</div>
                                                <div class="controls">
                                                    {{ Form::text('title',Input::old('title'),array('class'=>'m-wrap span12','id'=>'title', 'required')) }}
                                                </div>
                                            </div>
                                            <input type="hidden" name="subtype" value="{{(Input::has('type') && Input::get('type')=='product')?'product':'post'}}">
                                           

                                        </div>
                                        <div class="control-group">
                                            <div class="control-label">{{ Form::label('description', 'Mô tả ngắn cho bài viết:') }}</div>
                                            <div class="controls">
                                                {{Form::textarea('description',Input::old('description'),array('class'=>'m-wrap span12','rows'=>3,'style'=>'height:100px;'))}}
                                            </div>
                                        </div>
                                    </div>
                                    @if(Input::has('type') && Input::get('type')=='product')
                                    <div class="row-fluid">
                                        <div class="span6">
                                            <div class="control-group">
                                                <div class="control-label">{{ Form::label('parent', 'Phân mục bài viết:') }}</div>
                                                <div class="controls">
                                                    {{Form::select('parent', $categories,array('m-wrap span12'))}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @else
                                        <input type="hidden" name="parent" value="308">
                                    @endif
                                    <div class="row-fluid">
                                        <input type="hidden" name="template" value="{{(Input::has('type') && Input::get('type')=='product')?'post_product':'post'}}">
                                        <div class="span3">
                                           
                                            <div class="">{{Form::checkbox('featured',1,false)}} Nổi bật
                                              
                                            </div>
                                        </div>
                                        <div class="span3">
                                            <div class="control-group">
                                                <div class="">{{Form::checkbox('published',1,true)}} Đăng</div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($post->subtype == 'product')
                                    <legend>Thuộc tính bổ sung</legend>
                                        @foreach(PropertyTemplate::productProperties() as $pro)
                                            {{$pro->render()}}
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>


                    </div>


                    @if(Session::has('message'))
                        <div class="alert alert-error">
                            <button data-dismiss="alert" class="close"></button>
                            <strong>Lỗi!</strong>
                            {{Session::get('message')}}
                        </div>
                    @endif

                    {{Form::hidden('image',Input::old('image'),array('id'=>'image'))}}
                    <div class="row-fluid">
                        <div class="span12">
                        
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="control-group">
                                    <div class="control-label">{{ Form::label('body', 'Body:') }}</div>
                                    <div class="controls">
                                        {{ Form::textarea('body',Input::old('body'),array('class'=>'m-wrap span12 ckeditor','rows'=>'10')) }}
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
                                    {{ Form::text('meta_title',Input::old('meta_title'),array('class'=>"m-wrap span12")) }}
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <div class="control-label">{{ Form::label('meta_keywords', 'Keywords:') }}</div>
                                <div class="controls">
                                    {{ Form::text('meta_keywords',Input::old('meta_keywords'),array('class'=>'m-wrap span12')) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="control-group">
                                <div class="control-label">{{ Form::label('meta_description', 'Description:') }}</div>
                                <div class="controls">
                                    {{ Form::textarea('meta_description',Input::old('meta_description'),array('class'=>"m-wrap span6",'rows'=>'3')) }}
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
                <div class="controls offset4">{{ Form::submit('Đăng', array('class' => 'btn green')) }}</div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@stop