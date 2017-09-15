@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Template</h1>

<p>{{ link_to_route('admin.templates.index', 'Return to all templates') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
				<th>Folder</th>
				<th>Actived</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $template->name }}}</td>
					<td>{{{ $template->folder }}}</td>
					<td>{{{ $template->actived }}}</td>
                    <td>{{ link_to_route('admin.templates.edit', 'Edit', array($template->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.templates.destroy', $template->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop