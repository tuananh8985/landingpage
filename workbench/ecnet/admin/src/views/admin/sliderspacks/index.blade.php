@extends('admin::layouts.scaffold')

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý các bộ Slider</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách bộ slider
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
<p><a style="display:none;" href="{{URL::route('admin.sliderspacks.create')}}" class="btn green" title="Add new Sliderspacks">Thêm bộ slider mới <i class="icon-plus"></i></a></p>
<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Danh sách các bộ slider hiện có
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row-fluid">
@if ($Sliderspacks->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
				<th>Description</th>
				<th>Image_width</th>
				<th>Image_height</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($Sliderspacks as $Sliderspack)
                <tr>
                    <td><a href="{{URL::to('admin/sliderspacks/'.$Sliderspack->id.'/sliders')}}">{{{ $Sliderspack->name }}} <i class="icon-folder-open"></i></a></td>
					<td>{{{ $Sliderspack->description }}}</td>
					<td>{{{ $Sliderspack->image_width }}}</td>
					<td>{{{ $Sliderspack->image_height }}}</td>
                    <td>{{ link_to_route('admin.sliderspacks.edit', 'Edit', array($Sliderspack->id), array('class' => 'btn btn blue')) }}</td>
                   <!--  <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.sliderspacks.destroy', $Sliderspack->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                    </td> -->
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    Bạn chưa tạo bộ slider nào cả
@endif
</div>
</div>
        </div>
    </div>
</div>

@stop