@extends('layouts.app')

@section('headerz')
	<title>{{ __('Privacy Policy') }} | {{ config('app.name') }}</title>
    <meta name="description" content="{{ __('How RMC BTP collects and uses personal information.') }}"/>
@endsection

@section('content')
<div class="page-content">
    <div class="mt-bnr-inr overlay-wraper bg-parallax bg-top-center" data-stellar-background-ratio="0.5" style="background-image:url(/assets/images/banner/4.jpg);">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <div class="mt-bnr-inr-entry">
                <div class="banner-title-outer">
                    <div class="banner-title-name">
                        <h2 class="m-b0">{{ __('Privacy Policy') }}</h2>
                    </div>
                </div>
                <div>
                    <ul class="mt-breadcrumb breadcrumb-style-2">
                        <li><a href="{{ route('homepage', app()->getLocale()) }}">{{ __('Home') }}</a></li>
                        <li>{{ __('Privacy Policy') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="section-full p-tb80 inner-page-padding">
        <div class="container" style="max-width: 820px;">
            <p class="text-muted" style="font-size: 0.9rem; margin-bottom: 1.5rem;">
                {{ __('This page is an operational draft describing how this website processes data. It is not a substitute for legal advice and should be reviewed by counsel before production marketing.') }}
            </p>

            <h3>{{ __('Who we are') }}</h3>
            <p>{{ __('RMC BTP SARL (“we”, “us”) operates this website to present our construction, decoration, and hardware offerings and to receive business inquiries.') }}</p>

            <h3>{{ __('What we collect') }}</h3>
            <ul>
                <li>{{ __('Contact form: name, email address, phone number, subject, and message.') }}</li>
                <li>{{ __('Technical data: standard web server logs (such as IP address and browser type) may be retained by our hosting provider for security and operations.') }}</li>
                <li>{{ __('Session cookies required to keep you logged in (administrators only) and to protect forms against CSRF attacks.') }}</li>
            </ul>

            <h3>{{ __('Why we collect it') }}</h3>
            <p>{{ __('We process contact inquiries to respond to your request and follow up on quotes or projects. We do not sell personal information.') }}</p>

            <h3>{{ __('How long we keep it') }}</h3>
            <p>{{ __('Contact inquiries are retained for up to :days days unless a longer period is required for an active commercial discussion or legal obligation, after which they are deleted.', ['days' => (int) env('CONTACT_EMAIL_RETENTION_DAYS', 365)]) }}</p>

            <h3>{{ __('Who can access it') }}</h3>
            <p>{{ __('Authorized RMC BTP administrators and our email/hosting providers acting as processors to deliver mail and host the site.') }}</p>

            <h3>{{ __('Your rights') }}</h3>
            <p>{{ __('You may request access to, correction of, or deletion of your contact inquiry data by emailing us at the address below. We will respond within a reasonable time.') }}</p>

            <h3>{{ __('Contact') }}</h3>
            <p>
                {{ __('For privacy requests:') }}
                <a href="mailto:{{ config('contact.email') }}">{{ config('contact.email') }}</a>
            </p>

            <p style="margin-top: 2rem;">
                <a href="{{ route('contact', app()->getLocale()) }}">{{ __('Contact us') }}</a>
            </p>
        </div>
    </div>
</div>
@endsection
