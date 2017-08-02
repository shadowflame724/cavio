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
            <div class="well col-lg-6">
                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.orders.updated_at'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $order->updated_at->diffForHumans() }}
                </div><!--form control-->
                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.orders.user_fr_name'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $orderData->first_name }}
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.orders.user_ls_name'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $orderData->last_name }}
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.orders.user_email'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $orderData->email }}
                </div><!--form control-->

            </div>
            <div class="well col-lg-6">


                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.orders.user_region'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $orderData->region }}
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.orders.user_city'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $orderData->city }}
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.orders.user_zip_code'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $orderData->zip_code }}
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.orders.user_phone'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $orderData->phone }}
                </div><!--form control-->
            </div>
            <div class="well col-lg-12">
                <div class="form-group">
                    <div class="row">
                        @php($allPrices = 0)
                            @php($allFinalPrices = 0)
                                @php($vatSummOrder = 0)
                                    @php($discountSummOrder = 0)

                                        @foreach($products as $product)
                                            <div class="col-lg-3">
                                                <div class="thumbnail">
                                                    @php($imageArr = explode(',', $product->photos))
                                                        <img class="product_photo"
                                                             src="/upload/products/{{ $imageArr[0] }}" alt="">
                                                        <div class="caption">
                                                            <h3>{{ $product->child_product_name }}</h3>
                                                            <small>
                                                                <b>{{  trans('validation.attributes.backend.access.orders.product.code') }}
                                                                    : </b>{{ $product->child_product_code }}</small>
                                                            <p>
                                                                <b>{{ $product->collection_name }}>
                                                                    {{ $product->zones_name }}>
                                                                    {{ $product->collection_zones_name }}</b><br>
                                                                <b>{{  trans('validation.attributes.backend.access.orders.product.finish_name') }}
                                                                    : </b>{{ $product->finish_title }}<br>
                                                                <b>{{  trans('validation.attributes.backend.access.orders.product.tissue_name') }}
                                                                    : </b>{{ $product->tissue_title }}<br>
                                                                <b>{{  trans('validation.attributes.backend.access.orders.product.categories_name') }}
                                                                    : </b>{{ $product->categories_name }}
                                                                <br>
                                                                @php($allPrices += $product->price)
                                                                    <b>{{  trans('validation.attributes.backend.access.orders.product.price') }}
                                                                        : </b>{{ $product->price }}<br>
                                                                    @php($vatSumm = $product->price * $vat / 100)
                                                                        @php($vatSummOrder += $vatSumm)
                                                                            <b>{{  trans('validation.attributes.backend.access.orders.product.vat') }}
                                                                                ({{ $vat }}%): </b>{{ $vatSumm }}<br>
                                                                            @php($discountSumm = $product->price * $product->discount / 100)
                                                                                @php($discountSummOrder += $discountSumm)
                                                                                    <b>{{  trans('validation.attributes.backend.access.orders.product.discount') }}
                                                                                        ({{ $product->discount }}
                                                                                        %): </b>{{ $discountSumm }}
                                                                                    <br>
                                                                                    @php($finalPrice = $product->price + $vatSumm - $discountSumm)
                                                                                        @php($allFinalPrices += $finalPrice)
                                                                                            <b>{{  trans('validation.attributes.backend.access.orders.product.final_price') }}
                                                                                                : </b>{{ $finalPrice }}
                                                                                            <br>
                                                            </p>

                                                        </div>
                                                </div>
                                            </div>
                                        @endforeach
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.orders.allPrices'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $allPrices }}
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.orders.allVats'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $vatSummOrder }}
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.orders.allDiscounts'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $discountSummOrder }}
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.orders.allFinalPrices'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $allFinalPrices }}
                </div><!--form control-->

            </div>


            {{ Form::model($order, ['route' => ['admin.orders.update', $order], 'class' => 'form-horizontal', 'page' => 'form', 'method' => 'PATCH', 'id' => 'edit-order', 'enctype' => "multipart/form-data"]) }}

            <div class="form-group">
                {{ Form::label('status', trans('validation.attributes.backend.access.orders.status'), ['class' => 'col-lg-2 control-label']) }}

                <div class="col-lg-10">
                    <select class="form-control"
                            name="status">
                        <option value="0"
                                @if($order->status == 0) selected="selected" @endif
                                @if($order->status > 0) disabled="disabled"@endif
                        >{{ trans('validation.attributes.backend.access.orders.status_new') }}</option>
                        <option value="1"
                                @if($order->status == 1) selected="selected" @endif
                                @if($order->status > 1) disabled="disabled"@endif
                        >{{ trans('validation.attributes.backend.access.orders.status_sent') }}</option>
                        <option value="2"
                                @if($order->status == 2) selected="selected" @endif
                                @if($order->status > 2) disabled="disabled"@endif
                        >{{ trans('validation.attributes.backend.access.orders.status_delivering') }}</option>
                        <option value="3"
                                @if($order->status == 3) selected="selected" @endif
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