@php $locale = app()->getLocale(); @endphp
<!DOCTYPE html>
<html lang="{{ $locale }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', __('Dashboard')) — {{ config('app.name', 'RMC BTP') }}</title>

    <link rel="icon" href="{{ asset('assets/images/brand/genzis-mark.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/admin-fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/genzis.css') }}">
    @stack('styles')
</head>
<body class="genzis-body">
    <div class="admin-app">
        <aside class="admin-rail" aria-label="{{ __('Admin navigation') }}">
            <a class="admin-rail__link {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}"
               href="{{ route('admin.dashboard', ['language' => $locale]) }}" title="{{ __('Dashboard') }}">
                <img src="{{ asset('icons/lucide/layout-grid.svg') }}" alt="">
            </a>
            <a class="admin-rail__link {{ request()->routeIs('admin.blog-posts.*') ? 'is-active' : '' }}"
               href="{{ route('admin.blog-posts.index', ['language' => $locale]) }}" title="{{ __('Blog Posts') }}">
                <img src="{{ asset('icons/lucide/newspaper.svg') }}" alt="">
            </a>
            <a class="admin-rail__link {{ request()->routeIs('admin.projects.*') ? 'is-active' : '' }}"
               href="{{ route('admin.projects.index', ['language' => $locale]) }}" title="{{ __('Projects') }}">
                <img src="{{ asset('icons/lucide/briefcase.svg') }}" alt="">
            </a>
            <a class="admin-rail__link {{ request()->routeIs('admin.testimonials.*') ? 'is-active' : '' }}"
               href="{{ route('admin.testimonials.index', ['language' => $locale]) }}" title="{{ __('Testimonials') }}">
                <img src="{{ asset('icons/lucide/message-square-quote.svg') }}" alt="">
            </a>
            <a class="admin-rail__link {{ request()->routeIs('admin.galleries.*') ? 'is-active' : '' }}"
               href="{{ route('admin.galleries.index', ['language' => $locale]) }}" title="{{ __('Galleries') }}">
                <img src="{{ asset('icons/lucide/images.svg') }}" alt="">
            </a>
            <a class="admin-rail__link {{ request()->routeIs('admin.products.*') ? 'is-active' : '' }}"
               href="{{ route('admin.products.index', ['language' => $locale]) }}" title="{{ __('Products') }}">
                <img src="{{ asset('icons/lucide/package.svg') }}" alt="">
            </a>
            <a class="admin-rail__link {{ request()->routeIs('admin.product-categories.*') ? 'is-active' : '' }}"
               href="{{ route('admin.product-categories.index', ['language' => $locale]) }}" title="{{ __('Categories') }}">
                <img src="{{ asset('icons/lucide/folders.svg') }}" alt="">
            </a>
            <a class="admin-rail__link {{ request()->routeIs('admin.faqs.*') ? 'is-active' : '' }}"
               href="{{ route('admin.faqs.index', ['language' => $locale]) }}" title="{{ __('FAQs') }}">
                <img src="{{ asset('icons/lucide/circle-help.svg') }}" alt="">
            </a>
            <a class="admin-rail__link {{ request()->routeIs('admin.contact-emails.*') ? 'is-active' : '' }}"
               href="{{ route('admin.contact-emails.index', ['language' => $locale]) }}" title="{{ __('Contact inquiries') }}">
                <img src="{{ asset('icons/lucide/mail.svg') }}" alt="">
            </a>
            <a class="admin-rail__link {{ request()->routeIs('admin.settings*') ? 'is-active' : '' }}"
               href="{{ route('admin.settings', ['language' => $locale]) }}" title="{{ __('Settings') }}">
                <img src="{{ asset('icons/lucide/settings.svg') }}" alt="">
            </a>

            <div class="admin-rail__spacer"></div>

            <a class="admin-rail__link" href="{{ route('homepage', $locale) }}" target="_blank" title="{{ __('View website') }}">
                <img src="{{ asset('icons/lucide/external-link.svg') }}" alt="">
            </a>
            <a class="admin-rail__link"
               href="{{ route('logout', ['language' => $locale]) }}"
               title="{{ __('Logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <img src="{{ asset('icons/lucide/log-out.svg') }}" alt="">
            </a>
            <div class="admin-rail__avatar" title="{{ auth()->user()->name ?? __('Admin') }}">
                <img src="{{ asset('icons/lucide/user.svg') }}" alt="">
            </div>
        </aside>

        <form id="logout-form" action="{{ route('logout', ['language' => $locale]) }}" method="POST" style="display:none">@csrf</form>

        <main class="admin-main">
            <header class="admin-top">
                <div class="admin-top__mark">
                    <img src="{{ asset('assets/images/brand/genzis-mark.png') }}" alt="Genzis">
                </div>
                <div class="admin-top__title">
                    <h1>@yield('heading', __('Hello, :name!', ['name' => auth()->user()->name ?? __('Admin')]))</h1>
                    <p>@yield('subheading', __('Manage RMC BTP content from one calm place.'))</p>
                </div>
                <div class="admin-top__tools">
                    @yield('actions')
                </div>
            </header>

            @if(session('success'))
                <div class="admin-flash admin-flash--success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="admin-flash admin-flash--error">{{ session('error') }}</div>
            @endif
            @if(isset($errors) && $errors->any())
                <div class="admin-flash admin-flash--error">
                    <ul style="margin:0;padding-left:18px">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>
