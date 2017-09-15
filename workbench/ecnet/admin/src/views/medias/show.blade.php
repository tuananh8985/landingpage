@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Media</h1>

<p>{{ link_to_route('admin.medias.index', 'Return to all medias') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
				<th>Cat</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $media->name }}}</td>
					<td>{{{ $media->cat }}}</td>
                    <td>{{ link_to_route('admin.medias.edit', 'Edit', array($media->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.medias.destroy', $media->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop