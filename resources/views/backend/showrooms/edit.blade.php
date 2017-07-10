@extends ('backend.layouts.app')
@section('after-styles')
    <style>
        #map {
            height: 500px;
        }
    </style>
@endsection

@section ('title', trans('labels.backend.access.showroom.management') . ' | ' . trans('labels.backend.access.showroom.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.showroom.management') }}
        <small>{{ trans('labels.backend.access.showroom.edit') }}</small>
    </h1>
@endsection

@section('content')

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.showroom.edit') }}</h3>
            <div class="box-tools pull-right">
                @include('backend.showrooms.showrooms-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                <div class="col-lg-12">
                    <div id="map" height="460px" width="100%"></div>
                </div>
            </div><!--form control-->
            {{ Form::model($showroom, ['route' => ['admin.showroom.update', $showroom], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}


            <div class="form-group">
                {{ Form::label('country', trans('validation.attributes.backend.access.showroom.country'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::text('country', null, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('city', trans('validation.attributes.backend.access.showroom.city'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::text('city', null, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('name', trans('validation.attributes.backend.access.showroom.name'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('address', trans('validation.attributes.backend.access.showroom.address'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::text('address', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('phone', trans('validation.attributes.backend.access.showroom.phone'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::number('phone', null, ['class' => 'form-control', 'maxlength' => '20', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('phone2', trans('validation.attributes.backend.access.showroom.phone2'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::number('phone2', null, ['class' => 'form-control', 'maxlength' => '20', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('fax', trans('validation.attributes.backend.access.showroom.fax'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::number('fax', null, ['class' => 'form-control', 'maxlength' => '20', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('email', trans('validation.attributes.backend.access.showroom.email'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::email('email', null, ['class' => 'form-control', 'maxlength' => '35', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            {{ Form::hidden('lat', null, ['class' => 'form-control', 'placeholder' => 'lat', 'id' => 'lat']) }}
            {{ Form::hidden('lng', null, ['class' => 'form-control', 'placeholder' => 'lng', 'id' => 'lng']) }}

        </div>
    </div><!-- /.box-body -->
    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.showroom.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
    {{ Form::close() }}


@endsection

@section('after-scripts')
    <script>
        var map,
            marker,
            markerCoords,
            coords = {lat: 40.713955826286046, lng: -3.515625},
            lat = $('#lat').val(),
            lng = $('#lng').val();
        if (lat != '' && lng != '') {
            markerCoords = {lat: Number(lat), lng: Number(lng)};
            coords = markerCoords;
        }

        function initMap() {

            map = new google.maps.Map(document.getElementById('map'), {
                center: coords,
                zoom: 3
            });

            marker = new google.maps.Marker({
                position: markerCoords,
                map: map
            });

            google.maps.event.addListener(map, 'click', function (event) {
                console.log(event);
                marker.setPosition(event.latLng);
                $('#lat').val(event.latLng.lat());
                $('#lng').val(event.latLng.lng());
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_98DZxvQpo3chg09J6Kx_oDpjehC7d7I&callback=initMap"
            async defer></script>
@endsection