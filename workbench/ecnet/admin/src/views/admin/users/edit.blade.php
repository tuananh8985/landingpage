@extends('admin::layouts.scaffold')

@section('main')

<h1>Edit User</h1>
{{ Form::model($user, array('method' => 'PATCH', 'route' => array('admin.users.update', $user->id))) }}
<div class="row-fluid">
    <div class="span3">
        <div class="control-group">
            <div class="control-label">{{ Form::label('first_name', 'Họ đệm:') }}</div>
            <div class="controls">
                {{ Form::text('first_name',$user->first_name,array('class'=>'m-wrap span12')) }}
            </div>
        </div>
    </div>
    <div class="span3">
        <div class="control-group">
            <div class="control-label">{{ Form::label('last_name', 'Tên:') }}</div>
            <div class="controls">
                {{ Form::text('last_name',$user->last_name,array('class'=>'m-wrap span12')) }}
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="control-group">
                <div class="control-label">{{ Form::label('email', 'Email:') }}</div>
                <div class="controls">
                    {{ Form::text('email',$user->email,array('class'=>'m-wrap span6')) }}
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <div class="control-group">
                <div class="control-label">{{Form::label('new_password','Mật khẩu cũ')}}</div>

                <div class="controls">
                    {{ Form::password('new_password',array('class'=>'m-wrap span12','required')) }}
                    @if (Session::has('error_pass'))
                    <span class="error" style="color:red;">{{ Session::get('error_pass') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <div class="control-group">
                <div class="control-label">{{Form::label('new_password_confirmation','Mật khẩu mới')}}</div>
                <div class="controls">
                    {{ Form::password('new_password_confirmation',array('class'=>'m-wrap span12','required')) }}

                </div>
            </div>
        </div>
    </div>
    {{Form::submit('Cập Nhật',array('class'=>'btn green'))}}
    {{ Form::close() }}

    @if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</div>')) }}
    </ul>
    @endif

    @stop