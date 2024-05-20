<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
    protected function tokensMatch($request)
    {
        // Exclure les routes de déconnexion des vérifications CSRF
        if ($request->routeIs('admin.logout') || $request->routeIs('teacher.logout')) {
            return true;
        }

        return parent::tokensMatch($request);
    }
}
