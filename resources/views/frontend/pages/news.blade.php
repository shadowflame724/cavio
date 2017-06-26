@extends('frontend.layouts.app_dev')
@section('head')
<body id=news class=news>
@endsection
<div id=wrapper-bg-news class=wrapper-bg></div>
@section('content')

<main id=main-scrollbar>
    <section class=wrap-banner>
        <div class=wrap-banner-cont>
            <h3 class=section-title>News
                <svg class=title-wave viewBox="0 0 1395.63 1237.68">
                    <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href=wave.svg#wave></use>
                </svg>
            </h3>
        </div>
    </section>
    <section id=news-data>
        <div class=news-data-wrap>
            <div id=wrap-news-type class="wrap-news-types-list drop-down"><span class=curr-news-type></span>
                <ul class=news-types-list>
                    <li class=active><a href=#>All news</a>
                    <li><a href=#>Pressa</a>
                    <li><a href=#>Video</a>
                    <li><a href=#>Showrooms</a>
                </ul>
            </div>
            <div class=wrap-news-list>
                <div id=news-list class=clearfix>
                    @foreach($news as $item)
                        <div class="news-item">
                            @if($item->image)
                                <a href="{{ route('frontend.news', $item->slug) }}"><img class="news-item-img"
                                                                  src="upload/images/{{ $item->image }}"></a>
                            @endif
                            <div class="news-date">{{ $item->created_at->diffForHumans() }}</div>
                            <a href="{{ route('frontend.news', $item->slug) }}" class="news-title">{!! $item->title !!}</a>
                            @if($item->preview)
                                <div class="news-text">{!! $item->preview !!}<a
                                            href="{{  route('frontend.news', $item->slug) }}"
                                            class="link-arrow">→</a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endsection

