@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý Templates</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/templates')}}">templates</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách templates
            </li>
        </ul>
    </div>
</div>
<p><a href="{{URL::route('admin.templates.create')}}" class="btn green" title="Add new Templates">Add new Templates <i class="icon-plus"></i></a></p>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Quản lý Templates
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
@if ($templates->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
				<th>Folder</th>
				<th>Actived</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($templates as $template)
                <tr>
                    <td><a href="{{URL::route('admin.templates.show', $template->id)}}" title="{{{ $template->name }}}">{{{ $template->name }}}</a></td>
					<td>{{{ $template->folder }}}</td>
					<td>{{{ $template->actived }}}</td>
                    <td>{{ link_to_route('admin.templates.edit', 'Edit', array($template->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.templates.destroy', $template->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no templates
@endif
</div>
        </div>
    </div>
</div>

@stop