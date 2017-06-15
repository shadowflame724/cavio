@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.category.management') . ' | ' . trans('labels.backend.access.category.edit'))
@section('before-styles')
    {{ Html::style('css/backend/plugin/cropper/cropper.css') }}
    {{ Html::style('css/backend/plugin/dropzone/dropzone.css') }}
    {{ Html::style('css/backend/plugin/dropzone/basic.css') }}
@endsection

@section('page-header')
    <style>
        .sweet-alert {
            z-index: 999;
        }

        #add_photo {
            max-width: 650px;
        }

        .dropzone.dz-started .dz-message {
            display: block !important;
        }

        .dz-preview {
            display: none !important;
        }

        .logo, .dz-photo {
            position: relative;
            display: inline-block;
            visibility: hidden;
        }

        .dz-photo {
            margin: 30px 0 50px;
        }


        .dlt_photo.active {
            visibility: visible;
        }

        .dlt_photo {
            position: absolute;
            top: 0;
            right: 0;
            color: red;
            font-size: 25px;
        }

    </style>
    <h1>
        {{ trans('labels.backend.access.category.management') }}
        <small>{{ trans('labels.backend.access.category.edit') }}
        </small>
    </h1>
@endsection

@section('content')
    {{ Form::model($category, ['route' => ['admin.category.edit', $category], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'POST', 'id' => 'edit-category', 'enctype' => "multipart/form-data"]) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.category.edit') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.categories.category-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group">
                {{ Form::label('name',  trans('validation.attributes.backend.access.category.name'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus', 'placeholder' => 'Root']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('photo', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::hidden('photo', null) }}
                    <div class="dropzone" id="add_photo"></div>
                    @if($category->image)
                        <div class="photo active">
                            <div class="btn glyphicon glyphicon-remove dlt_photo"></div>
                            <img id="dlt_photo" src="/upload/images/{{ $category->image  }}" alt="">
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
                {{ link_to_route('admin.category.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.edit'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
    </div>
    {{ Form::close() }}

@endsection

@section('after-scripts')
    {{ Html::script('js/backend/plugin/dropzone/dropzone.js') }}
    {{ Html::script('js/backend/plugin/cropperjs/dist/cropper.js') }}
    @include('backend.includes.dropzone_cropper')
@endsection
