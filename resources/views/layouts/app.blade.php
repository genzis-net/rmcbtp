<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="https://rmcbtp.com" />
    <meta name="google-site-verification" content="0wojRVejhyyL9C2bml6hyXCHsBBmyt8nK9-xQoG6iXw" />

    @yield('headerz')

    <link rel="icon" href="{{ asset('assets/images/favicon.jpg') }}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.jpg') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/loader.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flaticon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" class="skin" type="text/css" href="{{ asset('assets/css/skin/skin-1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/site-chrome.css') }}">

    @stack('styles')
</head>

<body>
    <div class="page-wraper">
        @include('partials.header')

        @yield('content')

        @include('partials.footer')

        <button class="scroltop"><span class="fa fa-angle-up relative" id="btn-vibrate"></span></button>
    </div>

    <script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints-sticky.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.owl-filter.js') }}"></script>
    <script src="{{ asset('assets/js/stellar.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/shortcode.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.bgscroll.js') }}"></script>

    @stack('scripts')
    @yield('scripts')
</body>

</html>
