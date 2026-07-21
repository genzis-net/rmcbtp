@extends('layouts.app')
@section('headerz')
<?php 
    $truncated = Str::of($ref->{'content_'.app()->getLocale()})->limit(200);
    $cover = $ref->images->first();
    $coverUrl = $cover ? '/images/achievements/'.$ref->title_en.'/'.$cover->src : '/assets/images/gallery/pic4.jpg';
?>
<title>{{ $ref->{'title_'.app()->getLocale()} }}</title>
<meta property="og:image" content="{{ $coverUrl }}" />
<meta property="og:description" content="{{ $truncated }}" />
<meta property="og:url" content="https://rmcbtpsarl.com/projects/{{ $ref->title_en }}" />
<meta property="og:title" content="{{ $ref->{'title_'.app()->getLocale()} }}" />
<meta name="keywords" content="{{ $truncated }}">
@endsection

@section('content')
<div class="page-content">
            <style>

                .theimage{
                    height: 600px; 
                    overflow:hidden;
                }

                @media (max-width: 500px){
                    .theimage{
                        height: 200px; 
                    }

                }
            </style>
    <!-- INNER PAGE BANNER -->
    <div class="mt-bnr-inr overlay-wraper bg-parallax bg-top-center" data-stellar-background-ratio="0.5" style="background-image:url('{{ $coverUrl }}'); ">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <div class="mt-bnr-inr-entry">
                <div class="banner-title-outer">
                    <div class="banner-title-name">
                        <h2 class="m-b0">{{ $ref->{'title_'.app()->getLocale()} }}</h2>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->

                <div>
                    <ul class="mt-breadcrumb breadcrumb-style-2">
                        <li><a href="{{ route('homepage', app()->getLocale()) }}">{{ __('Home') }}</a></li>
                        <li><a href="{{ route('projects.index', app()->getLocale()) }}">{{ __('Our Work') }}</a></li>
                        <li>{{ $ref->title_en }}</li>
                    </ul>
                </div>

                <!-- BREADCRUMB ROW END -->
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->

    <div class="section-full p-tb80 square_shape1 square_shape3 inner-page-padding">
        <div class="container">
            <!-- BLOG START -->
            <div class="blog-post date-style-3 blog-detail text-black">
                <div class="mt-post-media">
                    <!--Fade slider-->
                    <div class="owl-carousel owl-fade-slider-one owl-btn-vertical-center owl-dots-bottom-right m-b30">

                    @foreach($ref->images as $image)
                        <div class="item theimage">
                            <div class="aon-thum-bx">
                                <img src="/images/achievements/{{ $ref->title_en }}/{{ $image->src}}" alt="{{ $ref->title_en }}">
                            </div>
                        </div>
                    @endforeach
                        

                    </div>
                    <!--fade slider END-->
                </div>

                <div class="mt-post-meta ">
                    <ul>
                        <li class="post-date"><strong>{{ __('Year') }}: </strong> <span>{{ $ref->year }}</span> </li>
                        <li class="post-author"><strong>{{ __('Location') }}: </strong> <span>{{ $ref->location }}</span> </li>
                        <li class="post-author"><strong>Client: </strong> <span>{{ $ref->client }}</span> </li>
                        <li class="post-author"><strong>Service: </strong> <span>{{ $ref->project_type }}</span> </li>
                    </ul>
                </div>

                <div class="mt-post-title ">
                    <h2 class="post-title"><a href="javascript:void(0);" class="font-weight-600">{{ $ref->{'title_'.app()->getLocale()} }}</a></h2>
                </div>

                <div class="mt-post-text">
                    {!! nl2br(e($ref->{'content_'.app()->getLocale()})) !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
