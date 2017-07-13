<header class="scroll">
    <div class="header-bg"></div>
    <div class="top-nav container">
        <div class="short-nav">
            <div class="short-nav-item">
                <a href="{{ route('frontend.catalogue') }}"
                   for="menu-products"
                   class="btn-top-menu anim-underline">{{ trans('frontend.header.products') }}</a>
            </div>
            <div class="short-nav-item">
                <a href="{{ route('frontend.collections') }}"
                   for="menu-collection"
                   class="btn-top-menu anim-underline">{{ trans('frontend.header.collections') }}</a>
            </div>
        </div>
        <div class="wrap-left-nav">
            <div class="inner-left-nav">
                <div class="wrap-left-nav-col-side">
                    <a href="#" class="drop-left-menu-products">{{ trans('frontend.header.products') }} <span class="drop-item-arrow">→</span></a>
                    <div class="left-nav-products">
                        <div class="wrap-menus products clearfix">
                            @foreach($categories as $category)
                                @if($category->parent_id == null)
                                <div class="top-menu-block">
                                    <div class="innet-top-menu-block">
                                        <a class="top-menu-title" href="{{ route('frontend.catalogue') }}">{{ $category->{'name'.$langSuf} }}</a>
                                        <ul class="top-menu-list">
                                            @foreach($category->children as $child)
                                            <li>
                                                <a href="{{ route('frontend.catalogue') }}">{{ $child->{'name'.$langSuf} }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="wrap-left-nav-col">
                    <div class="overfl-h-left-nav-col">
                        <div class="left-nav-inner">
                            <ul class="left-nav">
                                <li class="drop-item">
                                    <a href="#">{{ trans('frontend.header.collections') }} <span class="drop-item-arrow">→</span></a>
                                    <ul class="drop-item-menu">
                                        @foreach($collections as $collection)
                                        <li>
                                            <a href="#" class="anim-underline">{{ $collection->{'title'.$langSuf} }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="drop-item">
                                    <a href="#">{{ trans('frontend.header.zones') }} <span class="drop-item-arrow">→</span></a>
                                    <ul class="drop-item-menu">
                                        @foreach($zones as $zone)
                                        <li>
                                            <a href="#">{{ $zone->{'title'.$langSuf} }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.about') }}">{{ trans('frontend.header.about') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.showrooms') }}">{{ trans('frontend.header.showrooms') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.news') }}">{{ trans('frontend.header.news') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.faq') }}">{{ trans('frontend.header.faq') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ trans('frontend.header.payment') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('frontend.contacts') }}">{{ trans('frontend.header.contact') }}</a>
                                </li>
                            </ul>
                            <div class="wrap-login-lang">
                                <div class="wrap-login-side">
                                    <a href="#">
                                        <svg class="svg-login"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="../../img/frontend/icons/social.svg#login"></use></svg>
                                        <span>{{ trans('frontend.header.login') }}</span>
                                    </a>
                                </div>
                                <div class="side-lang-panel clearfix">
                                    @foreach($langPaths as $lang => $link)
                                    <a href="{{ $link }}" class="lang-item @if (App::getLocale() == $lang)active @endif">{{ $lang }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="wrap-search">
                                <form action="/search">
                                    <input class="menu-search" placeholder="{{ trans('frontend.header.search') }}">
                                    <button class="menu-search-btn"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-icon-wrap">
            <div class="table-c_m">
                <div class="nav-icon"><span></span> <span></span> <span></span></div>
            </div>
        </div>
        <div class="wrap-logo">
            <div class="inner-logo">
                <div class="relative">
                    <a href="/">
                        <svg class="svg-main-logo"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#main-logo"></use></svg>
                    </a>
                    <div class="lang-panel clearfix">
                        @foreach($langPaths as $lang => $link)
                        <a href="{{ $link }}" class="lang-item @if (App::getLocale() == $lang)active @endif">{{ $lang }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-right-top-menu">
            <div class="wrap-login">
                <a href="#" class="btn-login anim-underline">{{ trans('frontend.header.login') }}</a>
            </div>
            <div class="wrap-stash-ico">
                <a href="{{ route('frontend.stash') }}">
                    <svg class="svg-stash"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stash"></use></svg>
                </a>
            </div>
        </div>
    </div>
    <div id="top-menu">
        <div class="top-menu-box-wrap">
            <div id="menu-products" class="top-menu-box clearfix products">
                <div class="container">
                    <hr class="top-menu-line">
                    <div class="wrap-menus products clearfix">
                        @foreach($categories as $category)
                            @if($category->parent_id == null)
                            <div class="top-menu-block">
                                <div class="innet-top-menu-block">
                                    <a class="top-menu-title" href="{{ route('frontend.catalogue') }}">{{ $category->{'name'.$langSuf} }}</a>
                                    <ul class="top-menu-list">
                                        @foreach($category->children as $child)
                                        <li>
                                            <a href="{{ route('frontend.catalogue') }}">{{ $child->{'name'.$langSuf} }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="menu-collection" class="top-menu-box clearfix collection">
                <div class="container">
                    <hr class="top-menu-line">
                    <div class="wrap-menus clearfix overfl-h">
                        <div class="wrap-menu-zones">
                            <div class="inner-menu-zones">
                                <a class="top-menu-title" href="#">{{ trans('frontend.header.zones') }}</a>
                                <ul class="top-menu-list">
                                    @foreach($zones as $zone)
                                    <li>
                                        <a href="#" class="anim-underline light-underline">{{ $zone->{'title'.$langSuf} }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="wrap-menu-collections">
                            <div class="inner-menu-collections">
                                <a class="top-menu-title" href="#">{{ trans('frontend.header.collections') }}</a>
                                <ul class="top-menu-list">
                                    @foreach($collections as $collection)
                                    <li>
                                        <a href="#" class="anim-underline light-underline">{{ $collection->{'title'.$langSuf} }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="wrap-menu-img">
                            <div class="sprite-wrap-coll-top-menu-img">
                                <div class="sprited-img first"></div>
                                <div class="sprited-img last"></div>
                            </div>
                            <div class=wrap-coll-top-menu-img
                                 style="background-image: url('../../img/frontend/top-menu-collections.jpg')"></div>
                            <div class=wrap-coll-top-menu-img
                                 style="background-image: url('../../img/frontend/top-menu-collections2.jpg')"></div>
                            <div class=wrap-coll-top-menu-img
                                 style="background-image: url('../../img/frontend/top-menu-collections3.jpg')"></div>
                            <div class=wrap-coll-top-menu-img
                                 style="background-image: url('../../img/frontend//top-menu-collections4.jpg')"></div>
                            <div class=wrap-coll-top-menu-img
                                 style="background-image: url('../../img/frontend/top-menu-collections3.jpg')"></div>
                            <div class=wrap-coll-top-menu-img
                                 style="background-image: url('../../img/frontend/top-menu-collections2.jpg')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
