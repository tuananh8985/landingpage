@extends('admin::layouts.scaffold')
@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Create Group</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/groups')}}">groups</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>Create Group</li>
        </ul>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box green">
            <div class="portlet-title">
                <h4>
                    <i class="icon-reorder"></i>
                    Create Group
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
                {{ Form::open(array('route' => 'admin.groups.store')) }}
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
                              <label class="control-label">Role</label>
                              <div class="controls">
                                 <select name="roles[]" data-placeholder="Cấp phát quyền" class="chosen span6" multiple="multiple" tabindex="6">
                                    <option value=""></option>
                                    @foreach(Role::orderBy('name')->get() as $role)
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
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

@if ($errors->any())
                <ul>
                    {{ implode('', $errors->all('
                    <li class="error">:message</li>
                    ')) }}
                </ul>
                @endif
            </div>
        </div>
    </div>
</div>
@stop