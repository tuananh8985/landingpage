@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Productcat</h1>

<p>{{ link_to_route('admin.productcats.index', 'Return to all productcats') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Title</th>
				<th>Parent</th>
				<th>Description</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $productcat->title }}}</td>
					<td>{{{ $productcat->parent }}}</td>
					<td>{{{ $productcat->description }}}</td>
                    <td>{{ link_to_route('admin.productcats.edit', 'Edit', array($productcat->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.productcats.destroy', $productcat->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop