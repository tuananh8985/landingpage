@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Tag</h1>

<p>{{ link_to_route('admin.tags.index', 'Return to all tags') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $tag->name }}}</td>
                    <td>{{ link_to_route('admin.tags.edit', 'Edit', array($tag->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.tags.destroy', $tag->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop