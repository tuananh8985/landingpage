@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Postcatalog</h1>

<p>{{ link_to_route('admin.postcatalogs.index', 'Return to all postcatalogs') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Title</th>
				<th>Parent</th>
				<th>Order</th>
				<th>Description</th>
				<th>Keywords</th>
				<th>Status</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $postcatalog->title }}}</td>
					<td>{{{ $postcatalog->parent }}}</td>
					<td>{{{ $postcatalog->order }}}</td>
					<td>{{{ $postcatalog->description }}}</td>
					<td>{{{ $postcatalog->keywords }}}</td>
					<td>{{{ $postcatalog->status }}}</td>
                    <td>{{ link_to_route('admin.postcatalogs.edit', 'Edit', array($postcatalog->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.postcatalogs.destroy', $postcatalog->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop