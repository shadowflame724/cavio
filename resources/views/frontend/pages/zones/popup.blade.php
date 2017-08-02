@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'zone-col')

@section('before_header')
    <div id="wrapper-bg-zone-col" class="wrapper-bg"></div>
@endsection

@section('content')
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
                                @foreach($collectionAll as $item)
                                <li @if($item->slug == $collection->slug)class="active"@endif>
                                    <a href="{{ route('frontend.zones.show_popup', [$zone->slug, $item->slug]) }}">{{ $item->{'title'.$langSuf} }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="zc-modal-carousel">
                        <div class="swiper-wrapper shadow-top-bot">
                        @foreach($collectionZone as $oneZone)
                            @php($zoneImages = explode(',',$oneZone->image))
                            @foreach($zoneImages as $image)
                                @if(!empty($image))
                                <div class="swiper-slide zc-modal-slide"
                                     style="background-image: url('/upload/images/zone/original/{{ $image }}')"></div>
                                @endif
                            @endforeach
                        @endforeach
                        </div>
                        <div class="zc-modal-swip-arrow prev"></div>
                        <div class="zc-modal-swip-arrow next"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="wrap-zc-modal-product-list">
                        <div class="zon-col-upper_list">
                            <div class="wrap-descr_and_title col clearfix">
                                <div class="descr-zon_col-item-name col">{{ $zone->{'title'.$langSuf} }}</div>
                            </div>
                            @if(count($products))
                            <div class="zc-modal-prod-numb">
                                <span class="prod-numb">{{ count($products) }}</span> {{ trans('frontend.zones-collections.products') }}
                            </div>
                            @endif
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
                            <button class="btn dark"
                                    content="{{ trans('frontend.zones-collections.showMore') }}"
                            >{{ trans('frontend.zones-collections.showMore') }}</button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection