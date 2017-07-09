<!doctype html>
<html lang="{{ app()->getLocale() }}" class=" backgroundblendmode">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
        <title>{{ $page->title }}</title>
        <meta name="msapplication-tap-highlight" content="no">
        <link rel="manifest" href="manifest.json">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="application-name" content="{{ $page->title }}">
        {{ $page->description }}
        <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="{{ $page->title }}">
        <link rel="apple-touch-icon" href="images/touch/apple-touch-icon.png">
        <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#2F3BA2">
        <meta name="theme-color" content="#2F3BA2">
        {{ Html::style('css/frontend/main.css') }}
        {{ Html::style('css/frontend/smooth-scrollbar.css') }}
        <script async="" src="//www.google-analytics.com/analytics.js"></script>
        {{ Html::script('js/frontend/url.js') }}
        @include('frontend.includes.physics_script')
        {{ Html::script('js/frontend/two.js') }}
    </head>
    <body class="@yield('bodyClass')" id="@yield('bodyClass')">
        @yield('before_header')
        @include('frontend.includes.header')
        @include('frontend.includes.login_modal')

        <main id="main-scrollbar">
            @yield('content')
            @include('frontend.includes.footer')
        </main>

        @yield('after_footer')
        @include('frontend.includes.svg')

        @yield('before_scripts')
        <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js></script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery-color/2.1.2/jquery.color.min.js></script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/smooth-scrollbar/7.3.1/smooth-scrollbar.js></script>
        <script src=https://cdn.jsdelivr.net/jquery.bez/1.0.11/jquery.bez.min.js></script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.jquery.min.js></script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.min.js></script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js></script>
        {{ Html::script('js/frontend/main.js') }}
        @yield('after_scripts')

        @include('includes.partials.ga')
    </body>
</html>