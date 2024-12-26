<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah login dan memiliki peran 'owner'
        if (Auth::check() && Auth::user()->role === 'owner') {
            return $next($request);
        }

        // Jika bukan owner, tampilkan halaman 403 atau redirect ke halaman lain
        return abort(403, 'Access denied: You do not have permission to access this page.');
    }
}
