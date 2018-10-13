@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.exam-papers.title')</h3>
    
    {!! Form::model($exam_paper, ['method' => 'PUT', 'route' => ['admin.exam_papers.update', $exam_paper->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('quickadmin.exam-papers.fields.title').'*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('catergory', trans('quickadmin.exam-papers.fields.catergory').'', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('catergory'))
                        <p class="help-block">
                            {{ $errors->first('catergory') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('catergory', 'maths', false, []) !!}
                            Maths
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('catergory', 'english', false, []) !!}
                            English
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('catergory', 'shona', false, []) !!}
                            Shona
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('catergory', 'geography ', false, []) !!}
                            Geography 
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date', trans('quickadmin.exam-papers.fields.date').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('date', old('date'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('file', trans('quickadmin.exam-papers.fields.file').'*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('file', old('file')) !!}
                    @if ($exam_paper->file)
                        <a href="{{ asset(env('UPLOAD_PATH').'/' . $exam_paper->file) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('file', ['class' => 'form-control']) !!}
                    {!! Form::hidden('file_max_size', 2) !!}
                    <p class="help-block"></p>
                    @if($errors->has('file'))
                        <p class="help-block">
                            {{ $errors->first('file') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>
            
@stop