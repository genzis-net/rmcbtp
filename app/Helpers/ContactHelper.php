<?php

namespace App\Helpers;

class ContactHelper
{
    /**
     * Get contact phone number
     */
    public static function getPhone(): string
    {
        return config('contact.phone');
    }

    /**
     * Get contact email
     */
    public static function getEmail(): string
    {
        return config('contact.email');
    }

    /**
     * Get contact address
     */
    public static function getAddress(): string
    {
        return config('contact.address');
    }

    /**
     * Get contact website
     */
    public static function getWebsite(): string
    {
        return config('contact.website');
    }

    /**
     * Get social media links
     */
    public static function getSocialMedia(): array
    {
        return config('contact.social');
    }

    /**
     * Get business hours
     */
    public static function getBusinessHours(): array
    {
        return config('contact.business_hours');
    }

    /**
     * Get formatted phone number for display
     */
    public static function getFormattedPhone(): string
    {
        $phone = self::getPhone();
        $telHref = preg_replace('/\s+/', '', $phone);

        return '<a href="tel:' . e($telHref) . '">' . e($phone) . '</a>';
    }

    /**
     * Get formatted email for display
     */
    public static function getFormattedEmail(): string
    {
        $email = self::getEmail();

        return '<a href="mailto:' . e($email) . '">' . e($email) . '</a>';
    }

    /**
     * Get all contact information
     */
    public static function getAll(): array
    {
        return [
            'phone' => self::getPhone(),
            'email' => self::getEmail(),
            'address' => self::getAddress(),
            'website' => self::getWebsite(),
            'social' => self::getSocialMedia(),
            'business_hours' => self::getBusinessHours(),
        ];
    }
} 