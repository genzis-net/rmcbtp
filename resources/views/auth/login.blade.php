@extends('layouts.auth')

@section('title', __('Sign in'))

@section('content')
@php $locale = app()->getLocale(); @endphp

<div class="genzis-kicker">{{ __('Welcome back') }}</div>
<h2>{{ __('Sign in to your account') }}</h2>
<p class="login-form__lead">
    {{ __('Need the public site?') }}
    <a href="{{ route('homepage', $locale) }}">{{ __('Visit RMC BTP') }}</a>
</p>

@if ($errors->any())
    <div class="login-alert" role="alert">
        {{ $errors->first() }}
    </div>
@endif

<form class="login-form__stack" method="POST" action="{{ route('login', ['language' => $locale]) }}">
    @csrf

    <div class="genzis-field">
        <label for="email">{{ __('Email Address') }}</label>
        <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="you@company.com"
            autocomplete="username"
            required
            autofocus
            class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
        >
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="genzis-field login-password-wrap">
        <label for="password">{{ __('Password') }}</label>
        <input
            id="password"
            type="password"
            name="password"
            placeholder="{{ __('Enter your password') }}"
            autocomplete="current-password"
            required
            class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
        >
        <button type="button" class="login-password-toggle" id="toggle-password" aria-label="{{ __('Toggle password') }}">
            <img src="{{ asset('icons/lucide/eye.svg') }}" width="18" height="18" alt="" id="toggle-password-icon">
        </button>
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="login-row">
        <label class="login-remember">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            {{ __('Remember Me') }}
        </label>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request', ['language' => $locale]) }}" style="font-size:14px">{{ __('Forgot Your Password?') }}</a>
        @endif
    </div>

    <button type="submit" class="genzis-btn genzis-btn--primary genzis-btn--lg">
        {{ __('Sign in') }}
        <img class="genzis-icon genzis-icon--white" src="{{ asset('icons/lucide/arrow-right.svg') }}" width="18" height="18" alt="">
    </button>
</form>
@endsection

@push('scripts')
<script>
    (function () {
        var btn = document.getElementById('toggle-password');
        var input = document.getElementById('password');
        var icon = document.getElementById('toggle-password-icon');
        if (!btn || !input || !icon) return;
        btn.addEventListener('click', function () {
            var show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            icon.src = show
                ? @json(asset('icons/lucide/eye-off.svg'))
                : @json(asset('icons/lucide/eye.svg'));
        });
    })();
</script>
@endpush
