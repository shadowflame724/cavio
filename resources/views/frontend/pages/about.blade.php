@extends('frontend.layouts.app_dev')
@section('head')
    <body class=about>
    <div id=wrapper-bg-history class=wrapper-bg></div>
    <div id=wrapper-bg-philosofhy class=wrapper-bg></div>
    <div id=wrapper-bg-mood class=wrapper-bg></div>
    @endsection
    @section('content')

<main id=main-scrollbar>

    <section id=about-history class=wrap-banner>
        <div class=banner-center>
            <div class=wrap-banner-cont>
                <h3 class=section-title>
                    <svg class=title-wave viewBox="0 0 1395.63 1237.68">
                        <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href=wave.svg#wave></use>
                    </svg>
                    {!! $page->blocks->get(0)->title !!}
                </h3>
                <div class=wrap-banner-about-descr>
                    <div class=banner-about-descr>{!! $page->blocks->get(0)->body !!}
                    </div>
                </div>
                <div class=banner-cont-read>
                    <a href=#under-about-history class=anim-underline>continue reading →</a>
                </div>
            </div>
        </div>
    </section>
    <section id=under-about-history class="under-history pull-on-banner">
        <div class="wrap-under-history clearfix">
            <div class=under-history-right>
                <div class="wrap-text-under-history-right anim-under-history">
                    <div class=title-under-history>{!! $page->blocks->get(1)->title !!}</div>
                    <div class="text-upline und-history">{!! $page->blocks->get(1)->body !!}</div>
                </div>
                <div class=wrap-image-und-history-r>
                    <div class="corner-text wrap-img-under-history anim-img-corn-bg wrap-img-under-history-right">
                        <div class="img-back dark">
                            <svg viewBox="0 0 1395.63 1237.68">
                                <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href=wave.svg#wave></use>
                            </svg>
                        </div>
                        <div class="corn-img corner-text" before="— Manhattan penthouse">
                            <img src=/upload/images/{!! $page->blocks->get(1)->image !!} alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class=under-history-left>
                <div class=wrap-image-und-history-l>
                    <div class="corner-text wrap-img-under-history anim-img-corn-bg wrap-img-under-history-left">
                        <div class="img-back dark">
                            <svg viewBox="0 0 1395.63 1237.68">
                                <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href=wave.svg#wave></use>
                            </svg>
                        </div>
                        <div class="corn-img corner-text" before="— Villa Cannes">
                            <img src=/img/frontend/{!! $page->blocks->get(2)->image !!} alt="">
                        </div>
                    </div>
                </div>
                <div class="text-upline und-history anim-under-history wrap-text-under-history-left">
                    {!! $page->blocks->get(2)->body !!}
                </div>
            </div>
        </div>
    </section>
    <section id=about-philosofhy class=wrap-banner>
        <div class=banner-center>
            <div class=wrap-banner-cont>
                <h3 class=section-title>
                    <svg class=title-wave viewBox="0 0 1395.63 1237.68">
                        <use xlink:href=wave.svg#wave></use>
                    </svg>
                    {!! $page->blocks->get(3)->title !!}
                </h3>
                <div class=wrap-banner-about-descr>
                    <div class=banner-about-descr>{!! $page->blocks->get(3)->body !!}
                    </div>
                </div>
                <div class=banner-cont-read>
                    <a href=#under-about-philosofhy class=anim-underline>continue reading →</a>
                </div>
            </div>
        </div>
    </section>
    <section id=under-about-philosofhy class=under-philosofhy>
        <div class=wrap-under-philosofhy>
            <div id=wrap-2-col-under-phil class="wrap-2-col-under-phil clearfix">
                <div class=column-under-phil>
                    {!! $page->blocks->get(4)->body !!}
                </div>
                <div class=column-under-phil>
                    <br class=noDesktop>
                    {!! $page->blocks->get(5)->body !!}
                </div>
            </div>
            <div class=wrap-freedom-under-phil>
                <div id=about-romb class=romb>
                    <div class=romb-right></div>
                    <div class=romb-middle>
                        <svg class=wave-romb viewBox="0 0 1395.63 1237.68">
                            <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href=wave.svg#wave></use>
                        </svg>
                    </div>
                    <div class=romb-left></div>
                </div>
                <div class=freedom-under-phil-text>
                    {!! $page->blocks->get(6)->body !!}
                </div>
            </div>
        </div>
    </section>
    <section id=about-mood class=wrap-banner>
        <div class=banner-center>
            <div class=wrap-banner-cont>
                <h3 class=section-title>
                    <svg class=title-wave viewBox="0 0 1395.63 1237.68">
                        <use xlink:href=wave.svg#wave></use>
                    </svg>
                    {!! $page->blocks->get(7)->title !!}
                </h3>
                <div class=wrap-banner-about-descr>
                    <div class=banner-about-descr>{!! $page->blocks->get(7)->body !!}
                    </div>
                </div>
                <div class=banner-cont-read>
                    <a href=#under-about-mood class=anim-underline>continue reading →</a>
                </div>
            </div>
        </div>
    </section>
    <section id=under-about-mood class=under-mood>
        {!! $page->blocks->get(8)->body !!}
        <div class="wrap-under-mood-text clearfix">
            <div class=col-under-mood-text>
                <div class=title-under-history>{!! $page->blocks->get(9)->title !!}</div>
                <div class=text-upline>{!! $page->blocks->get(9)->body !!}</div>
            </div>
            <div class=col-under-mood-text>
                <div class=title-under-history>{!! $page->blocks->get(10)->title !!}</div>
                <div class=text-upline>{!! $page->blocks->get(10)->body !!}</div>
            </div>
            <div class=col-under-mood-text>
                <div class=title-under-history>{!! $page->blocks->get(11)->title !!}</div>
                <div class=text-upline>{!! $page->blocks->get(11)->body !!}</div>
            </div>
        </div>
    </section>
@endsection
</main>
@section('after_footer')
<div id=wrap-page-indicators class=hide>
    <div class=wrap-relate-indicators>
        <div id=indicator-1 class=indicator><a href="#about-history"><span class=ind-numb>01</span> <span
                        class=wrap-ind-romb><div class=indicator-arrow></div><span class=ind-romb></span></span> <span
                        class=ind-name>history</span></a></div>
        <div id=indicator-2 class=indicator><a href="#about-philosofhy"><span class=ind-numb>02</span> <span
                        class=wrap-ind-romb><div class=indicator-arrow></div><span class=ind-romb></span></span> <span
                        class=ind-name>philosofhy</span></a></div>
        <div id=indicator-3 class=indicator><a href="#about-mood"><span class=ind-numb>03</span> <span
                        class=wrap-ind-romb><div class=indicator-arrow></div><span class=ind-romb></span></span> <span
                        class=ind-name>mood</span></a></div>
    </div>
</div>