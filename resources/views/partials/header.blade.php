@php
    $locale = app()->getLocale();
    $currentRoute = Route::currentRouteName();
    $servicesActive = in_array($currentRoute, [
        'simsdecor', 'quincaillerie', 'renovation', 'construction', 'architecture', 'consulting',
        'catalog.index', 'catalog.show',
    ], true);
@endphp

<header class="site-header header-style-1 site-chrome-header">
    <div class="top-bar bg-gray site-chrome-topbar">
        <div class="container">
            <div class="row site-chrome-topbar-row">
                <div class="mt-topbar-left clearfix">
                    <ul class="list-unstyled e-p-bx site-chrome-contact-list">
                        <li class="site-chrome-contact-email">
                            <i class="fa fa-envelope"></i>
                            @contactEmail
                        </li>
                        <li class="site-chrome-contact-phone">
                            <i class="fa fa-phone"></i>
                            @contactPhone
                        </li>
                    </ul>
                </div>
                <div class="mt-topbar-right clearfix site-chrome-topbar-right">
                    <nav class="site-chrome-lang" aria-label="{{ __('Select Language') }}">
                        @foreach(['en', 'fr'] as $lang)
                            <a href="{{ \App\Helpers\LanguageHelper::getLanguageUrl($lang) }}"
                               class="site-chrome-lang-link{{ \App\Helpers\LanguageHelper::isCurrentLanguage($lang) ? ' is-active' : '' }}"
                               hreflang="{{ $lang }}"
                               @if(\App\Helpers\LanguageHelper::isCurrentLanguage($lang)) aria-current="true" @endif>
                                {{ strtoupper($lang) }}
                            </a>
                            @if(!$loop->last)
                                <span class="site-chrome-lang-sep" aria-hidden="true">|</span>
                            @endif
                        @endforeach
                    </nav>
                    <div class="appint-btn">
                        <a href="{{ route('contact', $locale) }}" class="site-button">{{ __('Request a Quote') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sticky-header main-bar-wraper">
        <div class="main-bar bg-white">
            <div class="container">
                <div class="logo-header">
                    <div class="logo-header-inner logo-header-one">
                        <a href="{{ route('homepage', $locale) }}">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="RMC BTP SARL" />
                        </a>
                    </div>
                </div>

                <button data-target=".header-nav" data-toggle="collapse" type="button"
                    class="navbar-toggle collapsed" aria-expanded="false" aria-controls="site-main-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div id="site-main-nav" class="header-nav navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="{{ $currentRoute === 'homepage' ? 'active' : '' }}">
                            <a href="{{ route('homepage', $locale) }}">{{ __('Home') }}</a>
                        </li>
                        <li class="{{ $currentRoute === 'about' ? 'active' : '' }}">
                            <a href="{{ route('about', $locale) }}">{{ __('About us') }}</a>
                        </li>
                        <li class="{{ $servicesActive ? 'active' : '' }}">
                            <a href="javascript:;">{{ __('Services') }}</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="javascript:;">RMC BTP</a>
                                    <ul class="sub-menu has-child">
                                        <li><a href="{{ route('consulting', $locale) }}">Consulting</a></li>
                                        <li><a href="{{ route('architecture', $locale) }}">Architecture</a></li>
                                        <li><a href="{{ route('construction', $locale) }}">Construction</a></li>
                                        <li><a href="{{ route('renovation', $locale) }}">Renovation</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:;">SIMS QUINCAILLERIE</a>
                                    <ul class="sub-menu has-child">
                                        <li><a href="{{ route('quincaillerie', $locale) }}">{{ __('Overview') }}</a></li>
                                        <li><a href="{{ route('catalog.index', ['language' => $locale, 'catalog' => 'quincaillerie']) }}">{{ __('Catalog') }}</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:;">SIMS DECOR</a>
                                    <ul class="sub-menu has-child">
                                        <li><a href="{{ route('simsdecor', $locale) }}">{{ __('Overview') }}</a></li>
                                        <li><a href="{{ route('catalog.index', ['language' => $locale, 'catalog' => 'sims-decor']) }}">{{ __('Catalog') }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ $currentRoute === 'projects.index' ? 'active' : '' }}">
                            <a href="{{ route('projects.index', $locale) }}">{{ __('Our Work') }}</a>
                        </li>
                        <li class="{{ $currentRoute === 'contact' ? 'active' : '' }}">
                            <a href="{{ route('contact', $locale) }}">{{ __('Contact us') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
