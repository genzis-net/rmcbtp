<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Contact Information
    |--------------------------------------------------------------------------
    |
    | This file contains all the contact information for the application.
    | These values can be easily updated without touching the code.
    |
    */

    'phone' => env('CONTACT_PHONE', '+237 697398455'),
    'email' => env('CONTACT_EMAIL', 'info@rmcbtp.com'),
    'address' => env('CONTACT_ADDRESS', 'Douala, Cameroon'),
    'website' => env('CONTACT_WEBSITE', 'www.rmcbtp.com'),
    
    // Social Media
    'social' => [
        'facebook' => env('CONTACT_FACEBOOK', 'https://www.facebook.com/rmcbtp'),
        'twitter' => env('CONTACT_TWITTER', ''),
        'linkedin' => env('CONTACT_LINKEDIN', ''),
        'instagram' => env('CONTACT_INSTAGRAM', ''),
    ],
    
    // Business Hours
    'business_hours' => [
        'monday' => '8:00 AM - 6:00 PM',
        'tuesday' => '8:00 AM - 6:00 PM',
        'wednesday' => '8:00 AM - 6:00 PM',
        'thursday' => '8:00 AM - 6:00 PM',
        'friday' => '8:00 AM - 6:00 PM',
        'saturday' => '9:00 AM - 3:00 PM',
        'sunday' => 'Closed',
    ],
]; 