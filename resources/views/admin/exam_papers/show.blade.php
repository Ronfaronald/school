@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.exam-papers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.exam-papers.fields.title')</th>
                            <td field-key='title'>{{ $exam_paper->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.exam-papers.fields.catergory')</th>
                            <td field-key='catergory'>{{ $exam_paper->catergory }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.exam-papers.fields.date')</th>
                            <td field-key='date'>{{ $exam_paper->date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.exam-papers.fields.file')</th>
                            <td field-key='file'>@if($exam_paper->file)<a href="{{ asset(env('UPLOAD_PATH').'/' . $exam_paper->file) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.exam_papers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
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
