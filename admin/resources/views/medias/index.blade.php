@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.medias.title')</h3>
    @can('media_create')
    <p>
        <a href="{{ route('medias.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($medias) > 0 ? 'datatable' : '' }} @can('media_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('media_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.medias.fields.filename')</th>
                        <th>@lang('quickadmin.medias.fields.mime')</th>
                        <th>@lang('quickadmin.medias.fields.original-filename')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($medias) > 0)
                        @foreach ($medias as $media)
                            <tr data-entry-id="{{ $media->id }}">
                                @can('media_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $media->filename }}</td>
                                <td>{{ $media->mime }}</td>
                                <td>{{ $media->original_filename }}</td>
                                <td>
                                    @can('media_view')
                                    <a href="{{ route('medias.show',[$media->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('media_edit')
                                    <a href="{{ route('medias.edit',[$media->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('media_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['medias.destroy', $media->id])) !!}
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
        @can('media_delete')
            window.route_mass_crud_entries_destroy = '{{ route('medias.mass_destroy') }}';
        @endcan

    </script>
@endsection