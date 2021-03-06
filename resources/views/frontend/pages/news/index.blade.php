@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'news')

@section('before_header')
  <div id=wrapper-bg-news class=wrapper-bg></div>
@endsection

@section('content')
    <section class="wrap-banner">
      <div class="wrap-banner-cont" data-anim="false">
        <h3 class="section-title">
          News
        </h3>
      </div>
    </section>

    <section id="news-data">
      <div class="news-data-wrap">
        <div id="wrap-news-type" class="wrap-news-types-list drop-down" data-anim="false">
          <span class="curr-news-type"></span>
          <ul class="news-types-list">
            <li class="active"><a href=#>{{ trans('frontend.news.allNews') }}</a>
            @if(!empty($news_types_data))
            @foreach($news_types_data as $key => $news_type)
            <li><a href=# data-type="{{$key}}">{{$news_type['name'.$langSuf]}}</a>
            @endforeach
            @endif
          </ul>
        </div>

        <div class="wrap-news-list" data-anim="false">
          <div id="news-list" class="clearfix">
            @foreach($news as $item)
              <div class="news-item" data-type="{{$item->type}}">
                @if($item->image)
                  <a href="{{ route('frontend.news.show', $item->slug) }}">
                      <img class="news-item-img" src="upload/images/{{ $item->image }}">
                  </a>
                @endif
                <div class="news-date">{{ $item->created_at->diffForHumans() }}</div>
                <a href="{{ route('frontend.news.show', $item->slug) }}"
                   class="news-title"
                >{{ $item->{'title'.$langSuf} }}</a>
                @if($item->preview)
                  <div class="news-text">{!! $item->{'preview'.$langSuf} !!}
                    <a href="{{  route('frontend.news.show', $item->slug) }}" class="link-arrow">→</a>
                  </div>
                @endif
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
@endsection