@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.good.management') . ' | ' . trans('labels.backend.access.good.edit'))
@section('before-styles')
    {{ Html::style('css/backend/plugin/cropper/cropper.css') }}
    {{ Html::style('css/backend/plugin/dropzone/dropzone.css') }}
    {{ Html::style('css/backend/plugin/dropzone/basic.css') }}
    {{ Html::style('css/backend/redactor/redactor.css') }}
@endsection
@section('after-styles')
    @include('backend.includes.dropzone_cropper_css')

@endsection
@section('page-header')
    <h1>
        {{ trans('labels.backend.access.good.management') }}
        <small>{{ trans('labels.backend.access.good.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($good, ['route' => ['admin.good.update', $good], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'PATCH', 'id' => 'edit-good', 'enctype' => "multipart/form-data"]) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.good.edit') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.goods.good-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('category_id', trans('validation.attributes.backend.access.good.category_id'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('collection_id', trans('validation.attributes.backend.access.good.collection_id'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {!! Form::select('collection_id', $collections, null, ['class' => 'form-control']) !!}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('zone_id', trans('validation.attributes.backend.access.good.zone_id'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {!! Form::select('zone_id', $zones, null, ['class' => 'form-control']) !!}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('code', trans('validation.attributes.backend.access.good.code'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('code', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('name', trans('validation.attributes.backend.access.good.name'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('dimensions', trans('validation.attributes.backend.access.good.dimensions'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('dimensions', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('tissue', trans('validation.attributes.backend.access.good.tissue'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('tissue', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('finish', trans('validation.attributes.backend.access.good.finish'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('finish', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('description', trans('validation.attributes.backend.access.good.description'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('description', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('photo', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::hidden('photo', null) }}
                    <div class="dropzone" id="add_photo"></div>
                    <div class="photo">
                        <div class="btn glyphicon glyphicon-remove dlt_photo"></div>
                    </div>
                </div><!--col-lg-10-->
            </div><!--form control-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.good.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    {{ Html::script('js/backend/redactor/redactor.js') }}
    {{ Html::script('js/backend/good/script.js') }}
    {{ Html::script('js/backend/plugin/dropzone/dropzone.js') }}
    {{ Html::script('js/backend/plugin/cropperjs/dist/cropper.js') }}
    @include('backend.includes.dropzone_cropper')
@endsection