@extends('admin::layouts.scaffold')

@section('main')
<h3 class="page-title">Thêm người dùng mới</h3>
<div class="row-fuild">
    <div class="span12">
        <div class="portlet box green">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Nhập thông tin người dùng mới
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
                <!-- Hiển thị lỗi -->
                <div class="row-fluid">
                    <div class="span12">
                        @if ($errors->any())
                        <ul>
                            {{ implode('', $errors->all('
                            <li class="error">:message</li>
                            ')) }}
                        </ul>
                        @endif
                    </div>
                </div>
                <!-- Kết thúc hiển thị lỗi -->
                {{ Form::open(array('route' => 'admin.users.store')) }}
                <div class="row-fluid">
                    <div class="span3">
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('first_name', 'Họ đệm:') }}</div>
                            <div class="controls">
                                {{ Form::text('first_name',Input::old('first_name'),array('class'=>'m-wrap span12')) }}
                            </div>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('last_name', 'Tên:') }}</div>
                            <div class="controls">
                                {{ Form::text('last_name',Input::old('last_name'),array('class'=>'m-wrap span12')) }}
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <div class="control-label">{{ Form::label('email', 'Email:') }}</div>
                            <div class="controls">
                                {{ Form::text('email',Input::old('email'),array('class'=>'m-wrap span6')) }}
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <div class="control-label">{{Form::label('group','Nhóm')}}</div>
                                <div class="controls">
                                    {{Form::select('group',Group::arrayAll(),Input::old('group'),array('class'=>'m-wrap span12'))}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="control-group">
                                <div class="control-label">{{Form::label('password','Mật khẩu')}}</div>
                                <div class="controls">
                                    <input type="password" name="password" id="password" class="m-wrap span6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="control-group">
                                <div class="control-label">{{Form::label('password_confirmation','Xác nhận lại mật khẩu')}}</div>
                                <div class="controls">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="m-wrap span6">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="offset2">
                            <div class="control-group">
                                <div class="controls">
                                    {{Form::submit('Tạo',array('class'=>'btn green'))}}
                                    {{Form::reset('Tạo lại',array('class'=>'btn'))}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
    @stop