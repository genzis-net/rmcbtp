@extends('layouts.auth')

@section('title', __('Reset Password'))
@section('brand_heading', __('Choose a new password'))
@section('brand_copy', __('Pick a strong password to secure your admin account.'))

@section('content')
@php $locale = app()->getLocale(); @endphp

<div class="genzis-kicker">{{ __('Account') }}</div>
<h2>{{ __('Reset Password') }}</h2>

@if ($errors->any())
    <div class="login-alert" role="alert">{{ $errors->first() }}</div>
@endif

<form class="login-form__stack" method="POST" action="{{ route('password.update', $locale) }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="genzis-field">
        <label for="email">{{ __('Email Address') }}</label>
        <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="genzis-field">
        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" name="password" required autocomplete="new-password">
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="genzis-field">
        <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
    </div>

    <button type="submit" class="genzis-btn genzis-btn--primary genzis-btn--lg">
        {{ __('Reset Password') }}
    </button>
</form>
@endsection
