@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'privacy-policy')

@section('before_header')
  <div id=wrapper-bg-zone-col class=wrapper-bg></div>
@endsection

@section('content')
<section id="news-item" class="zone-col-modal item_cart news-modal" data-page-type="popup" data-anim="false">
  <div class="wrapper-zone-col-modal">
    <div class="scroller scroller-zc-modal">
      <div class="scroller-inner">
        <div class="close-modal"></div>
        <div class="inner-zone-col-modal bg-white-marmur relative">
          <div class="wrap-privacy-policy news">
            <div class="title-priv_pol">{!! $news['title'.$langSuf] !!}</div>
            @if($news->image)<div class="text-priv_pol"><img src="/upload/images/{!! $news->image !!}"></div>@endif
            <div class="text-priv_pol">{!! $news['body'.$langSuf] !!}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
