@extends('admin::layouts.scaffold')

@section('main')

<h1><small>Domain</small> {{$domain->domain}} {{ link_to_route('admin.domains.edit', 'Edit', array($domain->id), array('class' => 'btn btn-info')) }}</h1>
<div class="row">
    <div class="span6 offset1">
        <span class="label label-info">Ngày kích hoạt:</span> {{date('d/m/Y',strtotime($domain->active_at))}}
<br/>
        <span class="label label-important">Thời hạn:</span> {{$domain->expired}} năm
    </div>
</div>



<h3>Thông tin domain</h3>
<table class="table">
    <tbody>
        <tr>
            <td><strong><i class="icon-arrow-right"></i> Control Panel:</strong></td>
            <td><a  href="{{$domain->domaincp}}" title="">{{$domain->domaincp}}</a></td>
        </tr>
        <tr>
            <td><strong><i class="icon-arrow-right"></i> Username:</strong></td>
            <td>{{$domain->username}}</td>
        </tr>
        <tr>
            <td><strong><i class="icon-arrow-right"></i>Password:</strong></td>
            <td>{{$domain->password}}</td>
        </tr>
    </tbody>
</table>



@stop