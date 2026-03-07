<?php

namespace App\Http\Middleware;

use App\Enums\SubscriptionStatus;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if(!auth()->user()->hasActiveSubscription()) {
            return response()->json([
                'message' => 'You need an active subscription'
            ], status: Response::HTTP_FORBIDDEN);
         }
        return $next($request);
    }
}
