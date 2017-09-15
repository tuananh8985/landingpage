@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Menus</h1>

<p>{{ link_to_route('admin.menus.index', 'Return to all menus') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Title</th>
				<th>Link</th>
				<th>Parent</th>
				<th>Order</th>
				<th>Postion</th>
				<th>Cunit</th>
				<th>Description</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $menu->title }}}</td>
					<td>{{{ $menu->link }}}</td>
					<td>{{{ $menu->parent }}}</td>
					<td>{{{ $menu->order }}}</td>
					<td>{{{ $menu->postion }}}</td>
					<td>{{{ $menu->cunit }}}</td>
					<td>{{{ $menu->description }}}</td>
                    <td>{{ link_to_route('admin.menus.edit', 'Edit', array($menu->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.menus.destroy', $menu->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop