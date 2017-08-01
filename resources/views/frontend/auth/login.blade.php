@extends('frontend.layouts.'.$pageLayout)

@section('bodyClass', 'login')

@section('before_header', '')

@section('content')
<section class="zone-col-modal modal-log_reg" style="position:relative;visibility: visible;opacity: 1;">
    <div class="inner-zone-col-modal" style="padding-top: 200px;">
        {{ Form::open(['route' => 'frontend.auth.login.post', 'class' => 'login_reg']) }}

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
            {{ link_to_route('frontend.auth.password.reset', trans('labels.frontend.passwords.forgot_password')) }}
            {{ Form::button(trans('frontend.header.login'), [
                'type' => 'submit',
                'content' => trans('frontend.header.login'),
                'class' => 'btn small login_reg-submit'
            ]) }}

        {{ Form::close() }}
    </div>
</section>
<style>
    .inner-zone-col-modal{ background-color: transparent;}
    form.login_reg input{ background-color: #fff; color: #333;}
    form.login_reg label { color: #fff;}
    form.login_reg label input{ height: 20px; vertical-align: middle; margin: 0 0 0 10px;}
</style>
@endsection