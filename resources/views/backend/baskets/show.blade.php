@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.baskets.management') . ' | ' . trans('labels.backend.access.baskets.show'))


@section('page-header')
    <h1>
        {{ trans('labels.backend.access.baskets.management') }}
        <small>{{ trans('labels.backend.access.baskets.show') }}</small>
    </h1>
@endsection

@section('content')

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.baskets.show') }}</h3>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group col-lg-12">
                {{ Form::label('user_first_name', trans('validation.attributes.backend.access.baskets.user_fr_name'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ $basket->user->first_name }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group col-lg-12">
                {{ Form::label('user_last_name', trans('validation.attributes.backend.access.baskets.user_ls_name'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ $basket->user->last_name }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group col-lg-12">
                {{ Form::label('user_email', trans('validation.attributes.backend.access.baskets.user_email'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ $basket->user->email }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group col-lg-12">
                {{ Form::label('summ', trans('validation.attributes.backend.access.baskets.summ'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ $basket->summ }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group col-lg-12">
                {{ Form::label('count', trans('validation.attributes.backend.access.baskets.count'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ $basket->count }}
                </div><!--col-lg-10-->
            </div><!--form control-->








        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.baskets.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
            </div><!--pull-left-->

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
    {{ Form::close() }}

@endsection

@section('after-scripts')

@endsection