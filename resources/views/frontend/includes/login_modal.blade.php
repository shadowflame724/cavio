<section id="modal-log_reg" class="zone-col-modal modal-log_reg" data-anim="false">
    <div class="wrapper-zone-col-modal">
        <div class="scroller scroller-zc-modal">
            <div class="scroller-inner">
                <div class="close-modal"></div>

                <div class="wrap-swiper-log_reg inner-zone-col-modal relative">

                    <div class="wrap-log_reg-toggle">
                        <div class="item-log_reg-toggle log">login</div>
                        <div class="item-log_reg-toggle reg">register</div>
                    </div>

                    <div class="swiper-wrapper wrap-log_reg-items">
                        <div class="swiper-slide log_reg-item log">

                            <div class="wrap-login-social clearfix">
                                <a href="#" class="btn wrap-item-soc_log google" content="with Google">
                                    <div class="item-soc_log-logo">
                                        <svg class="login-soc_icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#login_google_plus"></use>
                                        </svg>
                                    </div>
                                    <div class="item-soc_log-text">with Google</div>
                                </a>
                                <a href="/login/facebook" class="btn wrap-item-soc_log fb" content="with facebook">
                                    <div class="item-soc_log-logo">
                                        <svg class="login-soc_icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#login_fb"></use>
                                        </svg>
                                    </div>
                                    <div class="btn item-soc_log-text">with facebook</div>
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
                                <label>
                                    {{ Form::checkbox('remember') }} {{ trans('labels.frontend.auth.remember_me') }}
                                </label>
                                {{ Form::submit(trans('frontend.header.login'), ['class' => 'btn small login_reg-submit']) }}
                                {{ link_to_route('frontend.auth.password.reset', trans('labels.frontend.passwords.forgot_password')) }}

                            {{ Form::close() }}
                        </div>

                        <div class="swiper-slide log_reg-item reg">

                            <form class="login_reg">

                                <div class="wrap-2-input clearfix">
                                    <div class="wrap-inp_W_50">
                                        <input class="fullW" placeholder="First name" name="first_name">
                                    </div>
                                    <div class="wrap-inp_W_50">
                                        <input class="fullW" placeholder="Last name" name="last_name">
                                    </div>
                                </div>

                                <div class="wrap-2-input clearfix">
                                    <div class="wrap-inp_W_50">
                                        <input class="fullW" placeholder="Phone" name="phone">
                                    </div>
                                    <div class="wrap-inp_W_50">
                                        <input class="fullW" placeholder="Region" name="region">
                                    </div>
                                </div>

                                <hr class="login_reg-line">

                                <input class="fullW" placeholder="E-mail" type="email">
                                <input class="fullW" placeholder="Password" type="password">
                                <button class="btn small login_reg-submit" content="register">register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>