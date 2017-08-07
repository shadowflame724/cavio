<section id="modal-log_reg" class="zone-col-modal modal-log_reg" data-anim="false">
    <div class="wrapper-zone-col-modal">
        <div class="scroller scroller-zc-modal">
            <div class="scroller-inner">
                <div class="close-modal"></div>

                <div class="wrap-swiper-log_reg inner-zone-col-modal relative">

                    <div class="wrap-log_reg-toggle">
                        <div class="item-log_reg-toggle log swiper-button-disabled">{{ trans('frontend.header.login') }}</div>
                        <div class="item-log_reg-toggle reg">{{ trans('frontend.login_modal.register') }}</div>
                    </div>

                    <div class="swiper-wrapper wrap-log_reg-items">
                        <div class="swiper-slide log_reg-item forgot_pwd">
                            {{ Form::open(['route' => 'frontend.auth.password.reset', 'class' => 'form-horizontal']) }}


                            {{ Form::close() }}
                        </div>

                        <div class="swiper-slide log_reg-item log">

                            <div class="wrap-login-social clearfix">
                                <a href="/login/google" class="btn wrap-item-soc_log google" content="with Google">
                                    <div class="item-soc_log-logo">
                                        <svg class="login-soc_icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#login_google_plus"></use>
                                        </svg>
                                    </div>
                                    <div class="item-soc_log-text">{{ trans('frontend.login_modal.withGoogle') }}</div>
                                </a>
                                <a href="/login/facebook" class="btn wrap-item-soc_log fb" content="{{ trans('frontend.login_modal.withGoogle') }}">
                                    <div class="item-soc_log-logo">
                                        <svg class="login-soc_icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#login_fb"></use>
                                        </svg>
                                    </div>
                                    <div class="btn item-soc_log-text">{{ trans('frontend.login_modal.withFacebook') }}</div>
                                </a>
                            </div>

                            {{ Form::open(['route' => 'frontend.auth.login.post', 'class' => 'login_reg', 'id' => 'login']) }}

                                <hr class="login_reg-line">
                                {{ Form::email('email', null, [
                                    'class' => 'fullW',
                                    'maxlength' => '191',
                                    'required' => 'required',
                                    'placeholder' => trans('validation.attributes.frontend.email')
                                ]) }}
                                {{ Form::password('password', [
                                    'class' => 'fullW',
                                    'required' => 'required',
                                    'placeholder' => trans('validation.attributes.frontend.password')
                                ]) }}

                                <div class="wrap-remember_forgotpwd clearfix">
                                    <label class="wrap-remember-login">
                                        {{ Form::checkbox('remember') }} <span>{{ trans('labels.frontend.auth.remember_me') }}</span>
                                    </label>

                                    {{ link_to_route('frontend.auth.password.reset', trans('labels.frontend.passwords.forgot_password'), '', ['class'=>'forgot-pwd anim-underline']) }}
                                </div>
                                {{ Form::button(trans('frontend.header.login'), [
                                    'type' => 'submit',
                                    'content' => trans('frontend.header.login'),
                                    'class' => 'btn small login_reg-submit'
                                ]) }}


                            {{ Form::close() }}
                        </div>

                        <div class="swiper-slide log_reg-item reg">

                            <form class="login_reg">

                                <div class="wrap-2-input clearfix">
                                    <div class="wrap-inp_W_50">
                                        <input class="fullW" placeholder="{{ trans('frontend.login_modal.firstName') }}" name="{{ trans('frontend.login_modal.firstName') }}">
                                    </div>
                                    <div class="wrap-inp_W_50">
                                        <input class="fullW" placeholder="{{ trans('frontend.login_modal.lastName') }}" name="{{ trans('frontend.login_modal.lastName') }}">
                                    </div>
                                </div>

                                <div class="wrap-2-input clearfix">
                                    <div class="wrap-inp_W_50">
                                        <input class="fullW" placeholder="{{ trans('frontend.login_modal.phone') }}" name="{{ trans('frontend.login_modal.phone') }}">
                                    </div>
                                    <div class="wrap-inp_W_50">
                                        <input class="fullW" placeholder="{{ trans('frontend.login_modal.region') }}" name="{{ trans('frontend.login_modal.region') }}">
                                    </div>
                                </div>

                                <hr class="login_reg-line">

                                <input class="fullW" placeholder="{{ trans('frontend.login_modal.email') }}" type="{{ trans('frontend.login_modal.email') }}">
                                <input class="fullW" placeholder="{{ trans('frontend.login_modal.password') }}" type="{{ trans('frontend.login_modal.password') }}">
                                <button class="btn small login_reg-submit" content="{{ trans('frontend.login_modal.register') }}">{{ trans('frontend.login_modal.register') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>