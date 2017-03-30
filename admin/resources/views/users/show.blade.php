@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.password')</th>
                            <td>---</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.role')</th>
                            <td>{{ $user->role->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.remember-token')</th>
                            <td>{{ $user->remember_token }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.sex')</th>
                            <td>{{ $user->sex }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#cells" aria-controls="cells" role="tab" data-toggle="tab">Cells</a></li>
<li role="presentation" class=""><a href="#testimonies" aria-controls="testimonies" role="tab" data-toggle="tab">Testimonies</a></li>
<li role="presentation" class=""><a href="#partnerships" aria-controls="partnerships" role="tab" data-toggle="tab">Partnerships</a></li>
<li role="presentation" class=""><a href="#churches" aria-controls="churches" role="tab" data-toggle="tab">Churches</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="cells">
<table class="table table-bordered table-striped {{ count($cells) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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
<div role="tabpanel" class="tab-pane " id="testimonies">
<table class="table table-bordered table-striped {{ count($testimonies) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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
<div role="tabpanel" class="tab-pane " id="partnerships">
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
<div role="tabpanel" class="tab-pane " id="churches">
<table class="table table-bordered table-striped {{ count($churches) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
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

            <p>&nbsp;</p>

            <a href="{{ route('users.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop