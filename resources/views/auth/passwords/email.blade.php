@extends('layouts.auth')

@section('title', __('Reset Password'))
@section('brand_heading', __('Reset your password'))
@section('brand_copy', __('Enter your email and we will send you a reset link.'))

@section('content')
@php $locale = app()->getLocale(); @endphp

<div class="genzis-kicker">{{ __('Account') }}</div>
<h2>{{ __('Reset Password') }}</h2>
<p class="login-form__lead">
    <a href="{{ route('login', $locale) }}">{{ __('Back to sign in') }}</a>
</p>

@if (session('status'))
    <div class="login-alert" role="alert" style="background:#ecfdf5;color:#065f46;border-color:#a7f3d0">
        {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div class="login-alert" role="alert">{{ $errors->first() }}</div>
@endif

<form class="login-form__stack" method="POST" action="{{ route('password.email', $locale) }}">
    @csrf

    <div class="genzis-field">
        <label for="email">{{ __('Email Address') }}</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="genzis-btn genzis-btn--primary genzis-btn--lg">
        {{ __('Send Password Reset Link') }}
    </button>
</form>
@endsection
