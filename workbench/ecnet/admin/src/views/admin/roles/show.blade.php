@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Role</h1>

<p>{{ link_to_route('admin.roles.index', 'Return to all roles') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $role->name }}}</td>
                    <td>{{ link_to_route('admin.roles.edit', 'Edit', array($role->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.roles.destroy', $role->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop