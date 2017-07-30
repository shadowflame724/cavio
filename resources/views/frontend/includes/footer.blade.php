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
                        <div class="footer-products-col">
                            <a class="title" href="#">{!! $category->{'name'.$langSuf} !!}</a>
                            <ul class="footer-products-list">
                                @foreach($category->children as $child)
                                <li>
                                    <a href="{{ route('frontend.catalogue') }}"
                                       class="anim-underline light-underline">{!! $child->{'name'.$langSuf} !!}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="footer-right-side">
                <div class="social-wrap">
                @foreach($settings['soc_links'] as $type => $socLink)
                    @if(!empty($socLink))
                    <a href="{{ $socLink }}" target="_blank" class="social-link">
                        <svg class="svg-social-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                 xlink:href="../../img/frontend/icons/social.svg#{{ $type }}"></use>
                        </svg>
                    </a>
                    @endif
                @endforeach
                </div>
                <div class="subscribe-wrap">
                    <form action=""><input class="email-input" placeholder="{{ trans('frontend.footer.enterYourEmail') }}">
                        <button class="btn subscribe" content="{{ trans('frontend.footer.subscribe') }}">{{ trans('frontend.footer.subscribe') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>