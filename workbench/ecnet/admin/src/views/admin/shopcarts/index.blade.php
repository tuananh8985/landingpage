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
        <h3 class="page-title">Quản lý đơn hàng</h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>Danh sách đơn hàng</li>
        </ul>
    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="portlet box grey">
            <div class="portlet-title">
                <h4>
                    <i class="icon-reorder"></i>
                    Quản lý đơn hàng
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">
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
                @if ($carts->count())
                <table class="table table-striped table-bordered" id="posts">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Tạo ngày</th>
                            <th>Cập nhập ngày</th>
                            <th>Trạng thái</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                    $stt = 1;
                    ?>
                    <tbody>
                        @foreach ($carts as $cart)
                        <tr>
                            <td>{{$stt}}</td>
                            <td>
                                <a href="" target="_blank" title="">{{{ $cart->email }}}</a>
                            </td>

                         
                            
                            <td>
                                 {{$cart->phone_number}}
                            </td>
                           
                            <td> {{$cart->created_at}}</td>
                            <td>{{$cart->updated_at}}</td>
                            <td>
                                @if($cart->status == 0)
                                    Vừa nhận
                                @else
                                    Đã giao
                                @endif
                            </td>
                            <td>
                                {{ link_to_route('admin.detail_shopcart', 'Chi tiết', array($cart->id), array('class' => 'btn btn blue')) }}
                            </td>

                            <td>
                               {{ Form::open(array('method' => 'POST', 'route' => array('admin.cart.destroy', $cart->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                        {{ Form::close() }}
                            </td>
                        </tr>
                        <?php
                        $stt++;
                        ?>
                        @endforeach
                    </tbody>
                </table>
                @else
                    Chưa có đơn hàng nào.
                @endif
            </div>
        </div>
    </div>
</div>
@stop