@extends('layouts.app')
@section('headerz')
	<title>Construction service | {{ __('Building Cameroon one design at the time') }}</title>
    <meta name="description" content="{{ __('RMC-BTP has the Architectural And Design Expertise You Can Trust. We are a global design, architecture, engineering and planning firm in Cameroon.') }}"/>
    <meta property="og:image" content="/assets/images/banner/15.jpg" />
    <meta property="og:description" content="{{ __('RMC-BTP has the Architectural And Design Expertise You Can Trust. We are a global design, architecture, engineering and planning firm in Cameroon.') }}" />
    <meta property="og:url"content="{{  url()->current()  }}" />
    <meta property="og:title" content="Construction service | {{ __('Building Cameroon one design at the time') }}" />
@endsection

@section('content')

<!-- INNER PAGE BANNER -->
<div class="mt-bnr-inr overlay-wraper bg-parallax bg-top-center" data-stellar-background-ratio="0.5" style="background-image:url(/assets/images/banner/15.jpg);">
    <div class="overlay-main bg-black opacity-07"></div>
    <div class="container">
        <div class="mt-bnr-inr-entry">
            <div class="banner-title-outer">
                <div class="banner-title-name">
                    <h2 class="m-b0">{{ __('Because everyone Deserves a well built shelter.') }}</h2>
                </div>
            </div>
            <!-- BREADCRUMB ROW -->

            <div>
                <ul class="mt-breadcrumb breadcrumb-style-2">
                    <li><a href="{{ route('homepage', app()->getLocale()) }}">{{ __('Home') }}</a></li>
                    <li>Services</li>
                    <li>RMC-BTP</li>
                    <li>Construction</li>
                </ul>
            </div>

            <!-- BREADCRUMB ROW END -->
        </div>
    </div>
</div>
<!-- INNER PAGE BANNER END -->

<div class="section-full p-tb80 bg-white inner-page-padding">
    <div class="container">
        <!-- TITLE START -->
        <div class="section-head">
            <div class="mt-separator-outer separator-left">
                <div class="mt-separator">
                    <h2 class="text-uppercase sep-line-one "><span class="font-weight-300 text-primary">Construction</span> Service</h2>
                </div>
            </div>
        </div>
        <!-- TITLE END -->
        <!-- ABOUT COMPANY SECTION START -->
        <div class="section-full p-t80 bg-white" style="background:url('/assets/images/background/bg-site.png')">
            <div class="container">
                <div class="section-content ">
                    <div class="m-service-containt text-black">
                        <div class="row">
                            <div class="col-md-5 col-sm-12">
                                <div class="service-about-left">
                                    <div class="mt-media">
                                        <img src="/assets/images/s3.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <div class="service-about-right m-b30">
                                    <h3 class="m-t0">{{ __('General Contracting') }}</h3>
                                    <p>{{ __('At RMC-BTP Construction service, we specialize in providing unique and personal & custom solutions for Commercial and Personal residential projects. Whether you are planning a renovation or are at planning a new construction design we are here to help you from planning, permitting, breaking ground and seeing the project through. Whether you are a seasoned investor or looking for a new home, construction is difficult to navigate. Working with our clients to find real solutions to real issues, wants and needs is what we enjoy. From design through the completion of a project, we are there with you every step of the way.') }}</p>
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

    </div>
</div>
<!-- ABOUT COMPANY SECTION END -->


<!-- SECTION CONTENT START -->
            <div class="section-full p-t80 p-b50 bg-parallax bg-cover"  data-stellar-background-ratio="0.5" style="background-image:url(/assets/images/background/bg5.jpg);">
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
                                <li class="active"><a data-filter="*" href="#">{{ __('All') }}</a></li>
                                @foreach($refs as $ref)
                                    <li><a data-filter=".{{ ref->year }}" href="#">{{ ref->year }}</a></li>
                                @endforeach
                        </ul>
                    </div>
                    <!-- PAGINATION END -->
                    
                    <!-- GALLERY CONTENT START -->
                     <div class="portfolio-wrap mfp-gallery work-grid row clearfix">
                        <!-- COLUMNS 1 -->
                        @foreach($refs as $ref)
                            <div class="masonry-item {{ ref->year }}  col-md-3 col-sm-6 m-b30">
                        	<div class="mt-box   image-hover-block">
                                <div class="mt-thum-bx">
                                    <img src="/images/achievements/{{ $ref->title_en }}/{{ $ref->images[0]->src}}" alt="{{ ref->title_en }}">
                                </div>
                                <div class="mt-info  p-t20 text-white">
                                    <h4 class="mt-tilte m-b10 m-t0">{{ $ref->{'title_'.app()->getLocale()} }}</h4>
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
