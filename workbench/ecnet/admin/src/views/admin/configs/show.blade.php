@extends('admin::layouts.scaffold')

@section('main')

<h1>Show Comment</h1>

<p>{{ link_to_route('admin.comments.index', 'Return to all comments') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>User</th>
				<th>Content</th>
				<th>Reply_to</th>
				<th>Post</th>
				<th>Time</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $comment->user }}}</td>
					<td>{{{ $comment->content }}}</td>
					<td>{{{ $comment->reply_to }}}</td>
					<td>{{{ $comment->post }}}</td>
					<td>{{{ $comment->time }}}</td>
                    <td>{{ link_to_route('admin.comments.edit', 'Edit', array($comment->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.comments.destroy', $comment->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop