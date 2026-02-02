<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;

class TrackReferral
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if ($request->has('ref')) {
            $refCode = $request->query('ref');
            Cookie::queue('affiliate_ref', $refCode, 43200);
        }

        return $next($request);
    }
}
