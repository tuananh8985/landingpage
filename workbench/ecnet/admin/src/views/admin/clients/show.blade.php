@extends('admin::layouts.scaffold')

@section('main')

<h1>Show User</h1>

<p>{{ link_to_route('admin.users.index', 'Return to all users') }}</p>

<table class="table table-striped table-bordered">
    <tr>Name</tr>
    <tr>Email</tr>
    <tr>Access_level</tr>
    <tr>Username</tr>

    <tbody>
        <tr>
            <td>{{{ $user->name }}}</td>
            <td>{{{ $user->email }}}</td>
            <td>{{{ $user->access_level }}}</td>
            <td>{{{ $user->username }}}</td>
            <td>{{ link_to_route('admin.users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.users.destroy', $user->id))) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
        </tr>
    </tbody>
</table>

<table class="table">
    <tr>
        <th>A</th>
        <td>1</td>
        <td>3</td>
    </tr>

    <tr>
        <th>B</th>
        <td>2</td>
        <td>4</td>
    </tr>
</table>

@stop