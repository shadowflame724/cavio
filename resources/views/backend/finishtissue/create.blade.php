@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.finishtissue.management') . ' | ' . trans('labels.backend.access.finishtissue.create'))
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
        {{ trans('labels.backend.access.finishtissue.management') }}
        <small>{{ trans('labels.backend.access.finishtissue.create') }}
        </small>
    </h1>

@endsection

@section('content')
    {!! Form::open(['route' => 'admin.finish-tissue.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'enctype' => "multipart/form-data", 'id'=> 'collection-form']) !!}
    <div class="box">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.finishtissue.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.finishtissue.finishtissue-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#en" aria-controls="en" role="tab"
                                                          data-toggle="tab">EN</a>
                </li>
                <li role="presentation"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">RU</a></li>
                <li role="presentation"><a href="#it" aria-controls="it" role="tab" data-toggle="tab">IT</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="en">
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('type', trans('validation.attributes.backend.access.finishtissue.type'), ['class' => 'col-lg-2 control-label']) }}
                            <div class="col-lg-10">
                                {{ Form::select('type', [
                                "finish" =>
                                trans("validation.attributes.backend.access.finishtissue.type_finish"),
                                "tissue" =>
                                trans("validation.attributes.backend.access.finishtissue.type_tissue")
                                ],
                                ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('title', trans('validation.attributes.backend.access.finishtissue.title'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('title', null, [ 'class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div><!--form control-->
                </div>
                <div role="tabpanel" class="tab-pane fade" id="ru">
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('title_ru', trans('validation.attributes.backend.access.finishtissue.title'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('title_ru', null, [ 'class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div><!--form control-->
                </div>
                <div role="tabpanel" class="tab-pane fade" id="it">
                    <div class="box-body">
                        <div class="form-group">
                            {{ Form::label('title_it', trans('validation.attributes.backend.access.finishtissue.title'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('title_it', null, [ 'class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div><!--form control-->
                </div>
            </div>
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.finish-tissue.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.create'), ['id' => 'submit-all', 'class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {!! Form::close() !!}
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/plugin/dropzone/dropzone.js') }}
    {{ Html::script('js/backend/plugin/cropperjs/dist/cropper.js') }}
@endsection
