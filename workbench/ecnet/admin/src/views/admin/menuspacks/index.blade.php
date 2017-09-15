@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý Menuspacks</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/menuspacks')}}">menuspacks</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách bộ menus
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
<p><a style="display:none;" href="{{URL::route('admin.menuspacks.create')}}" class="btn green" title="Add new Menuspacks">Add new Menuspacks <i class="icon-plus"></i></a></p>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Danh sách bộ menus
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
@if ($menuspacks->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($menuspacks as $menuspack)
                <tr>
                    <td>{{$menuspack->id}}</td>
                    <td><a href="{{URL::to('admin/menuspacks/'.$menuspack->id.'/menus')}}">{{{ $menuspack->name }}}</a></td>
                    <td style="display:none;">{{ link_to_route('admin.menuspacks.edit', 'Edit', array($menuspack->id), array('class' => 'btn btn blue')) }}</td>
                    <td style="display:none;">
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.menuspacks.destroy', $menuspack->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no menuspacks
@endif
</div>
        </div>
    </div>
</div>

@stop