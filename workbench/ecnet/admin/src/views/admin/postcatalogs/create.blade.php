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
        <h3 class="page-title">Tạo danh mục bài viết</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/postcatalogs')}}">Danh mục bài viết</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>Tạo mới</li>
        </ul>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box green">
            <div class="portlet-title">
                <h4>
                    <i class="icon-reorder"></i>
                    Tạo danh mục bài viết
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row-fluid">
                    @if ($errors->any())
                    <ul>
                        {{ implode('', $errors->all('
                        <li class="error">:message</li>
                        ')) }}
                    </ul>
                    @endif
                </div>
                {{ Form::model($category,array('route' => 'admin.postcatalogs.store','files'=>'true')) }}
                <div class="row-fluid" style="display:none;">
                    <di class="span12">
                        <label class="control-label" for="">
                            Ảnh đại diện
                        </label>
                        <div class="controls">
                            {{Form::file('image')}}
                        </div>
                    </di>
                </div>
                <div class="row-fluid">
                    <div class="span6">
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('title', 'Title:') }}</div>
                            <div class="controls">
                                {{ Form::text('title',Input::old('title'),array('class'=>'m-wrap span12','id'=>'title','required'=>'true')) }}
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        @if(Input::get('type') != 'post')
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('parent', 'Parent:') }}</div>
                            <div class="controls">
                                {{ Form::select('parent',Page::array_list(0,0,1),null,array('class'=>'m-wrap span6')) }}
                            </div>
                        </div>
                        @endif
                        @if(Input::get('type') != 'post')
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('subtype', 'Kiểu Danh mục:') }}</div>
                            <div class="controls">
                                {{ Form::select('subtype',[

                                'product'=>'Sản phẩm',
                                ],(Input::has('type'))?Input::get('type'):Input::old('subtype'),array('class'=>'m-wrap span6','id'=>'subtype')) }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                   <!--      <div class="control-group span8" style="display:none;">
                            <div class="control-label">{{ Form::label('lang', 'Ngôn ngữ:') }}</div>
                            <div class="controls">
                                {{ Form::select('lang',[
                                'vi'=>'Tiếng Việt',
                                'en'=>'English',
                                ],Input::old('lang'),array('class'=>'m-wrap span12','id'=>'lang')) }}
                            </div>
                        </div> -->
                      <!--   <div class="control-group span12">
                            <div class="control-label">{{ Form::label('order', 'Order:') }}</div>
                            <div class="controls">
                                {{ Form::text('order',(Input::old('order'))?Input::old('order'):0,array('class'=>'m-wrap span3')) }}

                            </div>

                        </div> -->
                        <span style="color:red;">
                        @if(Input::get('type') == 'post')
                          Lưu ý:Nếu thiết lập trang chủ =>Chọn order là 2. <br/>
                          @endif
                          @if(Input::get('type') != 'post')
                          Lưu ý:Tạo Danh mục con=>chọn parent là Sản Phẩm.
                          @endif
                      </span> <br/>
                  </div>
                  @if(Input::get('type') != 'post')
                  <div class="span12" style="    margin-left: 0px;">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('template', 'Template:') }}</div>
                        <div class="controls">
                            <!--                                 {{ Form::select('template',Config::get('admin::website.category_templates'),Input::old('template')) }} -->


                            <select id="template" name="template">
                                <option value="category_product">Danh mục sản phẩm</option>
                            </select>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <div class="row-fluid">
                @if(Input::get('type') != 'post')
                <div class="span12">
                    <div class="control-group">
                        <div class="control-label">
                            {{ Form::label('description', 'Mô tả ngắn cho Danh mục sản phẩm:') }}
                        </div>
                        <div class="controls">
                            {{ Form::textarea('description',Input::old('description'),array('class'=>'m-wrap span12','rows'=>'3','style'=>'height:100px;')) }}
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>
    </div>
</div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box blue" >
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
                                {{Form::text('meta_title',Input::old('meta_title'),array('class'=>'m-wrap span6'))}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid" style="display:none;">
                    <div class="span12">
                        <div class="control-group">
                            <div class="control-label">{{Form::label('meta_description','Meta Description')}}</div>
                            <div class="controls">
                                {{Form::textarea('meta_description',Input::old('meta_description'),array('class'=>'m-wrap span6','style'=>'height:100px;'))}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid" style="display:none;">
                    <div class="span12">
                        <div class="control-group">
                            <div class="control-label">{{Form::label('meta_keywords','Meta Keywords')}}</div>
                            <div class="controls">
                                {{Form::text('meta_keywords',Input::old('meta_keywords'),array('class'=>'m-wrap span6'))}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <div class="controls">{{ Form::submit('Đăng', array('class' => 'btn green')) }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
@stop 