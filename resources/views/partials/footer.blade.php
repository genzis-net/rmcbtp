@php
    $locale = app()->getLocale();
    $social = \App\Helpers\ContactHelper::getSocialMedia();
    $facebookRmc = !empty($social['facebook']) ? $social['facebook'] : 'https://www.facebook.com/rmcbtp';
    $facebookSims = 'https://www.facebook.com/simsdec';
@endphp

<footer class="site-footer footer-large footer-dark footer-wide site-chrome-footer">
    <div class="container call-to-action-wrap bg-no-repeat bg-center site-chrome-quote-strip"
        style="background-image:url({{ asset('assets/images/background/bg-site.png') }});">
        <div class="site-chrome-quote-inner">
            <div class="site-chrome-quote-copy">
                <h3 class="site-chrome-quote-title">{{ __('Request a Quote') }}</h3>
                <p class="site-chrome-quote-text">
                    {{ __('Get a qualified contractor team who knows the value you are looking for in your projects.') }}
                </p>
            </div>
            <div class="site-chrome-quote-action">
                <a href="{{ route('contact', $locale) }}" class="site-button">{{ __('Contact us') }}</a>
            </div>
        </div>
    </div>

    <div class="footer-top overlay-wraper">
        <div class="overlay-main"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget widget_about">
                        <div class="logo-footer clearfix p-b15">
                            <a href="{{ route('homepage', $locale) }}">
                                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="RMC BTP SARL">
                            </a>
                        </div>
                        <p class="max-w400">
                            {{ __('RMC-BTP is all about delivering Quality Estate construction. We work with a large team of professionals, experienced and passionate workers who know the value you seek in your projects.') }}
                        </p>
                        <ul class="social-icons mt-social-links">
                            <li>
                                <a href="{{ $facebookRmc }}" class="fa fa-facebook" target="_blank" rel="noopener noreferrer" title="RMC BTP"></a>
                            </li>
                            <li>
                                <a href="{{ $facebookSims }}" class="fa fa-facebook" target="_blank" rel="noopener noreferrer" title="SIMS DECOR"></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget widget_address_outer">
                        <h4 class="widget-title">{{ __('Contact us') }}</h4>
                        <ul class="widget_address site-chrome-footer-contact">
                            <li>@contactAddress</li>
                            <li>@contactEmail</li>
                            <li>@contactPhone</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 footer-col-3">
                    <div class="widget widget_services inline-links">
                        <h4 class="widget-title">{{ __('Services') }}</h4>
                        <ul>
                            <li><a href="{{ route('consulting', $locale) }}">Consulting</a></li>
                            <li><a href="{{ route('architecture', $locale) }}">Architecture</a></li>
                            <li><a href="{{ route('construction', $locale) }}">Construction</a></li>
                            <li><a href="{{ route('renovation', $locale) }}">{{ __('Home Renovation') }}</a></li>
                            <li><a href="{{ route('simsdecor', $locale) }}">SIMS DECOR</a></li>
                            <li><a href="{{ route('catalog.index', ['language' => $locale, 'catalog' => 'sims-decor']) }}">{{ __('SIMS Decor catalog') }}</a></li>
                            <li><a href="{{ route('quincaillerie', $locale) }}">SIMS QUINCAILLERIE</a></li>
                            <li><a href="{{ route('catalog.index', ['language' => $locale, 'catalog' => 'quincaillerie']) }}">{{ __('SIMS Quincaillerie catalog') }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 footer-col-3">
                    <div class="widget widget_services inline-links">
                        <h4 class="widget-title">{{ __('Company') }}</h4>
                        <ul>
                            <li><a href="{{ route('about', $locale) }}">{{ __('About us') }}</a></li>
                            <li><a href="{{ route('projects.index', $locale) }}">{{ __('Our Work') }}</a></li>
                            <li><a href="{{ route('contact', $locale) }}">{{ __('Contact us') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom overlay-wraper">
        <div class="overlay-main"></div>
        <div class="container">
            <div class="row">
                <div class="mt-footer-bot-center">
                    <span class="copyrights-text">
                        © {{ date('Y') }} RMC BTP SARL.
                        {{ __('Delivered by') }}
                        <a href="https://genzis.net" target="_blank" rel="noopener noreferrer">Genzis</a>.
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>
