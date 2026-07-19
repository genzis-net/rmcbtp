<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BrowserLanguageDetection
{
    protected array $supportedLanguages = ['en', 'fr'];

    protected string $defaultLanguage = 'en';

    public function handle(Request $request, Closure $next)
    {
        if ($request->segment(1) && in_array($request->segment(1), $this->supportedLanguages, true)) {
            return $next($request);
        }

        if ($this->shouldSkipDetection($request)) {
            return $next($request);
        }

        $preferredLanguage = $this->detectPreferredLanguage($request);

        $uri = $request->getRequestUri();
        if ($uri === '/') {
            $uri = '';
        }

        return redirect()->to("/{$preferredLanguage}{$uri}");
    }

    protected function detectPreferredLanguage(Request $request): string
    {
        if ($request->hasSession() && $request->session()->has('locale')) {
            $savedLocale = $request->session()->get('locale');
            if (in_array($savedLocale, $this->supportedLanguages, true)) {
                return $savedLocale;
            }
        }

        $acceptLanguage = $request->header('Accept-Language');

        if (!$acceptLanguage) {
            return $this->defaultLanguage;
        }

        foreach ($this->parseAcceptLanguage($acceptLanguage) as $language) {
            $langCode = substr($language['code'], 0, 2);
            if ($langCode === 'fr') {
                return 'fr';
            }
        }

        return 'en';
    }

    protected function parseAcceptLanguage(string $acceptLanguage): array
    {
        $languages = [];

        foreach (explode(',', $acceptLanguage) as $part) {
            $lang = trim($part);
            $quality = 1.0;

            if (str_contains($lang, ';q=')) {
                [$lang, $quality] = explode(';q=', $lang, 2);
                $quality = (float) $quality;
            }

            $languages[] = [
                'code' => trim($lang),
                'quality' => $quality,
            ];
        }

        usort($languages, fn ($a, $b) => $b['quality'] <=> $a['quality']);

        return $languages;
    }

    protected function shouldSkipDetection(Request $request): bool
    {
        $path = $request->getPathInfo();

        $exact = [
            '/under-construction',
            '/store-contact',
            '/switch-language',
        ];

        if (in_array($path, $exact, true)) {
            return true;
        }

        return str_starts_with($path, '/api')
            || str_starts_with($path, '/switch-language/')
            || str_starts_with($path, '/sanctum');
    }
}
