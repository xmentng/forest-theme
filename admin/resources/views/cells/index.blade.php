@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.cells.title')</h3>
    @can('cell_create')
    <p>
        <a href="{{ route('cells.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($cells) > 0 ? 'datatable' : '' }} @can('cell_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('cell_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.cells.fields.name')</th>
                        <th>@lang('quickadmin.cells.fields.user')</th>
                        <th>@lang('quickadmin.cells.fields.church')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($cells) > 0)
                        @foreach ($cells as $cell)
                            <tr data-entry-id="{{ $cell->id }}">
                                @can('cell_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $cell->name }}</td>
                                <td>{{ $cell->user->name or '' }}</td>
                                <td>{{ $cell->church->display_name or '' }}</td>
                                <td>
                                    @can('cell_view')
                                    <a href="{{ route('cells.show',[$cell->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('cell_edit')
                                    <a href="{{ route('cells.edit',[$cell->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('cell_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['cells.destroy', $cell->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('cell_delete')
            window.route_mass_crud_entries_destroy = '{{ route('cells.mass_destroy') }}';
        @endcan

    </script>
@endsection