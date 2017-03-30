@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.churches.title')</h3>
    @can('church_create')
    <p>
        <a href="{{ route('churches.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($churches) > 0 ? 'datatable' : '' }} @can('church_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('church_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.churches.fields.name')</th>
                        <th>@lang('quickadmin.churches.fields.zone')</th>
                        <th>@lang('quickadmin.churches.fields.country')</th>
                        <th>@lang('quickadmin.churches.fields.user')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($churches) > 0)
                        @foreach ($churches as $church)
                            <tr data-entry-id="{{ $church->id }}">
                                @can('church_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $church->name }}</td>
                                <td>{{ $church->zone }}</td>
                                <td>{{ $church->country }}</td>
                                <td>{{ $church->user->name or '' }}</td>
                                <td>
                                    @can('church_view')
                                    <a href="{{ route('churches.show',[$church->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('church_edit')
                                    <a href="{{ route('churches.edit',[$church->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('church_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['churches.destroy', $church->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('church_delete')
            window.route_mass_crud_entries_destroy = '{{ route('churches.mass_destroy') }}';
        @endcan

    </script>
@endsection