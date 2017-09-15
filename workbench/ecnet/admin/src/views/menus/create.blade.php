@extends('admin::layouts.scaffold')

@section('main')

<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Tạo menu mới</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/menuspacks/'.$pack->id.'/menus')}}">{{$pack->name}}</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Tạo menu mới
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box green">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Tạo Menu mới
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif
{{ Form::open(array('route' =>array( 'admin.menuspacks.menus.store','menuspacks'=>$pack->id))) }}
        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <div class="control-label">{{ Form::label('title', 'Title:') }}</div>
                    <div class="controls">
                        {{ Form::text('title',Input::old('title'),array('class'=>'m-wrap span12')) }}
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="control-group">
                    <div class="control-label">{{ Form::label('icon', 'Icon:') }}</div>
                    <div class="controls">
                    {{ Form::text('icon',Input::old('icon'),array('class'=>'m-wrap span12')) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <div class="control-label">{{ Form::label('link', 'Link:') }}</div>
                    <div class="controls">
                        {{ Form::text('link',Input::old('link'),array('class'=>'m-wrap span12')) }}
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="control-group">
                    <div class="control-label">{{ Form::label('parent', 'Menu gốc') }}</div>
                    <div class="controls">
                    {{ Form::select('parent',$parents,Input::old('parent'),array('class'=>'m-wrap span12')) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class="control-group">
                    <div class="control-label">{{ Form::label('order', 'Order:') }}</div>
                    <div class="controls">{{ Form::text('order',(Input::old('order'))?Input::old('order'):'0',array('class'=>'m-wrap span2')) }}</div>
                </div>
            </div>
            <div class="span6">
                <div class="control-group">
                    <div class="control-label">{{ Form::label('pack', 'Thuộc bộc menu:') }}</div>
                    <div class="controls">{{ Form::select('pack',Menuspack::list_array(),$pack->id,array('class'=>'m-wrap span12')) }}</div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
  <!--           <div class="span6">
                <div class="control-group">
                    <div class="control-label">{{ Form::label('cunit', 'Tương tác với') }}</div>
                    <div class="controls">{{ Form::select('cunit',Cunit::all_array()) }}</div>
                </div>
            </div> -->
            <div class="span12">
                <div class="control-group">
                    <div class="control-label">
                        {{ Form::label('description', 'Chú Giải') }}</div>
                        <div class="controls">
                    {{ Form::textarea('description',Input::old('description'),array('class'=>'m-wrap span12','rows'=>2)) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="offset3">
            {{ Form::submit('Tạo', array('class' => 'btn green')) }}
            <a href="{{URL::to('admin/menuspacks/'.$pack->id.'/menus')}}" title="Back" class="btn">Trở lại</a>
            </div>
        </div>
{{ Form::close() }}

</div>
        </div>
    </div>
</div>

@stop


