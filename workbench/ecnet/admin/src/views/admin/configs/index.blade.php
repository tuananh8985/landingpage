@extends('admin::layouts.scaffold')
@section('head')
<link rel="stylesheet" href="/packages/ecnet/admin/assets/data-tables/DT_bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/packages/ecnet/admin/assets/uniform/css/uniform.default.css" />

@stop
@section('footer')
<script type="text/javascript" src="/packages/ecnet/admin/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="/packages/ecnet/admin/assets/data-tables/DT_bootstrap.js"></script>
<script>
    var edited_row;
    jQuery(document).ready(function($) {
      function restoreRow(oTable, nRow) {
        var aData = oTable.fnGetData(nRow);
        var jqTds = $('>td', nRow);

        for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
            oTable.fnUpdate(aData[i], nRow, i, false);
        }

        oTable.fnDraw();
    }

    function editRow(oTable, nRow) {
        var aData = oTable.fnGetData(nRow);
        var jqTds = $('>td', nRow);
        jqTds[0].innerHTML = '<input type="text" class="m-wrap span12" disabled value="' + aData[0] + '">';
        jqTds[1].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[1] + '">';
        jqTds[2].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[2] + '">';
        jqTds[3].innerHTML = '<input type="text" class="m-wrap span12" value="' + aData[3] + '">';

        jqTds[4].innerHTML = '<a class="edit small btn blue" href="">Save</a>';
        jqTds[5].innerHTML = '<a class="cancel small btn" href="">Cancel</a>';
    }

    function saveRow(oTable, nRow) {
        var jqInputs = $('input', nRow);
        oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
        oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
        oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
        oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
        oTable.fnUpdate('<a class="edit btn blue sm" href="" class="btn blue">Edit</a>', nRow, 4, false);
        oTable.fnUpdate('<a class="delete btn red sm" href="" class="btn red">Delete</a>', nRow, 5, false);
        oTable.fnDraw();
    }

    function cancelEditRow(oTable, nRow) {
        var jqInputs = $('input', nRow);
        oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
        oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
        oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
        oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
        oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
        oTable.fnDraw();
    }

    var oTable = $('#sample_editable_1').dataTable();
        jQuery('#sample_editable_1_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
        jQuery('#sample_editable_1_wrapper .dataTables_length select').addClass("m-wrap xsmall"); // modify table per page dropdown

        var nEditing = null;

        $('#sample_editable_1_new').click(function (e) {
            e.preventDefault();
            var aiNew = oTable.fnAddData(['', '', '', '',
                '<a class="edit" href="">Edit</a>', '<a class="cancel" data-mode="new" href="">Cancel</a>']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            editRow(oTable, nRow);
            nEditing = nRow;
        });

        $('#sample_editable_1 a.delete').live('click', function (e) {
            e.preventDefault();

            if (confirm("Are you sure to delete this row ?") == false) {
                return;
            }

            var nRow = $(this).parents('tr')[0];
            edited_row = $(nRow).children();
                config = {
                    "id":edited_row[0].textContent,
                    "group":edited_row[1].textContent,
                    "key":edited_row[2].textContent,
                    "value":edited_row[3].textContent,
                }
                $.post('{{URL::route('api.delete-config')}}', config, function() {
                });
            oTable.fnDeleteRow(nRow);
        });

        $('#sample_editable_1 a.cancel').live('click', function (e) {
            e.preventDefault();
            if ($(this).attr("data-mode") == "new") {
                var nRow = $(this).parents('tr')[0];
                oTable.fnDeleteRow(nRow);
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        $('#sample_editable_1 a.edit').live('click', function (e) {
            e.preventDefault();

            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                saveRow(oTable, nEditing);
                edited_row = $(nEditing).children();
                config = {
                    "id":edited_row[0].textContent,
                    "group":edited_row[1].textContent,
                    "key":edited_row[2].textContent,
                    "value":edited_row[3].textContent,
                }
                $.post('{{URL::route('api.update-config')}}', config, function() {
                });
                nEditing = null;
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });
});

</script>
@stop

@section('main')
<div class="row-fluid">
    <div class="span12">
        <h3 class="page-title">Thống số thiết lập
        @if($group)
        nhóm: {{$group}}
        @else
        Tổng hợp
        @endif
        </h3>
        <ul class="breadcrumb">
            <li> <i class="icon-home"></i>
                <a href="{{URL::to('admin')}}">Trang chủ</a> <i class="icon-angle-right"></i>
            </li>
            <li>
                <a href="{{URL::to('admin/configs')}}">configs</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                Danh sách Config
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
<div class="row-fluid" style="display:none;">
    <div class="span12">
        {{ Form::open(array('route' => 'admin.configs.store')) }}
        {{Form::text('group',($group)?$group:"",['class'=>'m-wrap','placeholder'=>'Tên nhóm'])}}
        {{Form::text('key',null,['class'=>'m-wrap','placeholder'=>'Key'])}}
        {{Form::text('value',null,['class'=>'m-wrap','placeholder'=>'Value'])}}
        {{Form::submit('Create',['class'=>'btn green'])}} 
        {{Form::close()}}

    </div>
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <h4> <i class="icon-reorder"></i>
                    Quản lý configs
                </h4>
                <div class="tools">
                    <a class="collapse" href="javascript:;"></a>
                </div>
            </div>
            <div class="portlet-body">

                @if ($configs->count())
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Group</th>
                            <th>Key</th>
                            <th>Value</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($configs as $config)
                        <tr class="">
                            <td>{{$config->id}}</td>
                            <td>{{$config->group}}</td>
                            <td>{{$config->key}}</td>
                            <td>{{$config->value}}</td>
                            <td><a class="edit btn blue sm" href="javascript:;">Edit</a></td>
                            <td><a class="delete btn red sm" href="javascript:;">Delete</a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                @else
                Chưa có thiết lập config
                @endif
            </div>
        </div>
    </div>
</div>

@stop