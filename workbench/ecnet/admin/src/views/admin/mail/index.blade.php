@extends('admin::layouts.scaffold')
@section('head')
<link rel="stylesheet" href="{{URL::to('/')}}/packages/ecnet/admin/assets/data-tables/DT_bootstrap.css" />
<style>

</style>
@stop
@section('footer')
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="{{URL::to('/')}}/packages/ecnet/admin/assets/data-tables/DT_bootstrap.js"></script>
@stop

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Quản lý nội dung</h3>
        <ul class="breadcrumb">
            <li><i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/contents')}}">Nội dung</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách nội dung
            </li>
        </ul>
    </div>
</div>
<div class="row-fluid">
    <di class="span12 pull-right">
        <a class="btn green" href="{{URL::route('admin.mail.create')}}">Tạo mới</a>
    </di>
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4><i class="icon-reorder"></i>
                    Danh sách nội dung
                </h4>

                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">

                <table class="table" id="content-table">
                    <thead>
                        <tr>
                            <th>
                                Tên
                            </th>
                            <th>Email</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($data as $content)
                        <tr>
                            <td>{{$content['name']}}</td>
                            <td>{{$content['email']}}</td>
                            <td class="span1"><a class="btn blue" href="{{URL::route('admin.mail.edit',$content->id)}}">Sửa</a></td>
                            <td class="span1">
                             <a class="btn red" onclick = "return xacnhanxoa('Ban co chac chan xoa khong')" href="{{URL::route('admin.mail.delete',$content->id)}}"> Delete</a>
                         </td>
                     </tr>
                     @endforeach
                 </tbody>
             </table>
             {{ Form::close() }}

             @if ($errors->any())
             <ul>
                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
            </ul>
            @endif
        </div>
    </div>
</div>
</div>
@stop

