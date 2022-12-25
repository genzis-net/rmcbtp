<!DOCTYPE html>
<html lang="en">


<head>

    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="https://rmcbtpsarl.com" />

    @yield('headerz')

    <!-- FAVICONS ICON -->
    <link rel="icon" href="/assets/images/favicon.jpg" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.jpg" />

    <!-- PAGE TITLE HERE -->

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- [if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
 <![endif] -->

    <!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">

    <!-- FONTAWESOME STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="/assets/css/fontawesome/css/font-awesome.min.css" />

    <!-- OWL CAROUSEL STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="/assets/css/owl.carousel.min.css">

    <!-- MAGNIFIC POPUP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="/assets/css/magnific-popup.min.css">

    <!-- LOADER STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="/assets/css/loader.min.css">

    <!-- FLATICON STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="/assets/css/flaticon.min.css">

    <!-- MAIN STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">

    <!-- Color Theme Change Css -->
    <link rel="stylesheet" class="skin" type="text/css" href="/assets/css/skin/skin-1.css">



    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/plugins/revolution/revolution/css/settings.css">

    <!-- REVOLUTION NAVIGATION STYLE -->
    <link rel="stylesheet" type="text/css" href="/assets/plugins/revolution/revolution/css/navigation.css">

</head>

<style>

	.mobile-version{
		display: none;
	}
	@media (max-width: 500px){
		.top-bar{
			display:none;
		}

		.mobile-version{
			display: block;
		}

		.desktop-version{
			display: none;
		}

		.about-us-carousel{
			display: none;
		}

		.image-effect-one{
			height: 350px;
			overflow: hidden;
		}

	}
	
</style>


<body>
    <div class="page-wraper">

        <!-- HEADER START -->
        <header class="site-header header-style-1">
            <div class="top-bar bg-gray">
                <div class="container">
                    <div class="row">
                        <div class="mt-topbar-left clearfix">
                            <ul class="list-unstyled e-p-bx pull-right">
                                <li><i class="fa fa-envelope"></i> <a style="color: #000;"
                                        href="javascript:location='mailto:\u0063\u006f\u006e\u0074\u0061\u0063\u0074\u0040\u0072\u006d\u0063\u0062\u0074\u0070\u0073\u0061\u0072\u006c\u002e\u0063\u006f\u006d';void 0">
                                        <script type="text/javascript">
                                            document.write(
                                                '\u0063\u006f\u006e\u0074\u0061\u0063\u0074\u0040\u0072\u006d\u0063\u0062\u0074\u0070\u0073\u0061\u0072\u006c\u002e\u0063\u006f\u006d'
                                                )
                                        </script>
                                    </a></li>
                                <li><i class="fa fa-phone"></i>+237 693 909 159</li>
                            </ul>
                        </div>
                        <div class="mt-topbar-right clearfix">
                            <div class="appint-btn"><a href="{{ route('contact') }}" class="site-button">Request a Quote</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sticky-header main-bar-wraper">
                <div class="main-bar bg-white">
                    <div class="container">
                        <div class="logo-header">
                            <div class="logo-header-inner logo-header-one">
                                <a href="/">
                                    <img src="/assets/images/logo.png" alt="" />
                                </a>
                            </div>
                        </div>
                        <!-- NAV Toggle Button -->
                        <button data-target=".header-nav" data-toggle="collapse" type="button"
                            class="navbar-toggle collapsed">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- ETRA Nav -->
                        <div class="extra-nav">
                            <div class="extra-cell">
                                <a href="javascript:;" class="contact-slide-show"><img src="/assets/images/lng.png" style="width: 35px"></a>
                            </div>
                        </div>
                        <!-- ETRA Nav -->

                        <!-- Contact Nav -->
                        <div class="contact-slide-hide "
                            style="background-image:url(/assets/images/background/bg-5.png)">
                            <div class="contact-nav">
                                <a href="javascript:void(0)" class="contact_close">&times;</a>
                                <div class="contact-nav-form p-a30">
                                    <div class="contact-info   m-b30">
										
										<div class="mt-icon-box-wraper center p-b30">
                                            <div class="icon-xs m-b20 scale-in-center">Select
                                            </div>
                                            <div class="icon-content">
                                                <h5 class="m-t0 font-weight-500">Français</h5>
                                                <h5 class="m-t0 font-weight-500">English</h5>
                                            </div>
                                        </div>
                                        
										<div class="mt-icon-box-wraper center p-b30">
                                            <div class="icon-xs m-b20 scale-in-center"><i class="fa fa-phone"></i>
                                            </div>
                                            <div class="icon-content">
                                                <h5 class="m-t0 font-weight-500">Phone number</h5>
                                                <p>+237 693 909 159</p>
                                            </div>
                                        </div>

                                        <div class="mt-icon-box-wraper center p-b30">
                                            <div class="icon-xs m-b20 scale-in-center"><i class="fa fa-envelope"></i>
                                            </div>
                                            <div class="icon-content">
                                                <h5 class="m-t0 font-weight-500">Email address</h5>
                                                <p><a style="color: #000;"
                                                        href="javascript:location='mailto:\u0063\u006f\u006e\u0074\u0061\u0063\u0074\u0040\u0072\u006d\u0063\u0062\u0074\u0070\u0073\u0061\u0072\u006c\u002e\u0063\u006f\u006d';void 0">
                                                        <script type="text/javascript">
                                                            document.write(
                                                                '\u0063\u006f\u006e\u0074\u0061\u0063\u0074\u0040\u0072\u006d\u0063\u0062\u0074\u0070\u0073\u0061\u0072\u006c\u002e\u0063\u006f\u006d'
                                                                )
                                                        </script>
                                                    </a></p>
                                            </div>
                                        </div>

                                        <div class="mt-icon-box-wraper center p-b30">
                                            <div class="icon-xs m-b20 scale-in-center"><i
                                                    class="fa fa-map-marker"></i></div>
                                            <div class="icon-content">
                                                <h5 class="m-t0 font-weight-500">Address info</h5>
                                                <p>Yaounde - Cameroon</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="full-social-bg">
                                        <ul>
                                            <li><a href="https://www.facebook.com/rmcbtp" class="facebook"><i
                                                        class="fa fa-facebook"></i></a></li>
                                            <li><a href="https://www.facebook.com/simsdec" class="facebook"><i
                                                        class="fa fa-facebook"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="text-center">
                                        <h4 class="font-weight-600">&copy;
                                            <script>
                                                document.write(new Date().getFullYear())
                                            </script> RMC BTP SARL .
                                        </h4>
                                        <h4>Delivered by <a href="https://genzis.net" style="color: #blue">Genzis</a>.
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SITE Search -->
                        <!--div id="search">
                                <span class="close"></span>
                                <form role="search" id="searchform" action="#" method="get" class="radius-xl">
                                    <div class="input-group">
                                        <input value="" name="q" type="search" placeholder="Type to search"/>
                                        <span class="input-group-btn"><button type="button" class="search-btn"><i class="fa fa-search arrow-animation"></i></button></span>
                                    </div>
                                </form>
                            </div-->
                        <!-- MAIN Vav -->
                        <div class="header-nav navbar-collapse collapse">
                            <ul class=" nav navbar-nav">
                                <li class="{{Route::currentRouteName() === 'homepage' ? 'active' : ''}}">
                                    <a href="{{ route('homepage') }}">Home</a>
                                </li>

                                <li class="{{Route::currentRouteName() === 'about' ? 'active' : ''}}">
                                    <a href="{{ route('about') }}">About us</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Services</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="javascript:;">RMC BTP</a>
                                            <ul class="sub-menu has-child">
                                                <li><a href="{{ route('consulting') }}">Consulting</a></li>
                                                <li><a href="{{ route('architecture') }}">Architecture</a></li>
                                                <li><a href="{{ route('construction') }}">Construction</a></li>
                                                <li><a href="{{ route('renovation') }}">Home Renovation</a></li>
                                            </ul>
                                        </li>
										<li>
											<a href="{{ route('quincaillerie') }}">SIMS QUINCAILLERIE</a>
										</li> 
										<li>
											<a href="{{ route('simsdecor') }}">SIMS DECOR</a>
										</li>                                       
                                    </ul>
                                </li>
								<!--li>
									<a href="javascript:;">Catalogues</a>
									<ul class="sub-menu has-child">
										<li><a href="{{ route('underconstruction') }}">Interior Designs and Furnitures</a></li>
										<li><a href="{{ route('underconstruction') }}">Quincailleries</a></li>
										<li><a href="{{ route('underconstruction') }}">Machineries</a></li>
										<li><a href="{{ route('underconstruction') }}">Blue prints</a></li>
									</ul>
								</li-->
								<li class="{{Route::currentRouteName() === 'projects' ? 'active' : ''}}">
									<a href="{{ route('projects') }}">Our Work</a>
								</li>
								<li class="{{Route::currentRouteName() === 'contact' ? 'active' : ''}}">
									<a href="{{ route('contact') }}">Contact us</a>
								</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!-- HEADER END -->

        <!-- CONTENT START -->
            @yield('content')
        <!-- CONTENT START -->


        <!-- FOOTER START -->
        <footer class="site-footer footer-large  footer-dark	footer-wide">
            <div class="container call-to-action-wrap bg-no-repeat bg-center"
                style="background-image:url(/assets/images/background/bg-site.png);">
            </div>
            <!-- FOOTER BLOCKES START -->
            <div class="footer-top overlay-wraper">
                <div class="overlay-main"></div>
                <div class="container">
                    <div class="row">
                        <!-- ABOUT COMPANY -->
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="widget widget_about">
                                <!--<h4 class="widget-title">About Company</h4>-->
                                <div class="logo-footer clearfix p-b15">
                                    <a href="/"><img src="/assets/images/logo-dark.png"
                                            alt=""></a>
                                </div>
                                <p class="max-w400">
									RMC-BTP is all about delivering Quality Estate construction. 
									We work with a large team of professionals, experienced and 
									passionate workes who know the value you seek in your projects.
                                </p>

                                <ul class="social-icons  mt-social-links">
                                    <li><a href="https://www.facebook.com/rmcbtp" class="fa fa-facebook"></a></li>
                                    <li><a href="https://www.facebook.com/simsdec" class="fa fa-facebook"></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- RESENT POST -->
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="widget widget_address_outer">
                                <h4 class="widget-title">Contact Us</h4>
                                <ul class="widget_address">
                                    <li>Yaounde -Cameroon</li>
                                    <li><a style="color: #fff;"
                                        href="javascript:location='mailto:\u0063\u006f\u006e\u0074\u0061\u0063\u0074\u0040\u0072\u006d\u0063\u0062\u0074\u0070\u0073\u0061\u0072\u006c\u002e\u0063\u006f\u006d';void 0">
                                        <script type="text/javascript">
                                            document.write(
                                                '\u0063\u006f\u006e\u0074\u0061\u0063\u0074\u0040\u0072\u006d\u0063\u0062\u0074\u0070\u0073\u0061\u0072\u006c\u002e\u0063\u006f\u006d'
                                                )
                                        </script>
                                    </a></li>
                                    <li>+237 693 909 159</li>
                                </ul>

                            </div>
                        </div>

                        <!-- USEFUL LINKS -->
                        <div class="col-lg-3 col-md-6 col-sm-6 footer-col-3">
                            <div class="widget widget_services inline-links">
                                <h4 class="widget-title">Useful links</h4>
                                <ul>
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <li><a href="{{ route('projects') }}">Our Work</a></li>
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                    <li><a href="{{ route('simsdecor') }}">SIMS DECOR</a></li>
                                    <li><a href="{{ route('quincaillerie') }}">SIMS QUINCAILLERIE</a></li>
                                    <!--li><a href="#">Catalogues | Home Deco</a></li>
                                    <li><a href="#">Catalogues | Sims Quincailleries</a></li>
                                    <li><a href="#">Catalogues | Sims House Plans</a></li-->
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 footer-col-3">
                            <div class="widget widget_services inline-links">
                                <h4 class="widget-title">Useful links</h4>
                                <ul>
                                    <li><a href="{{ route('consulting') }}">Consulting</a></li>
                                    <li><a href="{{ route('architecture') }}">Architecture</a></li>
                                    <li><a href="{{ route('construction') }}">Construction</a></li>
                                    <li><a href="{{ route('renovation') }}">Home Renovation</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- FOOTER COPYRIGHT -->
            <div class="footer-bottom overlay-wraper">
                <div class="overlay-main"></div>
                <div class="container">
                    <div class="row">
                        <div class="mt-footer-bot-center">
                            <span class="copyrights-text">©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> RMC BTP SARL . Designed by <a href="https://genzis.net"
                                    style="color: #fff">Genzis</a>.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->

        <!-- BUTTON TOP START -->
        <button class="scroltop"><span class="fa fa-angle-up  relative" id="btn-vibrate"></span></button>

    </div>

    

    <!-- JAVASCRIPT  FILES ========================================= -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->

    <script src="/assets/js/magnific-popup.min.js"></script><!-- MAGNIFIC-POPUP JS -->

    <script src="/assets/js/waypoints.min.js"></script><!-- WAYPOINTS JS -->
    <script src="/assets/js/counterup.min.js"></script><!-- COUNTERUP JS -->
    <script src="/assets/js/waypoints-sticky.min.js"></script><!-- COUNTERUP JS -->

    <script src="/assets/js/isotope.pkgd.min.js"></script><!-- MASONRY  -->

    <script src="/assets/js/owl.carousel.min.js"></script><!-- OWL  SLIDER  -->
    <script src="/assets/js/jquery.owl-filter.js"></script>

    <script src="/assets/js/stellar.min.js"></script><!-- PARALLAX BG IMAGE   -->



    <script src="/assets/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
    <script src="/assets/js/shortcode.js"></script><!-- SHORTCODE FUCTIONS  -->
    <script src="/assets/js/jquery.bgscroll.js"></script><!-- BACKGROUND SCROLL -->
    <!-- REVOLUTION JS FILES -->

    <script src="/assets/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="/assets/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="/assets/plugins/revolution/revolution/js/extensions/revolution-plugin.js"></script>

    <!-- REVOLUTION SLIDER SCRIPT FILES -->
    <script src="/assets/js/rev-script-1.js"></script>

@yield('scripts')


</body>


</html>
