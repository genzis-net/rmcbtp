@php
    $locale = app()->getLocale();
@endphp
<!DOCTYPE html>
<html lang="{{ $locale }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'RMC BTP') }} — @yield('title', __('Sign in'))</title>

    <link rel="icon" href="{{ asset('assets/images/brand/genzis-mark.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Space+Grotesk:wght@500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/genzis.css') }}">
</head>
<body class="genzis-body">
    <div class="login-screen">
        <div class="login-shell">
            <aside class="login-brand">
                <span class="login-brand__orb login-brand__orb--1" aria-hidden="true"></span>
                <span class="login-brand__orb login-brand__orb--2" aria-hidden="true"></span>
                <span class="login-brand__ring" aria-hidden="true"></span>

                <a class="genzis-wordmark" href="{{ route('homepage', $locale) }}" style="color: var(--brand-on); position: relative;">
                    <img src="{{ asset('assets/images/brand/genzis-mark.png') }}" alt="">
                    <span>RMC BTP<span class="dot">.</span></span>
                </a>

                <div style="flex:1"></div>

                <div style="position:relative">
                    <div class="genzis-kicker genzis-kicker--light">◆ {{ __('Build. Launch. Grow.') }}</div>
                    <h1>@yield('brand_heading', __('Everything your business needs online.'))</h1>
                    <p>@yield('brand_copy', __('Sign in to manage content, products, galleries, and client stories — all from one calm place.'))</p>
                </div>

                <div class="login-brand__tags">
                    <span>{{ __('Content') }}</span>
                    <span>{{ __('Products') }}</span>
                    <span>{{ __('Galleries') }}</span>
                    <span>{{ __('Support') }}</span>
                </div>
            </aside>

            <section class="login-form">
                @yield('content')
            </section>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
