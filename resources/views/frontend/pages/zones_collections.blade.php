@extends('frontend.layouts.app_dev')
@section('head')
    <body id=zone-col class=zone-col>
    @endsection
    <div id=wrapper-bg-zone-col class=wrapper-bg></div>
    @section('content')

<main id=main-scrollbar>
    <section class=wrap-banner>
        <div class="wrap-banner-cont double">
            <h3 class=section-title><span class="title-item skew zones swiper-button-disabled"><span
                            class=inner-title-item>Zones</span></span> <span class=title-slash></span> <span
                        class="title-item skew collections"><span class=inner-title-item>Collections</span></span>
                <svg class=title-wave viewBox="0 0 1395.63 1237.68">
                    <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href=wave.svg#wave></use>
                </svg>
            </h3>
        </div>
    </section>
    <section>
        <div class=container>
            <div class="zon-col-list clearfix">
                @foreach($collections as $collection)
                    @if($collection->banner == 0)
                    <div class="item-coll zon-col"><a href=#>
                            <div class="wrap-img-bg small">
                                <div class="img-back wave-dark">
                                    <svg width=1395.63 height=1237.68>
                                        <use xlink:href=wave.svg#wave></use>
                                    </svg>
                                </div>
                                <img src=/upload/images/{{ $collection->image }} alt=""></div>
                            <div>
                                <div class=coll-name>{{ $collection->title }} <span class=wrap-coll-name-arrow><span
                                                class=coll-name-arrow>→</span></span></div>
                                <div class=numb-prod>69 products</div>
                            </div>
                        </a></div>
                    @endif
                @endforeach
                    @foreach($zones as $zone)
                        <div class="item-coll zon-col"><a href=#>
                                <div class="wrap-img-bg small">
                                    <div class="img-back wave-dark">
                                        <svg width=1395.63 height=1237.68>
                                            <use xlink:href=wave.svg#wave></use>
                                        </svg>
                                    </div>
                                    <img src=/upload/images/{{ $zone->image }} alt=""></div>
                                <div>
                                    <div class=coll-name>{{ $zone->title }} <span class=wrap-coll-name-arrow><span
                                                    class=coll-name-arrow>→</span></span></div>
                                    <div class=numb-prod>69 products</div>
                                </div>
                            </a></div>
                    @endforeach
            </div>
        </div>
    </section>
@endsection
</main>