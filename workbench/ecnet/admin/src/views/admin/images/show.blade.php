@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Image</h1>

<p>{{ link_to_route('admin.images.index', 'Return to all images') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Title</th>
				<th>Description</th>
				<th>Link</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $image->title }}}</td>
					<td>{{{ $image->description }}}</td>
					<td>{{{ $image->link }}}</td>
                    <td>{{ link_to_route('admin.images.edit', 'Edit', array($image->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.images.destroy', $image->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop