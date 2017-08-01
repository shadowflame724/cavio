@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'faq')

@section('before_header')
  <div id=wrapper-bg-faq class=wrapper-bg></div>
@endsection

@section('content')
    <section id="" class="wrap-banner">
      <div class="banner-center v-centering">
        <div class="wrap-banner-cont" data-anim="false">
          <h3 class="section-title">
            {{ trans('frontend.faq.title') }}
          </h3>
        </div>
      </div>
    </section>

    <section id="qa" class="pull-on-banner">

      <div class="container">
        <div class="ac-container">
          @foreach($faqs as $key => $faq)
          <div class="ac-item" data-anim="false">
            <input id="ac-{{ $key }}" name="accordion-{{ $key }}" type="checkbox" />
            <div class="ac-item-text-wrap">
              <div class="qa-item-wave-bg wave-dark"></div>
              <label for="ac-{{ $key }}" content="{!! $faq->{'question'.$langSuf} !!}">
                {!! $faq->{'question'.$langSuf} !!}
                <hr class="und-question-title">
              </label>
              <article>
                <p class="answer-text">
                  {!! $faq->{'answer'.$langSuf} !!}
                </p>
              </article>
            </div>
          </div>
          @endforeach

        </div>
      </div>

    </section>
    @endsection
