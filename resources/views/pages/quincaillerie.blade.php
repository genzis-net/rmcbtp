@extends('layouts.app')
@php $locale = app()->getLocale(); @endphp
@section('headerz')
	<title>SIMS QUINCAILLERIE | {{ __('Shop All Your Home Improvement Needs') }}</title>
    <meta name="description" content="{{ __('Shop All Your Home Improvement Needs: small machines, Bath, Kitchen, Tools, Hardware, Storage, Patio, Garden, Lighting, Fans, Electrical, Plumbing, Paint, Flooring, Decor, and More!') }}"/>
    <meta property="og:image" content="/assets/images/banner/13.jpg" />
    <meta property="og:description" content="{{ __('Shop All Your Home Improvement Needs: small machines, Bath, Kitchen, Tools, Hardware, Storage, Patio, Garden, Lighting, Fans, Electrical, Plumbing, Paint, Flooring, Decor, and More!') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="SIMS QUINCAILLERIE | {{ __('Shop All Your Home Improvement Needs') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/catalog.css') }}">
@endsection

@section('content')

<div class="mt-bnr-inr overlay-wraper bg-parallax bg-top-center" data-stellar-background-ratio="0.5" style="background-image:url(/assets/images/banner/13.jpg);">
    <div class="overlay-main bg-black opacity-07"></div>
    <div class="container">
        <div class="mt-bnr-inr-entry">
            <div class="banner-title-outer">
                <div class="banner-title-name">
                    <h2 class="m-b0">{{ __('Begin where you are. Don\'t wait for someone else to change things for you. Do it yourself') }}</h2>
                </div>
            </div>
            <div>
                <ul class="mt-breadcrumb breadcrumb-style-2">
                    <li><a href="{{ route('homepage', $locale) }}">{{ __('Home') }}</a></li>
                    <li>SIMS QUINCAILLERIE</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="section-full p-tb80 bg-white inner-page-padding" style="background-image: url('/assets/images/background/bg-q.png')">
    <div class="container">
        <div class="section-head">
            <div class="mt-separator-outer separator-left">
                <div class="mt-separator">
                    <h2 class="text-uppercase sep-line-one "><span class="font-weight-300 text-primary">SIMS</span> QUINCAILLERIE</h2>
                </div>
            </div>
            <p class="m-b0">{{ __('Explore our online catalog or contact us to find out about promotions and great deals!') }}</p>
        </div>

        @if($featured->isNotEmpty())
            <div class="section-content catalog-strip">
                <div class="work-carousel-outer">
                    <div class="owl-carousel work-carousel owl-btn-vertical-center">
                        @foreach($featured as $product)
                            <div class="item mt-box">
                                <div class="mt-img-effect mt-img-overlay7">
                                    <a href="{{ route('catalog.show', ['language' => $locale, 'catalog' => 'quincaillerie', 'product' => $product]) }}">
                                        <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}">
                                    </a>
                                </div>
                                <div class="mt-info p-a30">
                                    <h4 class="m-b20 m-t0">
                                        <a href="{{ route('catalog.show', ['language' => $locale, 'catalog' => 'quincaillerie', 'product' => $product]) }}">{{ $product->name }}</a>
                                    </h4>
                                    <a href="{{ route('catalog.show', ['language' => $locale, 'catalog' => 'quincaillerie', 'product' => $product]) }}" class="site-button btn-effect">{{ $product->formattedPrice() }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if($products->isNotEmpty())
            <div class="section-head m-t50">
                <div class="mt-separator-outer separator-left">
                    <div class="mt-separator">
                        <h2 class="text-uppercase sep-line-one"><span class="font-weight-300 text-primary">{{ __('In stock') }}</span> {{ __('now') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row catalog-strip">
                @foreach($products as $product)
                    <div class="col-md-3 col-sm-6 m-b30">
                        @include('partials.catalog-card', ['product' => $product, 'catalog' => $catalog ?? 'quincaillerie'])
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center">{{ __('No products in this catalogue yet.') }}</p>
        @endif

        <div style="text-align:center; margin-top: 2rem; margin-bottom:2rem;">
            <a href="{{ route('catalog.index', ['language' => $locale, 'catalog' => 'quincaillerie']) }}" class="site-button outline black button-app m-r15 m-b15" style="width:100%; text-align:center;">{{ __('View complete Catalog') }}</a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="m-about-containt text-black">
                    <div class="m-about-years bg-moving" style="background-image:url(images/background/line.png);">
                        <span class="text-primary large-title" style="font-size: 50px">{{ __('Everything you need for your projects') }} </span>
                        <span class="large-title-info">{{ __('From hammers to small engines... contact us to know more.') }} </span>
                    </div>
                    <h3 class="font-weight-600">{{ __('If you\'re not happy with our deliveries, just let us know and we will do our best to make it right for you!') }}</h3>
                    <div class="author-info p-t20">
                        <a href="{{ route('contact', $locale) }}" class="site-button btn-effect m-b15"><span>{{ __('Talk to an Expert') }}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-full mobile-page-padding p-tb80 overlay-wraper bg-cover bg-center" style="background-image:url(/assets/images/background/dg.jpg)">
    <div class="overlay-main bg-primary opacity-07"></div>
    <div class="container">
        <div class="section-content" style="color:#fff !important;">
            <div class="call-us-section text-center">
                <h4 class="m-b15" style="color:#fff !important;"><b>{{ __('Let\'s work together') }}</b></h4>
                <h2 class="call-us-number m-b15 m-b0" style="color:#fff !important;">@contactPhone</h2>
                <h4 class="call-us-address m-t0 m-b20" style="color:#fff !important;">{{ __('Cameroon') }} & {{ __('beyond') }}</h4>
                <a href="{{ route('contact', $locale) }}" class="site-button-secondry btn-effect bg-dark">{{ __('Contact us') }}</a>
            </div>
        </div>
    </div>
</div>

<div class="section-full mobile-page-padding bg-white  p-t80 p-b30 bg-repeat square_shape1" style="background-image:url(/assets/images/background/bg-5.png);">
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 m-b30">
                    <div class="image-effect-one hover-shadow">
                        <img src="/assets/images/pic1.jpg" alt="" />
                        <div class="figcaption">
                            <h4>RMC BTP</h4>
                            <p>{{ __('Our Contractors services to build your houses and buildings from the ground up.') }}</p>
                            <a href="{{ route('construction', $locale) }}"><i class="link-plus bg-primary"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4  col-sm-6 m-b30">
                    <div class="image-effect-one hover-shadow">
                        <img src="/assets/images/pic2.jpg" alt="" />
                        <div class="figcaption">
                            <h4>SIMS QUINCAILLERIE</h4>
                            <p>{{__('Our premium equipment store for all your construction needs. We Provide heavy duty and commonly needed materials and equipments.')}}</p>
                            <a href="{{ route('catalog.index', ['language' => $locale, 'catalog' => 'quincaillerie']) }}"><i class="link-plus bg-primary"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4  col-sm-6 m-b30">
                    <div class="image-effect-one hover-shadow">
                        <img src="/assets/images/pic3.jpg" alt="" />
                        <div class="figcaption bg-dark">
                            <h4>SIMS DECOR</h4>
                            <p>{{ __('The finish touches your new home or building needs to reflect your dreams') }}</p>
                            <a href="{{ route('catalog.index', ['language' => $locale, 'catalog' => 'sims-decor']) }}"><i class="link-plus bg-primary"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-6 m-b30">
                    <div class="mt-box our-speciallization-content">
                        <h3 class="m-t0"><span class="font-weight-100">{{__('Building Your Dream Home from Scratch.')}}</span></h3>
                        <a class="site-button btn-effect" href="{{ route('contact', $locale) }}">{{ __('Request a Quote') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
