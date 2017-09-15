@extends('admin::layouts.scaffold')

@section('main')

<h1>Danh sách Domain</h1>


<p>{{ link_to_route('admin.domains.create', 'Add new domain') }}</p>

@if ($domains->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Domain</th>
				<th>Customer</th>
                <th>Ngày kích hoạt</th>
                <th>Thời hạn</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($domains as $domain)
                <tr>
                    <td><a href="{{URL::to('admin/domains/'.$domain->id)}}">{{{ $domain->domain }}}</a></td>
					<td>{{{ $domain->customer }}}</td>
                    <td>{{{ $domain->active_at }}}</td>
                    <td>{{{ $domain->expired }}} </td>
                    <td>{{ link_to_route('admin.domains.edit', 'Edit', array($domain->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.domains.destroy', $domain->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no domains
@endif

@stop