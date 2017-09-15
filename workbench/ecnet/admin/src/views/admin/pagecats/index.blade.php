@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý Pagecats</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/pagecats')}}">pagecats</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách pagecats
            </li>
        </ul>
    </div>
</div>
<p><a href="{{URL::route('admin.pagecats.create')}}" class="btn green" title="Add new Pagecats">Add new Pagecats <i class="icon-plus"></i></a></p>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Quản lý Pagecats
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
@if ($pagecats->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Title</th>
				<th>Slug</th>
				<th>Parent</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($pagecats as $pagecat)
                <tr>
                    <td>{{{ $pagecat->title }}}</td>
					<td>{{{ $pagecat->slug }}}</td>
					<td>{{{ $pagecat->parent }}}</td>
                    <td>{{ link_to_route('admin.pagecats.edit', 'Edit', array($pagecat->id), array('class' => 'btn btn blue')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.pagecats.destroy', $pagecat->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no pagecats
@endif
</div>
        </div>
    </div>
</div>

@stop