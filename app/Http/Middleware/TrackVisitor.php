<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $today = Carbon::today()->toDateString();

        // Ensure only frontend is tracked
        if (!$request->is('admin/*')) {
            Visitor::firstOrCreate(
                [
                    'ip_address'   => $ip,
                    'user_agent' => null,
                    'url'        => null,
                    'visited_date' => $today,
                ]
            );
        }

        return $next($request);
    }
}
