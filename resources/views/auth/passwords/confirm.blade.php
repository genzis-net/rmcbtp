@extends('layouts.auth')

@section('title', __('Confirm Password'))
@section('brand_heading', __('Confirm your password'))
@section('brand_copy', __('Please confirm your password before continuing.'))

@section('content')
@php $locale = app()->getLocale(); @endphp

<div class="genzis-kicker">{{ __('Security') }}</div>
<h2>{{ __('Confirm Password') }}</h2>
<p class="login-form__lead">{{ __('Please confirm your password before continuing.') }}</p>

@if ($errors->any())
    <div class="login-alert" role="alert">{{ $errors->first() }}</div>
@endif

<form class="login-form__stack" method="POST" action="{{ route('password.confirm', $locale) }}">
    @csrf

    <div class="genzis-field">
        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" name="password" required autocomplete="current-password">
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="genzis-btn genzis-btn--primary genzis-btn--lg">
        {{ __('Confirm Password') }}
    </button>

    @if (Route::has('password.request'))
        <p class="login-form__lead">
            <a href="{{ route('password.request', $locale) }}">{{ __('Forgot Your Password?') }}</a>
        </p>
    @endif
</form>
@endsection
