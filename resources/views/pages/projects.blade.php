@extends('layouts.app')
@section('headerz')
    <title>RMC-BTP | {{ __('Our work') }}</title>
    <meta name="description" content="{{ __('Explore our contractors\' work in different cities of Cameroon.') }}" />
    <meta property="og:image" content="/assets/images/banner/10.jpg" />
    <meta property="og:description" content="{{ __('Explore our contractors\' work in different cities of Cameroon.') }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="RMC-BTP | {{ __('Our work') }}" />
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
                        <h2 class="m-b0">{{ __('CREATING QUALITY URBAN LIFESTYLES, BUILDING STRONGER COMMUNITIES.') }}</h2>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="mt-breadcrumb breadcrumb-style-2">
                        <li><a href="{{ route('homepage', app()->getLocale()) }}">{{ __('Home') }}</a></li>
                        <li>{{ __('Projects') }}</li>
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
                    <li class="active"><a data-filter="*" href="#" data-hover="All">{{ __('All') }}</a></li>
                    <li><a data-filter=".Construction" href="#" data-hover="Construction">Construction</a></li>
                    <li><a data-filter=".Renovation" href="#" data-hover="Renovation">Renovation</a></li>
                    <li><a data-filter=".Architecture" href="#" data-hover="Architecture">Architecture</a></li>
                    <li><a data-filter=".Interior" href="#" data-hover="Interiors">Interior</a></li>
                    <li><a data-filter=".Consulting" href="#" data-hover="Consulting">Consulting</a></li>
                </ul>
            </div>
            <!-- PAGINATION END -->
            <!-- GALLERY CONTENT START -->
            <style>
                .marged{
                    margin-left: 5rem; margin-right:5rem;
                }

                .theimage{
                    width: 100%; 
                    height: 350px; 
                    background-size: cover;
                }

                .trimmed{
                    overflow: hidden;
                    text-overflow: ellipsis;
                    display: -webkit-box;
                    -webkit-line-clamp: 3; /* number of lines to show */
                            line-clamp: 2;
                    -webkit-box-orient: vertical;
                }

                @media (max-width: 500px){
                    .marged{
                        margin-left: 0.2rem; margin-right:0.2rem;
                    }
                    .theimage{
                        width: 100%; 
                        height: 200px; 
                    }

                }
            </style>
            <div class="portfolio-wrap mfp-gallery work-grid row clearfix marged" style="">
                @foreach($refs as $ref)
                <div class="masonry-item {{ $ref->project_type }}  col-lg-4 col-md-4 col-sm-6 m-b30" style="border: 1px solid blue; margin: auto; padding: 2rem;">
                    <div class="project-classic" >
                        <div class="mt-box">
                            <div class="theimage" style="background-image:url('/images/achievements/{{ $ref->title_en }}/{{ $ref->images[0]->src }}'); "></div>
                        </div>
                        <div class="mt-info p-t20">
                            <h4 class="mt-title m-b20 m-t0" data-hover="{{ $ref->{'title_'.app()->getLocale()} }}">{{ $ref->{'title_'.app()->getLocale()} }}</h4>
                            <?php 
                                $truncated = Str::of($ref->{'content_'.app()->getLocale()})->limit(200);
                            ?>
                            <p class="trimmed">{!! $truncated !!}</p>
                            <a href="{{ route('readproject', app()->getLocale()) }}?ref={{ $ref->id }}" class="site-button-link" data-hover="Read More">{{ __('More') }} <i class="fa fa-angle-right arrow-animation"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
            <!-- GALLERY CONTENT END -->

            <div class="m-t50 text-center">
                <a href="#" class="site-button btn-effect">{{ $refs->links() }}</a>
            </div>
        </div>
        <!-- GALLERY CONTENT END -->

    </div>


    @endsection
