<footer>
    <div class="container clearfix">
        <div class="relative">
            <div class="footer-left-side">
                <svg class="svg-footer-logo">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#main-logo"></use>
                </svg>
                <div class="coppyright-block"><span class="upper">© 2017. Cavio • Casa</span><br>
                    <a href="#" class="colored anim-underline">
                        {{ trans('frontend.footer.termsAndConditions') }}
                    </a><br><a href="{{ route('frontend.privacy-policy') }}" class="colored anim-underline">
                        {{ trans('frontend.footer.privacyPolicy') }}
                    </a></div>
                <div class="footer-address">Viale Europa, 6/a, 37050<br>San Pietro di Morubio (VR) Italia</div>
                <div class="developer-by">{{ trans('frontend.footer.developedBy') }} <a href="#" class="colored anim-underline">Sponge D&amp;D</a>.
                </div>
            </div>
            <div class="footer-middle-side">
                <div class="footer-nav-menu-wrap">
                    <ul class="footer-nav-menu">
                        <li><a href="{{ route('frontend.catalogue') }}">{{ trans('frontend.header.products') }}</a></li>
                        <li><a href="{{ route('frontend.collections') }}">{{ trans('frontend.header.zones') }}</a></li>
                        <li><a href="{{ route('frontend.about') }}">{{ trans('frontend.header.about') }}</a></li>
                        <li><a href="{{ route('frontend.showrooms') }}">{{ trans('frontend.header.showrooms') }}</a></li>
                        <li><a href="{{ route('frontend.contacts') }}">{{ trans('frontend.header.contact') }}</a></li>
                    </ul>
                </div>
                <div class="footer-products-wrap">

                    @foreach($categories as $category)
                        @if($category->parent_id == null)

                            <div class="footer-products-col"><a class="title" href="#">
                                @if (App::getLocale() == 'ru')
                                            {{ $category->name_ru }}
                                        @elseif(App::getLocale() == 'it')
                                            {{ $category->name_it }}
                                        @else
                                            {{ $category->name }}
                                        @endif
                                    </a>

                                <ul class="footer-products-list">
                                        @foreach($category->children as $child)
                                            <li>
                                                <a href="{{ route('frontend.catalogue') }}"
                                                   class="anim-underline light-underline">
                                                    @if (App::getLocale() == 'ru')
                                                        {{ $child->name_ru }}
                                                    @elseif(App::getLocale() == 'it')
                                                        {{ $child->name_it }}
                                                    @else
                                                        {{ $child->name }}
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
            <div class="footer-right-side">
                <div class="social-wrap"><a href="facebook.com" class="social-link">
                        <svg class="svg-social-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                 xlink:href="images/icons/social.svg#fb"></use>
                        </svg>
                    </a><a href="youtube.com" class="social-link">
                        <svg class="svg-social-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                 xlink:href="images/icons/social.svg#youtube"></use>
                        </svg>
                    </a><a href="instagram.com" class="social-link">
                        <svg class="svg-social-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                 xlink:href="images/icons/social.svg#instagram"></use>
                        </svg>
                    </a><a href="pinterest.com" class="social-link">
                        <svg class="svg-social-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                 xlink:href="images/icons/social.svg#pinterest"></use>
                        </svg>
                    </a></div>
                <div class="subscribe-wrap">
                    <form action=""><input class="email-input" placeholder="{{ trans('frontend.footer.enterYourEmail') }}">
                        <button class="btn subscribe" content="{{ trans('frontend.footer.subscribe') }}">{{ trans('frontend.footer.subscribe') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>