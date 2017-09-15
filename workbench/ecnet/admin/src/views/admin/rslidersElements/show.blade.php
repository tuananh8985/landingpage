@extends('admin::layouts.scaffold')

@section('main')

<h1>Show RslidersElement</h1>

<p>{{ link_to_route('admin.rslidersElements.index', 'Return to all rslidersElements') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Class</th>
				<th>X</th>
				<th>Y</th>
				<th>Speed</th>
				<th>Start</th>
				<th>Easing</th>
				<th>Order</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $rslidersElement->class }}}</td>
					<td>{{{ $rslidersElement->x }}}</td>
					<td>{{{ $rslidersElement->y }}}</td>
					<td>{{{ $rslidersElement->speed }}}</td>
					<td>{{{ $rslidersElement->start }}}</td>
					<td>{{{ $rslidersElement->easing }}}</td>
					<td>{{{ $rslidersElement->order }}}</td>
                    <td>{{ link_to_route('admin.rslidersElements.edit', 'Edit', array($rslidersElement->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.rslidersElements.destroy', $rslidersElement->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop