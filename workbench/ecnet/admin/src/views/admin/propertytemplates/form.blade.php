<div class="row-fluid">
    <div class="span12">
        <div class="control-group">
            <div class="control-label">{{ Form::label('name', 'Name:') }}</div>
            <div class="controls">{{ Form::text('name',Input::old('name'),array('class'=>'m-wrap span6 ')) }}</div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="control-group">
            <div class="control-label">{{ Form::label('label', 'Label:') }}</div>
            <div class="controls">{{ Form::text('label',Input::old('label'),array('class'=>'m-wrap span6 ')) }}
            </div>
        </div>
    </div>
</div>

<!-- Group Field -->

<div class="row-fluid">
    <div class="span12">
        <div class="control-group">
            <div class="control-label">{{ Form::label('group', 'Group:') }}</div>
            <div class="controls">{{ Form::select('group',Page::$subType,Input::old('group'),array('class'=>'m-wrap span6 ')) }}
            </div>
        </div>
    </div>
</div>
<!-- End Group Field -->

<!-- Type Field -->

<div class="row-fluid">
    <div class="span12">
        <div class="control-group">
            <div class="control-label">{{ Form::label('type', 'Type:') }}</div>
            <div class="controls">{{ Form::select('type',[
                                        'string'=>'Chuỗi',
                                        'array'=>'Mảng',
                                   ],Input::old('type'),array('class'=>'m-wrap span6 ')) }}
            </div>
        </div>
    </div>
</div>
<!-- End Type Field -->
<!-- Value Field -->

<div class="row-fluid">
    <div class="span12">
        <div class="control-group">
            <div class="control-label">{{ Form::label('value', 'Value:') }}</div>
            <div class="controls">{{ Form::textarea('value',Input::old('value'),array('class'=>'m-wrap span6 ','style'=>'height:300px;')) }}
            </div>
        </div>
    </div>
</div>
<!-- End Value Field -->



