@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Slider</h1>

<p>{{ link_to_route('admin.sliders.index', 'Return to all sliders') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Title</th>
				<th>Description</th>
				<th>Body</th>
				<th>Image</th>
				<th>Order</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $slider->title }}}</td>
					<td>{{{ $slider->description }}}</td>
					<td>{{{ $slider->body }}}</td>
					<td>{{{ $slider->image }}}</td>
					<td>{{{ $slider->order }}}</td>
                    <td>{{ link_to_route('admin.sliders.edit', 'Edit', array($slider->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.sliders.destroy', $slider->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop