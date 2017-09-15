@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Page</h1>

<p>{{ link_to_route('admin.pages.index', 'Return to all pages') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Custom_head</th>
				<th>Custom_footer</th>
				<th>Title</th>
				<th>Body</th>
				<th>Description</th>
				<th>Keywords</th>
				<th>Category</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $page->custom_head }}}</td>
					<td>{{{ $page->custom_footer }}}</td>
					<td>{{{ $page->title }}}</td>
					<td>{{{ $page->body }}}</td>
					<td>{{{ $page->description }}}</td>
					<td>{{{ $page->keywords }}}</td>
					<td>{{{ $page->category }}}</td>
                    <td>{{ link_to_route('admin.pages.edit', 'Edit', array($page->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.pages.destroy', $page->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop