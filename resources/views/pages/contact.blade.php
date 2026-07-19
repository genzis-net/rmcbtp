@extends('layouts.app')

@section('headerz')
	<title>{{ __('Contact us') }} | {{ __('Reach out to us today!') }}</title>
    <meta name="description" content="{{ __('Have any questions about our services and offerings? leave us a message.') }}"/>
    <meta property="og:image" content="/assets/images/banner/4.jpg" />
    <meta property="og:description" content="{{ __('Have any questions about our services and offerings? leave us a message.') }}" />
    <meta property="og:url"content="{{  url()->current()  }}" />
    <meta property="og:title" content="{{ __('Contact us') }} | {{ __('Reach out to us today!') }}" />
@endsection

@section('content')

<div class="page-content">
        
    <!-- INNER PAGE BANNER -->
    <div class="mt-bnr-inr overlay-wraper bg-parallax bg-top-center"  data-stellar-background-ratio="0.5"  style="background-image:url(/assets/images/banner/4.jpg);">
        <div class="overlay-main bg-black opacity-07"></div>
        <div class="container">
            <div class="mt-bnr-inr-entry">
                <div class="banner-title-outer">
                    <div class="banner-title-name">
                        <h2 class="m-b0">{{ __('Putting a plan to action, to assure your satisfaction!') }}</h2>
                    </div>
                </div>
                <!-- BREADCRUMB ROW -->                            
                
                    <div>
                        <ul class="mt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{ route('homepage', app()->getLocale()) }}">{{ __('Home') }}</a></li>
                            <li>{{ __('Contact us') }}</li>
                        </ul>
                    </div>
                
                <!-- BREADCRUMB ROW END -->                        
            </div>
        </div>
    </div>
    <!-- INNER PAGE BANNER END -->
     
    <!-- SECTION CONTENTG START -->
    <div class="section-full p-tb80 inner-page-padding" style="background:url('/assets/images/bg-11.png')">
        <!-- LOCATION BLOCK-->
        <div class="container">
             <!-- TITLE START -->
        <div class="section-head">
            <div class="mt-separator-outer separator-left">
                <div class="mt-separator">
                    <h2 class="text-uppercase sep-line-one "><span class="font-weight-300 text-primary">{{ __('Get In') }}</span>  {{ __('Touch') }}</h2>
                </div>
            </div>
        </div>
        <!-- TITLE END -->
            <!-- GOOGLE MAP & CONTACT FORM -->
            <div class="section-content">
                <!-- CONTACT FORM-->
                <div class="row">
                    <div class="col-md-8 col-sm-6">
                        <form class="contact-form cons-contact-form" id="contactFormAdvanced" enctype="multipart/form-data">
                                @csrf
                                <div class="contact-one m-b30">

                                    <div class="form-group">
                                        <input name="name" type="text" required class="form-control" placeholder="{{ __('Name') }}">
                                    </div>

                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control" required placeholder="{{ __('Email') }}">
                                    </div>

                                    <div class="form-group">
                                        <input name="phone" type="text" class="form-control" required placeholder="{{ __('Phone number') }}">
                                    </div>

                                    @php
                                        $quoteProduct = request('product');
                                        $quoteRef = request('ref');
                                        $quoteCatalog = request('catalog');
                                        $quoteSubject = $quoteProduct
                                            ? __('Quote request') . ': ' . $quoteProduct
                                            : old('subject');
                                        $quoteMessage = $quoteProduct
                                            ? trim(
                                                __('I would like a quote for the following product:') . "\n" .
                                                ($quoteCatalog ? $quoteCatalog . ' — ' : '') . $quoteProduct .
                                                ($quoteRef ? "\n" . __('Reference') . ': ' . $quoteRef : '')
                                            )
                                            : old('message');
                                    @endphp

                                    <div class="form-group">
                                        <input name="subject" type="text" class="form-control" required placeholder="{{ __('Subject Line') }}" value="{{ $quoteSubject }}">
                                    </div>

                                    <div class="form-group">
                                        <textarea name="message" class="form-control " id="textareamsg" required placeholder="Message">{{ $quoteMessage }}</textarea>
                                    </div>

                                    <div id="saveform_errList"></div>
                                    <div class="m-b15 site-button outline green text-uppercase m-r15" role="alert" id="success_message" style="display: none;">
                                        <span id="the_message"></span>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" id="contactFormSubmit" value="Submit" class="valid site-button btn-effect">{{ __('Submit') }}</button>
                                    </div>

                                </div>
                            </form>
                    </div>                        
                    <div class="col-md-4 col-sm-6">
                        <div class="contact-info m-b30">
                            <!-- TITLE START -->
                            <div class="section-head">
                                <div class="mt-separator-outer separator-left">
                                    <div class="mt-separator">
                                        <h2 class="text-uppercase sep-line-one "><span class="font-weight-300 text-primary">Contact</span> Info</h2>
                                    </div>
                                </div>
                            </div>                   
                            <!-- TITLE END --> 
                            <div class="bg-dark p-a20 text-white">                               
                                <div class="mt-icon-box-wraper left p-b40">
                                    <div class="icon-xs"><i class="fa fa-phone"></i></div>
                                    <div class="icon-content">
                                        <h5 class="m-t0 font-weight-500">{{ __('Phone number') }}</h5>
                                        <p>@contactPhone</p>
                                    </div>
                                </div>
                                
                                <div class="mt-icon-box-wraper left p-b40">
                                    <div class="icon-xs"><i class="fa fa-envelope"></i></div>
                                    <div class="icon-content">
                                        <h5 class="m-t0 font-weight-500">{{ __('Email address') }}</h5>
                                        <p style="color:#fff">@contactEmail</p>
                                    </div>
                                </div>
                                
                                <div class="mt-icon-box-wraper left">
                                    <div class="icon-xs"><i class="fa fa-map-marker"></i></div>
                                    <div class="icon-content">
                                        <h5 class="m-t0 font-weight-500">{{ __('Address info') }}</h5>
                                        <p>@contactAddress</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>               
        </div>
   </div>
 
    <!-- SECTION CONTENT END -->
    
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {       

        //saves new contact message
        $('#contactFormAdvanced').on('click', '.valid', function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var data = new FormData(document.getElementById("contactFormAdvanced"));
            var message = $('#textareamsg').val();
            data.append('message', message);

            $.ajax({
                type: "POST",
                url: "{{ route('store-contact') }}",
                data: data,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                async: false,
                processData: false,
                success: function(response) {
                    if (response.status == 400) {
                        $('#saveform_errList').html("");
                        $('#saveform_errList').show();
                        $('#saveform_errList').addClass("alert alert-danger");
                        $.each(response.errors, function(key, err_values) {
                            $('#saveform_errList').append('<li>' + err_values +
                                '</li>');
                        });
                    } else {
                        $('#the_message').html('');
                        $('#saveform_errList').hide();
                        $('#success_message').show();
                        setTimeout(function() {
                            $('#success_message').fadeOut('slow');
                        }, 5000);
                        $('#the_message').append(response.success);
                        $('#contactFormAdvanced').find('.form-control').val('');
                    }
                }
            });
        });
    });
</script>
@endsection