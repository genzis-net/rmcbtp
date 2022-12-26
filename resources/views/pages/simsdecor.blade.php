@extends('layouts.app')
@section('headerz')
	<title>SIMS DECOR | {{ __('Home Decor & Furniture Store') }}</title>
    <meta name="description" content="{{ __('We design, build or install your kitchen project, bedroom, living room, outdoor components and more!') }}"/>
    <meta property="og:image" content="/assets/images/banner/11.jpg" />
    <meta property="og:description" content="{{ __('We design, build or install your kitchen project, bedroom, living room, outdoor components and more!') }}" />
    <meta property="og:url"content="{{  url()->current()  }}" />
    <meta property="og:title" content="SIMS DECOR | {{ __('Home Decor & Furniture Store') }}" />
@endsection

@section('content')

<!-- INNER PAGE BANNER -->
<div class="mt-bnr-inr overlay-wraper bg-parallax bg-top-center" data-stellar-background-ratio="0.5" style="background-image:url(/assets/images/banner/11.jpg);">
    <div class="overlay-main bg-black opacity-07"></div>
    <div class="container">
        <div class="mt-bnr-inr-entry">
            <div class="banner-title-outer">
                <div class="banner-title-name">
                    <h2 class="m-b0">{{ __('Home is the starting place of love, hope and dreams.') }}</h2>
                </div>
            </div>
            <!-- BREADCRUMB ROW -->

            <div>
                <ul class="mt-breadcrumb breadcrumb-style-2">
                    <li><a href="{{ route('homepage', app()->getLocale()) }}">{{ __('Home') }}</a></li>
                    <li>SIMS DECOR</li>
                </ul>
            </div>

            <!-- BREADCRUMB ROW END -->
        </div>
    </div>
</div>
<!-- INNER PAGE BANNER END -->

<div class="section-full p-tb80 bg-white inner-page-padding" style="background-image: url('/assets/images/background/bg-sims.png')">
    <div class="container">
        <!-- TITLE START -->
        <div class="section-head">
            <div class="mt-separator-outer separator-left">
                <div class="mt-separator">
                    <h2 class="text-uppercase sep-line-one "><span class="font-weight-300 text-primary">SIMS</span> DECOR</h2>
                </div>
            </div>
        </div>
        <!-- TITLE END -->
        <div class="section-content ">
            <div class="row">
                <div class="col-md-7 col-sm-6">
                    <div class="m-about ">
                        <div class="owl-carousel about-us-carousel">
                            <!-- COLUMNS 1 -->
                            <div class="item">
                                <div class="ow-img">
                                    <a href="javascript:void(0);"><img src="/assets/images/gallery/portrait/pic4.png" alt="sims decor bed model"></a>
                                </div>
                            </div>
                            <!-- COLUMNS 2 -->
                            <div class="item">
                                <div class="ow-img">
                                    <a href="javascript:void(0);"><img src="/assets/images/gallery/portrait/pic5.png" alt="sims decor sofa model"></a>
                                </div>
                            </div>
                            <!-- COLUMNS 3 -->
                            <div class="item">
                                <div class="owl-img">
                                    <a href="javascript:void(0);"><img src="/assets/images/gallery/portrait/pic6.png" alt="sims decor office model"></a>
                                </div>
                            </div>
                            <!-- COLUMNS 4 -->
                            <div class="item">
                                <div class="ow-img">
                                    <a href="javascript:void(0);"><img src="/assets/images/gallery/portrait/pic7.png" alt="sims decor bookshelf model"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class="m-about-containt text-black p-t80">
                        <div class="m-about-years bg-moving" style="background-image:url(images/background/line.png);">
                            <span class="text-primary large-title" style="font-size: 50px">{{ __('Interior & Exterior design') }} </span>
                            <span class="large-title-info">{{ __('service tailored to Your Lifestyle and Taste') }}</span>
                        </div>
                        <h3 class="font-weight-600">{{ __('If you\'re not happy with our deliveries, just let us know and we will do our best to make it right for you!') }}</h3>
                        <p>{{ __('We design, build or install your kitchen project, bedroom, living room, outdoor components and more!') }}</p>
                        <div class="author-info p-t20">

                            <a href="{{ route('contact', app()->getLocale()) }}" class="site-button btn-effect m-b15"><span>{{ __('Request A Design') }}</span></a>

                        </div>


                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="project-detail-pic m-b30">
                        <div class="mt-media">
                            <img src="/assets/images/gallery/portrait/pic6.jpg" alt="sims decor bedroom example">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="project-detail-pic m-b30">
                        <div class="mt-media">
                            <img src="/assets/images/gallery/portrait/pic4.jpg" alt="sims decor living room example">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="project-detail-pic m-b30">
                        <div class="mt-media">
                            <img src="/assets/images/gallery/portrait/pic5.jpg" alt="sims decor TV shelf example">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-b30">
            <div class="row">
                <div class="col-md-4">
                    <div class="mt-icon-box-wraper bx-style-1 p-a20 left bg-white block-shadow">
                        <div class="mt-icon-box-xs bg-secondry scale-in-center">
                            <span class="icon-cell text-primary"><i class="fa fa-trophy"></i></span>
                        </div>
                        <div class="icon-content">
                            <h4 class="mt-tilte">{{ __('Indoors furniture design - making - install') }}</h4>
                            <p>{{ __('With the agreed final concept, we will deliver and we will revise according to your comments.') }}</p>
                        </div>
                    </div>
                    <div class="mt-icon-box-wraper bx-style-1 p-a20 left bg-white block-shadow">
                        <div class="mt-icon-box-xs bg-secondry scale-in-center">
                            <span class="icon-cell text-primary"><i class="fa fa-trophy"></i></span>
                        </div>
                        <div class="icon-content">
                            <h4 class="mt-tilte">{{ __('Home Decor Work done by professsionals') }}</h4>
                            <p>{{ __('Just visualize your home and our teams we make it a reality.') }}</p>
                        </div>
                    </div>
                    <div class="mt-icon-box-wraper bx-style-1 p-a20 left bg-white block-shadow">
                        <div class="mt-icon-box-xs bg-secondry scale-in-center">
                            <span class="icon-cell text-primary"><i class="fa fa-trophy"></i></span>
                        </div>
                        <div class="icon-content">
                            <h4 class="mt-tilte">{{ __('Outdoor design and work') }}</h4>
                            <p>{{ __('Happiness Guarantee') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mt-box">
                        <div class="mt-thum-bx mt-img-overlay1 mt-img-effect yt-thum-box">
                            <img src="/assets/images/video-bg2.jpg" alt="sims decor work example">
                            <a href="https://www.youtube.com/watch?v=dofyR9p8e7w" class="mfp-video play-now">
                                <i class="icon fa fa-play"></i>
                                <span class="ripple"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- ABOUT COMPANY SECTION END -->

<!-- CALL US SECTION START -->
<div class="section-full mobile-page-padding p-tb80 overlay-wraper bg-cover bg-center" style="background-image:url(/assets/images/background/dg.jpg)">
    <div class="overlay-main bg-primary opacity-07"></div>
    <div class="container">

        <div class="section-content" style="color:#fff !important;">
            <div class="call-us-section text-center">
                <h4 class="m-b15" style="color:#fff !important;"><b>{{ __('Let\'s work together') }}</b></h4>
                <h2 class="call-us-number m-b15 m-b0" style="color:#fff !important;">+237 693 909 159</h2>
                <h4 class="call-us-address m-t0 m-b20" style="color:#fff !important;">{{ __('Cameroon') }} & {{ __('beyond') }}</h4>
                <a href="{{ route('contact', app()->getLocale()) }}" class="site-button-secondry btn-effect bg-dark">{{ __('Contact us') }}</a>
            </div>
        </div>

    </div>
</div>
<!-- CALL US SECTION END -->

<!-- OUR SPECIALLIZATION START -->
<div class="section-full mobile-page-padding bg-white  p-t80 p-b30 bg-repeat square_shape1" style="background-image:url(/assets/images/background/bg-5.png);">
    <div class="container">
        <!-- IMAGE CAROUSEL START -->
        <div class="section-content">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 m-b30">

                    <div class="image-effect-one hover-shadow">
                        <img src="/assets/images/pic1.jpg" alt="rmc btp logo" />
                        <div class="figcaption">
                            <h4>RMC BTP</h4>
                            <p>{{ __('Our Contractors services to build your houses and buildings from the ground up.') }}</p>
                            <a href="{{ route('construction', app()->getLocale()) }}"><i class="link-plus bg-primary"></i></a>
                        </div>


                    </div>

                </div>
                <div class="col-lg-3 col-md-4  col-sm-6 m-b30">

                    <div class="image-effect-one hover-shadow">
                        <img src="/assets/images/pic2.jpg" alt="sims quincaillerie logo" />
                        <div class="figcaption">
                            <h4>SIMS QUINCAILLERIE</h4>
                            <p>{{__('Our premium equipment store for all your construction needs. We Provide heavy duty and commonly needed materials and equipments.')}}</p>
                            <a href="{{ route('quincaillerie', app()->getLocale()) }}"><i class="link-plus bg-primary"></i></a>
                        </div>

                    </div>

                </div>
                <div class="col-lg-3 col-md-4  col-sm-6 m-b30">

                    <div class="image-effect-one hover-shadow">
                        <img src="/assets/images/pic3.jpg" alt="sims decor logo" />
                        <div class="figcaption bg-dark">
                            <h4>SIMS DECOR</h4>
                            <p>{{ __('The finish touches your new home or building needs to reflect your dreams') }}</p>
                            <a href="{{ route('simsdecor', app()->getLocale()) }}"><i class="link-plus bg-primary"></i></a>
                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-12 col-sm-6 m-b30">

                    <div class="mt-box our-speciallization-content">
                        <h3 class="m-t0"><span class="font-weight-100">{{__('Building Your Dream Home from Scratch.')}}</span></h3>
                        <a class="site-button btn-effect" href="{{ route('contact', app()->getLocale()) }}">{{ __('Request a Quote') }}</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- OUR SPECIALLIZATION END -->
@endsection
