@extends('frontend.layouts.app_dev')

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
                        <div class="title-list-type">{{ trans('frontend.zones-collections.zones') }}</div>
                        <div id=wrap-news-type class="drop-down show">
                            <span class="curr-news-type">{{ trans('frontend.zones-collections.allZones') }}</span>
                            <ul class="zc-modal-types clearfix">
                                @foreach($zone->collectionZones as $collectionZones)
                                    <li>
                                        <a href=#>
                                            @if (App::getLocale() == 'ru')
                                                {{ $collectionZones->collection->title_ru }}
                                            @elseif(App::getLocale() == 'it')
                                                {{ $collectionZones->collection->title_it }}
                                            @else
                                                {{ $collectionZones->collection->title }}
                                            @endif
                                        </a>
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
                        <div class="zon-col-upper_list">
                            <div class="wrap-descr_and_title col clearfix">
                                <div class="descr-zon_col-item-name col">
                                    @if (App::getLocale() == 'ru')
                                        {{ $zone->title_ru }}
                                    @elseif(App::getLocale() == 'it')
                                        {{ $zone->title_it }}
                                    @else
                                        {{ $zone->title }}
                                    @endif
                                </div>
                            </div>
                            <div class="zc-modal-prod-numb"><span class="prod-numb">345</span> {{ trans('frontend.zones-collections.products') }}</div>
                        </div>

                        <div class="zc-modal-product-list clearfix">

                            <div class="new-products-right-item grid">
                                <a class=new-products-right-inner-item href=#>
                                    <div class="product-img-table">
                                        <div class="wrap-new-product-img bg-white-marmur"
                                             style="background-image: url(images/un_banner-1-1.jpg)"></div>
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
                                             style="background-image: url(images/un_banner-1-2.jpg)"></div>
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
                                             style="background-image: url(images/un_banner-1-3.jpg)"></div>
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
                                             style="background-image: url(images/un_banner-1-3.jpg)"></div>
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
                                             style="background-image: url(images/un_banner-1-3.jpg)"></div>
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
                                             style="background-image: url(images/un_banner-1-3.jpg)"></div>
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
                                             style="background-image: url(images/un_banner-1-3.jpg)"></div>
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
                                             style="background-image: url(images/un_banner-1-3.jpg)"></div>
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
                                             style="background-image: url(images/un_banner-1-3.jpg)"></div>
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
                            <button class="btn dark" content="{{ trans('frontend.zones-collections.showMore') }}">{{ trans('frontend.zones-collections.showMore') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="wrap-banner no_space">
    <div class=wrap-banner-cont>
        <h3 class=section-title>
            @if (App::getLocale() == 'ru')
                {{ $zone->title_ru }}
            @elseif(App::getLocale() == 'it')
                {{ $zone->title_it }}
            @else
                {{ $zone->title }}
            @endif
            <a href="{{ route('frontend.zones') }}"
               class="back-zol_col anim-underline">← {{ trans('frontend.zones-collections.backToZones') }}</a>
            <svg class=title-wave viewBox="0 0 1395.63 1237.68">
                <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href=wave.svg#wave></use>
            </svg>
        </h3>
    </div>
</section>
<section>
        <div class=container>
            <div class="zon-col-list clearfix z_c-list">
                @foreach($zone->collectionZones as $collectionZone)
                    <div class="item-coll zon-col z_c-list to_modal">
                        <a href=#>
                            <div class="wrap-img-bg small">
                                <div class="img-back wave-dark">
                                    <svg width=1395.63 height=1237.68>
                                        <use xlink:href=wave.svg#wave></use>
                                    </svg>
                                </div>
                                <img src=/upload/images/{{ $collectionZone->image }} alt="">
                            </div>
                            <div>
                                <div class=coll-name>
                                    @if (App::getLocale() == 'ru')
                                        {{ $collectionZone->collection->title_ru  }}
                                    @elseif(App::getLocale() == 'it')
                                        {{ $collectionZone->collection->title_it  }}
                                    @else
                                        {{ $collectionZone->collection->title  }}
                                    @endif
                                    <span class=wrap-coll-name-arrow>
                                    <span class=coll-name-arrow>→</span>
                                </span>
                                </div>
                                <div class=numb-prod>{{ $collectionZone->collection->goods->count() }} {{ trans('frontend.zones-collections.products') }}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection