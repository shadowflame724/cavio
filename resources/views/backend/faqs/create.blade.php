@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.faq.management') . ' | ' . trans('labels.backend.access.faq.edit'))

@section('page-header')
    {{ Html::style('css/backend/redactor/redactor.css') }}

    <h1>
        {{ trans('labels.backend.access.faq.management') }}
        <small>{{ trans('labels.backend.access.faq.create') }}
        </small>
    </h1>

@endsection

@section('content')
    {!! Form::open(['route' => 'admin.faq.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'enctype' => "multipart/form-data", 'id'=> 'collection-form']) !!}
    <div class="box">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.faq.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.faqs.faq-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#en" aria-controls="en" role="tab"
                                                          data-toggle="tab">EN</a>
                </li>
                <li role="presentation"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">RU</a></li>
                <li role="presentation"><a href="#it" aria-controls="it" role="tab" data-toggle="tab">IT</a></li>
            </ul>
            <div class="box-body">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="en">

                        <div class="form-group">
                            {{ Form::label('question', trans('validation.attributes.backend.access.faq.question'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::textarea('question', null, [ 'class' => 'form-control redactor', 'minlength' => '3', 'required' => 'required', 'maxlength' => '200', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('answer', trans('validation.attributes.backend.access.faq.answer'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::textarea('answer', null, ['class' => 'form-control redactor', 'minlength' => '3', 'required' => 'required', 'maxlength' => '400', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                    </div><!--form control-->
                    <div role="tabpanel" class="tab-pane fade" id="ru">
                        <div class="form-group">
                            {{ Form::label('question_ru', trans('validation.attributes.backend.access.faq.question_ru'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::textarea('question_ru', null, [ 'class' => 'form-control redactor', 'minlength' => '3', 'required' => 'required', 'maxlength' => '200', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('answer_ru', trans('validation.attributes.backend.access.faq.answer_ru'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::textarea('answer_ru', null, ['class' => 'form-control redactor', 'minlength' => '3', 'required' => 'required', 'maxlength' => '400', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="it">

                        <div class="form-group">
                            {{ Form::label('question_it', trans('validation.attributes.backend.access.faq.question_it'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::textarea('question_it', null, [ 'class' => 'form-control redactor', 'minlength' => '3', 'required' => 'required', 'maxlength' => '200', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('answer_it', trans('validation.attributes.backend.access.faq.answer_it'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::textarea('answer_it', null, ['class' => 'form-control redactor', 'minlength' => '3', 'required' => 'required', 'maxlength' => '400', 'autofocus' => 'autofocus']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('admin_comment', trans('validation.attributes.backend.admin_comment.comment'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('admin_comment', null, ['class' => 'form-control', 'required' => 'required']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div>
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.faq.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    {{ Html::script('js/backend/faq/script.js') }}
@endsection

