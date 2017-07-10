@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'privacy-policy')

@section('before_header')
    <div id=wrapper-bg-zone-col class=wrapper-bg></div>
@endsection

@section('content')
    <section id=top-waves class=relative></section>
    <section>
        <div class="container cont-priv_pol">
            <div class="wrap-privacy-policy hide">
                <div class=title-priv_pol>
                    {!! $page->{'title'.$langSuf} !!}

                </div>
                <div class=text-priv_pol>

                        {!! $page->{'body'.$langSuf} !!}

                </div>
            </div>
        </div>
    </section>
@endsection
