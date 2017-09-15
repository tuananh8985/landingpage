@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý Groups</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/groups')}}">Nhóm người dùng</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách nhóm
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
<p><a href="{{URL::route('admin.groups.create')}}" class="btn green" title="Add new Groups">Thêm nhóm mới <i class="icon-plus"></i></a></p>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Quản lý Nhóm
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
@if ($groups->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
				<th>Permissions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($groups as $group)
                <tr>
                    <td>{{{$group->id}}}</td>
                    <td>{{{ $group->name }}}</td>
					<td>{{{ $group->permissions }}}</td>
                    <td>{{ link_to_route('admin.groups.edit', 'Edit', array($group->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.groups.destroy', $group->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no groups
@endif
</div>
        </div>
    </div>
</div>

@stop