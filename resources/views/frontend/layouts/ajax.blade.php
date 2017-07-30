<!doctype html>
<html lang="{{ app()->getLocale() }}" class="backgroundblendmode">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ (isset($page->title))?$page->title:ENV('APP_NAME') }}</title>
        <meta name="description" content="">
        {{ (isset($page->description))?$page->description:ENV('APP_NAME') }}
    </head>
    <body data-class="@yield('bodyClass')">
    @php
        $path = Request::path();
        if($path == '/'){
            $path = '';
        }
    @endphp
        <div id="before_header">@yield('before_header')</div>
        <div id="header">@include('frontend.includes.header')</div>
        <div id="content" data-page="/{{$path}}">@yield('content')</div>
        <div id="footer">@include('frontend.includes.footer')</div>
        <div id="after_footer">@yield('after_footer')</div>
    </body>
</html>