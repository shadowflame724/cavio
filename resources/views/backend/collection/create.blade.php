@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.collection.management') . ' | ' . trans('labels.backend.access.collection.edit'))

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
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="en">
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('banner', trans('validation.attributes.backend.access.collection.banner'), ['class' => 'col-lg-2 control-label']) }}
                        <div class="col-lg-10">
                            {{ Form::checkbox('banner', null) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('title', trans('validation.attributes.backend.access.collection.title'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title', null, ['id'=> 'title', 'class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description', trans('validation.attributes.backend.access.collection.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description', null, ['id'=> 'description', 'class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="ru">
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('title_ru', trans('validation.attributes.backend.access.collection.title'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_ru', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_ru', trans('validation.attributes.backend.access.collection.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description_ru', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="it">
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('title_it', trans('validation.attributes.backend.access.collection.title'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_it', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_it', trans('validation.attributes.backend.access.collection.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description_it', null, ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>
            </div>
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



