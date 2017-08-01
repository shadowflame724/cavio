@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'zone-col')

@section('before_header')
    <div id="wrapper-bg-zone-col" class="wrapper-bg"></div>
@endsection

@section('content')
    <section class="wrap-banner no_space">
        <div class=wrap-banner-cont>
            <h3 class=section-title>{{ $zone->{'title'.$langSuf} }}
                <a href="{{ route('frontend.zones') }}"
                   class="back-zol_col anim-underline">← {{ trans('frontend.zones-collections.backToZones') }}</a>
                <svg class=title-wave viewBox="0 0 1395.63 1237.68">
                    <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href="../wave.svg#wave"></use>
                </svg>
            </h3>
        </div>
    </section>
    <section>
        <div class=container>
            <div class="zon-col-list clearfix z_c-list">
                @foreach($zone->collectionZones->groupBy('collection_id') as $collectionZones)
                @php($item = $collectionZones[0])
                @php($cnt = (!empty($item->product_ids)) ? count(explode(',', $item->product_ids)) : false)
                <div class="item-coll zon-col z_c-list to_modal">
                    <a href="{{ route('frontend.zones.show_popup', [$zone->slug, $item->collection->slug]) }}">
                        <div class="wrap-img-bg small">
                            <div class="img-back wave-dark">
                                <svg width=1395.63 height=1237.68><use xlink:href="../wave.svg#wave"></use></svg>
                            </div>
                            @php
                                $img = explode(',', $item->collection->image)[0];
                            @endphp
                            <img src=/upload/images/collection/horizontal/{{ $img }} alt="">
                        </div>
                        <div>
                            <div class=coll-name>{{ $item->collection->{'title'.$langSuf} }}
                                <span class=wrap-coll-name-arrow><span class=coll-name-arrow>→</span></span>
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