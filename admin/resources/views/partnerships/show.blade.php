@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.partnerships.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.partnerships.fields.type')</th>
                            <td>{{ $partnership->type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.partnerships.fields.amount')</th>
                            <td>{{ $partnership->amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.partnerships.fields.user')</th>
                            <td>{{ $partnership->user->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.partnerships.fields.church')</th>
                            <td>{{ $partnership->church->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('partnerships.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop