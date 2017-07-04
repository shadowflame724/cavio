<section id="modal-log_reg" class="zone-col-modal modal-log_reg">
    <div class="wrapper-zone-col-modal">
        <div class="scroller scroller-zc-modal">
            <div class="scroller-inner">
                <div class="close-modal"></div>
                <div class="wrap-swiper-log_reg inner-zone-col-modal relative swiper-container-horizontal swiper-container-autoheight swiper-container-3d swiper-container-coverflow">
                    <div class="wrap-log_reg-toggle">
                        <div class="item-log_reg-toggle log swiper-button-disabled">{{ trans('frontend.header.login') }}</div>
                        <div class="item-log_reg-toggle reg">{{ trans('frontend.login_modal.register') }}</div>
                    </div>
                    <div class="swiper-wrapper wrap-log_reg-items"
                         style="height: 388px; transform: translate3d(0px, 0px, 0px);">
                        <div class="swiper-slide log_reg-item log swiper-slide-active"
                             style="width: 365px; transform: translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg); z-index: 1; margin-right: 140px;">
                            <div class="wrap-login-social clearfix"><a href="#" class="wrap-item-soc_log google">
                                    <div class="item-soc_log-logo">
                                        <svg class="login-soc_icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 xlink:href="images/icons/social.svg#login_google_plus"></use>
                                        </svg>
                                    </div>
                                    <div class="item-soc_log-text">{{ trans('frontend.login_modal.withGoogle') }}</div>
                                </a><a href="#" class="wrap-item-soc_log fb">
                                    <div class="item-soc_log-logo">
                                        <svg class="login-soc_icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                 xlink:href="images/icons/social.svg#login_fb"></use>
                                        </svg>
                                    </div>
                                    <div class="item-soc_log-text">{{ trans('frontend.login_modal.withFacebook') }}</div>
                                </a></div>
                            <form class="login_reg">
                                <hr class="login_reg-line">
                                <input class="fullW" placeholder="{{ trans('frontend.login_modal.email') }}" type="email"> <input class="fullW"
                                                                                               placeholder="{{ trans('frontend.login_modal.password') }}"
                                                                                               type="password">
                                <button class="btn small login_reg-submit" content="{{ trans('frontend.header.login') }}">{{ trans('frontend.header.login') }}</button>
                            </form>
                        </div>
                        <div class="swiper-slide log_reg-item reg swiper-slide-next"
                             style="width: 365px; transform: translate3d(0px, 0px, -138.356px) rotateX(0deg) rotateY(-69.1781deg); z-index: 0; margin-right: 140px;">
                            <form class="login_reg">
                                <div class="wrap-2-input clearfix">
                                    <div class="wrap-inp_W_50"><input class="fullW" placeholder="{{ trans('frontend.login_modal.firstName') }}"
                                                                      name="first_name"></div>
                                    <div class="wrap-inp_W_50"><input class="fullW" placeholder="{{ trans('frontend.login_modal.lastName') }}"
                                                                      name="last_name"></div>
                                </div>
                                <div class="wrap-2-input clearfix">
                                    <div class="wrap-inp_W_50"><input class="fullW" placeholder="{{ trans('frontend.login_modal.phone') }}" name="phone">
                                    </div>
                                    <div class="wrap-inp_W_50"><input class="fullW" placeholder="{{ trans('frontend.login_modal.region') }}" name="region">
                                    </div>
                                </div>
                                <hr class="login_reg-line">
                                <input class="fullW" placeholder="{{ trans('frontend.login_modal.email') }}" type="email"> <input class="fullW"
                                                                                               placeholder="{{ trans('frontend.login_modal.password') }}"
                                                                                               type="password">
                                <button class="btn small login_reg-submit" content="{{ trans('frontend.login_modal.register') }}">{{ trans('frontend.login_modal.register') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>