@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.partnerships.title')</h3>
    @can('partnership_create')
    <p>
        <a href="{{ route('partnerships.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($partnerships) > 0 ? 'datatable' : '' }} @can('partnership_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('partnership_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.partnerships.fields.type')</th>
                        <th>@lang('quickadmin.partnerships.fields.amount')</th>
                        <th>@lang('quickadmin.partnerships.fields.user')</th>
                        <th>@lang('quickadmin.partnerships.fields.church')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($partnerships) > 0)
                        @foreach ($partnerships as $partnership)
                            <tr data-entry-id="{{ $partnership->id }}">
                                @can('partnership_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $partnership->type }}</td>
                                <td>{{ $partnership->amount }}</td>
                                <td>{{ $partnership->user->name or '' }}</td>
                                <td>{{ $partnership->church->name or '' }}</td>
                                <td>
                                    @can('partnership_view')
                                    <a href="{{ route('partnerships.show',[$partnership->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('partnership_edit')
                                    <a href="{{ route('partnerships.edit',[$partnership->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('partnership_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['partnerships.destroy', $partnership->id])) !!}
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
        @can('partnership_delete')
            window.route_mass_crud_entries_destroy = '{{ route('partnerships.mass_destroy') }}';
        @endcan

    </script>
@endsection