@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'zone-col')

@section('before_header')
    <div id="wrapper-bg-zone-col" class="wrapper-bg"></div>
@endsection

@section('content')
    <section id="" class="wrap-banner no_space">
        <div class="wrap-banner-cont" data-anim="false">
            <h3 class="section-title">{{ $collection->{'title'.$langSuf} }}
                <a href="{{ route('frontend.collections') }}" class="back-zol_col anim-underline">← {{ trans('frontend.zones-collections.backToCollections') }}</a>
            </h3>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="zon-col-list clearfix z_c-list" data-anim="false">
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