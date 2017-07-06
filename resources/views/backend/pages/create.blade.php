@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.page.management') . ' | ' . trans('labels.backend.access.page.edit'))

@section('page-header')
    {{ Html::style('css/backend/redactor/redactor.css') }}
    <h1>
        {{ trans('labels.backend.access.page.management') }}
        <small>        {{ trans('labels.backend.access.page.create') }}
        </small>
    </h1>

@endsection

@section('content')
    {!! Form::open(['route' => 'admin.page.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'enctype' => "multipart/form-data"]) !!}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.page.create') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.pages.page-header-buttons')
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
                        {{ Form::label('pageKey', trans('validation.attributes.backend.access.page.pageKey'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('pageKey', null, ['id' => 'pageKey', 'class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('title', trans('validation.attributes.backend.access.page.title'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title', null, ['id' => 'title','class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description', trans('validation.attributes.backend.access.page.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('body', trans('validation.attributes.backend.access.page.body'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::textarea('body', null, ['class' => 'form-control page', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="ru">
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('title_ru', trans('validation.attributes.backend.access.page.title'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_ru', null, ['id' => 'title','class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('body_ru', trans('validation.attributes.backend.access.page.body'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::textarea('body_ru', null, ['class' => 'form-control page', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="it">
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('title_it', trans('validation.attributes.backend.access.page.title'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_it', null, ['id' => 'title','class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('body_it', trans('validation.attributes.backend.access.page.body'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::textarea('body_it', null, ['class' => 'form-control page', 'required' => 'required', 'minlength' => '3', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>

        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.page.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->

    {!! Form::close() !!}


@endsection

@section('after-scripts')
    {{ Html::script('js/backend/redactor/redactor.js') }}
    {{ Html::script('js/backend/pages/script.js') }}
@endsection

