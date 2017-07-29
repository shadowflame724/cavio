<header>
    <div class="header-bg"></div>
    <div class="top-nav container">
        <div class="short-nav">
            <div class="short-nav-item hide">
                <a href="{{ route('frontend.catalogue') }}"
                   for="menu-products"
                   class="btn-top-menu anim-underline">products</a>
            </div>
            <div class="short-nav-item hide">
                <a href="{{ route('frontend.collections') }}"
                   for="menu-collection"
                   class="btn-top-menu anim-underline">collections</a>
            </div>
        </div>
        <div class="wrap-left-nav">
            <div class="inner-left-nav">
                <div class="wrap-left-nav-col-side">
                    <a href="{{ route('frontend.catalogue') }}"
                       class="drop-left-menu-products"
                    >products <span class="drop-item-arrow">→</span></a>
                    <div class="left-nav-products">
                        <div class="wrap-menus products clearfix">
                            @foreach($categories as $category)
                            @if($category->parent_id == null)
                            <div class="top-menu-block">
                                <div class="innet-top-menu-block">
                                    <a class="top-menu-title"
                                       href="{{ route('frontend.catalogue.one', $category->slug) }}">{{ $category->{'name'.$langSuf} }}</a>
                                    <ul class="top-menu-list">
                                        @foreach($category->children as $child)
                                        <li>
                                            <a href="{{ route('frontend.catalogue.one', $category->slug) }}">{{ $child->{'name'.$langSuf} }}</a>
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
                                <!-- NO DESKTOP -->
                                <li class="drop-item">
                                    <a href="{{ route('frontend.collections') }}">collections <span class="drop-item-arrow">→</span></a>
                                    <ul class="drop-item-menu">
                                        @foreach($collections as $collection)
                                        <li>
                                            <a href="{{ route('frontend.collections.show', $collection->slug) }}"
                                               class="anim-underline"
                                            >{{ $collection->{'title'.$langSuf} }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li class="drop-item">
                                    <a href="{{ route('frontend.zones') }}"
                                    >zones <span class="drop-item-arrow">→</span></a>
                                    <ul class="drop-item-menu">
                                        @foreach($zones as $zone)
                                        <li>
                                            <a href="{{ route('frontend.zones.show', $zone->slug) }}"
                                               class="anim-underline"
                                            >{{ $zone->{'title'.$langSuf} }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <!-- END NO DESKTOP -->

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
                                    <a href="{{ route('frontend.auth.login') }}">
                                        <svg class="svg-login">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 xlink:href="../../img/frontend/icons/social.svg#login"></use>
                                        </svg>
                                        <span>Login</span>
                                    </a>
                                </div>
                                <div class="side-lang-panel clearfix">
                                    @foreach($langPaths as $lang => $link)
                                    <a href="{{ $link }}"
                                       class="lang-item @if (App::getLocale() == $lang)active @endif"
                                    >{{ $lang }}</a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="wrap-search">
                                <form action="/search">
                                    <input class="menu-search" type="text" placeholder="SEARCH">
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
                <div class="nav-icon hide">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="wrap-logo">
            <div class="inner-logo">
                <div class="relative">
                    <a href="/">
                        <svg class="svg-main-logo">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#main-logo"></use>
                        </svg>
                    </a>
                    <div class="lang-panel hide clearfix">
                        @foreach($langPaths as $lang => $link)
                        <a href="{{ $link }}"
                           class="lang-item @if (App::getLocale() == $lang)active @endif"
                        >{{ $lang }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-right-top-menu">
            <div class="wrap-login hide">
                <a href="{{ route('frontend.auth.login') }}" class="btn-login anim-underline">login</a>
            </div>
            <div class="wrap-stash-ico hide">
                <a href="{{ route('frontend.basket.index') }}">
                    <svg class="svg-stash">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stash"></use>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div id="top-menu">
        <div class="top-menu-box-wrap">
            <div id="menu-products" class="top-menu-box clearfix products">
                <div class="container forTopMenuScroll">
                    <hr class="top-menu-line">

                    <div class="topMenuScroll">
                        <div class="wrap-menus products clearfix">
                            @foreach($categories as $category)
                            @if($category->parent_id == null)
                            <div class="top-menu-block">
                                <div class="innet-top-menu-block">
                                    <a class="top-menu-title"
                                       href="{{ route('frontend.catalogue.one', $category->slug) }}"
                                    >{{ $category->{'name'.$langSuf} }}</a>
                                    <ul class="top-menu-list">
                                        @foreach($category->children as $child)
                                        <li>
                                            <a href="{{ route('frontend.catalogue.one', $child->slug) }}"
                                            >{{ $child->{'name'.$langSuf} }}</a>
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
            </div>
            <div id="menu-collection" class="top-menu-box clearfix collection">
                <div class="container">
                    <hr class="top-menu-line">

                    <div class="wrap-menus clearfix">
                        <div class="wrap-menu-zones">
                            <div class="inner-menu-zones">
                                <a class="top-menu-title"
                                   href="{{ route('frontend.zones') }}"
                                >zones</a>
                                <ul class="top-menu-list no-mb clearfix">
                                    @foreach($zones as $zone)
                                    <li>
                                        <a href="{{ route('frontend.zones.show', $zone->slug) }}"
                                           class="anim-underline light-underline"
                                        >{{ $zone->{'title'.$langSuf} }}</a>
                                        <div class="wrap-coll-top-menu-img"
                                             style="background-image: url('/upload/images/zone/thumb/{{ $zone->getOneImage() }}');"></div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="wrap-menu-collections">
                            <div class="inner-menu-collections">
                                <a class="top-menu-title"
                                   href="{{ route('frontend.collections') }}"
                                >collections</a>
                                <ul class="top-menu-list no-mb">
                                    @foreach($collections as $collection)
                                    <li>
                                        <a href="{{ route('frontend.collections.show', $collection->slug) }}"
                                           class="anim-underline light-underline"
                                        >{{ $collection->{'title'.$langSuf} }}</a>
                                        <div class="wrap-coll-top-menu-img"
                                             style="background-image: url('/upload/images/collection/thumb/{{ $collection->image }}');"></div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>