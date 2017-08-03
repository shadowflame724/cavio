<!doctype html>
<html lang="{{ app()->getLocale() }}" class=" backgroundblendmode">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
        <title>{{ (isset($page->title))?$page->title:ENV('APP_NAME') }}</title>
        <meta name="msapplication-tap-highlight" content="no">
        <link rel="manifest" href="manifest.json">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="application-name" content="{{ (isset($page->title))?$page->title:ENV('APP_NAME') }}">
        <meta name="description" content="{{ (isset($page->description))?$page->description:ENV('APP_NAME') }}">

        <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="{{ (isset($page->title))?$page->title:ENV('APP_NAME') }}">
        <link rel="apple-touch-icon" href="images/touch/apple-touch-icon.png">
        <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#2F3BA2">
        <meta name="theme-color" content="#2F3BA2">
        {{ Html::style('css/frontend/smooth-scrollbar.css') }}
        {{ Html::style('css/frontend/swiper.min.css') }}
        {{ Html::style(mix('css/frontend.css')) }}
        <script async="" src="//www.google-analytics.com/analytics.js"></script>
        {{ Html::script('js/frontend/url.js') }}
        @include('frontend.includes.physics_script')
        {{ Html::script('js/frontend/two.js') }}
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body class="@yield('bodyClass')" id="@yield('bodyClass')">
    @php
        $path = Request::path();
        if($path == '/'){
            $path = '';
        }
    @endphp
        <div id="before_header">
            @yield('before_header')
        </div>
        @include('frontend.includes.header')
        @include('frontend.includes.login_modal')
        @include('frontend.includes.popups')

        <main id="main-scrollbar" data-page="/{{$path}}">
            @yield('content')
            @include('frontend.includes.footer')
        </main>

        <div id="after_footer">
            @yield('after_footer')
        </div>
        @include('frontend.includes.svg')

        @yield('before_scripts')
        {{ Html::script(mix('js/vendor.js')) }}
        {{ Html::script(mix('js/frontend.js')) }}
        @yield('after_scripts')
        <script>
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        </script>
        @include('includes.partials.ga')
    </body>
</html>