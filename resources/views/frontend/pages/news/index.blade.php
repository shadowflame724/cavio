@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'news')

@section('before_header')
  <div id=wrapper-bg-news class=wrapper-bg></div>
@endsection

@section('content')
    <section class="wrap-banner">
      <div class="wrap-banner-cont">
        <h3 class="section-title">
          News
        </h3>
      </div>
    </section>

    <section id="news-data">
      <div class="news-data-wrap">
        <div id="wrap-news-type" class="wrap-news-types-list drop-down">
          <span class="curr-news-type"></span>
          <ul class="news-types-list">
            <li class="active"><a href=#>{{ trans('frontend.news.allNews') }}</a>
            <li><a href=#>{{ trans('frontend.news.pressa') }}</a>
            <li><a href=#>{{ trans('frontend.news.video') }}</a>
            <li><a href=#>{{ trans('frontend.news.showrooms') }}</a>
          </ul>
        </div>

        <div class="wrap-news-list">
          <div id="news-list" class="clearfix">
            @foreach($news as $item)

              <div class="news-item">
                @if($item->image)
                  <a href="{{ route('frontend.news', $item->slug) }}"><img class="news-item-img"
                                                                           src="upload/images/{{ $item->image }}"></a>
                @endif
                <div class="news-date">{{ $item->created_at->diffForHumans() }}</div>
                <a href="{{ route('frontend.news', $item->slug) }}" class="news-title">
                  {{ $item->{'title'.$langSuf} }}

                </a>
                @if($item->preview)
                  <div class="news-text">
                    {!! $item->{'preview'.$langSuf} !!}

                    <a href="{{  route('frontend.news', $item->slug) }}"
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