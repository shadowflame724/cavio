@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'zone-col')

@section('before_header')
    <div id="wrapper-bg-zone-col" class="wrapper-bg"></div>
@endsection

@section('content')
<section id="collections-modal" class="zone-col-modal" data-page-type="popup" data-anim="false">
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
                            @foreach($collectionZones as $item)
                                <li @if($item->slug == $zone->slug)class="active"@endif>
                                    <a href="{{ route('frontend.collections.show_popup', [$collection->slug, $item->slug]) }}"
                                    >{{ $item->{'title'.$langSuf} }}</a>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="zc-modal-carousel">
                        <div class="swiper-wrapper shadow-top-bot">
                        @php($zoneImages = explode(',',$zone->image))
                        @foreach($zoneImages as $image)
                            @if(!empty($image))
                            <div class="swiper-slide zc-modal-slide"
                                 style="background-image: url('/upload/images/zone/original/{{ $image }}')"></div>
                            @endif
                        @endforeach
                        </div>
                        <div class="zc-modal-swip-arrow prev"></div>
                        <div class="zc-modal-swip-arrow next"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="wrap-zc-modal-product-list">
                        <div class=zon-col-upper_list>
                            <div class="wrap-descr_and_title clearfix">
                                <div class=wrap-name-and-prod_numb>
                                    <div class=descr-zon_col-item-name>{{ $collection->{'name'.$langSuf} }}</div>
                                    @if(count($products))
                                    <div class=zc-modal-prod-numb>
                                        <span class="prod-numb">{{ count($products) }}</span>
                                        {{ trans('frontend.zones-collections.products') }}
                                    </div>
                                    @endif
                                </div>
                                <div class=descr-zon_col-item>{{ $collection->{'prev'.$langSuf} }}</div>
                            </div>
                        </div>
                        @if(count($products))
                        <div class="zc-modal-product-list clearfix">
                            @foreach($products as $product)
                                @include('frontend.includes.prod_item', [
                                    'product' => $product
                                ])
                            @endforeach
                        </div>
                        <div class=zc-modal-product-show-more>
                            <a href="{{ route('frontend.catalogue', 'collections='.$collection->slug) }}" class="btn dark"
                                    content="{{ trans('frontend.zones-collections.showMore') }}"
                            >{{ trans('frontend.zones-collections.showMore') }}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection