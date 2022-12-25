@extends('layouts.app')
@section('headerz')
<title>RMC BTP sarl | Renovation Service</title>
<meta property="og:image" content="/assets/images/favicon.jpg" />
<meta property="og:description" content="" />
<meta property="og:url" content="https://rmcbtpsarl.com/services/renovation" />
<meta property="og:title" content="RMC BTP sarl | Renovation Service" />
<meta name="keywords" content="">
@endsection

@section('content')

<!-- INNER PAGE BANNER -->
<div class="mt-bnr-inr overlay-wraper bg-parallax bg-top-center" data-stellar-background-ratio="0.5" style="background-image:url(/assets/images/banner/16.jpg);">
    <div class="overlay-main bg-black opacity-07"></div>
    <div class="container">
        <div class="mt-bnr-inr-entry">
            <div class="banner-title-outer">
                <div class="banner-title-name">
                    <h2 class="m-b0">If Your Home Has Been Damaged ... Call us</h2>
                </div>
            </div>
            <!-- BREADCRUMB ROW -->

            <div>
                <ul class="mt-breadcrumb breadcrumb-style-2">
                    <li><a href="{{ route('homepage', app()->getLocale()) }}">Home</a></li>
                    <li>Services</li>
                    <li>Renovation</li>
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
                    <h2 class="text-uppercase sep-line-one "><span class="font-weight-300 text-primary">Renovation</span> Service</h2>
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
                                        <img src="/assets/images/s-4.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <div class="service-about-right m-b30">
                                    <h3 class="m-t0">Our Work goes beyong repairing...</h3>
                                    <p>From minor improvements to complete home renovations, our skilled team of fifth-generation carpenters at Barton Construction is your trusted source for the highest quality home remodeling and renovation services in Caneroon. Serving all regions, we are a highly experienced residential remodeling and construction contractor specializing in a wide range of custom home improvement solutions, including bathroom and kitchen remodeling, basement finishing, whole-home renovations, and exterior property additions.</p>
                                    <div class="call-for-quote-outer">
                                        <div class="call-quote">
                                            <span>Call For a Quote:</span>
                                            <h4>+237 693 909 159</h4>
                                        </div>
                                        <div class="call-estimate bg-dark">
                                            <a href="{{ route('contact', app()->getLocale()) }}" class="site-button-secondry btn-effect">Discuss with an Engineer</a>
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
								<h2 class="text-uppercase sep-line-one "><span class="font-weight-300 text-primary">Our</span> Projects</h2>
							</div>
						</div>
					</div>                   
                    <!-- TITLE END -->                
                    <!-- PAGINATION START -->
                    <div class="filter-wrap p-b15 center">
                        <ul class="masonry-filter link-style  text-uppercase white">
                                <li class="active"><a data-filter="*" href="#">All</a></li>
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

<!-- CALL US SECTION START -->
<div class="section-full mobile-page-padding p-tb80 overlay-wraper bg-cover bg-center" style="background-image:url(/assets/images/background/dg.jpg)">
    <div class="overlay-main bg-primary opacity-07"></div>
    <div class="container">

        <div class="section-content" style="color:#fff !important;">
            <div class="call-us-section text-center">
                <h4 class="m-b15" style="color:#fff !important;"><b>Let's work together</b></h4>
                <h2 class="call-us-number m-b15 m-b0" style="color:#fff !important;">+237 693 909 159</h2>
                <h4 class="call-us-address m-t0 m-b20" style="color:#fff !important;">Cameroon & beyond</h4>
                <a href="{{ route('contact', app()->getLocale()) }}" class="site-button-secondry btn-effect bg-dark">Contact Us</a>
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
                        <img src="/assets/images/pic1.jpg" alt="" />
                        <div class="figcaption">
                            <h4>RMC BTP</h4>
                            <p>Our Contractors services to build yout houses and buildings from the ground up.</p>
                            <a href="{{ route('construction', app()->getLocale()) }}"><i class="link-plus bg-primary"></i></a>
                        </div>


                    </div>

                </div>
                <div class="col-lg-3 col-md-4  col-sm-6 m-b30">

                    <div class="image-effect-one hover-shadow">
                        <img src="/assets/images/pic2.jpg" alt="" />
                        <div class="figcaption">
                            <h4>SIMS QUINCAILLERIE</h4>
                            <p>Our premium equipment store for all your construction needs. We Provide heavy duty
                                and commonly needed materials and equipments.</p>
                            <a href="{{ route('quincaillerie', app()->getLocale()) }}"><i class="link-plus bg-primary"></i></a>
                        </div>

                    </div>

                </div>
                <div class="col-lg-3 col-md-4  col-sm-6 m-b30">

                    <div class="image-effect-one hover-shadow">
                        <img src="/assets/images/pic3.jpg" alt="" />
                        <div class="figcaption bg-dark">
                            <h4>SIMS DECOR</h4>
                            <p>The finish touches your new home or building needs to reflect your dreams</p>
                            <a href="{{ route('simsdecor', app()->getLocale()) }}"><i class="link-plus bg-primary"></i></a>
                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-12 col-sm-6 m-b30">

                    <div class="mt-box our-speciallization-content">
                        <h3 class="m-t0"><span class="font-weight-100">Building Your Dream Home from
                                Scratch.</span></h3>
                        <a class="site-button btn-effect" href="{{ route('contact', app()->getLocale()) }}">Request a Quote</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- OUR SPECIALLIZATION END -->
@endsection
