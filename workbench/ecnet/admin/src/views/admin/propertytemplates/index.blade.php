@extends('admin::layouts.scaffold')
@section('main')
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">Properties Management</h3>
            <ul class="breadcrumb">
                <li><i class="icon-home"></i>
                    <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="{{URL::to('admin/properties')}}">properties</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>Properties Management</li>
            </ul>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <h4>
                        <i class="icon-reorder"></i>
                        Properties
                    </h4>

                    <div class="tools">

                        <a class="collapse" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row-fluid" style="margin-bottom: 20px;">
                        <a class="btn green" href="{{URL::route('admin.propertytemplates.create')}}">Create new Property</a>

                    </div>
                    <div class="row-fluid">
                        <table class="table">
                            <thead>
                            <th>Name</th>
                            <th>Label</th>
                            <th>Group</th>
                            <th>Type</th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                <tr>
                                    <td>{{$property->name}}</td>
                                    <td>{{$property->label}}</td>
                                    <td>{{$property->group}}</td>
                                    <td>{{$property->type}}</td>
                                    <td class="span3">
                                        <a class="btn blue" href="{{URL::route('admin.propertytemplates.edit',$property->id)}}">Edit</a>
                                        <a class="btn red" href="{{URL::route('admin.propertytemplates.delete', $property->id)}}">Delete</a>

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
@stop