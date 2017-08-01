@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'showrooms')

@section('before_header')
    <div id="wrapper-bg" class="wrapper-bg"></div>

@endsection

@section('content')
    <section id="banner" class="wrap-banner-main show_r hide">
        <div id="wrap-banner-img-box"></div>
        <img class="banner-shadow-top" src="/upload/images/banner-shadow-top.png" alt="">
    </section>

    <section id="" class="wrap-banner show_r">
        <div class="banner-center v-centering">
            <div class="wrap-banner-cont">
                <h3 class="section-title no-wave">{{ trans('frontend.showrooms.title') }}</h3>
            </div>
        </div>
    </section>

    <section id="dealers" class="hide">
        <div id="waves-content"></div>
        <div class="container">
            <div class="small-page-title hide 12"><span
                        class="text-title">{{ trans('frontend.showrooms.title') }}</span></div>

            <div id="wrap-letter-list" class="wrap-news-types-list drop-down show_r show">
                <span class="curr-news-type"></span>
                <ul class="news-types-list">
                    <li class="active"><a href="#">{{ trans('frontend.showrooms.all') }}</a></li>
                    @php($count=1)
                    @foreach($showrooms as $key => $showroom)
                        <li><a href="#">{{ $key }}</a></li>
                        @if($count == 8)
                            <br class="desktop-only">
                        @endif
                        @php($count++)
                    @endforeach
                </ul>
            </div>

            <div id="dealers-list" class="wrap-dealers clearfix">
                <div class="dealers-col">
                    @foreach($showrooms as $key => $showroom)
                        <div class="item-dealers hide">
                            <div class="deal-title">{{ $key }}</div>
                            @foreach($showroom as $item)
                                <div class="wrap-deal_contacts">
                                    <div class="deal-addr-row">{{ $item->name }}</div>
                                    <div class="deal-addr-row">{{ $item->city }}</div>
                                    <div class="deal-addr-row">{{ $item->address }}</div>
                                    @if($item->phone)
                                        <a href="tel:{{ $item->phone }}" class="deal-addr-row">T. {{ $item->phone }}</a>
                                        <br>
                                    @endif
                                    @if($item->phone2)
                                        <a href="tel:{{ $item->phone2 }}"
                                           class="deal-addr-row">T. {{ $item->phone2 }}</a><br>
                                    @endif
                                    @if($item->fax)
                                        <a href="tel:{{ $item->fax }}" class="deal-addr-row">F. {{ $item->fax }}</a><br>
                                    @endif
                                    @if($item->email)
                                        <a href="mailto:{{ $item->email }}"
                                           class="colored_link anim-underline">{{ $item->email }}</a><br>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="carousel-show_r" class="carousel-show_r">
        <div class="container pad_0">
            <div class="wrap-carousel-show_r">
                <div class="swiper-wrapper">
                    <div class="swiper-slide show_r-slide"><img src="/upload/images/{{ $page->blocks->get(0)->image }}"
                                                                alt=""></div>
                    <div class="swiper-slide show_r-slide"><img src="/upload/images/{{ $page->blocks->get(1)->image }}"
                                                                alt=""></div>
                    <div class="swiper-slide show_r-slide"><img src="/upload/images/{{ $page->blocks->get(2)->image }}"
                                                                alt=""></div>
                </div>
            </div>
        </div>
    </section>

    <section id="main-showroom">
        <div class="container">
            <div class="wrap-freedom-under-phil show_r">
                <div id="about-romb" class="romb">
                    <div class="romb-right"></div>
                    <div class="romb-middle">
                        <svg class="wave-romb" viewBox="0 0 1395.63 1237.68">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="wave.svg#wave"></use>
                        </svg>
                    </div>
                    <div class="romb-left"></div>
                </div>

                <div class="freedom-under-phil-text">
                    {!! $page->blocks->get(3)->{'body'.$langSuf} !!}
                </div>
            </div>

            <div id="main-show_r" class="wrap-philosophy a main_show_r clearfix" data-anim="false">
                <div class="phil-left">
                    <div class="wrap-img-bg philosophy-img">
                        <div class="img-back wave-dark">
                            <svg viewBox="0 0 1395.63 1237.68">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="wave.svg#wave"></use>
                            </svg>
                        </div>
                        <img src="/upload/images/{{ $page->blocks->get(4)->image }}" alt="">
                    </div>
                </div>
                <div class="phil-right">
                    <div class="title-main-show_r">{!! $page->blocks->get(4)->{'title'.$langSuf} !!}</div>
                    <div class="wrap-main-show_r-contacts">
                        {!! $page->blocks->get(4)->{'body'.$langSuf} !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after_scripts')
    <script>
        var coordinates = {!! $coordinates !!};
        Scrollbar.initAll();
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1xLO3VGBa4uCTPirOZAU0TpDGC3s7lzE&callback=initShowRMap">
    </script>
@endsection