<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminSessionExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $lastActivity = session('last_activity');

            // Check if session has expired 1 hour
            if (time() - $lastActivity > 3600) {
                Auth::logout();

                //memberikan log peringatan
                //Log::warning('Admin session has expired', ['user_id' => Auth::user()->id]);

                //dapat diganti sesuai halaman yang diinginkan
                return redirect('/')->with('error', 'Session has expired. Please log in again.');
            }

            // Update last activity time
            session(['last_activity' => time()]);
        }

        return $next($request);
    }

    
}
