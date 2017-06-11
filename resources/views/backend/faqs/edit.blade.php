@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.faq.management') . ' | ' . trans('labels.backend.access.faq.edit'))

@section('page-header')
    {{ Html::style('css/backend/redactor/redactor.css') }}

    <h1>
        {{ trans('labels.backend.access.faq.management') }}
        <small>{{ trans('labels.backend.access.faq.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($faq, ['route' => ['admin.faq.update', $faq], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'PATCH', 'id' => 'edit-collection', 'enctype' => "multipart/form-data"]) }}
    <div class="box">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.faq.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.faqs.faq-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">

                <div class="form-group">
                    {{ Form::label('question', trans('validation.attributes.backend.access.faq.question'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('question', null, [ 'class' => 'form-control', 'minlength' => '3', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('answer', trans('validation.attributes.backend.access.faq.answer'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::textarea('answer', null, ['class' => 'form-control', 'required' => 'required', 'minlength' => '3','autofocus' => 'autofocus']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

            </div><!--form control-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.faq.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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
    {{ Html::script('js/backend/faq/script.js') }}
@endsection