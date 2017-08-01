@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.baskets.management') . ' | ' . trans('labels.backend.access.baskets.show'))

@section('after-style')

@endsection

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
            <div class="well col-lg-12" id="user-info">
                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.baskets.updated_at'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $basket->updated_at->diffForHumans() }}
                </div><!--form control-->
                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.baskets.user_fr_name'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $basket->user->first_name }}
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.baskets.user_ls_name'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $basket->user->last_name }}
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.baskets.user_email'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $basket->user->email }}
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
                    {{ $basket->count }}
                </div><!--form control-->

                <div class="form-group">
                    <b>{{  trans('validation.attributes.backend.access.baskets.summ'), ['class' => 'control-label'] }}
                        :</b>
                    {{ $basket->summ }}
                </div><!--form control-->
            </div>

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