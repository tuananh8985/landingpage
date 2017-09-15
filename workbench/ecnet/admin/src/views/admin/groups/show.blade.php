@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Group</h1>

<p>{{ link_to_route('admin.groups.index', 'Return to all groups') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
				<th>Permissions</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $group->name }}}</td>
					<td>{{{ $group->permissions }}}</td>
                    <td>{{ link_to_route('admin.groups.edit', 'Edit', array($group->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.groups.destroy', $group->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop