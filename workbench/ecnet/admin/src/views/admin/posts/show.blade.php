@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Post</h1>

<p>{{ link_to_route('admin.posts.index', 'Return to all posts') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Title</th>
				<th>Category</th>
				<th>Body</th>
				<th>Url_name</th>
				<th>Description</th>
				<th>Keywords</th>
				<th>Image</th>
				<th>Md5_name</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $post->title }}}</td>
					<td>{{{ $post->category }}}</td>
					<td>{{{ $post->body }}}</td>
					<td>{{{ $post->url_name }}}</td>
					<td>{{{ $post->description }}}</td>
					<td>{{{ $post->keywords }}}</td>
					<td>{{{ $post->image }}}</td>
					<td>{{{ $post->md5_name }}}</td>
                    <td>{{ link_to_route('admin.posts.edit', 'Edit', array($post->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.posts.destroy', $post->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop