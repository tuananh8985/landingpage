@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Edit Menus</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>

            <li>
                <a href="{{URL::route('admin.menuspacks.show',$pack->id)}}">{{$pack->name}}</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Edit: {{$menus->title}}
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box green">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Edit menu: {{$menus->title}}
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
{{ Form::model($menus, array('method' => 'PATCH', 'route' => array('admin.menuspacks.menus.update','menuspacks'=>$pack->id,'menus'=>$menus->id),'class'=>'form')) }}
        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <div class="control-label">{{ Form::label('title', 'Title:') }}</div>
                    <div class="controls">
                        {{ Form::text('title',$menus->title,array('class'=>'m-wrap span12')) }}
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="control-group">
                    <div class="control-label">{{ Form::label('icon', 'Icon:') }}</div>
                    <div class="controls">
                    {{ Form::text('icon',$menus->icon,array('class'=>'m-wrap span12')) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <div class="control-label">{{ Form::label('link', 'Link:') }}</div>
                    <div class="controls">
                        {{ Form::text('link',$menus->link,array('class'=>'m-wrap span12')) }}
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="control-group">
                    <div class="control-label">{{ Form::label('parent', 'Parent:') }}</div>
                    <div class="controls">
                    {{ Form::select('parent',$parents,$menus->parent,array('class'=>'m-wrap span12')) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <div class="control-label">{{ Form::label('order', 'Order:') }}</div>
                    <div class="controls">{{ Form::text('order',$menus->order,array('class'=>'m-wrap span2')) }}</div>
                </div>
            </div>
            <div class="span6">
                <div class="control-group">
                    <div class="control-label">{{ Form::label('pack', 'Thuộc bộ Menu:') }}</div>
                    <div class="controls">{{ Form::select('pack',Menuspack::list_array(),$menus->pack,array('class'=>'m-wrap span12')) }}</div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="control-group">
                    <div class="control-label">
                        {{ Form::label('description', 'Chú Giải') }}</div>
                        <div class="controls">
                    {{ Form::textarea('description',$menus->description,array('class'=>'m-wrap span12','row'=>'2')) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="offset3">
            {{ Form::submit('Edit', array('class' => 'btn red')) }}
            <a href="{{URL::to('admin/menus')}}" title="Back" class="btn green">Back</a>
            </div>
        </div>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif
</div>
        </div>
    </div>
</div>

@stop