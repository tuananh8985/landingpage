@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Partner</h1>

<p>{{ link_to_route('admin.partners.index', 'Return to all partners') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
				<th>Logo</th>
				<th>Description</th>
				<th>Link</th>
				<th>Order</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $partner->name }}}</td>
					<td>{{{ $partner->logo }}}</td>
					<td>{{{ $partner->description }}}</td>
					<td>{{{ $partner->link }}}</td>
					<td>{{{ $partner->order }}}</td>
                    <td>{{ link_to_route('admin.partners.edit', 'Edit', array($partner->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.partners.destroy', $partner->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop