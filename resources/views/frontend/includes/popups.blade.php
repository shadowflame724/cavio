<section id="modal-order" class="zone-col-modal modal-log_reg order">
    <div class="wrapper-zone-col-modal">
        <div class="scroller scroller-zc-modal">
            <div class="scroller-inner">
                <div class="close-modal"></div>

                <div class="wrap-swiper-log_reg inner-zone-col-modal order relative">

                    <div class="small_modal-title">{{ trans('frontend.modalOrder.title') }}</div>

                    <div class="swiper-wrapper wrap-log_reg-items">
                        <div class="swiper-slide log_reg-item reg">

                            <form class="login_reg">

                                <div class="wrap-2-input clearfix">
                                    <div class="wrap-inp_W_50">
                                        <input class="fullW" placeholder="{{ trans('frontend.modalOrder.firstName') }}" name="first_name">
                                    </div>
                                    <div class="wrap-inp_W_50">
                                        <input class="fullW" placeholder="{{ trans('frontend.modalOrder.lastName') }}" name="last_name">
                                    </div>
                                </div>

                                <div class="wrap-2-input clearfix">
                                    <div class="wrap-inp_W_50">
                                        <input class="fullW" placeholder="{{ trans('frontend.modalOrder.phone') }}" name="phone">
                                    </div>
                                    <div class="wrap-inp_W_50">
                                        <input class="fullW" placeholder="{{ trans('frontend.modalOrder.region') }}" name="region">
                                    </div>
                                </div>

                                <div class="wrap-2-input clearfix">
                                    <div class="wrap-inp_W_50">
                                        <input class="fullW" placeholder="{{ trans('frontend.modalOrder.city') }}" name="city">
                                    </div>
                                    <div class="wrap-inp_W_50">
                                        <input class="fullW" placeholder="{{ trans('frontend.modalOrder.zipCode') }}" name="zip_code">
                                    </div>
                                </div>

                                <hr class="login_reg-line">

                                <input class="fullW" placeholder="{{ trans('frontend.modalOrder.email') }}" type="email">
                                <button id="order-in_stash" class="btn small login_reg-submit" content="{{ trans('frontend.modalOrder.title') }}">{{ trans('frontend.modalOrder.title') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="modal-thank_you-subs" class="zone-col-modal modal-log_reg ty">
    <div class="wrapper-zone-col-modal">
        <div class="scroller scroller-zc-modal">
            <div class="scroller-inner">
                <div class="close-modal"></div>

                <div class="wrap-swiper-log_reg inner-zone-col-modal ty relative">

                    <h3 class="section-title modal show">Thank You For Subscribing!</h3>

                    <div class="ty-text">Thank You For Subscribing!222</div>

                    <div class="wrap-stash_order">
                        <button class="btn dark-profile btn-close-modal" content="ok">ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="modal-thank_you" class="zone-col-modal modal-log_reg ty">
    <div class="wrapper-zone-col-modal">
        <div class="scroller scroller-zc-modal">
            <div class="scroller-inner">
                <div class="close-modal"></div>

                <div class="wrap-swiper-log_reg inner-zone-col-modal ty relative">

                    <h3 class="section-title modal show">{{ trans('frontend.thankForOrderModal.title') }}.</h3>

                    <div class="ty-text">{{ trans('frontend.thankForOrderModal.body') }}.</div>

                    <div class="wrap-stash_order">
                        <button id="ty-ok" class="btn dark-profile" content="ok">ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>