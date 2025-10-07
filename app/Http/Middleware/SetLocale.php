<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $supportedLocales = ['nl', 'en'];

        $sessionLocale = $request->session()->get('locale');

        if (! $sessionLocale) {
            // Default to app locale (configured in config/app.php)
            $sessionLocale = config('app.locale', 'nl');
            $request->session()->put('locale', $sessionLocale);
        }

        if (! in_array($sessionLocale, $supportedLocales, true)) {
            $sessionLocale = config('app.fallback_locale', 'en');
            $request->session()->put('locale', $sessionLocale);
        }

        app()->setLocale($sessionLocale);

        return $next($request);
    }
}



