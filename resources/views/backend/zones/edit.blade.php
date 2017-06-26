@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.zone.management') . ' | ' . trans('labels.backend.access.zone.edit'))
@section('before-styles')
    {{ Html::style('css/backend/plugin/cropper/cropper.css') }}
    {{ Html::style('css/backend/plugin/dropzone/dropzone.css') }}
    {{ Html::style('css/backend/plugin/dropzone/basic.css') }}
@endsection

@section('after-styles')
    @include('backend.includes.dropzone_cropper_css')

@endsection

@section('page-header')

    <h1>
        {{ trans('labels.backend.access.zone.management') }}
        <small>{{ trans('labels.backend.access.zone.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($zone, ['route' => ['admin.zone.update', $zone], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'PATCH', 'id' => 'edit-zone', 'enctype' => "multipart/form-data"]) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.zone.edit') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.zones.zone-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div class="form-group">
                {{ Form::label('title', trans('validation.attributes.backend.access.zone.title'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('title', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('photo', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::hidden('photo', null) }}
                    <div class="dropzone" id="add_photo"></div>
                    @if($zone->image)
                        <div class="photo active">
                            <div class="btn glyphicon glyphicon-remove dlt_photo"></div>
                            <img id="add_photo" src="/upload/images/{{ $zone->image  }}" alt="">
                        </div>
                    @else
                        <div class="photo">
                            <div class="btn glyphicon glyphicon-remove dlt_photo"></div>
                        </div>
                    @endif
                </div><!--col-lg-10-->
            </div><!--form control-->

        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.zone.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
    {{ Form::close() }}

@endsection

@section('after-scripts')
    {{ Html::script('js/backend/plugin/dropzone/dropzone.js') }}
    {{ Html::script('js/backend/plugin/cropperjs/dist/cropper.js') }}
    @include('backend.includes.dropzone_cropper')
@endsection