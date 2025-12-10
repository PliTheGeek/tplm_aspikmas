<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // app/Http/Middleware/AdminMiddleware.php
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika user sudah login DAN rolenya adalah 'admin' atau 'superadmin'
        if (Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin'])) {
            return $next($request);
        }

        // Jika tidak, redirect ke halaman dashboard user biasa
        return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses yang cukup.');
    }
}
