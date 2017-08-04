@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.zone.management') . ' | ' . trans('labels.backend.access.zone.edit'))

@section('page-header')

    <h1>
        {{ trans('labels.backend.access.zone.management') }}
        <small>{{ trans('labels.backend.access.zone.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($zone, ['route' => ['admin.zone.update', $zone], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'PATCH', 'id' => 'edit-zone', 'enctype' => "multipart/form-data"]) }}

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.zone.edit') }}</h3>

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

        </div><!-- /.box-body -->

        <div class="box-footer">
            <div class="pull-left">
                {{ link_to_route('admin.zone.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="pull-right">
                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-xs']) }}
            </div><!--pull-right-->

            <div class="clearfix"></div>
        </div><!-- /.box-footer -->
    </div><!--box-->

    {{ Form::close() }}

@endsection
