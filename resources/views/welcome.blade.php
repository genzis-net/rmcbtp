@extends('layouts.app')

@section('headerz')
	<title>RMC BTP sarl | Home</title>
    <meta property="og:image" content="/assets/images/favicon.jpg" />
    <meta property="og:description" content="" />
    <meta property="og:url"content="https://rmcbtpsarl.com" />
    <meta property="og:title" content="RMC BTP sarl | Home" />
    <meta name="keywords" content="">
@endsection

@section('content')
    <!-- CONTENT START -->
    <div class="page-content">


        <!-- SLIDER START -->
        <div id="welcome_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="goodnews-header"
            data-source="gallery" style="background:#eeeeee;padding:0px;">
            <div id="welcome" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.3.1">
                <ul>
                    <!-- SLIDE 1 -->
                    <li data-index="rs-901" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default"
                        data-thumb="/assets/images/main-slider/slider1/slide1.jpg" data-rotate="0" data-fstransition="fade"
                        data-fsmasterspeed="300" data-fsslotamount="7" data-saveperformance="off" data-title=""
                        data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6=""
                        data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="/assets/images/main-slider/slider1/slide1.jpg" alt=""
                            data-lazyload="/assets/images/main-slider/slider1/slide1.jpg" data-bgposition="center center"
                            data-bgfit="cover" data-bgparallax="4" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 [ for overlay ] -->
                        <div class="tp-caption tp-shape tp-shapewrapper " id="slide-901-layer-0"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                            data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape"
                            data-basealign="slide" data-responsive_offset="off" data-responsive="off"
                            data-frames='[
						{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},
						{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}
						]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 1;background-color:rgba(255, 255, 255, 0.3);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                        </div>




                        <!-- LAYER NR. 4 [ for title ] -->
                        <div class="tp-caption   tp-resizeme" id="slide-901-layer-2" data-x="['left','left','left','left']"
                            data-hoffset="['50','130','130','130']" data-y="['top','top','top','top']"
                            data-voffset="['240','240','180','200']" data-fontsize="['72','72','62','52']"
                            data-lineheight="['82','82','72','62']" data-width="['700','700','700','90%']"
                            data-height="['none','none','none','none']"
                            data-whitespace="['normal','normal','normal','normal']" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":"+790","speed":1500,"sfxcolor":"#fff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[5,5,5,5]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 13; 
						white-space: normal; 
						font-weight: 700;
						color:#111;
						border-width:0px;font-family: 'Poppins', sans-serif; text-transform:uppercase ;">
                            <div>We Build Your Dream</div>

                        </div>

                        <!-- LAYER NR. 5 [ for block] -->

                        <div class="tp-caption rev-btn  tp-resizeme slider-block" id="slide-901-layer-3"
                            data-x="['left','left','left','left']" data-hoffset="['0','80','80','60']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="button"
                            data-responsive_offset="on"
                            data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},
							{"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[250,250,250,200]"
                            data-paddingright="[150,150,150,150]" data-paddingbottom="[250,250,250,200]"
                            data-paddingleft="[150,150,150,150]" style="z-index: 8;">
                            <div class="rs-wave" data-speed="1" data-angle="0" data-radius="2px"></div>
                        </div>


                        <!-- LAYER NR. 5 [ for block] -->
                        <div class="tp-caption   tp-resizeme" id="slide-901-layer-4"
                            data-x="['left','left','left','left']" data-hoffset="['50','130','130','130']"
                            data-y="['top','top','top','top']" data-voffset="['410','410','350','340']"
                            data-fontsize="['20','20','38','28']" data-lineheight="['28','28','48','38']"
                            data-width="['600','600','700','600']" data-height="['none','none','none','none']"
                            data-whitespace="['normal','normal','normal','normal']" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":"+790","speed":1500,"sfxcolor":"#fff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[5,5,5,5]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 13; 
						white-space: normal; 
						font-weight: 500;
						color:#111;
						 border-width:0px;font-family: 'Poppins', sans-serif;">
                            At RMC-BTP we are offering more than just what you asked for at competitive prices.

                        </div>

                        <!-- LAYER NR. 6 [ for see all service botton ] -->
                        <div class="tp-caption tp-resizeme" id="slide-901-layer-5" data-x="['left','left','left','left']"
                            data-hoffset="['50','130','130','130']" data-y="['top','top','top','top']"
                            data-voffset="['500','520','540','480']" data-lineheight="['none','none','none','none']"
                            data-width="['300','300','300','300']" data-height="['none','none','none','none']"
                            data-whitespace="['normal','normal','normal','normal']" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[ 
						{"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
						{"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
						]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index:100; text-transform:uppercase;">
                            <a href="javascript:;" class="site-button-secondry btn-effect">Talk to an Expert</a>
                        </div>

                    </li>


                    <!-- SLIDE 2 -->
                    <li data-index="rs-902" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                        data-masterspeed="default" data-thumb="/assets/images/main-slider/slider1/slide2.jpg"
                        data-rotate="0" data-fstransition="fade" data-fsmasterspeed="300" data-fsslotamount="7"
                        data-saveperformance="off" data-title="" data-param1="" data-param2="" data-param3=""
                        data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                        data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="/assets/images/main-slider/slider1/slide2.jpg" alt=""
                            data-lazyload="/assets/images/main-slider/slider1/slide2.jpg" data-bgposition="center center"
                            data-bgfit="cover" data-bgparallax="4" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 [ for overlay ] -->
                        <div class="tp-caption tp-shape tp-shapewrapper " id="slide-902-layer-0"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                            data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape"
                            data-basealign="slide" data-responsive_offset="off" data-responsive="off"
                            data-frames='[
						{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},
						{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}
						]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 1;background-color:rgba(255, 255, 255, 0.3);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                        </div>




                        <!-- LAYER NR. 4 [ for title ] -->
                        <div class="tp-caption   tp-resizeme" id="slide-902-layer-2"
                            data-x="['left','left','left','left']" data-hoffset="['50','130','130','130']"
                            data-y="['top','top','top','top']" data-voffset="['240','240','180','200']"
                            data-fontsize="['72','72','62','52']" data-lineheight="['82','82','72','62']"
                            data-width="['700','700','700','90%']" data-height="['none','none','none','none']"
                            data-whitespace="['normal','normal','normal','normal']" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":"+790","speed":1500,"sfxcolor":"#fff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[5,5,5,5]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 13; 
						white-space: normal; 
						font-weight: 700;
						color:#111;
						border-width:0px;font-family: 'Poppins', sans-serif; text-transform:uppercase ;">
                            <div>From concept to creation.</div>

                        </div>

                        <!-- LAYER NR. 5 [ for block] -->

                        <div class="tp-caption rev-btn  tp-resizeme slider-block" id="slide-902-layer-3"
                            data-x="['left','left','left','left']" data-hoffset="['0','80','80','60']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="button"
                            data-responsive_offset="on"
                            data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},
							{"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[250,250,250,200]"
                            data-paddingright="[150,150,150,150]" data-paddingbottom="[250,250,250,200]"
                            data-paddingleft="[150,150,150,150]" style="z-index: 8;">
                            <div class="rs-wave" data-speed="1" data-angle="0" data-radius="2px"></div>
                        </div>


                        <!-- LAYER NR. 5 [ for block] -->
                        <div class="tp-caption   tp-resizeme" id="slide-902-layer-4"
                            data-x="['left','left','left','left']" data-hoffset="['50','130','130','130']"
                            data-y="['top','top','top','top']" data-voffset="['410','410','350','340']"
                            data-fontsize="['20','20','38','28']" data-lineheight="['28','28','48','38']"
                            data-width="['600','600','700','600']" data-height="['none','none','none','none']"
                            data-whitespace="['normal','normal','normal','normal']" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":"+790","speed":1500,"sfxcolor":"#fff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[5,5,5,5]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 13; 
						white-space: normal; 
						font-weight: 500;
						color:#111;
						 border-width:0px;font-family: 'Poppins', sans-serif;">
                            Your dream house is only days away with our prompt and professional deisgning services. Go bold
                            on the results you want.

                        </div>

                        <!-- LAYER NR. 6 [ for see all service botton ] -->
                        <div class="tp-caption tp-resizeme" id="slide-902-layer-5" data-x="['left','left','left','left']"
                            data-hoffset="['50','130','130','130']" data-y="['top','top','top','top']"
                            data-voffset="['500','520','540','480']" data-lineheight="['none','none','none','none']"
                            data-width="['300','300','300','300']" data-height="['none','none','none','none']"
                            data-whitespace="['normal','normal','normal','normal']" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[ 
						{"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
						{"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
						]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index:100; text-transform:uppercase;">
                            <a href="javascript:;" class="site-button-secondry btn-effect">Talk to an Expert</a>
                        </div>

                    </li>


                    <!-- SLIDE 3-->
                    <li data-index="rs-903" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                        data-masterspeed="default" data-thumb="/assets/images/main-slider/slider1/slide3.jpg"
                        data-rotate="0" data-fstransition="fade" data-fsmasterspeed="300" data-fsslotamount="7"
                        data-saveperformance="off" data-title="" data-param1="" data-param2="" data-param3=""
                        data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                        data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="/assets/images/main-slider/slider1/slide3.jpg" alt=""
                            data-lazyload="/assets/images/main-slider/slider1/slide3.jpg" data-bgposition="center center"
                            data-bgfit="cover" data-bgparallax="4" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <!-- LAYER NR. 1 [ for overlay ] -->
                        <div class="tp-caption tp-shape tp-shapewrapper " id="slide-903-layer-0"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                            data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape"
                            data-basealign="slide" data-responsive_offset="off" data-responsive="off"
                            data-frames='[
						{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},
						{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}
						]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 1;background-color:rgba(255, 255, 255, 0.3);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                        </div>




                        <!-- LAYER NR. 4 [ for title ] -->
                        <div class="tp-caption   tp-resizeme" id="slide-903-layer-2"
                            data-x="['left','left','left','left']" data-hoffset="['50','130','130','130']"
                            data-y="['top','top','top','top']" data-voffset="['240','240','180','200']"
                            data-fontsize="['72','72','62','52']" data-lineheight="['82','82','72','62']"
                            data-width="['700','700','700','90%']" data-height="['none','none','none','none']"
                            data-whitespace="['normal','normal','normal','normal']" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":"+790","speed":1500,"sfxcolor":"#fff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[5,5,5,5]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 13; 
						white-space: normal; 
						font-weight: 700;
						color:#111;
						border-width:0px;font-family: 'Poppins', sans-serif; text-transform:uppercase ;">
                            <div>Making dreams come to life</div>

                        </div>

                        <!-- LAYER NR. 5 [ for block] -->

                        <div class="tp-caption rev-btn  tp-resizeme slider-block" id="slide-903-layer-3"
                            data-x="['left','left','left','left']" data-hoffset="['0','80','80','60']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="button"
                            data-responsive_offset="on"
                            data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},
							{"delay":"wait","speed":500,"to":"y:[-100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power1.easeIn"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[250,250,250,200]"
                            data-paddingright="[150,150,150,150]" data-paddingbottom="[250,250,250,200]"
                            data-paddingleft="[150,150,150,150]" style="z-index: 8;">
                            <div class="rs-wave" data-speed="1" data-angle="0" data-radius="2px"></div>
                        </div>


                        <!-- LAYER NR. 5 [ for block] -->
                        <div class="tp-caption   tp-resizeme" id="slide-903-layer-4"
                            data-x="['left','left','left','left']" data-hoffset="['50','130','130','130']"
                            data-y="['top','top','top','top']" data-voffset="['410','410','350','340']"
                            data-fontsize="['20','20','38','28']" data-lineheight="['28','28','48','38']"
                            data-width="['600','600','700','600']" data-height="['none','none','none','none']"
                            data-whitespace="['normal','normal','normal','normal']" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":"+790","speed":1500,"sfxcolor":"#fff","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[5,5,5,5]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 13; 
						white-space: normal; 
						font-weight: 500;
						color:#111;
						 border-width:0px;font-family: 'Poppins', sans-serif;">
                            We have organized our ressources to ease up your decision making. Contact us today to get a
                            quote.

                        </div>

                        <!-- LAYER NR. 6 [ for see all service botton ] -->
                        <div class="tp-caption tp-resizeme" id="slide-903-layer-5" data-x="['left','left','left','left']"
                            data-hoffset="['50','130','130','130']" data-y="['top','top','top','top']"
                            data-voffset="['500','520','540','480']" data-lineheight="['none','none','none','none']"
                            data-width="['300','300','300','300']" data-height="['none','none','none','none']"
                            data-whitespace="['normal','normal','normal','normal']" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[ 
						{"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
						{"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
						]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index:100; text-transform:uppercase;">
                            <a href="javascript:;" class="site-button-secondry btn-effect">Talk to an Expert</a>
                        </div>

                    </li>


                </ul>
                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>

                <div class="multi-line-animation">
                    <div class="multi-line-one">
                        <div class="animation-block1 bounce-1"></div>
                    </div>
                    <div class="multi-line-two">
                        <div class="animation-block2 bounce-2"></div>
                    </div>
                    <div class="multi-line-three">
                        <div class="animation-block1 bounce-1"></div>
                    </div>
                    <div class="multi-line-four">
                        <div class="animation-block2 bounce-2"></div>
                    </div>
                </div>
            </div>



        </div>
        <!-- SLIDER END -->

        <!-- OUR SPECIALLIZATION START -->
        <div class="section-full mobile-page-padding bg-white  p-t80 p-b30 bg-repeat square_shape1"
            style="background-image:url(/assets/images/background/bg-5.png);">
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
                                    <a href="#"><i class="link-plus bg-primary"></i></a>
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
                                    <a href="#"><i class="link-plus bg-primary"></i></a>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-3 col-md-4  col-sm-6 m-b30">

                            <div class="image-effect-one hover-shadow">
                                <img src="/assets/images/pic3.jpg" alt="" />
                                <div class="figcaption bg-dark">
                                    <h4>SIMS DECOR</h4>
                                    <p>The finish touches your new home or building needs to reflect your dreams</p>
                                    <a href="#"><i class="link-plus bg-primary"></i></a>
                                </div>

                            </div>

                        </div>

                        <div class="col-lg-3 col-md-12 col-sm-6 m-b30">

                            <div class="mt-box our-speciallization-content">
                                <h3 class="m-t0"><span class="font-weight-100">Building Your Dream Home from
                                        Scratch.</span></h3>
                                <a class="site-button btn-effect">Request a Quote</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="hilite-title text-right p-r50 text-uppercase text-pop-up-top">
                <strong>Welcome</strong>
            </div>
        </div>
        <!-- OUR SPECIALLIZATION END -->

        <!-- ABOUT COMPANY START -->
        <div class="section-full mobile-page-padding p-t80 p-b30 bg-dark bg-repeat square_shape2 bg-moving"
            style="background-image:url(/assets/images/background/bg-6.png)">
            <div class="container">
                <!-- TITLE START -->
                <div class="section-head">
                    <div class="mt-separator-outer separator-center">
                        <div class="mt-separator">
                            <h2 class="text-white text-uppercase sep-line-one "><span
                                    class="font-weight-300 text-primary">What</span> We Do</h2>
                        </div>
                    </div>
                </div>
                <!-- TITLE END -->

                <div class="section-content">
                    <div class="row">
                        <div class="col-md-9 col-sm-12">
                            <div class="owl-carousel about-home owl-btn-vertical-center">
                                <!-- COLUMNS 1 -->
                                <div class="item ">
                                    <div class="mt-img-effect zoom-slow">
                                        <a href="javascript:void(0);"><img src="/assets/images/gallery/pic4.jpg"
                                                alt=""></a>
                                    </div>
                                </div>
                                <!-- COLUMNS 2 -->
                                <div class="item ">
                                    <div class="mt-img-effect zoom-slow">
                                        <a href="javascript:void(0);"><img src="/assets/images/gallery/pic5.jpg"
                                                alt=""></a>
                                    </div>
                                </div>
                                <!-- COLUMNS 3 -->
                                <div class="item ">
                                    <div class="mt-img-effect zoom-slow">
                                        <a href="javascript:void(0);"><img src="/assets/images/gallery/pic6.jpg"
                                                alt=""></a>
                                    </div>
                                </div>
                                <!-- COLUMNS 4 -->
                                <div class="item ">
                                    <div class="mt-img-effect zoom-slow">
                                        <a href="javascript:void(0);"><img src="/assets/images/gallery/pic7.jpg"
                                                alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-12">
                            <div class="about-home-right bg-white p-a30">
                                <h3 class="m-t0"><span class="font-weight-100">Committed</span> to superior
                                    quality and results.</h3>
                                <p><strong>
                                        RMC-BTP is all about delivering Quality Estate construction. We work
                                        with a large team of professionals, experienced and passionate workes who
                                        know the value you seek in your projects.
                                    </strong></p>
                                <p>
                                    We have organized our ressources to ease up your decision making. Hence,
                                    our teams can handle your projects from construction, material and deco.
                                </p>
                                <div class="text-right">
                                    <a href="#" class="site-button-link" data-hover="Read More">More
                                        <i class="fa fa-angle-right arrow-animation"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hilite-title text-left p-l50 text-uppercase hilite-dark">
                <strong>About</strong>
            </div>
        </div>
        <!-- ABOUT COMPANY END -->
        <div class="section-full p-t80 p-b50 bg-gray bg-no-repeat bg-bottom-right"
            style="background-image:url(/assets/images/background/bg-4.png);">
            <div class="row" style="padding-left: 2rem; padding-right: 2rem;">
                <div class="col-md-4 col-sm-6">
                    <div class="mt-icon-box-wraper p-a30 center m-b30 box-shadow bg-white">
                        <div class="mt-icon-box-sm inline-icon text-primary  m-b20 radius bg-primary  scale-in-center bg-moving"
                            style="background-image:url(images/background/line.png)">
                            <span class="icon-cell text-secondry"><i class="flaticon-sketch"></i></span>
                        </div>
                        <div class="icon-content">
                            <h4 class="mt-tilte text-uppercase font-weight-600 m-b20">We Design and Develop Real Estate
                                Projects</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="mt-icon-box-wraper p-a30 center m-b30 box-shadow bg-white">
                        <div class="mt-icon-box-sm inline-icon text-primary  m-b20 radius bg-primary  scale-in-center bg-moving"
                            style="background-image:url(images/background/line.png)">
                            <span class="icon-cell text-secondry"><i class="flaticon-builder"></i></span>
                        </div>
                        <div class="icon-content">
                            <h4 class="mt-tilte text-uppercase font-weight-600 m-b20">Provide Consulting and Contracting
                                Services</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="mt-icon-box-wraper p-a30 center m-b30 box-shadow bg-white">
                        <div class="mt-icon-box-sm inline-icon text-primary  m-b20 radius bg-primary  scale-in-center bg-moving"
                            style="background-image:url(images/background/line.png)">
                            <span class="icon-cell text-secondry"><i class="flaticon-city"></i></span>
                        </div>
                        <div class="icon-content">
                            <h4 class="mt-tilte text-uppercase font-weight-600 m-b20">Ensure a transparent Work with
                                long-term Follow-up</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- OUR VALUE START -->
        <div class="section-full mobile-page-padding p-t80 p-b30 bg-white">
            <div class="container">

                <div class="section-content">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <!-- TITLE START -->
                            <div class="section-head">
                                <div class="mt-separator-outer separator-left">
                                    <div class="m-about-years bg-moving"
                                        style="background-image:url(/assets/images/background/line.png);">
                                        <span class="text-primary large-title">Request a Quote</span>
                                    </div>
                                    <p>We’re interested in talking
                                        about your Project.</p>
                                    <a href="#" class="site-button btn-effect m-b15"><span>Request a
                                            Quote</span></a>
                                </div>
                            </div>
                            <div class="video-section-full bg-no-repeat bg-cover overlay-wraper"
                                style="background-image:url(/assets/images/video-bg.jpg)">
                                <div class="overlay-main bg-black opacity-07"></div>
                                <iframe width="900" height="506" src="https://www.youtube.com/embed/UokY_YFS3JM"
                                    title="Building construction process step by step" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>

                        </div>
                        <div class="col-md-3 col-sm-6">

                            <div class="mt-count m-b30 text-white mt-icon-box-wraper center  bg-dark p-a20">
                                <div class="counter font-30 font-weight-800 m-b15 text-primary">15</div>
                                <h4 class="m-tb0">Active Experts</h4>
                            </div>
                            <div class="mt-count m-b30 text-white mt-icon-box-wraper center  bg-dark p-a20">
                                <div class="counter font-30 font-weight-800 m-b15  text-primary">20</div>
                                <h4 class="m-tb0">Satisfied Clients</h4>
                            </div>
                            <div class="mt-count m-b30 text-white mt-icon-box-wraper center  bg-dark p-a20">
                                <div class="counter font-30 font-weight-800 m-b15 text-primary">35</div>
                                <h4 class="m-tb0">Project Complete</h4>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6">
                            <div class="m-about ">
                                <div class="owl-carousel about-us-carousel">
                                    <!-- COLUMNS 1 -->
                                    <div class="item">
                                        <div class="ow-img">
                                            <a href="javascript:void(0);"><img
                                                    src="/assets/images/gallery/portrait/pic1.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <!-- COLUMNS 2 -->
                                    <div class="item">
                                        <div class="ow-img">
                                            <a href="javascript:void(0);"><img
                                                    src="/assets/images/gallery/portrait/pic2.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <!-- COLUMNS 3 -->
                                    <div class="item">
                                        <div class="owl-img">
                                            <a href="javascript:void(0);"><img
                                                    src="/assets/images/gallery/portrait/pic3.jpg" alt=""></a>
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

        <!-- OUR MISSION START -->
        <div class="section-full mobile-page-padding mission-outer-section  p-t80 p-b30 bg-gray bg-no-repeat bg-right-center"
            style="background-image:url(/assets/images/mission.png), url(/assets/images/background/bg-4.png); ">
            <div class="section-content">
                <div class="container">
                    <!-- TITLE START -->
                    <div class="section-head">
                        <div class="mt-separator-outer separator-center">
                            <div class="mt-separator">
                                <h2 class="text-uppercase sep-line-one "><span
                                        class="font-weight-300 text-primary">Contact</span> US Today</h2>
                            </div>
                        </div>
                    </div>
                    <!-- TITLE END -->

                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="mission-left bg-white m-b30 p-a30 bg-no-repeat bg-bottom-left"
                                style="background-image:url(/assets/images/background/bg-site.png);">
                                <h3 class="m-t0"><span class="font-weight-100"> Site Areas</span><br> what we
                                    serve</h3>
                                <p>Wherever your project my be, we will make it there and make it happen. Here are some
                                    communities we have been to so far:</p>
                                <ul class="list-angle-right anchor-line">
                                    <li><a href="#">Douala</a></li>
                                    <li><a href="#">Yaoude</a></li>
                                    <li><a href="#">Bafousssam</a></li>
                                    <li><a href="#">Edea</a></li>
                                    <li><a href="#">Dschang</a></li>
                                </ul>
                                <div class="text-right">
                                    <a href="#" class="site-button-link" data-hover="Read More">More Achievements
                                        <i class="fa fa-angle-right arrow-animation"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <div class="mission-mid bg-no-repeat bg-cover m-b30"
                                style="background-image:url(/assets/images/mission2.png);"></div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="contact-home1-left bg-dark p-a30 m-b0">
                                <h3 class="text-white m-t0"><span class="font-weight-100">Get In</span> Touch</h3>
                                <form class="cons-contact-form2 form-transparent" method="post"
                                    action="https://7xtheme.com/shapen/form-handler2.php">

                                    <div class="input input-animate">
                                        <label for="name">Name</label>
                                        <input type="text" name="username" id="name" required>
                                        <span class="spin"></span>
                                    </div>

                                    <div class="input input-animate">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" required>
                                        <span class="spin"></span>
                                    </div>

                                    <div class="input input-animate">
                                        <label for="Phone">Phone</label>
                                        <input type="text" name="phone" id="Phone" required>
                                        <span class="spin"></span>
                                    </div>

                                    <div class="input input-animate">
                                        <label for="message">Textarea</label>
                                        <textarea name="message" id="message" required></textarea>
                                        <span class="spin"></span>
                                    </div>

                                    <div class="text-center p-t10">
                                        <button type="submit" class="site-button btn-effect ">
                                            Submit Now
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="hilite-title text-left p-l50 text-uppercase text-pop-up-top">
                <strong>Mission</strong>
            </div>
        </div>
        <!-- OUR MISSION  END -->

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
                                            class="font-weight-300 text-primary">Our</span> Services</h2>
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
                                    <div class="relative icon-count-2 bg-gray p-a30 p-tb50" style="height: 335px;">
                                        <span class="icon-count-number">1</span>
                                        <div class="icon-md inline-icon m-b15 text-primary scale-in-center">
                                            <span class="icon-cell"><img src="/assets/images/icon/compass.png"
                                                    alt=""></span>
                                        </div>
                                        <div class="icon-content">
                                            <h4 class="mt-tilte m-b25">Architecture</h4>
                                            <p>We design highways, bridges, houses, and building. </p>
                                            <a href="#" class="site-button-link" data-hover="Read More">Request a
                                                Quote <i class="fa fa-angle-right arrow-animation"></i></a>
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
                                            <p>Our method involves following latest construction standards.
                                            </p>
                                            <a href="#" class="site-button-link" data-hover="Read More">Request a
                                                Quote <i class="fa fa-angle-right arrow-animation"></i></a>
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
                                            <h4 class="mt-tilte m-b25">Material<br>and Machines</h4>
                                            <p>Nails, hammers, ciment, shovels, and all sort of machineries.</p>
                                            <a href="#" class="site-button-link" data-hover="Read More">Explore
                                                catalog <i class="fa fa-angle-right arrow-animation"></i></a>
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
                                            <h4 class="mt-tilte m-b25">Home<br>Renovation</h4>
                                            <p>Our qualified technicians are available at all time for your projects at home
                                            </p>
                                            <a href="#" class="site-button-link" data-hover="Read More">Ask an
                                                Expert <i class="fa fa-angle-right arrow-animation"></i></a>
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
                                            <h4 class="mt-tilte m-b25">Furnitures<br>and Home Deco</h4>
                                            <p>Get Inspired and choose what you want your home to be like. </p>
                                            <a href="#" class="site-button-link" data-hover="Read More">Explore
                                                Catalog <i class="fa fa-angle-right arrow-animation"></i></a>
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
                                            <p>Need assistance with anything? We can help.</p>
                                            <a href="#" class="site-button-link" data-hover="Read More">Ask an
                                                Expert <i class="fa fa-angle-right arrow-animation"></i></a>
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

        <!-- CALL US SECTION START -->
        <div class="section-full mobile-page-padding p-tb80 overlay-wraper bg-cover bg-center"
            style="background-image:url(/assets/images/background/dg.jpg)">
            <div class="overlay-main bg-primary opacity-07"></div>
            <div class="container">

                <div class="section-content" style="color:#fff !important;">
                    <div class="call-us-section text-center">
                        <h4 class="m-b15" style="color:#fff !important;"><b>Let's work together</b></h4>
                        <h2 class="call-us-number m-b15 m-b0" style="color:#fff !important;">+237 693 909 159</h2>
                        <h4 class="call-us-address m-t0 m-b20" style="color:#fff !important;">Cameroon & beyond</h4>
                        <a href="#" class="site-button-secondry btn-effect bg-dark">Contact Us</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- CALL US SECTION END -->

        <!-- OUR PROJECT START -->
        <div class="section-full mobile-page-padding p-t80 p-b30 square_shape2 desktop-version">
            <div class="container">
                <!-- TITLE START -->
                <div class="section-head">
                    <div class="mt-separator-outer separator-left">
                        <div class="mt-separator">
                            <h2 class="text-uppercase sep-line-one "><span class="font-weight-300 text-primary">Our</span>
                                Project</h2>
                        </div>
                    </div>
                </div>
                <!-- TITLE END -->

                <div class="section-content">

                    <div class="portfolio-wrap row mfp-gallery product-stamp clearfix">
                        <!-- COLUMNS 1 -->
                        <div class="stamp col-md-3 col-sm-6 m-b30">
                            <div class="bg-gray p-a30">
                                <div class="filter-wrap">
                                    <ul class="filter-navigation masonry-filter text-uppercase">
                                        <li class="active"><a data-filter="*" data-hover="All" href="#">All</a>
                                        </li>
                                        <li><a data-filter=".cat-1" data-hover="Album1" href="javascript:;">Album1</a>
                                        </li>
                                        <li><a data-filter=".cat-4" data-hover="Album2" href="javascript:;">Album2</a>
                                        </li>
                                        <li><a data-filter=".cat-2" data-hover="Album3" href="javascript:;">Album3 </a>
                                        </li>
                                        <li><a data-filter=".cat-3" data-hover="Album4" href="javascript:;">Album4</a>
                                        </li>
                                        <li><a data-filter=".cat-5" data-hover="Album5" href="javascript:;">Album5</a>
                                        </li>
                                        <li><a data-filter=".cat-6" data-hover="Album6" href="javascript:;">Album6 </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- COLUMNS 2 -->
                        <div class="masonry-item  cat-2 col-md-3 col-sm-6 m-b30">
                            <div class="mt-box   image-hover-block">
                                <div class="mt-thum-bx">
                                    <img src="/assets/images/projects/portrait/pic1.jpg" alt="">
                                </div>
                                <div class="mt-info  p-t20 text-white">
                                    <h4 class="mt-tilte m-b10 m-t0">Chair Furniture</h4>
                                    <p class="m-b0">Muscat, Sultanate of Oman</p>
                                </div>
                                <a href="#"></a>
                            </div>
                        </div>

                        <!-- COLUMNS 3 -->
                        <div class="masonry-item  cat-2 col-md-3 col-sm-6 m-b30">
                            <div class="mt-box   image-hover-block">
                                <div class="mt-thum-bx">
                                    <img src="/assets/images/projects/portrait/pic2.jpg" alt="">
                                </div>
                                <div class="mt-info  p-t20 text-white">
                                    <h4 class="mt-tilte m-b10 m-t0">Furniture</h4>
                                    <p class="m-b0">North House</p>
                                </div>
                                <a href="#"></a>
                            </div>
                        </div>

                        <!-- COLUMNS 4 -->
                        <div class="masonry-item  cat-6 col-md-3 col-sm-6 m-b30">
                            <div class="mt-box   image-hover-block">
                                <div class="mt-thum-bx">
                                    <img src="/assets/images/projects/portrait/pic3.jpg" alt="">
                                </div>
                                <div class="mt-info  p-t20 text-white">
                                    <h4 class="mt-tilte m-b10 m-t0">Living room</h4>
                                    <p class="m-b0">Aqaba, Jordan</p>
                                </div>
                                <a href="#"></a>
                            </div>
                        </div>

                        <!-- COLUMNS 5 -->
                        <div class="masonry-item  cat-6 col-md-3 col-sm-6 m-b30">
                            <div class="mt-box   image-hover-block">
                                <div class="mt-thum-bx">
                                    <img src="/assets/images/projects/portrait/pic4.jpg" alt="">
                                </div>
                                <div class="mt-info  p-t20 text-white">
                                    <h4 class="mt-tilte m-b10 m-t0">Dream Workspace</h4>
                                    <p class="m-b0">Perth, Australia </p>
                                </div>
                                <a href="#"></a>
                            </div>
                        </div>

                        <!-- COLUMNS 6 -->
                        <div class="masonry-item  cat-3 col-md-3 col-sm-6 m-b30">
                            <div class="mt-box   image-hover-block">
                                <div class="mt-thum-bx">
                                    <img src="/assets/images/projects/portrait/pic5.jpg" alt="">
                                </div>
                                <div class="mt-info  p-t20 text-white">
                                    <h4 class="mt-tilte m-b10 m-t0">Decore</h4>
                                    <p class="m-b0">Aqaba, Jordan</p>
                                </div>
                                <a href="#"></a>
                            </div>
                        </div>

                        <!-- COLUMNS 7 -->
                        <div class="masonry-item  cat-3 col-md-3 col-sm-6 m-b30">
                            <div class="mt-box   image-hover-block">
                                <div class="mt-thum-bx">
                                    <img src="/assets/images/projects/portrait/pic6.jpg" alt="">
                                </div>
                                <div class="mt-info  p-t20 text-white">
                                    <h4 class="mt-tilte m-b10 m-t0">Modern Decoration</h4>
                                    <p class="m-b0">Muscat, Sultanate of Oman</p>
                                </div>
                                <a href="#"></a>
                            </div>
                        </div>

                        <!-- COLUMNS 8 -->
                        <div class="masonry-item  cat-1 col-md-3 col-sm-6 m-b30">
                            <div class="mt-box   image-hover-block">
                                <div class="mt-thum-bx">
                                    <img src="/assets/images/projects/portrait/pic7.jpg" alt="">
                                </div>
                                <div class="mt-info  p-t20 text-white">
                                    <h4 class="mt-tilte m-b10 m-t0">Bathroom</h4>
                                    <p class="m-b0">North House</p>
                                </div>
                                <a href="#"></a>
                            </div>
                        </div>

                        <!-- COLUMNS 11 -->
                        <div class="masonry-item  cat-6 col-md-6 col-sm-6 m-b30">
                            <div class="mt-box   image-hover-block">
                                <div class="mt-thum-bx">
                                    <img src="/assets/images/projects/pic-l-5.jpg" alt="">
                                </div>
                                <div class="mt-info  p-t20 text-white">
                                    <h4 class="mt-tilte m-b10 m-t0">Lamp decoration</h4>
                                    <p class="m-b0">Aqaba, Jordan</p>
                                </div>
                                <a href="#"></a>
                            </div>
                        </div>


                        <!-- COLUMNS 9 -->
                        <div class="masonry-item  cat-5 col-md-3 col-sm-6 m-b30">
                            <div class="mt-box   image-hover-block">
                                <div class="mt-thum-bx">
                                    <img src="/assets/images/projects/pic-1.jpg" alt="">
                                </div>
                                <div class="mt-info  p-t20 text-white">
                                    <h4 class="mt-tilte m-b10 m-t0">Building house</h4>
                                    <p class="m-b0">Ultanate of Oman </p>
                                </div>
                                <a href="#"></a>
                            </div>
                        </div>

                        <!-- COLUMNS 10 -->
                        <div class="masonry-item  cat-4 col-md-3 col-sm-6 m-b30">
                            <div class="mt-box   image-hover-block">
                                <div class="mt-thum-bx">
                                    <img src="/assets/images/projects/pic-2.jpg" alt="">
                                </div>
                                <div class="mt-info  p-t20 text-white">
                                    <h4 class="mt-tilte m-b10 m-t0">Spa residence</h4>
                                    <p class="m-b0">Perth, Australia </p>
                                </div>
                                <a href="#"></a>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
            <div class="hilite-title text-left p-l50 text-uppercase text-pop-up-top">
                <strong>Projects</strong>
            </div>
        </div>
        <!-- OUR PROJECT END -->

        <!-- OUR PROJECT MOBILE START -->
        <div class="section-full mobile-page-padding p-t80 p-b30 square_shape2 mobile-version">
            <div class="container">
                <!-- TITLE START -->
                <div class="section-head">
                    <div class="mt-separator-outer separator-left">
                        <div class="mt-separator">
                            <h2 class="text-uppercase sep-line-one "><span class="font-weight-300 text-primary">Our</span>
                                Project</h2>
                        </div>
                    </div>
                </div>
                <!-- TITLE END -->

                <div class="section-content">

                    <div class="portfolio-wrap row mfp-gallery product-stamp clearfix">
                        <!-- COLUMNS 1 -->
                        <div class="stamp col-md-3 col-sm-6 m-b30">
                            <div class="bg-gray p-a30">
                                <div class="filter-wrap">
                                    <ul class="filter-navigation masonry-filter text-uppercase">
                                        <li><a data-filter=".cat-1" data-hover="Album1" href="#">Album1</a></li>
                                        <li><a data-filter=".cat-4" data-hover="Album2" href="#">Album2</a></li>
                                        <li><a data-filter=".cat-2" data-hover="Album3" href="#">Album3 </a></li>
                                        <li><a data-filter=".cat-3" data-hover="Album4" href="#">Album4</a></li>
                                        <li><a data-filter=".cat-5" data-hover="Album5" href="#">Album5</a></li>
                                        <li><a data-filter=".cat-6" data-hover="Album6" href="#">Album6 </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <div class="hilite-title text-left p-l50 text-uppercase text-pop-up-top">
                <strong>Projects</strong>
            </div>
        </div>
        <!-- OUR PROJECT MOBILE END -->

        <!-- OUR BLOG START -->
        <div class="section-full mobile-page-padding p-t80 p-b30 square_shape1 bg-parallax bg-cover"
            data-stellar-background-ratio="0.5" style="background-image:url(/assets/images/background/bg5.jpg);">
            <div class="container">

                <!-- TITLE START -->
                <div class="section-head ">
                    <div class="mt-separator-outer separator-center">
                        <div class="mt-separator">
                            <h2 class="text-white text-uppercase sep-line-one "><span
                                    class="font-weight-300 text-primary">Latest</span> Blog</h2>
                        </div>
                    </div>
                </div>
                <!-- TITLE END -->

                <!-- IMAGE CAROUSEL START -->
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="mt-box blog-post latest-blog-3 date-style-1 bg-white m-b30">
                                <div class="mt-post-media mt-img-overlay7">
                                    <a href="javascript:;"><img src="/assets/images/blog/latest-blog/pic1.jpg"
                                            alt=""></a>
                                </div>
                                <div class="mt-post-info p-a30">
                                    <div class="post-overlay-position">
                                        <div class="mt-post-meta ">
                                            <ul>
                                                <li class="post-date"><strong class="text-primary">14</strong>
                                                    <span>April 2019</span>
                                                </li>
                                                <li class="post-author">By <a href="javascript:;">Admin</a>
                                                </li>
                                                <li class="post-comment"><a href="javascript:;">2 comment</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mt-post-title ">
                                            <h4 class="post-title m-b0">Commercial design for project</h4>
                                        </div>
                                        <div class="mt-post-text">
                                            <p>Which is the same as saying through shrinking from toil and pain.</p>
                                        </div>
                                        <div class="readmore-line">
                                            <span><a href="#" class="site-button-link" data-hover="Read More">Read
                                                    More <i class="fa fa-angle-right arrow-animation"></i></a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="mt-box blog-post latest-blog-3 date-style-1 bg-white m-b30">
                                <div class="mt-post-media mt-img-overlay7">
                                    <a href="javascript:;"><img src="/assets/images/blog/latest-blog/pic2.jpg"
                                            alt=""></a>
                                </div>
                                <div class="mt-post-info p-a30">
                                    <div class="post-overlay-position">
                                        <div class="mt-post-meta ">
                                            <ul>
                                                <li class="post-date"><strong class="text-primary">16</strong>
                                                    <span>Feb 2019</span>
                                                </li>
                                                <li class="post-author">By <a href="javascript:;">Admin</a>
                                                </li>
                                                <li class="post-comment"><a href="javascript:;">2 comment</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mt-post-title ">
                                            <h4 class="post-title m-b0">Our interior design prediction</h4>
                                        </div>
                                        <div class="mt-post-text">
                                            <p>Today we can tell you, thanks to your passion, hard work creativity,
                                                and expertise.</p>
                                        </div>
                                        <div class="readmore-line">

                                            <span><a href="#" class="site-button-link" data-hover="Read More">Read
                                                    More <i class="fa fa-angle-right arrow-animation"></i></a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="mt-box blog-post latest-blog-3 date-style-1 bg-white m-b30">
                                <div class="mt-post-media mt-img-overlay7">
                                    <a href="javascript:;"><img src="/assets/images/blog/latest-blog/pic3.jpg"
                                            alt=""></a>
                                </div>
                                <div class="mt-post-info p-a30">
                                    <div class="post-overlay-position">
                                        <div class="mt-post-meta ">
                                            <ul>
                                                <li class="post-date"><strong class="text-primary">18</strong>
                                                    <span>Jan 2019</span>
                                                </li>
                                                <li class="post-author">By <a href="javascript:;">Admin</a>
                                                </li>
                                                <li class="post-comment"><a href="javascript:;">2 comment</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mt-post-title ">
                                            <h4 class="post-title m-b0">Low cost interior designing ideas</h4>
                                        </div>
                                        <div class="mt-post-text">
                                            <p>Every pleasure is to be welcomed every pain avoided. in certain
                                                circumstances obligations.</p>
                                        </div>
                                        <div class="readmore-line">
                                            <span><a href="#" class="site-button-link"
                                                    data-hover="Read More">Read More <i
                                                        class="fa fa-angle-right arrow-animation"></i></a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hilite-title text-right p-r50 text-uppercase hilite-dark">
                <strong>Blog</strong>
            </div>
        </div>
        <!-- OUR BLOG END -->

        <!-- TESTIMONIALS SECTION START -->
        <div class="section-full mobile-page-padding p-t80 p-b50 square_shape2 bg-cover"
            style="background-image:url(/assets/images/background/bg6.jpg);">
            <div class="container">
                <div class="section-content">

                    <!-- TITLE START -->
                    <div class="section-head">
                        <div class="mt-separator-outer separator-center">
                            <div class="mt-separator">
                                <h2 class="text-uppercase sep-line-one "><span
                                        class="font-weight-300 text-primary">Client</span> Testimonials</h2>
                            </div>
                        </div>
                    </div>
                    <!-- TITLE END -->

                    <!-- TESTIMONIAL START -->
                    <div class="owl-carousel testimonial-home">
                        <div class="item">
                            <div class="testimonial-2 m-a30 hover-animation-1">
                                <div class=" block-shadow bg-white p-a30">
                                    <div class="testimonial-detail clearfix">
                                        <div class="testimonial-pic radius shadow scale-in-center"><img
                                                src="/assets/images/testimonials/pic1.jpg" width="100"
                                                height="100" alt=""></div>
                                        <h4 class="testimonial-name m-b5">Shelly Johnson -</h4>
                                        <span class="testimonial-position">Business Person</span>
                                    </div>
                                    <div class="testimonial-text">
                                        <span class="fa fa-quote-right"></span>
                                        <p> Excellent Customer support!. The template itself is very ext ended.
                                            simply dummy text of the printing and industry. the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-2 m-a30  hover-animation-1">
                                <div class=" block-shadow bg-white p-a30">
                                    <div class="testimonial-detail clearfix">
                                        <div class="testimonial-pic radius shadow scale-in-center"><img
                                                src="/assets/images/testimonials/pic2.jpg" width="100"
                                                height="100" alt=""></div>
                                        <h4 class="testimonial-name m-b5">Cuthbert Brain -</h4>
                                        <span class="testimonial-position">Contractor</span>
                                    </div>
                                    <div class="testimonial-text">
                                        <span class="fa fa-quote-right"></span>
                                        <p>The template itself is very ext ended. excellent customer support! simply
                                            dummy text of the printing and industry. the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-2 m-a30  hover-animation-1">
                                <div class=" block-shadow bg-white p-a30">
                                    <div class="testimonial-detail clearfix">
                                        <div class="testimonial-pic radius shadow scale-in-center"><img
                                                src="/assets/images/testimonials/pic3.jpg" width="100"
                                                height="100" alt=""></div>
                                        <h4 class="testimonial-name m-b5">Cathrine Wagner -</h4>
                                        <span class="testimonial-position">Builder</span>
                                    </div>
                                    <div class="testimonial-text">
                                        <span class="fa fa-quote-right"></span>
                                        <p>The template itself is very ext ended. excellent customer support! simply
                                            dummy text of the printing and industry. the printing and typesetting
                                            industry. Lorem Ipsum has been the industry's</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-2 m-a30  hover-animation-1">
                                <div class=" block-shadow bg-white p-a30">
                                    <div class="testimonial-detail clearfix">
                                        <div class="testimonial-pic radius shadow scale-in-center"><img
                                                src="/assets/images/testimonials/pic4.jpg" width="100"
                                                height="100" alt=""></div>
                                        <h4 class="testimonial-name m-b5">John Doe -</h4>
                                        <span class="testimonial-position">Business Person</span>
                                    </div>
                                    <div class="testimonial-text">
                                        <span class="fa fa-quote-right"></span>
                                        <p> Excellent Customer support!. The template itself is very ext ended.
                                            simply dummy text of the printing and industry. the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-2 m-a30  hover-animation-1">
                                <div class=" block-shadow bg-white p-a30">
                                    <div class="testimonial-detail clearfix">
                                        <div class="testimonial-pic radius shadow scale-in-center"><img
                                                src="/assets/images/testimonials/pic5.jpg" width="100"
                                                height="100" alt=""></div>
                                        <h4 class="testimonial-name m-b5">Cuthbert Brain -</h4>
                                        <span class="testimonial-position">Business Person</span>
                                    </div>
                                    <div class="testimonial-text">
                                        <span class="fa fa-quote-right"></span>
                                        <p>The template itself is very ext ended. excellent customer support!.
                                            simply dummy text of the printing and industry. the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="hilite-title text-left p-l50 text-uppercase text-pop-up-top">
                <strong>Clients</strong>
            </div>
        </div>
        <!-- TESTIMONIALS SECTION END -->
    </div>
    <!-- CONTENT END -->
@endsection


@section('scripts')
@endsection