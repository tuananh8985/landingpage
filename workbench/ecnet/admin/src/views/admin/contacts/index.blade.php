@extends('admin::layouts.scaffold')

@section('main')
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">Quản lý Liên hệ</h3>
            <ul class="breadcrumb">
                <li><i class="icon-home"></i>
                    <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="{{URL::to('admin/contacts')}}">contacts</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    Danh sách contacts
                </li>
            </ul>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box grey">
                <div class="portlet-title">
                    <h4><i class="icon-reorder"></i>
                        Quản lý Liên hệ
                    </h4>

                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body">
                    @if ($contacts->count())
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Created Date</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>
                                        @if(!$contact->readed)
                                            <i class="icon-envelope"></i>
                                        @endif
                                    </td>
                                    <td>{{{ $contact->name }}}</td>
                                    <td>
                                        @if($contact->readed == 0)
                                            <strong>{{{ $contact->title }}}</strong>
                                        @else
                                            {{{ $contact->title }}}

                                        @endif
                                    </td>
                                    <td>{{{ $contact->created_at }}}</td>
                                    <td>{{ link_to_route('admin.contacts.edit', 'View', array($contact->id), array('class' => 'btn btn blue')) }}</td>
                                    <td>
                                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.contacts.destroy', $contact->id))) }}
                                        {{ Form::submit('Delete', array('class' => 'btn btn red')) }}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        There are no contacts
                    @endif
                </div>
            </div>
        </div>
    </div>

@stop