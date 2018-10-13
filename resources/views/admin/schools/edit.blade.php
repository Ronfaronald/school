@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.schools.title')</h3>
    
    {!! Form::model($school, ['method' => 'PUT', 'route' => ['admin.schools.update', $school->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('school', trans('quickadmin.schools.fields.school').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('school', old('school'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('school'))
                        <p class="help-block">
                            {{ $errors->first('school') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('type', trans('quickadmin.schools.fields.type').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('type'))
                        <p class="help-block">
                            {{ $errors->first('type') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('type', 'private', false, ['required' => '']) !!}
                            Private
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('type', 'government', false, ['required' => '']) !!}
                            Government
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('type', 'mission', false, ['required' => '']) !!}
                            Mission
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('type', 'council', false, ['required' => '']) !!}
                            Council
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('gender', trans('quickadmin.schools.fields.gender').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('gender'))
                        <p class="help-block">
                            {{ $errors->first('gender') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('gender', 'mixed', false, ['required' => '']) !!}
                            mixed
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('gender', 'boys', false, ['required' => '']) !!}
                            boys
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('gender', 'girls', false, ['required' => '']) !!}
                            girls
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('religion', trans('quickadmin.schools.fields.religion').'', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('religion'))
                        <p class="help-block">
                            {{ $errors->first('religion') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('religion', 'roman catholic', false, []) !!}
                            Roman Catholic
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('religion', 'the salvation army', false, []) !!}
                            The Salvation Army
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('religion', 'anglican', false, []) !!}
                            Anglican
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('religion', 'methodist in zimbabwe', false, []) !!}
                            Methodist In Zimbabwe
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('religion', 'united methodist', false, []) !!}
                            United Methodist
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('religion', 'zcc', false, []) !!}
                            ZCC
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price', trans('quickadmin.schools.fields.price').'', ['class' => 'control-label']) !!}
                    {!! Form::number('price', old('price'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('academic', trans('quickadmin.schools.fields.academic').'', ['class' => 'control-label']) !!}
                    {!! Form::number('academic', old('academic'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('academic'))
                        <p class="help-block">
                            {{ $errors->first('academic') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sports', trans('quickadmin.schools.fields.sports').'', ['class' => 'control-label']) !!}
                    {!! Form::number('sports', old('sports'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('sports'))
                        <p class="help-block">
                            {{ $errors->first('sports') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('culture', trans('quickadmin.schools.fields.culture').'', ['class' => 'control-label']) !!}
                    {!! Form::number('culture', old('culture'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('culture'))
                        <p class="help-block">
                            {{ $errors->first('culture') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('location_address', trans('quickadmin.schools.fields.location').'', ['class' => 'control-label']) !!}
                    {!! Form::text('location_address', old('location_address'), ['class' => 'form-control map-input', 'id' => 'location-input']) !!}
                    {!! Form::hidden('location_latitude', $school->location_latitude , ['id' => 'location-latitude']) !!}
                    {!! Form::hidden('location_longitude', $school->location_longitude , ['id' => 'location-longitude']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('location'))
                        <p class="help-block">
                            {{ $errors->first('location') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div id="location-map-container" style="width:100%;height:200px; ">
                <div style="width: 100%; height: 100%" id="location-map"></div>
            </div>
            @if(!env('GOOGLE_MAPS_API_KEY'))
                <b>'GOOGLE_MAPS_API_KEY' is not set in the .env</b>
            @endif
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('province', trans('quickadmin.schools.fields.province').'', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('province'))
                        <p class="help-block">
                            {{ $errors->first('province') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('province', 'harare', false, []) !!}
                            Harare
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('province', 'bulawayo', false, []) !!}
                            Bulawayo
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('province', 'midlands', false, []) !!}
                             Midlands
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('province', 'mashonaland central', false, []) !!}
                            Mashonaland Central
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('province', 'mashonaland east', false, []) !!}
                            Mashonaland East
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('province', 'mashonaland west', false, []) !!}
                            Mashonaland West
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('province', 'masvingo', false, []) !!}
                            Masvingo
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('province', 'matabeleland north', false, []) !!}
                            Matabeleland North
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('province', 'matabeleland south', false, []) !!}
                            Matabeleland South
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('province', 'manicaland', false, []) !!}
                            Manicaland
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('city', trans('quickadmin.schools.fields.city').'', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('city'))
                        <p class="help-block">
                            {{ $errors->first('city') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('city', 'harare', false, []) !!}
                            Harare
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('city', 'bulawayo', false, []) !!}
                            Bulawayo
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('city', 'mutare', false, []) !!}
                            Mutare
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('city', 'gweru', false, []) !!}
                            Gweru
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('level', trans('quickadmin.schools.fields.level').'*', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('level'))
                        <p class="help-block">
                            {{ $errors->first('level') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('level', 'secondary', false, ['required' => '']) !!}
                            Secondary
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('level', 'primary', false, ['required' => '']) !!}
                            Primary
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('level', 'ecd', false, ['required' => '']) !!}
                            ECD
                        </label>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('district', trans('quickadmin.schools.fields.district').'', ['class' => 'control-label']) !!}
                    {!! Form::text('district', old('district'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('district'))
                        <p class="help-block">
                            {{ $errors->first('district') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rural_urban', trans('quickadmin.schools.fields.rural-urban').'', ['class' => 'control-label']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rural_urban'))
                        <p class="help-block">
                            {{ $errors->first('rural_urban') }}
                        </p>
                    @endif
                    <div>
                        <label>
                            {!! Form::radio('rural_urban', 'urban', false, []) !!}
                            Urban
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('rural_urban', 'rural', false, []) !!}
                            Rural
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('rural_urban', 'growth point', false, []) !!}
                            Growth Point
                        </label>
                    </div>
                    <div>
                        <label>
                            {!! Form::radio('rural_urban', 'farm', false, []) !!}
                            Farm
                        </label>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
   <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
   <script src="/adminlte/js/mapInput.js"></script>

@stop