@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'stash')

@section('before_header')
@endsection

@section('content')
    <section id="top-waves" class="relative"></section>

    <section id="catalogue" class="">
      <div class="container">
        <div class="small-page-title" data-anim="false"><span class="text-title">{{ trans('frontend.shoppingCart.title') }}</span></div>
        <div class="wrap-catal stash wrap-box-shadow clearfix bg-white-marmur" data-anim="false">
          <div class="wrap-stash-list">
            @if(!empty($products))
            @foreach($products as $product)
            <div class="item-detail-order-data-wrap_anim @if($product['discount'] > 0) discount @endif">
              <div class="item-detail-order-data stash">
                <div class="inner-order-item-img">
                  <div class="for-disp_discount">
                    @if(isset($product['productPhotos']['photos'][0]))
                        <div class="order-item-img bg-white-marmur"
                         style="background-image: url(//cvo-dev.spongeservice.com.ua/api/product-image/{{$product['productPhotos']['photos'][0]}})"></div>
                    @endif
                  </div>
                </div>
                <div class="wrap-center-order_it-data stash">
                  <div>
                    <div class="wrap-head-ord_it-for_mobile stash">
                      <div class="kick-ord_it" data-priceid="{{$product['id']}}"></div>
                      <div class="top-center-ord_it-data clearfix">
                        <div class="ord_it-name">{{$product['productChilds']['name']}}</div>
                        <div class="wrap-calc_price">
                          <div class="ord_it-numb">
                            <span class="calc_it minus @if($product['count'] == 1) disabled @endif"></span>
                            <span class="ord_it-numb-val" data-price="{{$product['price_vat_def']}}" data-priceid="{{$product['id']}}">{{$product['count']}}</span>
                            <span class="calc_it plus"></span>
                          </div>
                          <div class="ord_it-price"><span>{{$product['price_vat']}}</span> €</div>
                        </div>
                      </div>
                      <div class="mibble-center-ord_it-data order stash">
                        <span class="ord_it-code">{{$product['productChilds']['code']}}</span>
                        @if(!empty($product['collections']['zone']))
                        @foreach($product['collections']['zone'] as $zone)
                          <span class="catal-type">{{$zone}}</span>
                        @endforeach
                        @endif

                        @if(!empty($product['collections']['collection']))
                        @foreach($product['collections']['collection'] as $collection)
                          <span class="catal-item-numb">{{$collection}}</span>
                        @endforeach
                        @endif
                      </div>
                    </div>
                    <div class="bottom-center-ord_it-data clearfix">
                    <span class="material-ord_it">
                      <div class="label-bot-ord_it-data">{{ trans('frontend.shoppingCart.finishing') }}</div>
                      @if(isset($product['productPhotos']['finish']))
                      @foreach($product['productPhotos']['finish'] as $one)
                          <span class="inner-nowrap">{{$one}}</span>
                      @endforeach
                      @endif
                    </span>
                      <span class="material-ord_it-code">
                      <div class="label-bot-ord_it-data">{{ trans('frontend.shoppingCart.tissue') }}</div>
                        @if(isset($product['productPhotos']['tissue']))
                        @foreach($product['productPhotos']['tissue'] as $one)
                          <span class="inner-nowrap">{{$one}}</span>
                        @endforeach
                        @endif
                    </span>
                      <span class="size-ord_it"><div class="label-bot-ord_it-data">{{ trans('frontend.shoppingCart.dimensions') }}</div>
                        @if(isset($product['productChilds']['dimensions']->length) && !empty($product['productChilds']['dimensions']->length))
                        L: {{$product['productChilds']['dimensions']->length}},
                        @endif
                        @if(isset($product['productChilds']['dimensions']->width) && !empty($product['productChilds']['dimensions']->width))
                        W: {{$product['productChilds']['dimensions']->width}},
                        @endif
                        @if(isset($product['productChilds']['dimensions']->height) && !empty($product['productChilds']['dimensions']->height))
                        H: {{$product['productChilds']['dimensions']->height}},
                        @endif
                        @if(isset($product['productChilds']['dimensions']->mattress) && !empty($product['productChilds']['dimensions']->mattress))
                        Mattress: {{$product['productChilds']['dimensions']->mattress}},
                        @endif
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @endif

            <div class="wrap-bot-stash_list clearfix">
              <div class="footnote">
                @if(!empty($config) && isset($config['discount_data']))
                <div class="item-footnote">* {{ trans('frontend.shoppingCart.fullCostMessage') }}.</div>
                <div class="item-footnote">
                  ** {{ trans('frontend.shoppingCart.additionalDiscountsMessage') }}:
                  <div class="marg-t clearfix">
                    <div class="descr-disc-label">{{ trans('frontend.shoppingCart.from') }}</div>
                    <div class="descr-disc">
                      @foreach($config['discount_data'] as $discount_data)
                      {{$discount_data['from']}} {{ trans('frontend.shoppingCart.to') }} {{$discount_data['to']}} - {{$discount_data['equal']}}%<br>
                      @endforeach
                      {{-->20000  - {{ trans('frontend.shoppingCart.customDiscount') }}--}}
                    </div>
                  </div>
                </div>
                @endif
              </div>
              <div class="total-basket-main">
                @include('frontend.includes.total_basket',['summ' => $summ])
              </div>
          </div>
            <div class="wrap-stash_order clearfix">
              <button id="order-now" class="btn dark-profile" content="{{ trans('frontend.shoppingCart.orderNow') }}">{{ trans('frontend.shoppingCart.orderNow') }}</button>
            </div>
            <div class="mob_copy-footnote">
              <div class="item-footnote">* {{ trans('frontend.shoppingCart.fullCostMessage') }}.</div>
              <div class="item-footnote">
                ** {{ trans('frontend.shoppingCart.additionalDiscountsMessage') }}:
                <div class="marg-t clearfix">
                  <div class="descr-disc-label">{{ trans('frontend.shoppingCart.from') }}</div>
                  <div class="descr-disc">
                    5000 {{ trans('frontend.shoppingCart.to') }} 10000 – 5%<br>
                    10001 {{ trans('frontend.shoppingCart.to') }} 20000  - 10%<br>
                    >20000  - {{ trans('frontend.shoppingCart.customDiscount') }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection