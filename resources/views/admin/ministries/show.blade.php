@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.ministry.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.ministry.fields.title')</th>
                            <td field-key='title'>{{ $ministry->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ministry.fields.image')</th>
                            <td field-key='image'>@if($ministry->image)<a href="{{ asset(env('UPLOAD_PATH').'/' . $ministry->image) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $ministry->image) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.ministry.fields.body')</th>
                            <td field-key='body'>{!! $ministry->body !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.ministries.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


