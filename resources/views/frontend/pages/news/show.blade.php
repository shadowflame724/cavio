@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'privacy-policy')

@section('before_header')
  <div id=wrapper-bg-zone-col class=wrapper-bg></div>
@endsection

@section('content')
  <section id="top-waves" class="relative" data-page-type="popup"></section>
  <section>
    <div class="container cont-priv_pol">
      <div class="wrap-privacy-policy hide">
        <div class=title-priv_pol>{!! $news['name'.$langSuf] !!}</div>
        @if($news->image)<div class=text-priv_pol><img src="/upload/images/{!! $news->image !!}"></div>@endif
        <div class=text-priv_pol>{!! $news['body'.$langSuf] !!}</div>

      </div>
    </div>
  </section>
@endsection
