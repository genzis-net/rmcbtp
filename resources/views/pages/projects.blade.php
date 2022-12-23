@extends('layouts.app')
@section('headerz')
<title>RMC BTP sarl | About Us</title>
<meta property="og:image" content="/assets//assets//assets/images/favicon.jpg" />
<meta property="og:description" content="" />
<meta property="og:url" content="https://rmcbtpsarl.com/projects" />
<meta property="og:title" content="RMC BTP sarl | Our Work" />
<meta name="keywords" content="">
@endsection

@section('content')
<div class="page-content">

    <!-- INNER PAGE BANNER -->
    <div class="mt-bnr-inr overlay-wraper bg-parallax bg-top-center" data-stellar-background-ratio="0.5" style="background-image:url(/assets/images/banner/10.jpg);">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <div class="mt-bnr-inr-entry">
                <div class="banner-title-outer">
                    <div class="banner-title-name">
                        <h2 class="m-b0">CREATING QUALITY URBAN LIFESTYLES, BUILDING STRONGER COMMUNITIES.</h2>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="mt-breadcrumb breadcrumb-style-2">
                        <li><a href="{{ route('homepage') }}">Home</a></li>
                        <li>Projects</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->

    <div class="section-full p-tb80 bg-gray inner-page-padding">

        <!-- GALLERY CONTENT START -->
        <div class="container-fluid">
            <!-- PAGINATION START -->
            <div class="filter-wrap p-b30 text-center">
                <ul class="filter-navigation inline-navigation masonry-filter link-style  text-uppercase">
                    <li class="active"><a data-filter="*" href="#" data-hover="All">All</a></li>
                    <li><a data-filter=".cat-1" href="#" data-hover="Construction">Construction</a></li>
                    <li><a data-filter=".cat-2" href="#" data-hover="Renovation">Renovation</a></li>
                    <li><a data-filter=".cat-3" href="#" data-hover="Outdoor">Outdoor</a></li>
                    <li><a data-filter=".cat-4" href="#" data-hover="Interiors">Interiors </a></li>
                    <li><a data-filter=".cat-5" href="#" data-hover="Consulting">Consulting</a></li>
                </ul>
            </div>
            <!-- PAGINATION END -->
            <!-- GALLERY CONTENT START -->

            <div class="portfolio-wrap mfp-gallery work-grid row clearfix">
                <!-- COLUMNS 1 -->
                <div class="masonry-item cat-1  col-lg-3 col-md-4 col-sm-6 m-b30">
                    <div class="project-classic">
                        <div class="mt-box ">
                            <div class="mt-thum-bx  img-center-icon  mt-img-overlay2">
                                <img src="/assets/images/projects/square/pic4.jpg" alt="">
                                <div class="overlay-bx">
                                    <div class="overlay-icon">
                                        <a href="project-detail.html">
                                            <i class="fa fa-external-link mt-icon-box-xs "></i>
                                        </a>
                                        <a class="mfp-link" href="/assets/images/projects/square/pic4.jpg">
                                            <i class="fa fa-arrows-alt mt-icon-box-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-info p-t20">
                            <h4 class="mt-title m-b20 m-t0" data-hover="Stronger communities">Stronger communities</h4>
                            <p>This is ipsum dolor sitamet, consectetur adipisi cing elito, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                            <a href="#" class="site-button-link" data-hover="Read More">Read More <i class="fa fa-angle-right arrow-animation"></i></a>
                        </div>
                    </div>
                </div>
                <!-- COLUMNS 2 -->
                <div class="masonry-item cat-2 col-lg-3 col-md-4 col-sm-6 m-b30">
                    <div class="project-classic">
                        <div class="mt-box ">
                            <div class="mt-thum-bx img-center-icon  mt-img-overlay2">
                                <img src="/assets/images/projects/square/pic3.jpg" alt="">
                                <div class="overlay-bx">
                                    <div class="overlay-icon">
                                        <a href="project-detail.html">
                                            <i class="fa fa-external-link mt-icon-box-xs "></i>
                                        </a>
                                        <a class="mfp-link" href="/assets/images/projects/square/pic3.jpg">
                                            <i class="fa fa-arrows-alt mt-icon-box-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-info p-t20">
                            <h4 class="mt-title m-b20 m-t0" data-hover="Concept to creation">Concept to creation</h4>
                            <p>This is ipsum dolor sitamet, consectetur adipisi cing elito, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p> <a href="#" class="site-button-link" data-hover="Read More">Read More <i class="fa fa-angle-right arrow-animation"></i></a>
                        </div>
                    </div>
                </div>
                <!-- COLUMNS 3 -->
                <div class="masonry-item cat-3 col-lg-3 col-md-4 col-sm-6 m-b30">
                    <div class="project-classic">
                        <div class="mt-box ">
                            <div class="mt-thum-bx img-center-icon  mt-img-overlay2">
                                <img src="/assets/images/projects/square/pic6.jpg" alt="">
                                <div class="overlay-bx">
                                    <div class="overlay-icon">
                                        <a href="project-detail.html">
                                            <i class="fa fa-external-link mt-icon-box-xs "></i>
                                        </a>
                                        <a class="mfp-link" href="/assets/images/projects/square/pic6.jpg">
                                            <i class="fa fa-arrows-alt mt-icon-box-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-info p-t20">
                            <h4 class="mt-title m-b20 m-t0" data-hover="Safety for life">Safety for life</h4>
                            <p>This is ipsum dolor sitamet, consectetur adipisi cing elito, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p> <a href="#" class="site-button-link" data-hover="Read More">Read More <i class="fa fa-angle-right arrow-animation"></i></a>
                        </div>
                    </div>
                </div>
                <!-- COLUMNS 4 -->
                <div class="masonry-item cat-4 col-lg-3 col-md-4 col-sm-6 m-b30">
                    <div class="project-classic">
                        <div class="mt-box ">
                            <div class="mt-thum-bx img-center-icon  mt-img-overlay2">
                                <img src="/assets/images/projects/square/pic5.jpg" alt="">
                                <div class="overlay-bx">
                                    <div class="overlay-icon">
                                        <a href="project-detail.html">
                                            <i class="fa fa-external-link mt-icon-box-xs "></i>
                                        </a>
                                        <a class="mfp-link" href="/assets/images/projects/square/pic5.jpg">
                                            <i class="fa fa-arrows-alt mt-icon-box-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-info p-t20">
                            <h4 class="mt-title m-b20 m-t0" data-hover="Whatever it takes">Whatever it takes</h4>
                            <p>This is ipsum dolor sitamet, consectetur adipisi cing elito, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                            <a href="#" class="site-button-link" data-hover="Read More">Read More <i class="fa fa-angle-right arrow-animation"></i></a>
                        </div>
                    </div>
                </div>
                <!-- COLUMNS 5 -->
                <div class="masonry-item cat-5 col-lg-3 col-md-4 col-sm-6 m-b30">
                    <div class="project-classic">
                        <div class="mt-box ">
                            <div class="mt-thum-bx img-center-icon  mt-img-overlay2">
                                <img src="/assets/images/projects/square/pic7.jpg" alt="">
                                <div class="overlay-bx">
                                    <div class="overlay-icon">
                                        <a href="project-detail.html">
                                            <i class="fa fa-external-link mt-icon-box-xs "></i>
                                        </a>
                                        <a class="mfp-link" href="/assets/images/projects/square/pic7.jpg">
                                            <i class="fa fa-arrows-alt mt-icon-box-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-info p-t20">
                            <h4 class="mt-title m-b20 m-t0" data-hover="We build tomorrow">We build tomorrow</h4>
                            <p>This is ipsum dolor sitamet, consectetur adipisi cing elito, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                            <a href="#" class="site-button-link" data-hover="Read More">Read More <i class="fa fa-angle-right arrow-animation"></i></a>
                        </div>
                    </div>
                </div>
                <!-- COLUMNS 6 -->
                <div class="masonry-item cat-4 col-lg-3 col-md-4 col-sm-6 m-b30">
                    <div class="project-classic">
                        <div class="mt-box ">
                            <div class="mt-thum-bx  img-center-icon mt-img-overlay2">
                                <img src="/assets/images/projects/square/pic8.jpg" alt="">
                                <div class="overlay-bx">
                                    <div class="overlay-icon">
                                        <a href="project-detail.html">
                                            <i class="fa fa-external-link mt-icon-box-xs "></i>
                                        </a>
                                        <a class="mfp-link" href="/assets/images/projects/square/pic8.jpg">
                                            <i class="fa fa-arrows-alt mt-icon-box-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-info p-t20">
                            <h4 class="mt-title m-b20 m-t0" data-hover="The key to our success">The key to our success</h4>
                            <p>This is ipsum dolor sitamet, consectetur adipisi cing elito, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                            <a href="#" class="site-button-link" data-hover="Read More">Read More <i class="fa fa-angle-right arrow-animation"></i></a>
                        </div>
                    </div>
                </div>
                <!-- COLUMNS 7 -->
                <div class="masonry-item cat-3 col-lg-3 col-md-4 col-sm-6 m-b30">
                    <div class="project-classic">
                        <div class="mt-box ">
                            <div class="mt-thum-bx  img-center-icon mt-img-overlay2">
                                <img src="/assets/images/projects/square/pic2.jpg" alt="">
                                <div class="overlay-bx">
                                    <div class="overlay-icon">
                                        <a href="project-detail.html">
                                            <i class="fa fa-external-link mt-icon-box-xs "></i>
                                        </a>
                                        <a class="mfp-link" href="/assets/images/projects/square/pic2.jpg">
                                            <i class="fa fa-arrows-alt mt-icon-box-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-info p-t20">
                            <h4 class="mt-title m-b20 m-t0" data-hover="Rising above">Rising above</h4>
                            <p>This is ipsum dolor sitamet, consectetur adipisi cing elito, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                            <a href="#" class="site-button-link" data-hover="Read More">Read More <i class="fa fa-angle-right arrow-animation"></i></a>
                        </div>
                    </div>
                </div>
                <!-- COLUMNS 8 -->
                <div class="masonry-item cat-2 col-lg-3 col-md-4 col-sm-6 m-b30">
                    <div class="project-classic">
                        <div class="mt-box ">
                            <div class="mt-thum-bx img-center-icon  mt-img-overlay2">
                                <img src="/assets/images/projects/square/pic9.jpg" alt="">
                                <div class="overlay-bx">
                                    <div class="overlay-icon">
                                        <a href="project-detail.html">
                                            <i class="fa fa-external-link mt-icon-box-xs "></i>
                                        </a>
                                        <a class="mfp-link" href="/assets/images/projects/square/pic9.jpg">
                                            <i class="fa fa-arrows-alt mt-icon-box-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-info p-t20">
                            <h4 class="mt-title m-b20 m-t0" data-hover="From concept to creation">From concept to creation</h4>
                            <p>This is ipsum dolor sitamet, consectetur adipisi cing elito, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                            <a href="#" class="site-button-link" data-hover="Read More">Read More <i class="fa fa-angle-right arrow-animation"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            <!-- GALLERY CONTENT END -->

            <div class="m-t50 text-center">
                <a href="#" class="site-button btn-effect">Load More</a>
            </div>
        </div>
        <!-- GALLERY CONTENT END -->

    </div>


@endsection
