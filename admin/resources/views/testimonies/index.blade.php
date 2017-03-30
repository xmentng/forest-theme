@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.testimonies.title')</h3>
    @can('testimony_create')
    <p>
        <a href="{{ route('testimonies.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($testimonies) > 0 ? 'datatable' : '' }} @can('testimony_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('testimony_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.testimonies.fields.title')</th>
                        <th>@lang('quickadmin.testimonies.fields.body')</th>
                        <th>@lang('quickadmin.testimonies.fields.user')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($testimonies) > 0)
                        @foreach ($testimonies as $testimony)
                            <tr data-entry-id="{{ $testimony->id }}">
                                @can('testimony_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $testimony->title }}</td>
                                <td>{!! $testimony->body !!}</td>
                                <td>{{ $testimony->user->name or '' }}</td>
                                <td>
                                    @can('testimony_view')
                                    <a href="{{ route('testimonies.show',[$testimony->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('testimony_edit')
                                    <a href="{{ route('testimonies.edit',[$testimony->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('testimony_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['testimonies.destroy', $testimony->id])) !!}
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
        @can('testimony_delete')
            window.route_mass_crud_entries_destroy = '{{ route('testimonies.mass_destroy') }}';
        @endcan

    </script>
@endsection