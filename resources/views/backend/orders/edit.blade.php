@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.orders.management') . ' | ' . trans('labels.backend.access.orders.edit'))


@section('page-header')
    <h1>
        {{ trans('labels.backend.access.orders.management') }}
        <small>{{ trans('labels.backend.access.orders.edit') }}</small>
    </h1>
@endsection

@section('content')

    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.orders.create') }}</h3>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="form-group col-lg-12">
                {{ Form::label('user_first_name', trans('validation.attributes.backend.access.orders.user_fr_name'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ $order->user->first_name }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group col-lg-12">
                {{ Form::label('user_last_name', trans('validation.attributes.backend.access.orders.user_ls_name'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ $order->user->last_name }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group col-lg-12">
                {{ Form::label('user_email', trans('validation.attributes.backend.access.orders.user_email'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ $order->user->email }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group col-lg-12">
                {{ Form::label('summ', trans('validation.attributes.backend.access.orders.summ'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ $order->summ }}
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group col-lg-12">
                {{ Form::label('cnt', trans('validation.attributes.backend.access.orders.cnt'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ $order->cnt }}
                </div><!--col-lg-10-->
            </div><!--form control-->



            {{ Form::model($order, ['route' => ['admin.orders.update', $order], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'PATCH', 'id' => 'edit-order', 'enctype' => "multipart/form-data"]) }}

            <div class="form-group">
                {{ Form::label('status', trans('validation.attributes.backend.access.orders.status'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    <select class="form-control"
                            name="status">
                        <option value="0"
                                @if($order->status = 0) selected="selected"@endif>{{ trans('validation.attributes.backend.access.orders.status_new') }}</option>
                        <option value="1"
                                @if($order->status = 1) selected="selected"@endif>{{ trans('validation.attributes.backend.access.orders.status_sent') }}</option>
                        <option value="2"
                                @if($order->status = 2) selected="selected"@endif>{{ trans('validation.attributes.backend.access.orders.status_delivering') }}</option>
                        <option value="3"
                                @if($order->status = 3) selected="selected"@endif>{{ trans('validation.attributes.backend.access.orders.status_closed') }}</option>
                    </select>
                </div><!--col-lg-10-->
            </div><!--form control-->

            <div class="form-group">
                {{ Form::label('admin_comment', trans('validation.attributes.backend.admin_comment.comment'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    {{ Form::textarea('admin_comment', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div><!--col-lg-10-->
            </div><!--form control-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="box box-success">
        <div class="box-body">
            <div class="pull-left">
                {{ link_to_route('admin.orders.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
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

@endsection