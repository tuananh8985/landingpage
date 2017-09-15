@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Menuspack</h1>

<p>{{ link_to_route('admin.menuspacks.index', 'Return to all menuspacks') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $menuspack->name }}}</td>
                    <td>{{ link_to_route('admin.menuspacks.edit', 'Edit', array($menuspack->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.menuspacks.destroy', $menuspack->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop