@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'zone-col')

@section('before_header')
<div id=wrapper-bg-zone-col class=wrapper-bg></div>
@endsection

@section('content')
<section class=wrap-banner>
    <div class="wrap-banner-cont double">
        <h3 class=section-title>
            <div class="inner_wrap-double_title clearfix">
                <div class=wrap-title-item>
                    <a href="{{ route('frontend.zones') }}" class="inner-title-item active">{{ trans('frontend.zones-collections.zones') }}</a>
                </div>
                <div class=wrap-title-item>
                    <a href="{{ route('frontend.collections') }}" class="inner-title-item right">{{ trans('frontend.zones-collections.collections') }}</a>
                </div>
            </div>
            <svg class=title-wave viewBox="0 0 1395.63 1237.68">
                <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href=wave.svg#wave></use>
            </svg>
        </h3>
    </div>
</section>
<section>
    <div class=container>
        <div class="zon-col-list clearfix">
            @foreach($zones as $zone)
            <div class="item-coll zon-col"><a
                        href="{{ route('frontend.zones.show', $zone) }}">
                    <div class="wrap-img-bg small">
                        <div class="img-back wave-dark">
                            <svg width=1395.63 height=1237.68>
                                <use xlink:href=wave.svg#wave></use>
                            </svg>
                        </div>
                        <img src="/upload/images/{{ $zone->collectionZones->random()->image }}" alt=""></div>
                    <div>
                        <div class=coll-name>

                                {{ $zone->{'title'.$langSuf} }}

                                <span class=wrap-coll-name-arrow><span
                                        class=coll-name-arrow>→</span></span></div>
                        <div class=numb-prod>00 {{ trans('frontend.zones-collections.products') }}</div>
                    </div>
                </a></div>
            @endforeach
        </div>
    </div>
</section>
@endsection