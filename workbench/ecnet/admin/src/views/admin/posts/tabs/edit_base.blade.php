<div class="row-fluid">
    <div class="span6">
        <div class="control-group">
            <div class="control-label">{{ Form::label('title', 'Tên bài viết:') }}</div>
            <div class="controls">
                {{ Form::text('title',$post->title,array('class'=>'m-wrap span10','id'=>'title')) }}
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
                    <div class="span6">
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('parent', 'Phân mục bài viết:') }}</div>
                            <div class="controls">
                                {{Form::select('parent',Page::array_list(0,0,1),$post->parent,array('m-wrap span12'))}}
                            </div>
                        </div>
                    </div>
                    <!-- Ngôn ngữ Form Input -->
                    <div class="control-group span6">
                        <div class="span12">
                            {{Form::label('lang','Ngôn ngữ:',['class'=>'control-label'])}}
                        </div>
                        <div class="span12">
                            {{Form::select('lang',['vi'=>'Tiếng việt','en'=>'English'],Input::old('lang'),['class'=>'form-control'])}}
                            {{error_for('lang',$errors)}}
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
                            <div class="controls">{{Form::checkbox('featured',1,($post->featured)?true:false)}}
                                Nổi bật
                            </div>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="control-group">
                            <div class="controls">{{Form::checkbox('published',1,($post->published)?true:false)}}
                                Đăng
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
            <div class="control-label">{{ Form::label('description', 'Mô tả ngắn cho bài viết:') }}</div>
            <div class="controls">
                {{ Form::textarea('description',$post->description,array('class'=>'m-wrap span12','rows'=>'4','style'=>'min-height:100px')) }}
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