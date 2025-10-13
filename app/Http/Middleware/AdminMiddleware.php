<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
    // Cek jika user sudah login DAN rolenya adalah 'admin'
    if (Auth::check() && Auth::user()->role == 'admin') {
        return $next($request);
    }

    // Jika tidak, redirect ke halaman home atau tampilkan error
    return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses admin.');
}
}
