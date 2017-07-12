@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'zone-col')

@section('before_header')
  <div id="wrapper-bg-zone-col" class="wrapper-bg"></div>
@endsection

@section('content')
    <section id="" class="wrap-banner">
      <div class="wrap-banner-cont double">
        <h3 class="section-title">
          <div class="inner_wrap-double_title clearfix">
            <div class="wrap-title-item"><a href="{{ route('frontend.zones') }}" class="inner-title-item">{{ trans('frontend.zones-collections.zones') }}</a></div>
            <div class="wrap-title-item"><a href="{{ route('frontend.collections') }}" class="inner-title-item right active">{{ trans('frontend.zones-collections.collections') }}</a></div>
          </div>
        </h3>
      </div>
    </section>

    <section class="">
      <div class="container">
        <div class="zon-col-list clearfix">

          @foreach($collections as $collection)
            @if($collection->banner == 0)
              <div class="item-coll zon-col">
                <a href="{{ route('frontend.collections.show', $collection) }}">
                  <div class="wrap-img-bg small">
                    <div class="img-back wave-dark">
                      <svg width=1395.63 height=1237.68>
                        <use xlink:href=wave.svg#wave></use>
                      </svg>
                    </div>
                    <img src="/upload/images/{{ $collection->image }}" alt=""></div>
                  <div>
                    <div class=coll-name>
                      {{ $collection->{'title'.$langSuf} }}
                      <span class="wrap-coll-name-arrow"><span
                                class="coll-name-arrow">→</span></span></div>
                    <div class="numb-prod">69 {{ trans('frontend.zones-collections.products') }}</div>
                  </div>
                </a>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </section>
@endsection