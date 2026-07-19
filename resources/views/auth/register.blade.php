@extends('layouts.auth')

@section('title', __('Register'))
@section('brand_heading', __('Create an account'))
@section('brand_copy', __('Registration is currently disabled. Contact an administrator.'))

@section('content')
@php $locale = app()->getLocale(); @endphp

<div class="genzis-kicker">{{ __('Account') }}</div>
<h2>{{ __('Register') }}</h2>
<p class="login-form__lead">
    <a href="{{ route('login', $locale) }}">{{ __('Back to sign in') }}</a>
</p>
@endsection
