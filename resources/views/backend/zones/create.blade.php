@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.zone.management') . ' | ' . trans('labels.backend.access.zone.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.zone.management') }}
        <small>{{ trans('labels.backend.access.zone.create') }}
        </small>
    </h1>

@endsection

@section('content')
    {!! Form::open(['route' => 'admin.zone.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post', 'enctype' => "multipart/form-data", 'id'=> 'zone-form']) !!}

    <div class="box box-success">

        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.zone.create') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.zones.zone-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#en" aria-controls="en" role="tab" data-toggle="tab">EN</a>
            </li>
            <li role="presentation"><a href="#ru" aria-controls="ru" role="tab" data-toggle="tab">RU</a></li>
            <li role="presentation"><a href="#it" aria-controls="it" role="tab" data-toggle="tab">IT</a></li>
        </ul>

        <div class="box-body">

            @include('backend.zones._form')
            <div class="form-group">
                {{ Form::label(
                    'sort',
                    trans('validation.attributes.backend.access.roles.sort'),
                    ['class' => 'col-lg-2 control-label']
                ) }}
                <div class="col-lg-10">
                    {{ Form::text(
                        'sort',
                        null,
                        ['class' => 'form-control', 'required' => 'required', 'autofocus' => 'autofocus']
                    ) }}
                </div>
            </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <div class="pull-left">
                {{ link_to_route('admin.zone.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.create'), ['id' => 'submit-all', 'class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-footer -->

    </div><!--box-->

    {!! Form::close() !!}


@endsection



