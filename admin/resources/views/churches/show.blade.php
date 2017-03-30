@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.churches.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.churches.fields.name')</th>
                            <td>{{ $church->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.churches.fields.zone')</th>
                            <td>{{ $church->zone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.churches.fields.country')</th>
                            <td>{{ $church->country }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.churches.fields.user')</th>
                            <td>{{ $church->user->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#partnerships" aria-controls="partnerships" role="tab" data-toggle="tab">Partnerships</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="partnerships">
<table class="table table-bordered table-striped {{ count($partnerships) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

            <p>&nbsp;</p>

            <a href="{{ route('churches.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop