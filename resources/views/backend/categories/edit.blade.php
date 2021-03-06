@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.category.management') . ' | ' . trans('labels.backend.access.category.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.category.management') }}
        <small>{{ trans('labels.backend.access.category.edit') }}
        </small>
    </h1>
@endsection

@section('content')
    {{ Form::model($category, ['route' => ['admin.category.update', $category], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'POST', 'id' => 'edit-category', 'enctype' => "multipart/form-data"]) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.category.edit') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.categories.category-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#en" aria-controls="en" role="tab" data-toggle="tab">EN</a>
            </li>
            <li role="presentation"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">RU</a></li>
            <li role="presentation"><a href="#it" aria-controls="it" role="tab" data-toggle="tab">IT</a></li>
        </ul>
        <div class="box-body">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="en">
                    <div class="form-group">
                        {{ Form::label('name', trans('validation.attributes.backend.access.category.name'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('name', null, ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('title', trans('validation.attributes.backend.access.category.title'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description', trans('validation.attributes.backend.access.category.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::textarea('description', null, ['class' => 'form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>

                <div role="tabpanel" class="tab-pane fade" id="ru">
                    <div class="form-group">
                        {{ Form::label('name_ru', trans('validation.attributes.backend.access.category.name_ru'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('name_ru', null, ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <div class="form-group">
                        {{ Form::label('title_ru', trans('validation.attributes.backend.access.category.title_ru'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_ru', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_ru', trans('validation.attributes.backend.access.category.description_ru'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::textarea('description_ru', null, ['class' => 'form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>

                <div role="tabpanel" class="tab-pane fade" id="it">
                    <div class="form-group">
                        {{ Form::label('name_it', trans('validation.attributes.backend.access.category.name_it'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('name_it', null, ['class' => 'form-control', 'minlength' => '3', 'maxlength' => '35', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                    <div class="form-group">
                        {{ Form::label('title_it', trans('validation.attributes.backend.access.category.title_ru'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('title_it', null, ['class' => 'form-control', 'maxlength' => '191', 'required' => 'required', 'autofocus' => 'autofocus']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('description_it', trans('validation.attributes.backend.access.category.description_it'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::textarea('description_it', null, ['class' => 'form-control']) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->
                </div>

                <div class="form-group">
                    {{ Form::label('photo', trans('validation.attributes.backend.access.category.image'), ['class' => 'col-lg-2 control-label']) }}
                    <div class="col-lg-10">
                        {{Form::textarea('image', null, [ 'class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div>
        </div>

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

@endsection
