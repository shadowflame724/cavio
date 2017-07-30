@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'zone-col')

@section('before_header')
    <div id="wrapper-bg-zone-col" class="wrapper-bg"></div>
    <section id="zones-mobal" class="zone-col-modal">
        <div class="wrapper-zone-col-modal">
            <div class="scroller scroller-zc-modal">
                <div class="scroller-inner">
                    <div class="close-modal"></div>
                    <div class="inner-zone-col-modal bg-white-marmur">
                        <div class="wrap-drop-list-zc">
                            <div class="title-list-type">{{ trans('frontend.zones-collections.collections') }}</div>
                            <div id=wrap-news-type class="drop-down show">
                                <span class="curr-news-type">All collections</span>
                                <ul class="zc-modal-types clearfix">
                                    @foreach($collection->collectionZones->groupBy('zone_id') as $zone)

                                        <li>
                                            <a href=#>{{ $zone[0]->{'title'.$langSuf} }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="zc-modal-carousel">
                            <div class="swiper-wrapper shadow-top-bot">
                                <div class="swiper-slide zc-modal-slide"
                                     style="background-image: url('/upload/images/zc-carousel-item1.jpg')"></div>
                                <div class="swiper-slide zc-modal-slide"
                                     style="background-image: url('/upload/images/banner-main-1.jpg')"></div>
                                <div class="swiper-slide zc-modal-slide"
                                     style="background-image: url('/upload/images/zc-carousel-item2.jpg')"></div>
                            </div>
                            <div class="zc-modal-swip-arrow prev"></div>
                            <div class="zc-modal-swip-arrow next"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="wrap-zc-modal-product-list">
                            <div class=zon-col-upper_list>
                                <div class="wrap-descr_and_title clearfix">
                                    <div class=wrap-name-and-prod_numb>
                                        <div class=descr-zon_col-item-name>

                                            {{ $collection->{'title'.$langSuf} }}

                                        </div>
                                        <div class=zc-modal-prod-numb>
                                            <span class="prod-numb">345</span>
                                            {{ trans('frontend.zones-collections.products') }}
                                        </div>
                                    </div>
                                    <div class=descr-zon_col-item>

                                        {{ $collection->{'description'.$langSuf} }}

                                    </div>
                                </div>
                            </div>
                            <div class="zc-modal-product-list clearfix">

                                <div class="new-products-right-item grid">
                                    <a class=new-products-right-inner-item href=#>
                                        <div class="product-img-table">
                                            <div class="wrap-new-product-img bg-white-marmur"
                                                 style="background-image: url(../../img/frontend/un_banner-1-1.jpg)"></div>
                                        </div>
                                        <div class=wrap-new-product-data>
                                            <div class="product-code">#pr117</div>
                                            <div class="product-name">Bench</div>
                                            <div class="product-size">Como</div>
                                        </div>
                                    </a>
                                </div>


                                <div class="new-products-right-item grid">
                                    <a class=new-products-right-inner-item href=#>
                                        <div class="product-img-table">
                                            <div class="wrap-new-product-img bg-white-marmur"
                                                 style="background-image: url(../../img/frontend/un_banner-1-2.jpg)"></div>
                                        </div>
                                        <div class=wrap-new-product-data>
                                            <div class="product-code">#pr117</div>
                                            <div class="product-name">Bench</div>
                                            <div class="product-size">Como</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="new-products-right-item grid">
                                    <a class=new-products-right-inner-item href=#>
                                        <div class="product-img-table">
                                            <div class="wrap-new-product-img bg-white-marmur"
                                                 style="background-image: url(../../img/frontend/un_banner-1-3.jpg)"></div>
                                        </div>
                                        <div class=wrap-new-product-data>
                                            <div class="product-code">#pr117</div>
                                            <div class="product-name">Bench</div>
                                            <div class="product-size">Como</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="new-products-right-item grid">
                                    <a class=new-products-right-inner-item href=#>
                                        <div class="product-img-table">
                                            <div class="wrap-new-product-img bg-white-marmur"
                                                 style="background-image: url(../../img/frontend/un_banner-1-3.jpg)"></div>
                                        </div>
                                        <div class=wrap-new-product-data>
                                            <div class="product-code">#pr117</div>
                                            <div class="product-name">Bench</div>
                                            <div class="product-size">Como</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="new-products-right-item grid">
                                    <a class=new-products-right-inner-item href=#>
                                        <div class="product-img-table">
                                            <div class="wrap-new-product-img bg-white-marmur"
                                                 style="background-image: url(../../img/frontend/un_banner-1-3.jpg)"></div>
                                        </div>
                                        <div class=wrap-new-product-data>
                                            <div class="product-code">#pr117</div>
                                            <div class="product-name">Bench</div>
                                            <div class="product-size">Como</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="new-products-right-item grid">
                                    <a class=new-products-right-inner-item href=#>
                                        <div class="product-img-table">
                                            <div class="wrap-new-product-img bg-white-marmur"
                                                 style="background-image: url(../../img/frontend/un_banner-1-3.jpg)"></div>
                                        </div>
                                        <div class=wrap-new-product-data>
                                            <div class="product-code">#pr117</div>
                                            <div class="product-name">Bench</div>
                                            <div class="product-size">Como</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="new-products-right-item grid">
                                    <a class=new-products-right-inner-item href=#>
                                        <div class="product-img-table">
                                            <div class="wrap-new-product-img bg-white-marmur"
                                                 style="background-image: url(../../img/frontend/un_banner-1-3.jpg)"></div>
                                        </div>
                                        <div class=wrap-new-product-data>
                                            <div class="product-code">#pr117</div>
                                            <div class="product-name">Bench</div>
                                            <div class="product-size">Como</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="new-products-right-item grid">
                                    <a class=new-products-right-inner-item href=#>
                                        <div class="product-img-table">
                                            <div class="wrap-new-product-img bg-white-marmur"
                                                 style="background-image: url(../../img/frontend/un_banner-1-3.jpg)"></div>
                                        </div>
                                        <div class=wrap-new-product-data">
                                            <div class="product-code">#pr117</div>
                                            <div class="product-name">Bench</div>
                                            <div class="product-size">Como</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="new-products-right-item grid">
                                    <a class=new-products-right-inner-item href=#>
                                        <div class="product-img-table">
                                            <div class="wrap-new-product-img bg-white-marmur"
                                                 style="background-image: url(../../img/frontend/un_banner-1-3.jpg)"></div>
                                        </div>
                                        <div class=wrap-new-product-data">
                                            <div class="product-code">#pr117</div>
                                            <div class="product-name">Bench</div>
                                            <div class="product-size">Como</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class=zc-modal-product-show-more>
                                <button class="btn dark"
                                        content="{{ trans('frontend.zones-collections.showMore') }}">{{ trans('frontend.zones-collections.showMore') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section id="" class="wrap-banner no_space">
        <div class="wrap-banner-cont">
            <h3 class="section-title">{{ $collection->{'title'.$langSuf} }}
                <a href="{{ route('frontend.collections') }}" class="back-zol_col anim-underline">← {{ trans('frontend.zones-collections.backToCollections') }}</a>
            </h3>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="zon-col-list clearfix z_c-list">
                @foreach($collection->collectionZones as $zone)
                    {{--{{ dd($zone) }}--}}
                    @php($item = $zone)
                    @php($cnt = (!empty($item->product_ids)) ? count(explode(',', $item->product_ids)) : false)
                    <div class="item-coll zon-col z_c-list to_modal">
                        <a href="{{ route('frontend.collections.show_popup', [$collection->slug, $item->slug]) }}">
                            <div class="wrap-img-bg small">
                                <div class="img-back wave-dark">
                                    <svg width=1395.63 height=1237.68><use xlink:href="../wave.svg#wave"></use></svg>
                                </div>
                                @php
                                    $img = explode(',', $item->image)[0];
                                @endphp
                                <img src=/upload/images/zone/horizontal/{{ $img }} alt="">
                            </div>
                            <div>
                                <div class=coll-name>{{ $item->{'title'.$langSuf} }}
                                    {{--{{ $item->mainZone->{'title'.$langSuf} }}--}}
                                    <span class=wrap-coll-name-arrow>
                                        <span class=coll-name-arrow>→</span>
                                    </span>
                                </div>
                                @if($cnt)
                                <div class=numb-prod>{{ $cnt }} {{ trans('frontend.zones-collections.products') }}</div>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection