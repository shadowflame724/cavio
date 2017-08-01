@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'privacy-policy')

@section('content')
    <section id="top-waves" class="relative"></section>
    <div class="container pres-des-conteiner hide">
        <div class="head-pres_des">
            <a href="/" class="link-back-press_des anim-underline">← cavio</a>
            <div class="wrap-title-pres_des">
                <div class="title-pres_des">Thank you for visiting us at Salone del Mobile 2017</div>
                <div class="under_title-pres_des">For any questions please write us an e-mail to <a
                            href="mailto:sales@cavio.it" class="colored_link anim-underline">sales@cavio.it</a></div>
            </div>
        </div>
        <div class="wrap-press-design">
            <div id="table-press-design"></div>
            <div class="wrap-swiper-press_design">
                <div class="wrap-log_reg-toggle pres_des-toggle">
                    <div class="item-log_reg-toggle log">design kit</div>
                    <div class="item-log_reg-toggle reg">press kit</div>
                </div>
                <div class="swiper-wrapper wrap-press-design-items">
                    <div class="item-press-design swiper-slide">
                        <div class="table-press-design">
                            <div class="tr thead-press-design">
                                <div class="td numb">#</div>
                                <div class="td file_name" data-keySort="data-name"><span class="wrap-for_arrow">File Name</span>
                                </div>
                                <div class="td download_link" data-keySort="data-link"><span class="wrap-for_arrow">Download links</span>
                                </div>
                                <div class="td date" data-keySort="data-date"><span class="wrap-for_arrow">Date</span>
                                </div>
                            </div>
                            @foreach($documents as $key => $document)
                                @if($document->type == 0)
                                    <div class="tr data"
                                         data-name="{{ $document->name }}"
                                         data-link="Catalog/Technical Book"
                                         data-date="{{ $document->created_at}}">
                                        <div class="td numb">{{ $key+1 }}</div>
                                        <div class="td file_name">
                                            <div class="tabel-field-name">File Name</div>
                                            {{ $document->name }}
                                        </div>
                                        <div class="td download_link">
                                            <div class="tabel-field-name">Download links</div>
                                            {!! $document->link !!}</div>
                                        <div class="td date">
                                            <div class="tabel-field-name">date</div>
                                            {{ $document->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="item-press-design swiper-slide">
                        <div class="table-press-design">
                            <div class="tr thead-press-design">
                                <div class="td numb">#</div>
                                <div class="td file_name" data-keySort="data-name"><span class="wrap-for_arrow">File Name</span>
                                </div>
                                <div class="td download_link" data-keySort="data-link"><span class="wrap-for_arrow">Download links</span>
                                </div>
                                <div class="td date" data-keySort="data-date"><span class="wrap-for_arrow">Date</span>
                                </div>
                            </div>
                            @foreach($documents as $key => $document)
                                @if($document->type == 1)
                                    <div class="tr data"
                                         data-name="{{ $document->name }}"
                                         data-link="Catalog/Technical Book" data-date="{{ $document->created_at }}">
                                        <div class="td numb">1</div>
                                        <div class="td file_name">
                                            <div class="tabel-field-name">File Name</div>
                                            <a href="#">{{ $document->name }}</a>
                                        </div>
                                        <div class="td download_link">
                                            <div class="tabel-field-name">Download links</div>
                                            {!! $document->link !!}</div>
                                    </div>
                                    <div class="td date">
                                        <div class="tabel-field-name">date</div>
                                        {{ $document->created_at->diffForHumans() }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection