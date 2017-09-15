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
                                    <th>Số Điện Thoại</th>
                                    <th>Địa Chỉ</th>
                                    <th>Xem</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }} </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->address }}</td>

                                    <td>
                                        {{ link_to_route('admin.clients.show', 'Chi Tiết', array($user->id), array('class' => 'btn blue')) }}
                                    </td>
                                    <td>
                                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.users.destroy', $user->id))) }}
                                        {{ Form::submit('Xóa', array('class' => 'btn red')) }}
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