@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Sliderspack</h1>

<p>{{ link_to_route('admin.sliderspacks.index', 'Return to all Sliderspacks') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
				<th>Description</th>
				<th>Image_width</th>
				<th>Image_height</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $Sliderspack->name }}}</td>
					<td>{{{ $Sliderspack->description }}}</td>
					<td>{{{ $Sliderspack->image_width }}}</td>
					<td>{{{ $Sliderspack->image_height }}}</td>
                    <td>{{ link_to_route('admin.sliderspacks.edit', 'Edit', array($Sliderspack->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.sliderspacks.destroy', $Sliderspack->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop