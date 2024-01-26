<?php

namespace App\Http\Middleware;

use Closure;
use Inertia\Middleware;
use Illuminate\Http\Request;

class HandleInertiaRequests extends Middleware
{
    public function getVersion(Request $request)
    {
        // Implementation for getVersion method
    }

    public function handle($request, Closure $next)
    {
        return parent::handle($request, $next);
    }
    protected $rootView = 'layout';

}