@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.collection.management') . ' | ' . trans('labels.backend.access.collection.edit'))
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
        {{ trans('labels.backend.access.collection.management') }}
        <small>{{ trans('labels.backend.access.collection.create') }}
        </small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.collection.create') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.collection.collection-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
        {!! Form::open(['route' => 'admin.collection.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'enctype' => "multipart/form-data", 'id'=> 'collection-form']) !!}
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#en" aria-controls="en" role="tab" data-toggle="tab">EN</a>
            </li>
            <li role="presentation"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">RU</a></li>
            <li role="presentation"><a href="#it" aria-controls="it" role="tab" data-toggle="tab">IT</a></li>
        </ul>
        <div class="box-body">
            <div class="form-group">
                {{ Form::label('banner', trans('validation.attributes.backend.access.collection.banner'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::checkbox('banner', null) }}
                </div><!--col-lg-10-->
            </div><!--form control-->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="en">
                    <div class="form-group">
                        {{ Form::label('title', trans('validation.attributes.backend.access.collection.title'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title', null, ['id'=> 'title', 'class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('name', trans('validation.attributes.backend.access.collection.name'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description', trans('validation.attributes.backend.access.collection.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::textarea('description', null, ['id'=> 'description', 'class' => 'form-control', 'maxlength' => '400', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('prev', trans('validation.attributes.backend.access.collection.prev'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::textarea('prev', null, ['class' => 'form-control', 'maxlength' => '400', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
                <div role="tabpanel" class="tab-pane fade" id="ru">
                    <div class="form-group">
                        {{ Form::label('title_ru', trans('validation.attributes.backend.access.collection.title_ru'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_ru', null, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('name_ru', trans('validation.attributes.backend.access.collection.name_ru'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('name_ru', null, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_ru', trans('validation.attributes.backend.access.collection.description_ru'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::textarea('description_ru', null, ['class' => 'form-control', 'maxlength' => '400', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('prev_ru', trans('validation.attributes.backend.access.collection.prev_ru'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::textarea('prev_ru', null, ['class' => 'form-control', 'maxlength' => '400', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
                <div role="tabpanel" class="tab-pane fade" id="it">
                    <div class="form-group">
                        {{ Form::label('title_it', trans('validation.attributes.backend.access.collection.title_it'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_it', null, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('name_it', trans('validation.attributes.backend.access.collection.name_it'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('name_it', null, ['class' => 'form-control', 'maxlength' => '35', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_it', trans('validation.attributes.backend.access.collection.description_it'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::textarea('description_it', null, ['class' => 'form-control', 'maxlength' => '400', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <div class="form-group">
                        {{ Form::label('prev_it', trans('validation.attributes.backend.access.collection.prev_it'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::textarea('prev_it', null, ['class' => 'form-control', 'maxlength' => '400', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('photo', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                <div class="col-lg-10">
                    {{ Form::hidden('photo', null, ['id' => 'collection-hidden']) }}
                    <div class="dropzone" id="dz_collection"></div>
                    <div class="photo"></div>
                </div><!--col-lg-10-->
            </div><!--form control-->

        </div><!--form control-->
    </div><!-- /.box-body -->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.collection.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    {{ Html::script('js/backend/redactor/redactor.js') }}
    {{ Html::script('js/backend/plugin/dropzone/dropzone.js') }}
    {{ Html::script('js/backend/plugin/cropperjs/dist/cropper.js') }}
    {{ Html::script('//cdnjs.cloudflare.com/ajax/libs/Sortable/1.6.0/Sortable.min.js') }}

    @include('backend.collection.edit_js');
@endsection

