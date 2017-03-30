@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.testimonies.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.testimonies.fields.title')</th>
                            <td>{{ $testimony->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.testimonies.fields.body')</th>
                            <td>{!! $testimony->body !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.testimonies.fields.user')</th>
                            <td>{{ $testimony->user->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('testimonies.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop