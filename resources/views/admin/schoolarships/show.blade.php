@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.schoolarships.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.schoolarships.fields.title')</th>
                            <td field-key='title'>{{ $schoolarship->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schoolarships.fields.link')</th>
                            <td field-key='link'>{{ $schoolarship->link }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schoolarships.fields.email')</th>
                            <td field-key='email'>{{ $schoolarship->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schoolarships.fields.description')</th>
                            <td field-key='description'>{!! $schoolarship->description !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.schoolarships.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


