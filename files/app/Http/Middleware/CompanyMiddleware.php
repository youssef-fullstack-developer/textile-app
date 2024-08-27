<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class CompanyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $company = $request->session()->get('company');

        if($company == 'sez') {
            Config::set('database.default', 'mysql');
        } else {
            Config::set('database.default', 'second_database');
        }

        info("Current default database connection: " . config('database.default'));

        return $next($request);
    }
}
