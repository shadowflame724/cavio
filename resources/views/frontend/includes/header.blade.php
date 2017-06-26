<header class="scroll">
    <div class="header-bg"></div>
    <div class="top-nav container">
        <div class="short-nav">
            <div class="short-nav-item"><a href="{{ route('frontend.catalogue') }}" for="menu-products"
                                           class="btn-top-menu anim-underline">products</a></div>
            <div class="short-nav-item"><a href="{{ route('frontend.collections') }}" for="menu-collection"
                                           class="btn-top-menu anim-underline">collections</a></div>
        </div>
        <div class="wrap-left-nav">
            <div class="inner-left-nav">
                <div class="wrap-left-nav-col-side"><a href="#" class="drop-left-menu-products">products <span
                                class="drop-item-arrow">→</span></a>
                    <div class="left-nav-products">
                        <div class="wrap-menus products clearfix">
                            @foreach($categories as $category)
                                @if($category->parent_id == null)
                                    <div class="top-menu-block">
                                        <div class="innet-top-menu-block"><a class="top-menu-title"
                                                                             href="{{ route('frontend.catalogue') }}">{{ $category->name }}</a>
                                            <ul class="top-menu-list">
                                                @foreach($category->children as $child)
                                                    <li>
                                                        <a href="{{ route('frontend.catalogue') }}">{{ $child->name }}</a>
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
                                <li class="drop-item"><a href="#">collections <span class="drop-item-arrow">→</span></a>
                                    <ul class="drop-item-menu">
                                        @foreach($collections as $collection)

                                            <li><a href="#" class="anim-underline">{{ $collection->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="drop-item"><a href="#">zones <span class="drop-item-arrow">→</span></a>
                                    <ul class="drop-item-menu">
                                        @foreach($zones as $zone)
                                            <li><a href="#">{{ $zone->title }}</a>
                                            </li>                                                                                                                                                                                                                                                               @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ route('frontend.about') }}">about</a></li>
                                <li><a href="{{ route('frontend.showrooms') }}">showrooms</a></li>
                                <li><a href="{{ route('frontend.news') }}">news</a></li>
                                <li><a href="{{ route('frontend.faq') }}">faq</a></li>
                                <li><a href="#">payments &amp; delivery</a></li>
                                <li><a href="{{ route('frontend.contacts') }}">contact us</a></li>
                            </ul>
                            <div class="wrap-login-lang">
                                <div class="wrap-login-side"><a href="#">
                                        <svg class="svg-login">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 xlink:href="images/icons/social.svg#login"></use>
                                        </svg>
                                        <span>Login</span></a></div>
                                <div class="side-lang-panel clearfix"><a href="#" class="lang-item active">en</a> <a
                                            href="#" class="lang-item">it</a> <a href="#" class="lang-item">ru</a></div>
                            </div>
                            <div class="wrap-search">
                                <form action=""><input class="menu-search" placeholder="SERACH">
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
                <div class="relative"><a href="/">
                        <svg class="svg-main-logo">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#main-logo"></use>
                        </svg>
                    </a>
                    <div class="lang-panel clearfix"><a href="#" class="lang-item active">en</a> <a href="#"
                                                                                                    class="lang-item">it</a>
                        <a href="#" class="lang-item">ru</a></div>
                </div>
            </div>
        </div>
        <div class="wrap-right-top-menu">
            <div class="wrap-login"><a href="#" class="btn-login anim-underline">login</a></div>
            <div class="wrap-stash-ico"><a href="{{ route('frontend.stash') }}">
                    <svg class="svg-stash">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stash"></use>
                    </svg>
                </a></div>
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
                                    <div class="innet-top-menu-block"><a class="top-menu-title"
                                                                         href="{{ route('frontend.catalogue') }}">{{ $category->name }}</a>
                                        <ul class="top-menu-list">
                                            @foreach($category->children as $child)
                                                <li>
                                                    <a href="{{ route('frontend.catalogue') }}">{{ $child->name }}</a>
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

                            <div class="inner-menu-zones"><a class="top-menu-title" href="#">zones</a>
                                <ul class="top-menu-list">
                                    @foreach($zones as $zone)
                                        <li><a href="#" class="anim-underline light-underline">{{ $zone->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                        <div class="wrap-menu-collections">
                            <div class="inner-menu-collections"><a class="top-menu-title" href="#">collections</a>
                                <ul class="top-menu-list">
                                    @foreach($collections as $collection)
                                        <li><a href="#"
                                               class="anim-underline light-underline">{{ $collection->title }}</a>
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
