<!doctype html>
<html lang="{{ app()->getLocale() }}" class="backgroundblendmode">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $page->title }}</title>
        <meta name="description" content="">
        {{ $page->description }}
    </head>
    <body data-class="@yield('bodyClass')">
        <div id="before_header">@yield('before_header')</div>
        <div id="header">@include('frontend.includes.header')</div>
        <div id="login_modal">@include('frontend.includes.login_modal')</div>
        <div id="content">@yield('content')</div>
        <div id="footer">@include('frontend.includes.footer')</div>
        <div id="after_footer">@yield('after_footer')</div>
    </body>
</html>