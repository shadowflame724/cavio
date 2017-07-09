@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'login')

@section('before_header', '')

@section('content')
<section class="zone-col-modal modal-log_reg" style="position:relative;visibility: visible;opacity: 1;">
    <div class="inner-zone-col-modal" style="padding-top: 200px;">
        {{ Form::open(['route' => 'frontend.auth.register.post', 'class' => 'login_reg']) }}
            <div class="wrap-2-input clearfix">
                <div class="wrap-inp_W_50">
                    {{ Form::text('first_name', null, [
                                'class' => 'fullW',
                                'maxlength' => '191',
                                'required' => 'required',
                                'autofocus' => 'autofocus',
                                'placeholder' => trans('frontend.login_modal.firstName')
                                ]) }}
                </div>
                <div class="wrap-inp_W_50">
                    {{ Form::text('last_name', null, [
                                'class' => 'fullW',
                                'maxlength' => '191',
                                'required' => 'required',
                                'placeholder' => trans('frontend.login_modal.lastName')
                                ]) }}
                </div>
            </div>
            <div class="wrap-2-input clearfix">
                <div class="wrap-inp_W_50">
                    {{ Form::tel('phone', null, [
                                'class' => 'fullW',
                                'maxlength' => '50',
                                'required' => 'required',
                                'placeholder' => trans('frontend.login_modal.phone')
                                ]) }}
                </div>
                <div class="wrap-inp_W_50">
                    {{ Form::text('region', null, [
                                'class' => 'fullW',
                                'maxlength' => '50',
                                'required' => 'required',
                                'placeholder' => trans('frontend.login_modal.region')
                                ]) }}
                </div>
            </div>
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
            {{ Form::password('password_confirmation', [
                                'class' => 'fullW',
                                'required' => 'required',
                                'placeholder' => trans('validation.attributes.frontend.password_confirmation')
                                ]) }}
            <div class="captcha">
                {!! Form::captcha() !!}
                {{ Form::hidden('captcha_status', 'true') }}
            </div>
            {{ Form::submit(trans('frontend.login_modal.register'), ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
    </div>
</section>
@endsection

@section('after_scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif
@endsection