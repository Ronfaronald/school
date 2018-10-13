@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.schools.title')</h3>
    @can('school_create')
    <p>
        <a href="{{ route('admin.schools.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('school_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.schools.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.schools.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($schools) > 0 ? 'datatable' : '' }} @can('school_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('school_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.schools.fields.school')</th>
                        <th>@lang('quickadmin.schools.fields.type')</th>
                        <th>@lang('quickadmin.schools.fields.gender')</th>
                        <th>@lang('quickadmin.schools.fields.religion')</th>
                        <th>@lang('quickadmin.schools.fields.price')</th>
                        <th>@lang('quickadmin.schools.fields.academic')</th>
                        <th>@lang('quickadmin.schools.fields.sports')</th>
                        <th>@lang('quickadmin.schools.fields.culture')</th>
                        <th>@lang('quickadmin.schools.fields.location')</th>
                        <th>@lang('quickadmin.schools.fields.province')</th>
                        <th>@lang('quickadmin.schools.fields.city')</th>
                        <th>@lang('quickadmin.schools.fields.level')</th>
                        <th>@lang('quickadmin.schools.fields.district')</th>
                        <th>@lang('quickadmin.schools.fields.rural-urban')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($schools) > 0)
                        @foreach ($schools as $school)
                            <tr data-entry-id="{{ $school->id }}">
                                @can('school_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='school'>{{ $school->school }}</td>
                                <td field-key='type'>{{ $school->type }}</td>
                                <td field-key='gender'>{{ $school->gender }}</td>
                                <td field-key='religion'>{{ $school->religion }}</td>
                                <td field-key='price'>{{ $school->price }}</td>
                                <td field-key='academic'>{{ $school->academic }}</td>
                                <td field-key='sports'>{{ $school->sports }}</td>
                                <td field-key='culture'>{{ $school->culture }}</td>
                                <td field-key='location'>{{ $school->location_address }}</td>
                                <td field-key='province'>{{ $school->province }}</td>
                                <td field-key='city'>{{ $school->city }}</td>
                                <td field-key='level'>{{ $school->level }}</td>
                                <td field-key='district'>{{ $school->district }}</td>
                                <td field-key='rural_urban'>{{ $school->rural_urban }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('school_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.schools.restore', $school->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('school_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.schools.perma_del', $school->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('school_view')
                                    <a href="{{ route('admin.schools.show',[$school->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('school_edit')
                                    <a href="{{ route('admin.schools.edit',[$school->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('school_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.schools.destroy', $school->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="19">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('school_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.schools.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection