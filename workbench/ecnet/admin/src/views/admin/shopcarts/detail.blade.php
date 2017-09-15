@extends('admin::layouts.scaffold')
@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Chi tiết đơn hàng</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/properties')}}">Đơn hàng</a>
                <i class="icon-angle-right"></i>
            </li>
        </ul>
    </div>
</div>
{{ Form::model($cart, array('method' => 'post', 'route' => array('admin.cart.update'))) }}
{{ Form::hidden('id',$cart->id) }}
<div class="row-fluid">
  <!--   <div class="span3">
        <div class="control-group">
            <div class="control-label">{{ Form::label('first_name', 'Họ đệm:') }}</div>
            <div class="controls">
                {{ Form::text('first_name',$cart->first_name, array('class'=>'m-wrap span12', 'required' => 'required')) }}
            </div>
        </div>
    </div> -->
    <div class="span3">
        <div class="control-group">
            <div class="control-label">{{ Form::label('last_name', 'Họ và Tên:') }}</div>
            <div class="controls">
                {{ Form::text('last_name',$cart->last_name, array('class'=>'m-wrap span12', 'required' => 'required')) }}
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="control-group">
            <div class="control-label">{{ Form::label('email', 'Email:') }}</div>
            <div class="controls">
                {{ Form::text('email',$cart->email, array('class'=>'m-wrap span6','required' => 'required')) }}
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="control-group">
            <div class="control-label">{{ Form::label('address', 'Địa chỉ:') }}</div>
            <div class="controls">
                {{ Form::text('address',$cart->address, array('class'=>'m-wrap span6', 'required' => 'required')) }}
            </div>
        </div>
    </div>
</div>
<!-- <div class="row-fluid">
    <div class="span12">
        <div class="control-group">
            <div class="control-label">{{ Form::label('email', 'Thàng phố:') }}</div>
            <div class="controls">
                {{ Form::text('city',$cart->city, array('class'=>'m-wrap span6', 'required' => 'required')) }}
            </div>
        </div>
    </div>
</div> -->
<div class="row-fluid">
    <div class="span12">
        <div class="control-group">
            <div class="control-label">{{ Form::label('email', 'Số điện thoại:') }}</div>
            <div class="controls">
                {{ Form::text('phone_number',$cart->phone_number, array('class'=>'m-wrap span6', 'required' => 'required')) }}
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <div class="control-group">
            <div class="control-label">{{ Form::label('email', 'Trang thái:') }}</div>
            <div class="controls">
                <select class="m-wrap span6" name="status">
                    <option value="0" @if($cart->status == 0) selected @endif>Vừa nhận</option>
                    <option value="1" @if($cart->status == 1) selected @endif>Đã giao</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">
        <table class="table table-striped table-bordered" id="posts">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Ngày tạo</th>
                    <th>Thành tiền</th>
                    
                </tr>
            </thead>
            <?php
            $stt = 1;
            ?>


            <tbody>
                @foreach($cart->detail() as $item)
                <tr>
                    <td>{{$stt}}</td>
                    <td>{{$item->product()->title}}</td>
                    <td><img width="100" height="100" src="/{{$item->product()->image}}"></td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->price*$item->quantity}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan=6>Tổng tiền : {{number_format($cart['total'])}} VNĐ</td>
                    <td ></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="controls offset4">
    {{ Form::submit('Update', array('class' => 'btn btn blue')) }}
    </div>
{{ Form::close() }}

@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</div>')) }}
</ul>
@endif
@stop