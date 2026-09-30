<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ForceFrenchExceptAllowed
{
    // Επιτρέπουμε μη-FR μόνο σε αυτό το named route
    protected array $allowedRouteNames = ['language'];

    // Οι γλώσσες που εμφανίζονται κανονικά (μη-FR redirect για τις υπόλοιπες)
    protected array $allowedLocales = ['fr', 'en'];

    // Οι routes που είναι ΠΑΝΤΑ στα γαλλικά (dashboard & settings)
    protected array $forceFrenchRouteNames = ['dashboard.*'];

    public function handle(Request $request, Closure $next)
    {
        $route = $request->route();
        $name  = $route ? $route->getName() : null;

        // Αν είναι η σελίδα language, άφησέ την όπως είναι (μπορεί να είναι /fr,/de,/it,/en)
        if ($name && in_array($name, $this->allowedRouteNames, true)) {
            return $next($request);
        }

        // Dashboard & Settings: πάντα στα γαλλικά
        if ($name && Str::is($this->forceFrenchRouteNames, $name) && LaravelLocalization::getCurrentLocale() !== 'fr') {
            // κρατάμε path + query, απλά αλλάζουμε locale σε fr
            $frUrl = LaravelLocalization::getLocalizedURL('fr', null, $request->query(), true);
            return redirect()->to($frUrl, 302);
        }

        // Για ΟΛΑ τα άλλα, αν το current locale δεν είναι επιτρεπτό -> redirect στο ίδιο path αλλά σε fr
        if (!in_array(LaravelLocalization::getCurrentLocale(), $this->allowedLocales, true)) {
            // κρατάμε path + query, απλά αλλάζουμε locale σε fr
            $frUrl = LaravelLocalization::getLocalizedURL('fr', null, $request->query(), true);
            return redirect()->to($frUrl, 302);
        }

        return $next($request);
    }
}
