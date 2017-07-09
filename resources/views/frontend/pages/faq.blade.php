@extends('frontend.layouts.app_dev')

@section('bodyClass', 'faq')

@section('before_header')
<div id=wrapper-bg-faq class=wrapper-bg></div>
@endsection

@section('content')
<section class=wrap-banner>
    <div class="banner-center v-centering">
        <div class=wrap-banner-cont>
            <h3 class=section-title>
                {{ trans('frontend.faq.title') }}
                <svg class=title-wave viewBox="0 0 1395.63 1237.68">
                    <use xmlns:xlink=http://www.w3.org/1999/xlink xlink:href=wave.svg#wave></use>
                </svg>
            </h3>
        </div>
    </div>
</section>
<section id="qa" class="pull-on-banner">
        <div class="container">
            <div class="ac-container">
                @foreach($faqs as $key => $faq)
                <div class="ac-item"><input id="ac-{{$key}}" name="accordion-{{$key}}" type="checkbox">
                    <div class="ac-item-text-wrap">
                        <div class="qa-item-wave-bg wave-dark"
                             style="background-position: 50% 19.0997%;"></div>
                        <label for="ac-{{$key}}"
                               content="@if (App::getLocale() == 'ru')
                                        {!! $faq->question_ru !!}
                                        @elseif(App::getLocale() == 'it')
                                        {!! $faq->question_it !!}
                                        @else
                                        {!! $faq->question !!}
                                        @endif ">
                            @if (App::getLocale() == 'ru')
                                {!! $faq->question_ru !!}
                            @elseif(App::getLocale() == 'it')
                                {!! $faq->question_it !!}
                            @else
                                {!! $faq->question !!}
                            @endif
                            <hr class="und-question-title">
                        </label>
                        <article><p class="answer-text">
                            @if (App::getLocale() == 'ru')
                                {!! $faq->answer_ru !!}
                            @elseif(App::getLocale() == 'it')
                                {!! $faq->answer_it !!}
                            @else
                                {!! $faq->answer !!}
                            @endif
                        </article>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection