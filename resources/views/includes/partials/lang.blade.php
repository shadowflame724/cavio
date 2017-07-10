<ul class="dropdown-menu" role="menu">
    @foreach ($langPaths as $lang => $link)
        @if ($lang != App::getLocale())
        <li><a href="{{ $link }}/admin/dashboard">{{ trans('menus.language-picker.langs.'.$lang) }}</a></li>
        @endif
    @endforeach
</ul>