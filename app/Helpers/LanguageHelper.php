<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageHelper
{
    /**
     * Get current language
     */
    public static function getCurrentLanguage(): string
    {
        return App::getLocale();
    }

    /**
     * Get supported languages
     */
    public static function getSupportedLanguages(): array
    {
        return ['en', 'fr'];
    }

    /**
     * Get language name
     */
    public static function getLanguageName(string $code): string
    {
        $languages = [
            'en' => 'English',
            'fr' => 'Français'
        ];

        return $languages[$code] ?? $code;
    }

    /**
     * Check if language is current
     */
    public static function isCurrentLanguage(string $code): bool
    {
        return App::getLocale() === $code;
    }

    /**
     * Get language URL for current page
     */
    public static function getLanguageUrl(string $language): string
    {
        $currentUrl = request()->getRequestUri();
        $path = parse_url($currentUrl, PHP_URL_PATH);
        $segments = explode('/', trim($path, '/'));
        
        // Remove current language from segments if present
        if (in_array($segments[0], ['en', 'fr'])) {
            array_shift($segments);
        }
        
        // Add new language
        array_unshift($segments, $language);
        
        $newPath = '/' . implode('/', $segments);
        $query = parse_url($currentUrl, PHP_URL_QUERY);
        
        if ($query) {
            $newPath .= '?' . $query;
        }
        
        return $newPath;
    }

    /**
     * Get browser language preference
     */
    public static function getBrowserLanguage(): string
    {
        $acceptLanguage = request()->header('Accept-Language');
        
        if (!$acceptLanguage) {
            return 'en';
        }

        $languages = self::parseAcceptLanguage($acceptLanguage);
        
        // Check if French is the primary language
        foreach ($languages as $language) {
            $langCode = substr($language['code'], 0, 2);
            if ($langCode === 'fr') {
                return 'fr';
            }
        }

        return 'en';
    }

    /**
     * Parse Accept-Language header
     */
    private static function parseAcceptLanguage(string $acceptLanguage): array
    {
        $languages = [];
        $parts = explode(',', $acceptLanguage);

        foreach ($parts as $part) {
            $lang = trim($part);
            $quality = 1.0;

            if (strpos($lang, ';q=') !== false) {
                list($lang, $quality) = explode(';q=', $lang);
                $quality = (float) $quality;
            }

            $languages[] = [
                'code' => trim($lang),
                'quality' => $quality
            ];
        }

        usort($languages, function ($a, $b) {
            return $b['quality'] <=> $a['quality'];
        });

        return $languages;
    }
} 