@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.schoolarships.title')</h3>
    
    {!! Form::model($schoolarship, ['method' => 'PUT', 'route' => ['admin.schoolarships.update', $schoolarship->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('quickadmin.schoolarships.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('link', trans('quickadmin.schoolarships.fields.link').'', ['class' => 'control-label']) !!}
                    {!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('link'))
                        <p class="help-block">
                            {{ $errors->first('link') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', trans('quickadmin.schoolarships.fields.email').'', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', trans('quickadmin.schoolarships.fields.description').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

