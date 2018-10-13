@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.schools.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.schools.fields.school')</th>
                            <td field-key='school'>{{ $school->school }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schools.fields.type')</th>
                            <td field-key='type'>{{ $school->type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schools.fields.gender')</th>
                            <td field-key='gender'>{{ $school->gender }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schools.fields.religion')</th>
                            <td field-key='religion'>{{ $school->religion }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schools.fields.price')</th>
                            <td field-key='price'>{{ $school->price }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schools.fields.academic')</th>
                            <td field-key='academic'>{{ $school->academic }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schools.fields.sports')</th>
                            <td field-key='sports'>{{ $school->sports }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schools.fields.culture')</th>
                            <td field-key='culture'>{{ $school->culture }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schools.fields.location')</th>
                            <td>
                    <strong>{{ $school->location_address }}</strong>
                    <div id='location-map' style='width: 600px;height: 300px;' class='map' data-key='location' data-latitude='{{$school->location_latitude}}' data-longitude='{{$school->location_longitude}}'></div>
                </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schools.fields.province')</th>
                            <td field-key='province'>{{ $school->province }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schools.fields.city')</th>
                            <td field-key='city'>{{ $school->city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schools.fields.level')</th>
                            <td field-key='level'>{{ $school->level }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schools.fields.district')</th>
                            <td field-key='district'>{{ $school->district }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.schools.fields.rural-urban')</th>
                            <td field-key='rural_urban'>{{ $school->rural_urban }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.schools.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent
   <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
 
    <script>
        function initialize() {
            const maps = document.getElementsByClassName("map");
            for (let i = 0; i < maps.length; i++) {
                const field = maps[i]
                const fieldKey = field.dataset.key;
                const latitude = parseFloat(field.dataset.latitude) || -33.8688;
                const longitude = parseFloat(field.dataset.longitude) || 151.2195;
        
                const map = new google.maps.Map(document.getElementById(fieldKey + '-map'), {
                    center: {lat: latitude, lng: longitude},
                    zoom: 13
                });
                const marker = new google.maps.Marker({
                    map: map,
                    position: {lat: latitude, lng: longitude},
                });
        
                marker.setVisible(true);
            }    
              
          }
    </script>
@stop
