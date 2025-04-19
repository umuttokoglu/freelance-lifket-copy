<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        // 1) URL prefix: /tr/... veya /en/...
        $locale = $request->route('locale')
            ?? Session::get('locale')
            ?? config('app.locale');

        if (! in_array($locale, ['tr','en'])) {
            $locale = config('app.fallback_locale');
        }

        App::setLocale($locale);
        Session::put('locale', $locale);

        return $next($request);
    }
}
