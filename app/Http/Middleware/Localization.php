<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class Localization
{
    /**
     * Supported languages in the application
     */
    protected $supportedLanguages = ['en', 'fr'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $language = $request->route('language');

        // Routes outside the {language} prefix (login helpers, etc.)
        if ($language === null) {
            return $next($request);
        }

        if (! in_array($language, $this->supportedLanguages, true)) {
            $segments = $request->segments();
            $segments[0] = 'en';

            return redirect()->to('/' . implode('/', $segments));
        }

        App::setLocale($language);
        Session::put('locale', $language);

        // Keep {language} in generated URLs without injecting it into controllers
        URL::defaults(['language' => $language]);
        $request->route()->forgetParameter('language');

        return $next($request);
    }
}
