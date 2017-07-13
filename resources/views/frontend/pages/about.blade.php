@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'about')

@section('before_header')
<div id="wrapper-bg-history" class="wrapper-bg"></div>
<div id="wrapper-bg-philosofhy" class="wrapper-bg"></div>
<div id="wrapper-bg-mood" class="wrapper-bg"></div>
@endsection

@section('content')
    <section id="about-history" class="wrap-banner">
      <div class="banner-center">
        <div class="wrap-banner-cont">
          <h3 class="section-title">
            {!! $page->blocks->get(0)->{'title'.$langSuf} !!}
          </h3>
          <div class="wrap-banner-about-descr">
            <div class="banner-about-descr">
              {!! $page->blocks->get(0)->{'body'.$langSuf} !!}
            </div>
          </div>
          <div class="banner-cont-read"><a href="#under-about-history" class="anim-underline">continue reading →</a></div>
        </div>
      </div>
    </section>
    <section id="under-about-history" class="under-history pull-on-banner">
      <div class="wrap-under-history clearfix">
        <div class="under-history-right">
          <div class="wrap-text-under-history-right anim-under-history">
            <div class="title-under-history">{!! $page->blocks->get(1)->{'title'.$langSuf} !!}
            </div>
            <div class="text-upline und-history">
              {!! $page->blocks->get(1)->{'body'.$langSuf} !!}
            </div>
          </div>
          <div class="wrap-image-und-history-r">
            <div class="corner-text wrap-img-under-history anim-img-corn-bg wrap-img-under-history-right">
              <div class="img-back dark">
                <svg viewBox="0 0 1395.63 1237.68">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="wave.svg#wave"></use>
                </svg>
              </div>
              <div class="corn-img corner-text" before="— Manhattan penthouse"><img src="/upload/images/{!! $page->blocks->get(1)->image !!}" alt=""></div>
            </div>
          </div>
        </div>
        <div class="under-history-left">
          <div class="wrap-image-und-history-l">
            <div class="corner-text wrap-img-under-history anim-img-corn-bg wrap-img-under-history-left">
              <div class="img-back dark">
                <svg viewBox="0 0 1395.63 1237.68">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="wave.svg#wave"></use>
                </svg>
              </div>
              <div class="corn-img corner-text" before="— Villa Cannes"><img src="/upload/images/{!! $page->blocks->get(2)->image !!}" alt=""></div>
            </div>
          </div>
          <div class="text-upline und-history anim-under-history wrap-text-under-history-left">
            {!! $page->blocks->get(2)->{'body'.$langSuf} !!}
          </div>
        </div>
    </section>

    <section id="about-philosofhy" class="wrap-banner">
      <div class="banner-center">
        <div class="wrap-banner-cont">
          <h3 class="section-title">
            {!! $page->blocks->get(3)->{'title'.$langSuf} !!}
          </h3>
          <div class="wrap-banner-about-descr">
            <div class="banner-about-descr">
              {!! $page->blocks->get(3)->{'body'.$langSuf} !!}
            </div>
          </div>
          <div class="banner-cont-read"><a href="#under-about-philosofhy" class="anim-underline">{{ trans('frontend.about.continueReading') }} →</a></div>
        </div>
      </div>
    </section>
    <section id="under-about-philosofhy" class="under-philosofhy">
      <div class="wrap-under-philosofhy">
        <div id="wrap-2-col-under-phil" class="wrap-2-col-under-phil">
          <div class="clearfix">
            <div class="column-under-phil">
              {!! $page->blocks->get(4)->{'body'.$langSuf} !!}
            </div>
            <div class="column-under-phil">
              <br class="noDesktop">
              {!! $page->blocks->get(5)->{'body'.$langSuf} !!}
            </div>
          </div>
        </div>

        <div class="wrap-freedom-under-phil">
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
            {!! $page->blocks->get(6)->{'body'.$langSuf} !!}

          </div>
        </div>
      </div>
    </section>

    <section id="about-mood" class="wrap-banner">
      <div class="banner-center">
        <div class="wrap-banner-cont">
          <h3 class="section-title">
            {!! $page->blocks->get(7)->{'title'.$langSuf} !!}

          </h3>
          <div class="wrap-banner-about-descr">
            <div class="banner-about-descr">
              {!! $page->blocks->get(7)->{'body'.$langSuf} !!}
            </div>
          </div>
          <div class="banner-cont-read"><a href="#under-about-mood" class="anim-underline">{{ trans('frontend.about.continueReading')}} →</a></div>
        </div>
      </div>
    </section>
    <section id="under-about-mood" class="under-mood">
      <div class="wrap-images-under-mood clearfix">
        <div class="images-under-mood-left">
          <div class="wrap-image-und-mood-l-t p-for-l">
            <a href="#" class="wrap-inner-img anim-img-corn-bg">
              <div class="img-back dark">
                <svg viewBox="0 0 1395.63 1237.68">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="wave.svg#wave"></use>
                </svg>
              </div>
              <div class="corn-img corner-text" before="— Villa Cannes"><img src="/upload/images/under-mood-l-t.jpg" alt=""></div>
            </a>
          </div>
          <div class="wrap-image-und-mood-l-b p-for-l">
            <a href="#" class="wrap-inner-img anim-img-corn-bg">
              <div class="img-back dark">
                <svg viewBox="0 0 1395.63 1237.68">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="wave.svg#wave"></use>
                </svg>
              </div>
              <div class="corn-img corner-text" before="— Villa Cannes"><img src="/upload/images/under-mood-l-b.jpg" alt=""></div>
            </a>
          </div>
        </div>
        <div class="images-under-mood-right">
          <div class="wrap-images-und-mood-r-t clearfix">
            <div class="wrap-image-und-mood-r-t">
              <a href="#" class="wrap-inner-img anim-img-corn-bg">
                <div class="img-back dark">
                  <svg viewBox="0 0 1395.63 1237.68">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="wave.svg#wave"></use>
                  </svg>
                </div>
                <div class="corn-img corner-text" before="— Manhattan penthouse"><img src="/upload/images/under-mood-r-t.jpg" alt=""></div>
              </a>
            </div>
            <div class="wrap-image-und-mood-m-t">
              <a href="#" class="wrap-inner-img anim-img-corn-bg">
                <div class="img-back dark">
                  <svg viewBox="0 0 1395.63 1237.68">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="wave.svg#wave"></use>
                </svg>
                </div>
                <div class="corn-img corner-text" before="— Manhattan penthouse"><img src="/upload/images/under-mood-m-t.jpg" alt=""></div>
              </a>
            </div>
          </div>
          <div class="wrap-image-und-mood-r-b">
            <a href="#" class="wrap-inner-img anim-img-corn-bg">
              <div class="img-back dark">
                <svg viewBox="0 0 1395.63 1237.68">
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="wave.svg#wave"></use>
                </svg>
              </div>
              <div class="corn-img corner-text" before="— Villa Cannes"><img src="/upload/images/under-mood-r-b.jpg" alt=""></div>
            </a>
          </div>
        </div>
        <div class="mood-big">
          <span id="inner-mood-big">mood</span>
        </div>
      </div>

      <div class="wrap-under-mood-text clearfix">
        <div class="col-under-mood-text">
          <div class="title-under-history">{!! $page->blocks->get(8)->{'title'.$langSuf} !!}
          </div>
          <div class="text-upline">{!! $page->blocks->get(8)->{'body'.$langSuf} !!}
          </div>
        </div>

        <div class="col-under-mood-text">
          <div class="title-under-history">{!! $page->blocks->get(9)->{'title'.$langSuf} !!}
          </div>
          <div class="text-upline">{!! $page->blocks->get(9)->{'body'.$langSuf} !!}
          </div>
        </div>

        <div class="col-under-mood-text">
          <div class="title-under-history">{!! $page->blocks->get(10)->{'title'.$langSuf} !!}</div>
          <div class="text-upline">{!! $page->blocks->get(10)->{'body'.$langSuf} !!}</div>
        </div>
      </div>
    </section>

@endsection

@section('after_footer')
  <div id=wrap-page-indicators class=hide>
    <div class=wrap-relate-indicators>
      <div id=indicator-1 class=indicator><a href="#about-history"><span class=ind-numb>01</span> <span
                  class=wrap-ind-romb><div class=indicator-arrow></div><span class=ind-romb></span></span>
          <span
                  class=ind-name>

                        {!! $page->blocks->get(0)->{'title'.$langSuf} !!}

                </span></a></div>
      <div id=indicator-2 class=indicator><a href="#about-philosofhy"><span class=ind-numb>02</span> <span
                  class=wrap-ind-romb><div class=indicator-arrow></div><span class=ind-romb></span></span>
          <span
                  class=ind-name>

                        {!! $page->blocks->get(3)->{'title'.$langSuf} !!}

                </span></a></div>
      <div id=indicator-3 class=indicator><a href="#about-mood"><span class=ind-numb>03</span> <span
                  class=wrap-ind-romb><div class=indicator-arrow></div><span class=ind-romb></span></span>
          <span
                  class=ind-name>

                        {!! $page->blocks->get(7)->{'title'.$langSuf} !!}

                </span></a></div>
    </div>
  </div>
@endsection