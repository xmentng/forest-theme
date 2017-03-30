@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.medias.title')</h3>
    
    {!! Form::model($media, ['method' => 'PUT', 'route' => ['medias.update', $media->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('filename', 'Filename*', ['class' => 'control-label']) !!}
                    {!! Form::text('filename', old('filename'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('filename'))
                        <p class="help-block">
                            {{ $errors->first('filename') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mime', 'Mime*', ['class' => 'control-label']) !!}
                    {!! Form::text('mime', old('mime'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mime'))
                        <p class="help-block">
                            {{ $errors->first('mime') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('original_filename', 'Original filename', ['class' => 'control-label']) !!}
                    {!! Form::text('original_filename', old('original_filename'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('original_filename'))
                        <p class="help-block">
                            {{ $errors->first('original_filename') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

