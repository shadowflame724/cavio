<section id="modal-order" data-anim="false" class="zone-col-modal modal-log_reg order">
    <div class="wrapper-zone-col-modal">
        <div class="scroller scroller-zc-modal">
            <div class="scroller-inner">
                <div class="close-modal"></div>

                <div class="wrap-swiper-log_reg inner-zone-col-modal order relative">

                    <div class="small_modal-title">{{ trans('frontend.modalOrder.title') }}</div>

                    <div class="swiper-wrapper wrap-log_reg-items">
                        <div class="swiper-slide log_reg-item reg">
                        {{ Form::open([
                            'route' => 'frontend.order.send',
                            'class' => 'login_reg',
                            'id' => 'submitOrder'
                            ]) }}
                            <div class="wrap-2-input clearfix">
                                <div class="wrap-inp_W_50">
                                    {{ Form::text('first_name', null, [
                                        'class' => 'fullW',
                                        'maxlength' => '191',
                                        'required' => 'required',
                                        'placeholder' => trans('frontend.modalOrder.firstName')
                                    ]) }}
                                </div>
                                <div class="wrap-inp_W_50">
                                    {{ Form::text('last_name', null, [
                                        'class' => 'fullW',
                                        'maxlength' => '191',
                                        'required' => 'required',
                                        'placeholder' => trans('frontend.modalOrder.lastName')
                                    ]) }}
                                </div>
                            </div>
                            <div class="wrap-2-input clearfix">
                                <div class="wrap-inp_W_50">
                                    {{ Form::text('phone', null, [
                                        'class' => 'fullW',
                                        'maxlength' => '191',
                                        'required' => 'required',
                                        'placeholder' => trans('frontend.modalOrder.phone')
                                    ]) }}
                                </div>
                                <div class="wrap-inp_W_50">
                                    {{ Form::text('region', null, [
                                        'class' => 'fullW',
                                        'maxlength' => '191',
                                        'required' => 'required',
                                        'placeholder' => trans('frontend.modalOrder.region')
                                    ]) }}
                                </div>
                            </div>
                            <div class="wrap-2-input clearfix">
                                <div class="wrap-inp_W_50">
                                    {{ Form::text('city', null, [
                                        'class' => 'fullW',
                                        'maxlength' => '191',
                                        'required' => 'required',
                                        'placeholder' => trans('frontend.modalOrder.city')
                                    ]) }}
                                </div>
                                <div class="wrap-inp_W_50">
                                    {{ Form::text('zip_code', null, [
                                        'class' => 'fullW',
                                        'maxlength' => '191',
                                        'required' => 'required',
                                        'placeholder' => trans('frontend.modalOrder.zipCode')
                                    ]) }}
                                </div>
                            </div>
                            <hr class="login_reg-line">
                            {{ Form::email('email', null, [
                                'class' => 'fullW',
                                'maxlength' => '191',
                                'required' => 'required',
                                'placeholder' => trans('frontend.modalOrder.email')
                            ]) }}
                            {{ Form::button(trans('frontend.modalOrder.title'), [
                                'type' => 'submit',
                                'id' => 'order-in_stash',
                                'class' => 'btn small login_reg-submit',
                                'content' => trans('frontend.modalOrder.title')
                            ]) }}
                        {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="modal-thank_you-subs" data-anim="false" class="zone-col-modal modal-log_reg ty">
    <div class="wrapper-zone-col-modal">
        <div class="scroller scroller-zc-modal">
            <div class="scroller-inner">
                <div class="close-modal"></div>

                <div class="wrap-swiper-log_reg inner-zone-col-modal ty relative">

                    <h3 class="section-title modal show">{{ trans('frontend.thankForSubscribe.title') }}</h3>

                    <div class="ty-text">{{ trans('frontend.thankForSubscribe.body') }}</div>

                    <div class="wrap-stash_order">
                        <button class="btn dark-profile btn-close-modal" content="ok">ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="modal-thank_you" data-anim="false" class="zone-col-modal modal-log_reg ty">
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
<section id="modal-thank_you_profile" data-anim="false" class="zone-col-modal modal-log_reg ty">
    <div class="wrapper-zone-col-modal">
        <div class="scroller scroller-zc-modal">
            <div class="scroller-inner">
                <div class="close-modal"></div>

                <div class="wrap-swiper-log_reg inner-zone-col-modal ty relative">

                    <h3 class="section-title modal show">{{ trans('frontend.thankForUpdateProfile.title') }}.</h3>

                    <div class="ty-text">{{ trans('frontend.thankForUpdateProfile.body') }}.</div>

                    <div class="wrap-stash_order">
                        <button id="ty-ok-p" class="btn dark-profile" content="ok">ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="modal-thank_you_default" data-anim="false" class="zone-col-modal modal-log_reg ty">
    <div class="wrapper-zone-col-modal">
        <div class="scroller scroller-zc-modal">
            <div class="scroller-inner">
                <div class="close-modal"></div>

                <div class="wrap-swiper-log_reg inner-zone-col-modal ty relative">
                    <h3 class="section-title modal show"></h3>
                    <div class="ty-text"></div>
                    <div class="wrap-stash_order">
                        <button id="ty-ok-def-f" class="btn dark-profile" content="ok">ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>