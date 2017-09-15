@extends('admin::layouts.scaffold')
@section('head')

@stop
@section('footer')

@stop

@section('main')
<h3 class="page-title">
    Quản lý Layer: {{$rslider->id}}
    <small>(transiton: {{$rslider->transiton}} )</small>
</h3>
<div class="row-fluid">
    <div class="span6">
        <a class="btn green"  data-toggle="modal" role="button" href="#quickCreate" title="">Thêm phần tử</a>
    </div>
    <div class="span6">
        {{ link_to_route('admin.rsliders.index', 'Quay trở lại danh sách Layer',array(),array('class'=>'btn blue')) }}
    </div>
    <br>
</div>
<div class="row-fluid">
    <div class="span12">
        @if(Session::has('message'))
        <div class="alert alert-success">
            <button data-dismiss="alert" class="close"></button>
            {{Session::get('message')}}
                                </div>
        @endif
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        @if ($rslider->elements()->count())
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Class</th>
                    <th>X</th>
                    <th>Y</th>
                    <th>Speed</th>
                    <th>Start</th>
                    <th>Easing</th>
                    <th style="width:120px">Content</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($rslider->elements()->get() as $rsliderselement)
                <tr>
                    <td>{{{ $rsliderselement->class }}}</td>
                    <td>{{{ $rsliderselement->x }}}</td>
                    <td>{{{ $rsliderselement->y }}}</td>
                    <td>{{{ $rsliderselement->speed }}}</td>
                    <td>{{{ $rsliderselement->start }}}</td>
                    <td>{{{ $rsliderselement->easing }}}</td>
                    <td>{{{ $rsliderselement->content}}}</td>
                    <td>{{ link_to_route('admin.rsliderselements.edit', 'Edit', array($rsliderselement->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.rsliderselements.destroy', $rsliderselement->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
    Chưa có phần tử cho layer này!
    @endif
    </div>
</div>
<div id="quickCreate" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 id="myModalLabel2">Thêm phần tử</h3>
    </div>
    <div class="modal-body">
        {{ Form::open(array('route' => 'admin.rsliderselements.store')) }}
        {{Form::hidden('slider',$rslider->id)}}
            <div class="row-fluid">
                <div class="span2">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('order', 'Order:') }}</div>
                        <div class="controls">{{ Form::input('number', 'order',0,array('class'=>'m-wrap span12')) }}</div>
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('class', 'Class:') }}</div>
                        <div class="controls">{{ Form::text('class',"",array('class'=>'m-wrap span12')) }}</div>
                    </div>
                </div>
                <div class="span2">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('x', 'X:') }}</div>
                        <div class="controls">{{ Form::input('number', 'x',0,array('class'=>'m-wrap span12')) }}</div>
                    </div>
                </div>
                <div class="span2">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('y', 'Y:') }}</div>
                        <div class="controls">{{ Form::input('number', 'y',0,array('class'=>'m-wrap span12')) }}</div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span2">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('speed', 'Speed:') }}</div>
                        <div class="controls">{{ Form::input('number', 'speed',0,array('class'=>'m-wrap span12')) }}</div>
                    </div>
                </div>
                <div class="span2">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('start', 'Start:') }}</div>
                        <div class="controls">{{ Form::input('number', 'start',0,array('class'=>'m-wrap span12')) }}</div>
                    </div>
                </div>
                <div class="span8">
                    <div class="control-group">
                        <div class="control-label">{{ Form::label('easing', 'Easing:') }}</div>
                        <div class="controls">{{ Form::text('easing',"",array('class'=>'m-wrap span12')) }}</div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="control-label">
                        {{Form::label('content','Nội dung Phần tử')}}
                    </div>
                    <div class="constrols">
                    {{Form::textarea('content','',array('class'=>'m-wrap span12','rows'=>'5'))}}
                    </div>
                </div>
            </div>

        <div class="row-fluid">
    <div class="span12">
        <div class="control-group">
            <div class="controls">{{ Form::submit('Submit', array('class' => 'btn green')) }}</div>
        </div>
    </div>
</div>
        
    {{ Form::close() }}
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn">Cancel</button>
    </div>
</div>


@stop