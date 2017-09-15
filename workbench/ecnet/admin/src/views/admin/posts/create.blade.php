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
                        @if(Session::has('message'))
                        <div class="alert alert-error">
                            <button data-dismiss="alert" class="close"></button>
                            <strong>Lỗi!</strong>
                            {{Session::get('message')}}
                        </div>
                        @endif
                    </div>
                    {{ Form::model($post,array('route' => 'admin.posts.store','files'=>'true')) }}
                    <div class="span6">

                        <div class="portlet box">
                            <div class="portlet-title">
                                <h4>Thuộc tính bài viết</h4>
                            </div>
                            <div class="portlet-body">
                                <div class="row-fluid">
                                    <div class="span12">

                                        @if(Input::has('type') && Input::get('type')=='product')
                                        <span>Ảnh liên quan<br></span>
                                        <input type="file" name="input_images[]" multiple="true">
                                        <span>
                                            <br/>
                                            <span class="label label-important">NOTE!</span>Nên chọn hình ảnh có kích thước như ảnh đại diện để có ảnh đẹp nhất.
                                        </span>
                                        @endif
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
                                    <div class="">
                                        <p>Danh Mục</p>
                                        {{Form::select('featured', array('1' => 'Giới Thiệu', '2' => 'Ban Quản Lý','3' =>'Tin Tức'))}} 
                                    </div>
                                    <div class="span6">
                                        <div class="control-group" hidden>
                                            <div class="">{{Form::checkbox('published',1,true)}} Đăng</div>
                                        </div>
                                    </div>
                                </div>
                                @if($post->subtype == 'product')
                                <legend>Thuộc tính bổ sung</legend>

                                <div class="row-fluid">
                                    <div class="span12">
                                        <div class="control-group">
                                            <div class="control-label"><label for="properties[price]">Giá sản phẩm</label></div>
                                            <div class="controls"><input class="m-wrap span12" name="properties[price]" type="number" id="properties[price]" min="0" required="true" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode <= 8'>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row-fluid">
                                    <div class="span12">
                                        <div class="control-group">
                                            <div class="control-label"><label for="properties[discount]">Giảm giá</label></div>
                                            <div class="controls"><input class="m-wrap span12" name="properties[discount]" type="number" id="properties[discount]" min="0" required="true" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode <= 8'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             <!--    <div class="row-fluid">
                                    <div class="span12">
                                        <div class="control-group">
                                            <div class="control-label"><label for="properties[product_date]">Ngày sản xuất</label></div>
                                            <div class="controls"><input class="m-wrap span12" name="properties[product_date]" type="date" id="properties[product_date]" required="true">
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row-fluid">
                                    <div class="span12">
                                        <div class="control-group">
                                            <div class="control-label"><label for="properties[product_place]">Nơi sản xuất</label></div>
                                            <div class="controls"><input class="m-wrap span12" name="properties[product_place]" type="text" id="properties[product_place]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        

                        {{Form::hidden('image',Input::old('image'),array('id'=>'image'))}}
                    </div>
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
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="control-group">
                                <div class="controls offset4">{{ Form::submit('Đăng', array('class' => 'btn green')) }}</div>
                            </div>
                        </div>
                    </div>

                </div>



            </div>
        </div>
    </div>
</div>


{{ Form::close() }}
@stop