@extends('admin::layouts.scaffold')

@section('main')
<h3 class="page-title">Quản lý người dùng</h3>

<div class="row-fuild">
    <div class="span12">
        <div class="portlet box green">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Quản lý người dùng
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
            @if(Session::has('message'))
            <div class="row-fluid">
                <div class="span12">
                    {{Session::get('message')}}
                </div>
            </div>
            @endif
                <div class="row-fluid">
                    <div class="span12">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Quyền truy cập</th>
                                    <th></th>
                                    <th>{{ link_to_route('admin.users.create', 'Thêm người dùng',array(),array('class'=>'btn green pull-right')) }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{{ $user->first_name }}} {{$user->last_name}}</td>
                                    <td>{{{ $user->email }}}</td>
                                    <td>
                                        <ul>
                                            <!-- in ra tat ca cac group -->
                                            @foreach($user->getGroups() as $group)
                                            <li>
                                                {{$group->name}}
                                    @endforeach
                                            </ul>

                                        </td>
                                        <td>
                                            {{ link_to_route('admin.users.edit', 'Edit', array($user->id), array('class' => 'btn blue')) }}
                                        </td>
                                        <td>
                                            {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.users.destroy', $user->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn red')) }}
                        {{ Form::close() }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quản lý nhóm -->

        @stop