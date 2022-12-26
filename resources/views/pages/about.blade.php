@extends('layouts.app')
@section('headerz')
<title>{{ __('About us') }} | {{ __('Meet your construction Experts') }}</title>
<meta name="description" content="{{ __('RMC-BTP is all about delivering Quality Estate construction for Cameroonians. We design, build, renovate, and develop your dream house. Learns more about us here.') }}" />
<meta property="og:image" content="/assets/images/banner/1.jpg" />
<meta property="og:description" content="{{ __('RMC-BTP is all about delivering Quality Estate construction for Cameroonians. We design, build, renovate, and develop your dream house. Learns more about us here.') }}" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:title" content="{{ __('About us') }} | {{ __('Meet your construction Experts') }}" />
@endsection

@section('content')
<div class="page-content">

    <!-- INNER PAGE BANNER -->
    <div class="mt-bnr-inr overlay-wraper bg-parallax bg-top-center" data-stellar-background-ratio="0.5" style="background-image:url(/assets/images/banner/1.jpg);">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <div class="mt-bnr-inr-entry">
                <div class="banner-title-outer">
                    <div class="banner-title-name">
                        <h2 class="m-b0">{{ __('Diversified services. Unvarying quality.') }}</h2>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="mt-breadcrumb breadcrumb-style-2">
                        <li><a href="{{ route('homepage', app()->getLocale()) }}">{{ __('Home') }}</a></li>
                        <li>{{ __('About us') }}</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->

    <!-- ABOUT COMPANY SECTION START -->
    <div class="section-full p-t80 bg-white" style="background:url('/assets/images/background/bg-site.png')">
        <div class="container">
            <div class="section-content ">
                <div class="m-service-containt text-black">
                    <div class="row">
                        <div class="col-md-5 col-sm-12">
                            <div class="service-about-left">
                                <div class="mt-media">
                                    <img src="/assets/images/s-1.png" alt="rmc btp construction engineer">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <div class="service-about-right m-b30">
                                <h3 class="m-t0">{{ __('In our work we have pride, quality is what we provide.') }}</h3>
                                <p>
                                        {{ __('RMC-BTP is all about delivering Quality Estate construction. We work with a large team of professionals, experienced and passionate workers who know the value you seek in your projects.') }}
                                </p>
                                <div class="call-for-quote-outer">
                                    <div class="call-quote">
                                        <span>{{ __('Request a Quote') }}</span>
                                        <h4>+237 693 909 159</h4>
                                    </div>
                                    <div class="call-estimate bg-dark">
                                        <a href="{{ route('contact', app()->getLocale()) }}" class="site-button-secondry btn-effect">{{ __('Discuss with an Engineer') }}</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ABOUT COMPANY SECTION END -->


    <!-- OUR SERVICES START -->
        <div class="section-full mobile-page-padding  p-b50  square_shape2">
            <div class="section-content">
                <div class="Service-half-top p-t80  bg-dark bg-moving"
                    style="background-image:url(/assets/images/background/bg-6.png)">
                    <div class="container">
                        <!-- TITLE START -->
                        <div class="section-head text-white">
                            <div class="mt-separator-outer separator-left">
                                <div class="mt-separator">
                                    <h2 class="text-white text-uppercase sep-line-one "><span
                                            class="font-weight-300 text-primary">{{__('Our')}}</span> Services</h2>
                                </div>
                            </div>
                            <h3>{{__('We Can Help You With:')}}</h3>
                        </div>
                        <!-- TITLE END -->
                    </div>
                </div>
                <div class="services-half-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">

                                <div class="mt-icon-box-wraper m-b30">
                                    <div class="relative icon-count-2 bg-gray p-a30 p-tb50" style="height: 335px;">
                                        <span class="icon-count-number">1</span>
                                        <div class="icon-md inline-icon m-b15 text-primary scale-in-center">
                                            <span class="icon-cell"><img src="/assets/images/icon/compass.png"
                                                    alt=""></span>
                                        </div>
                                        <div class="icon-content">
                                            <h4 class="mt-tilte m-b25">Architecture</h4>
                                            <p>{{ __('We design highways, bridges, houses, and building.') }} </p>
                                            <a href="{{ route('architecture', app()->getLocale()) }}" class="site-button-link" data-hover="Read More">{{ __('More') }}...<i class="fa fa-angle-right arrow-animation"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4 col-sm-6">

                                <div class="mt-icon-box-wraper m-b30">
                                    <div class="relative icon-count-2 bg-gray p-a30 p-tb50" style="    height: 335px;">
                                        <span class="icon-count-number">2</span>
                                        <div class="icon-md inline-icon m-b15 text-primary scale-in-center">
                                            <span class="icon-cell"><img src="/assets/images/icon/crane-1.png"
                                                    alt=""></span>
                                        </div>
                                        <div class="icon-content">
                                            <h4 class="mt-tilte m-b25">Construction</h4>
                                            <p>{{ __('Our method involves following latest construction standards.') }}
                                            </p>
                                            <a href="{{ route('construction', app()->getLocale()) }}" class="site-button-link" data-hover="Read More">{{ __('More') }}... <i class="fa fa-angle-right arrow-animation"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4 col-sm-6">

                                <div class="mt-icon-box-wraper m-b30">
                                    <div class="relative icon-count-2 bg-gray p-a30 p-tb50" style="    height: 335px;">
                                        <span class="icon-count-number">3</span>
                                        <div class="icon-md inline-icon m-b15 text-primary scale-in-center">
                                            <span class="icon-cell"><img src="/assets/images/icon/toolbox.png"
                                                    alt=""></span>
                                        </div>
                                        <div class="icon-content">
                                            <h4 class="mt-tilte m-b25">{{ __('Material') }}<br>{{ __('and Machines') }}</h4>
                                            <p>{{ __('Nails, hammers, ciment, shovels, and all sort of machineries.') }}</p>
                                            <a href="{{ route('quincaillerie', app()->getLocale()) }}" class="site-button-link" data-hover="Read More">{{ __('Explore catalog') }} <i class="fa fa-angle-right arrow-animation"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4 col-sm-6">

                                <div class="mt-icon-box-wraper m-b30">
                                    <div class="relative icon-count-2 bg-gray p-a30 p-tb50" style="    height: 335px;">
                                        <span class="icon-count-number">4</span>
                                        <div class="icon-md inline-icon m-b15 text-primary scale-in-center">
                                            <span class="icon-cell"><img src="/assets/images/icon/dump-truck.png"
                                                    alt=""></span>
                                        </div>
                                        <div class="icon-content">
                                            <h4 class="mt-tilte m-b25">Renovation</h4>
                                            <p>{{ __('Our qualified technicians are available at all time for your projects at home') }}
                                            </p>
                                            <a href="{{ route('renovation', app()->getLocale()) }}" class="site-button-link" data-hover="Read More">{{ __('Talk to an Expert') }} <i class="fa fa-angle-right arrow-animation"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4 col-sm-6">

                                <div class="mt-icon-box-wraper m-b30">
                                    <div class="relative icon-count-2 bg-gray p-a30 p-tb50" style="    height: 335px;">
                                        <span class="icon-count-number">5</span>
                                        <div class="icon-md inline-icon m-b15 text-primary scale-in-center">
                                            <span class="icon-cell"><img src="/assets/images/icon/architecture.png"
                                                    alt=""></span>
                                        </div>
                                        <div class="icon-content">
                                            <h4 class="mt-tilte m-b25">{{ __('Furnitures and Home Deco') }}</h4>
                                            <p>{{ __('Get Inspired and choose what you want your home to be like.') }} </p>
                                            <a href="{{ route('simsdecor', app()->getLocale()) }}" class="site-button-link" data-hover="Read More">{{ __('Explore catalog') }}<i class="fa fa-angle-right arrow-animation"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4 col-sm-6">

                                <div class="mt-icon-box-wraper m-b30">
                                    <div class="relative icon-count-2 bg-gray p-a30 p-tb50" style="    height: 335px;">
                                        <span class="icon-count-number">6</span>
                                        <div class="icon-md inline-icon m-b15 text-primary scale-in-center">
                                            <span class="icon-cell"><img src="/assets/images/icon/idea.png"
                                                    alt=""></span>
                                        </div>
                                        <div class="icon-content">
                                            <h4 class="mt-tilte m-b25">Consulting</h4>
                                            <p>{{ __('Need assistance with anything? We can help.')}}</p>
                                            <a href="{{ route('consulting', app()->getLocale()) }}" class="site-button-link" data-hover="Read More">{{ __('More') }}... <i class="fa fa-angle-right arrow-animation"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="hilite-title text-left p-l50 text-uppercase text-pop-up-top">
                <strong>Services</strong>
            </div>
        </div>
        <!-- OUR SERVICES  END -->


    <!-- SECTION CONTENT START -->
    
    <div class="section-full p-t80 p-b50 bg-parallax bg-cover" data-stellar-background-ratio="0.5" style="background-image:url(/assets/images/background/bg5.jpg);">
        <div class="container">
            <!-- TITLE START -->
            <div class="section-head">
                <div class="mt-separator-outer separator-center">
                    <div class="mt-separator text-white">
                        <h2 class="text-uppercase sep-line-one "><span class="font-weight-300 text-primary">{{ __('Our') }}</span> {{ __('Projects') }}</h2>
                    </div>
                </div>
            </div>
            <!-- TITLE END -->
            <!-- PAGINATION START -->
            <div class="filter-wrap p-b15 center">
                <ul class="masonry-filter link-style  text-uppercase white">
                    <li class="active"><a data-filter="*" href="#">All</a></li>
                    <li><a data-filter=".Construction" href="#">Construction</a></li>
                    <li><a data-filter=".Renovation" href="#">Renovation</a></li>
                    <li><a data-filter=".Architecture" href="#">Architecture</a></li>
                    <li><a data-filter=".Interior" href="#">Interiors </a></li>
                    <li><a data-filter=".Consulting" href="#">Consulting</a></li>
                </ul>
            </div>
            <!-- PAGINATION END -->

            <!-- GALLERY CONTENT START -->
            <div class="portfolio-wrap mfp-gallery work-grid row clearfix">
                <!-- COLUMNS 1 -->
                @foreach($refs as $ref)
                <div class="masonry-item {{ $ref->project_type }}  col-md-3 col-sm-6 m-b30">
                    <div class="mt-box   image-hover-block">
                        <div class="mt-thum-bx">
                            <img src="/images/achievements/{{ $ref->title_en }}/{{ $ref->images[0]->src}}" alt="{{ $ref->title_en }}">
                        </div>
                        <div class="mt-info  p-t20 text-white">
                            <h4 class="mt-tilte m-b10 m-t0">{{ $ref->title_en }}</h4>
                        </div>
                        <a href="{{ route('readproject', app()->getLocale()) }}?ref={{ $ref->id }}"></a>
                    </div>
                </div>
                @endforeach

            </div>
            <!-- GALLERY CONTENT END -->
        </div>


    </div>
    <!-- SECTION CONTENT END  -->

    <!-- OUR VALUE START -->
    <div class="section-full mobile-page-padding p-t80 p-b30 bg-white">
        <div class="container">

            <div class="section-content">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <!-- TITLE START -->
                        <div class="section-head">
                            <div class="mt-separator-outer separator-left">
                                <div class="m-about-years bg-moving" style="">
                                    <span class="text-primary large-title">{{__("Request a Quote")}}</span>
                                </div>
                                <p>{{ __('We’re interested in talking about your Project.') }}</p>
                                <a href="{{ route('contact', app()->getLocale()) }}" class="site-button btn-effect m-b15"><span>{{__("Request a Quote")}}</span></a>
                            </div>
                        </div>
                        <div class="video-section-full bg-no-repeat bg-cover overlay-wraper" style="background-image:url(/assets/images/video-bg.jpg)">
                            <div class="overlay-main bg-black opacity-07"></div>
                            <iframe width="900" height="506" src="https://www.youtube.com/embed/UokY_YFS3JM" title="Building construction process step by step" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6">

                        <div class="mt-count m-b30 text-white mt-icon-box-wraper center  bg-dark p-a20">
                            <div class="counter font-30 font-weight-800 m-b15 text-primary">15</div>
                            <h4 class="m-tb0">{{ __('Active Experts') }}</h4>
                        </div>
                        <div class="mt-count m-b30 text-white mt-icon-box-wraper center  bg-dark p-a20">
                            <div class="counter font-30 font-weight-800 m-b15  text-primary">20</div>
                            <h4 class="m-tb0">{{ __('Satisfied Clients') }}</h4>
                        </div>
                        <div class="mt-count m-b30 text-white mt-icon-box-wraper center  bg-dark p-a20">
                            <div class="counter font-30 font-weight-800 m-b15 text-primary">35</div>
                            <h4 class="m-tb0">{{ __('Project Completed') }}</h4>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6">
                        <div class="m-about ">
                            <div class="owl-carousel about-us-carousel">
                                <!-- COLUMNS 1 -->
                                <div class="item">
                                    <div class="ow-img">
                                        <a href="javascript:void(0);"><img src="/assets/images/gallery/portrait/pic1.jpg" alt="sims decor project"></a>
                                    </div>
                                </div>
                                <!-- COLUMNS 2 -->
                                <div class="item">
                                    <div class="ow-img">
                                        <a href="javascript:void(0);"><img src="/assets/images/gallery/portrait/pic2.jpg" alt="rmc btp construction project"></a>
                                    </div>
                                </div>
                                <!-- COLUMNS 3 -->
                                <div class="item">
                                    <div class="owl-img">
                                        <a href="javascript:void(0);"><img src="/assets/images/gallery/portrait/pic3.jpg" alt="sims decor kitchen project"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- OUR VALUE END -->


    @endsection
