@extends('frontend.layouts.app_dev')
@section('head')
    <body class=privacy-policy>
    @endsection
    <div id=wrapper-bg-zone-col class=wrapper-bg></div>
    @section('content')


<div id=wrapper-bg-zone-col class=wrapper-bg></div>
<main id=main-scrollbar>
    <section id=top-waves class=relative></section>
    <section>
        <div class="container cont-priv_pol">
            <div class="wrap-privacy-policy hide">
                <div class=title-priv_pol>{!! $page->blocks->get(0)->title !!}</div>
                <div class=text-priv_pol>{!! $page->blocks->get(0)->body !!}</div>
            </div>
        </div>
    </section>
@endsection
</main>
