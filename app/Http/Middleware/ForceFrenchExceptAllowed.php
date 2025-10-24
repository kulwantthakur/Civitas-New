<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ForceFrenchExceptAllowed
{
    // Επιτρέπουμε μη-FR μόνο σε αυτό το named route
    protected array $allowedRouteNames = ['language'];

    public function handle(Request $request, Closure $next)
    {
        $route = $request->route();
        $name  = $route ? $route->getName() : null;

        // Αν είναι η σελίδα language, άφησέ την όπως είναι (μπορεί να είναι /fr,/de,/it)
        if ($name && in_array($name, $this->allowedRouteNames, true)) {
            return $next($request);
        }

        // Για ΟΛΑ τα άλλα, αν το current locale δεν είναι fr -> redirect στο ίδιο path αλλά σε fr
        if (LaravelLocalization::getCurrentLocale() !== 'fr') {
            // κρατάμε path + query, απλά αλλάζουμε locale σε fr
            $frUrl = LaravelLocalization::getLocalizedURL('fr', null, $request->query(), true);
            return redirect()->to($frUrl, 302);
        }

        return $next($request);
    }
}
