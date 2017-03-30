@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.medias.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.medias.fields.filename')</th>
                            <td>{{ $media->filename }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.medias.fields.mime')</th>
                            <td>{{ $media->mime }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.medias.fields.original-filename')</th>
                            <td>{{ $media->original_filename }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('medias.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop