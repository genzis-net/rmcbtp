@extends('layouts.app')
@section('headerz')
<title>RMC BTP sarl | Consulting Service</title>
<meta property="og:image" content="/assets//assets//assets/images/favicon.jpg" />
<meta property="og:description" content="" />
<meta property="og:url" content="https://rmcbtpsarl.com/services/consulting" />
<meta property="og:title" content="RMC BTP sarl | Consulting Service" />
<meta name="keywords" content="">
@endsection

@section('content')

<!-- INNER PAGE BANNER -->
<div class="mt-bnr-inr overlay-wraper bg-parallax bg-top-center" data-stellar-background-ratio="0.5" style="background-image:url(/assets/images/banner/14.jpg);">
    <div class="overlay-main bg-black opacity-07"></div>
    <div class="container">
        <div class="mt-bnr-inr-entry">
            <div class="banner-title-outer">
                <div class="banner-title-name">
                    <h2 class="m-b0">Powerful Alone, Better Together.</h2>
                </div>
            </div>
            <!-- BREADCRUMB ROW -->

            <div>
                <ul class="mt-breadcrumb breadcrumb-style-2">
                    <li><a href="{{ route('homepage', app()->getLocale()) }}">Home</a></li>
                    <li>Services</li>
                    <li>Consulting</li>
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
                    <h2 class="text-uppercase sep-line-one "><span class="font-weight-300 text-primary">Consulting</span> Service</h2>
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
                                        <img src="/assets/images/s-2.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <div class="service-about-right m-b30">
                                    <h3 class="m-t0">OUR SUCCESS IS A PROVEN FACT</h3>
                                    <p>Any company’s level of expertise, trustworthiness or popularity can be easily checked when it comes to proven cases.
We offer a wide range of consulting expertise that can begin resolving project problems immediately and put it in the best position for an expedited recovery.</p>
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


<!-- OUR SERVICES START -->
<div class="section-full mobile-page-padding  p-b50  square_shape2" style="margin-top:-8rem;">
    <div class="section-content">
        <div class="Service-half-top p-t80  bg-dark bg-moving" style="background-image:url(/assets/images/background/bg-6.png)">
            <div class="container">
                <!-- TITLE START -->
                <div class="section-head text-white">
                    <div class="mt-separator-outer separator-left">
                        <div class="mt-separator">
                            <h2 class="text-white text-uppercase sep-line-one "><span class="font-weight-300 text-primary">Our</span> Expertise</h2>
                        </div>
                    </div>
                    <h3>We Can Help You With:</h3>
                </div>
                <!-- TITLE END -->
            </div>
        </div>
        <div class="services-half-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="mt-icon-box-wraper m-b30">
                            <div class="relative icon-count-2 bg-gray p-a30 p-tb50" style="    height: 335px;">
                                <span class="icon-count-number">1</span>
                                <div class="icon-md inline-icon m-b15 text-primary scale-in-center">
                                    <span class="icon-cell"><img src="/assets/images/icon/crane-1.png" alt=""></span>
                                </div>
                                <div class="icon-content">
                                    <h4 class="mt-tilte m-b25">Topography</h4>
                                    <p>Our method involves following latest construction standards.
                                    </p>
                                    <a href="{{ route('contact', app()->getLocale()) }}" class="site-button-link" data-hover="Read More">Talk to an Expert <i class="fa fa-angle-right arrow-animation"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4 col-sm-6">

                        <div class="mt-icon-box-wraper m-b30">
                            <div class="relative icon-count-2 bg-gray p-a30 p-tb50" style="    height: 335px;">
                                <span class="icon-count-number">2</span>
                                <div class="icon-md inline-icon m-b15 text-primary scale-in-center">
                                    <span class="icon-cell"><img src="/assets/images/icon/toolbox.png" alt=""></span>
                                </div>
                                <div class="icon-content">
                                    <h4 class="mt-tilte m-b25">Construction Oversight</h4>
                                    <p>Ensure that their project is being managed and constructed as planned.</p>
                                    <a href="#" class="site-button-link" data-hover="Read More">Talk to an Expert <i class="fa fa-angle-right arrow-animation"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4 col-sm-6">

                        <div class="mt-icon-box-wraper m-b30">
                            <div class="relative icon-count-2 bg-gray p-a30 p-tb50" style="    height: 335px;">
                                <span class="icon-count-number">3</span>
                                <div class="icon-md inline-icon m-b15 text-primary scale-in-center">
                                    <span class="icon-cell"><img src="/assets/images/icon/dump-truck.png" alt=""></span>
                                </div>
                                <div class="icon-content">
                                    <h4 class="mt-tilte m-b25">Risk Assessment</h4>
                                    <p>Risk transfer planning, to make an impact on the project's completion</p>
                                    <a href="#" class="site-button-link" data-hover="Read More">Talk to an
                                        Expert <i class="fa fa-angle-right arrow-animation"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- OUR SERVICES  END -->

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
