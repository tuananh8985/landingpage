@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Cunit</h1>

<p>{{ link_to_route('admin.cunits.index', 'Return to all cunits') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
				<th>Title</th>
				<th>Access_level</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $cunit->name }}}</td>
					<td>{{{ $cunit->title }}}</td>
					<td>{{{ $cunit->access_level }}}</td>
                    <td>{{ link_to_route('admin.cunits.edit', 'Edit', array($cunit->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.cunits.destroy', $cunit->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop