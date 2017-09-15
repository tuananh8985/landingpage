@extends('admin::layouts.scaffold')

@section('main')

<h1>Edit Cunit</h1>
{{ Form::model($cunit, array('method' => 'PATCH', 'route' => array('admin.cunits.update', $cunit->id))) }}
    <ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('access_level', 'Access_level:') }}
            {{ Form::text('access_level') }}
        </li>

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('admin.cunits.show', 'Cancel', $cunit->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop