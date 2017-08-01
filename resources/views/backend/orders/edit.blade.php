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
            <h3 class="box-title">{{ trans('labels.backend.access.orders.edit') }}</h3>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="well col-lg-12" id="user-info">
                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.baskets.updated_at'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $order->updated_at->diffForHumans() }}
                </div><!--form control-->
                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.baskets.user_fr_name'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $order->user->first_name }}
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.baskets.user_ls_name'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $order->user->last_name }}
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.baskets.user_email'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $order->user->email }}
                </div><!--form control-->
            </div>
            <div class="well col-lg-12" id="products-info">
                <div class="form-group">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-3">
                                <div class="thumbnail">
                                    @php($imageArr = explode(',', $product->photos))
                                        <img class="product_photo" src="/upload/products/{{ $imageArr[0] }}" alt="">
                                        <div class="caption">
                                            <h3>{{ $product->name }}</h3>
                                            <small>{{ $product->code }}</small>
                                            <p>{{ $product->price }}</p>
                                        </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.baskets.count'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $order->cnt }}
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.baskets.summ'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $order->summ }}
                </div><!--form control-->
            </div>



            {{ Form::model($order, ['route' => ['admin.orders.update', $order], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'PATCH', 'id' => 'edit-order', 'enctype' => "multipart/form-data"]) }}

            <div class="form-group">
                {{ Form::label('status', trans('validation.attributes.backend.access.orders.status'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    <select class="form-control"
                            name="status">
                        <option value="0"
                                @if($order->status == 0) selected="selected"@endif
                                @if($order->status > 0) disabled="disabled"@endif
                        >{{ trans('validation.attributes.backend.access.orders.status_new') }}</option>
                        <option value="1"
                                @if($order->status == 1) selected="selected"@endif
                                @if($order->status > 1) disabled="disabled"@endif
                        >{{ trans('validation.attributes.backend.access.orders.status_sent') }}</option>
                        <option value="2"
                                @if($order->status == 2) selected="selected"@endif
                                @if($order->status > 2) disabled="disabled"@endif
                        >{{ trans('validation.attributes.backend.access.orders.status_delivering') }}</option>
                        <option value="3"
                                @if($order->status == 3) selected="selected"@endif
                                @if($order->status > 3) disabled="disabled"@endif
                        >{{ trans('validation.attributes.backend.access.orders.status_closed') }}</option>
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