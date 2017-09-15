@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý Comments</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/comments')}}">comments</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách comments
            </li>
        </ul>
    </div>
</div>
@if(Session::has('message'))
<div class="row-fluid">
    <div class="span12">
        <div class="alert alert-success">
            <button data-dismiss="alert" class="close"></button>
            {{Session::get('message')}}
        </div>
    </div>
</div>
@endif
<p><a href="{{URL::route('admin.comments.create')}}" class="btn green" title="Add new Comments">Add new Comments <i class="icon-plus"></i></a></p>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Quản lý Comments
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
@if ($comments->count())
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
            @foreach ($comments as $comment)
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
            @endforeach
        </tbody>
    </table>
@else
    There are no comments
@endif
</div>
        </div>
    </div>
</div>

@stop