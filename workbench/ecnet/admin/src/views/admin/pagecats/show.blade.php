@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Pagecat</h1>

<p>{{ link_to_route('admin.pagecats.index', 'Return to all pagecats') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Title</th>
				<th>Slug</th>
				<th>Parent</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $pagecat->title }}}</td>
					<td>{{{ $pagecat->slug }}}</td>
					<td>{{{ $pagecat->parent }}}</td>
                    <td>{{ link_to_route('admin.pagecats.edit', 'Edit', array($pagecat->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.pagecats.destroy', $pagecat->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop