@extends('admin::layouts.scaffold')

@section('main')

<h1>Create Domain</h1>

{{ Form::open(array('route' => 'admin.domains.store')) }}
    <div>
        <div>
            {{ Form::label('domain', 'Domain:') }}
            {{ Form::text('domain') }}
        </div>
         <div>
            {{ Form::label('domaincp', 'Domain CP:') }}
            {{ Form::text('domaincp') }}
        </div>

        <div>
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username') }}
        </div>

        <div>
            {{ Form::label('password', 'Password:') }}
            {{ Form::text('password') }}
        </div>

        <div>
            {{ Form::label('customer', 'Customer:') }}
            {{ Form::input('number', 'customer',0) }}
        </div>
        <div>
            {{ Form::label('active_at', 'Active_at:') }}
            <div class="datetimepicker_no_time input-append">
                <input data-format="yyyy-MM-dd" value="{{date("d-m-yy",time())}}" name="active_at" type="text">
                <span class="add-on"> <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                </span>
            </div>
        </div>

        <div>
            {{ Form::label('expired', 'Expired:') }}
            <div class="input-append">
                {{ Form::input('number', 'expired') }}
                <span class="add-on">Year</span>
            </div>
        </div>

        <div>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </div>
    </div>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


