@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'contacts')

@section('before_header')
    <div id="wrapper-bg-contacts" class="wrapper-bg"></div>
@endsection

@section('content')
    <section id="" class="wrap-banner">
        <div class="banner-center v-centering">
            <div class="wrap-banner-cont">
                <h3 class="section-title">
                    {{ trans('frontend.contacts.title') }}
                </h3>
            </div>
        </div>
    </section>

    <section id="contacts" class="pull-on-banner">
        <div class="cont-container">
            <div class="cont-top clearfix">
                <div class="cont-col right">
                    <div id="cont-text-r-t" class="anim-under-history wrap-text-under-history-right">
                        <div class="title-under-history">{!! $page->blocks->get(0)->{'title'.$langSuf} !!}
                        </div>
                        <div class="text-upline und-history">
                            {!! $page->blocks->get(0)->{'body'.$langSuf} !!}
                        </div>
                    </div>

                    <div class="wrap-cont-col-r">
                        <div class="transl_15 anim-img-corn-bg wrap-img-under-history-right wrap-img-cont-r-b m-r-30">
                            <div class="img-back dark">
                                <svg viewBox="0 0 1395.63 1237.68">
                                    <use xlink:href="wave.svg#wave"></use>
                                </svg>
                            </div>
                            <div class="corn-img"><img src="/upload/images/{{ $page->blocks->get(0)->image }}"></div>
                        </div>
                    </div>
                </div>
                <div class="cont-col">
                    <div class="wrap-map-tablet">
                        <div id="wrap-cont-map"
                             class="transl_15 anim-img-corn-bg wrap-img-under-history-right anim-under-history m-r-30 wrap-cont-map">
                            <div class="img-back dark">
                                <svg viewBox="0 0 1395.63 1237.68">
                                    <use xlink:href="wave.svg#wave"></use>
                                </svg>
                            </div>
                            <div class="corn-img">
                                <img src="/upload/images/{{ $page->blocks->get(1)->image }}" alt="">
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>

                    <div id="form-mail" class="form-mail anim-under-history">
                        <div class="form-mail-title">
                            {{ trans('frontend.contacts.sayHello') }}!
                        </div>

                        <form action="{{ route('frontend.message.store') }}" method="post" class=clearfix>
                            <div class="clearfix">
                                <div class="cont-input-wrap"><input name="name"
                                                                    placeholder="{{ trans('frontend.contacts.name') }}">
                                </div>
                                <div class="cont-input-wrap"><input name="email"
                                                                    placeholder="{{ trans('frontend.contacts.email') }}">
                                </div>
                            </div>

                            <textarea name="message" placeholder="{{ trans('frontend.contacts.message') }}"></textarea>
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}"/>

                            <button class="btn small-txt p-0"
                                    content="{{ trans('frontend.contacts.sendMessage') }}">{{ trans('frontend.contacts.sendMessage') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="cont-bot">
                <div class="transl_15 anim-img-corn-bg wrap-img-under-history-right wrap-cont-b m-r-30">
                    <div class="img-back dark">
                        <svg viewBox="0 0 1395.63 1237.68">
                            <use xlink:href="wave.svg#wave"></use>
                        </svg>
                    </div>
                    <div class="corn-img"><img src="/upload/images/{{ $page->blocks->get(2)->image }}"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('after_scripts')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1xLO3VGBa4uCTPirOZAU0TpDGC3s7lzE&callback">
    </script>
@endsection
