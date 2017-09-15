@extends('shop::admin.layouts.master')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">


            <!-- BEGIN PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        Quản lý danh mục mặt hàng
                    </h3>
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>
                            <a href="{{URL::route('admin')}}">
                                Trang chủ
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="{{URL::route('admin.shop.categories.index')}}">
                                Danh mục mặt hàng
                            </a>
                            <i class="fa fa-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">
                                Sửa danh mục: {{$category->title}}
                            </a>
                        </li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    @include('flash::message')
                </div>
            </div>
            {{portlet_open('Danh mục mặt hàng: '.$category->title,'blue')}}

            <div class="row">
                <div class="col-md-12">
                    {{Form::open(['route'=>['admin.shop.categories.update',$category->id],
                    'method'=>'PUT'])}}
                    <div class="form-body">
                        <h3 class="form-section">
                            Thông tin cơ bản
                        </h3>
                        <!-- Title Form Input -->
                        <div class="form-group col-md-6">
                            <div class="col-md-4">
                                {{Form::label('title','Title:',['class'=>'control-label'])}}
                            </div>
                            <div class="col-md-8">
                                {{Form::text('title',$category->title,['class'=>'form-control'])}}
                                {{error_for('title',$errors)}}
                            </div>
                        </div>
                        <!-- Thuộc danh mục Form Input -->
                        <div class="form-group col-md-6">
                            <div class="col-md-4">
                                {{Form::label('parent','Thuộc danh mục:',['class'=>'control-label'])}}
                            </div>
                            <div class="col-md-8">
                                {{Form::select('parent',\shop\Category::getSelectData($category->id),$category->parent,['class'=>'form-control'])}}
                                {{error_for('parent',$errors)}}
                            </div>
                        </div>
                        <!-- Mô tả Form Input -->
                        <div class="form-group col-md-12">
                            <div class="col-md-2">
                                {{Form::label('description','Mô tả:',['class'=>'control-label'])}}
                            </div>
                            <div class="col-md-10">
                                {{Form::textarea('description',$category->description,
                                ['class'=>'form-control','rows'=>5])}}
                                {{error_for('description',$errors)}}
                            </div>
                        </div>
                        <h3 class="form-section">
                            Thông tin hỗ trợ SEO
                        </h3>
                        <!-- meta_title Form Input -->
                        <div class="form-group col-md-12">
                            <div class="col-md-2">
                                {{Form::label('meta_title','meta_title:',['class'=>'control-label'])}}
                        	</div>
                        	<div class="col-md-10">
                                {{Form::text('meta_title',$category->meta_title,['class'=>'form-control'])}}
                                {{error_for('meta_title',$errors)}}
                            </div>
                        </div>
                        <!-- meta_description Form Input -->
                        <div class="form-group col-md-12">
                            <div class="col-md-2">
                                {{Form::label('meta_description','meta_description:',['class'=>'control-label'])}}
                        	</div>
                        	<div class="col-md-10">
                                {{Form::textarea('meta_description',$category->meta_description,
                                ['class'=>'form-control','rows'=>3,])}}
                                {{error_for('meta_description',$errors)}}
                            </div>
                        </div>
                        <!-- meta_keywords Form Input -->
                        <div class="form-group col-md-12">
                            <div class="col-md-2">
                                {{Form::label('meta_keywords','meta_keywords:',['class'=>'control-label'])}}
                        	</div>
                        	<div class="col-md-10">
                                {{Form::text('meta_keywords',$category->meta_keywords,['class'=>'form-control'])}}
                                {{error_for('meta_keywords',$errors)}}
                            </div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Robots:</label>
                            <div class="col-md-10">
                                {{Form::select('robots',[
                                    'INDEX,FOLLOW'=>'INDEX,FOLLOW',
                                    'INDEX,NOFOLLOW'=>'INDEX,NOFOLLOW',
                                    'NOINDEX,FOLLOW'=>'NOINDEX,FOLLOW',
                                    'NOINDEX,NOFOLLOW'=>'NOINDEX,NOFOLLOW',
                                ],$category->robots,['class'=>'form-control'])}}
                            </div>
                        </div>



                    </div>
                    <div class="form-actions fluid col-md-12">
                        {{Form::submit('Cập nhật',['class'=>'btn btn blue col-md-offset-4'])}}
                        <a class="btn btn-default" href="{{URL::route('admin.shop.categories.index')}}">Quay lại</a>
                    </div>
                    {{--End Form Body--}}

                    {{Form::close()}}


                </div>
            </div>

            {{portlet_close()}}

            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
    </div>


@stop