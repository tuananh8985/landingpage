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
                {{--Image Gallery--}}
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('meta_description', 'Description:') }}</div>
                            <div class="controls">
                                {{ Form::textarea('meta_description',$post->meta_description,array('class'=>"m-wrap span12",'rows'=>'3')) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
