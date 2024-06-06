<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnRole
{
    function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        if ($user->role === 'admin' && !$request->routeIs('dashboard')) {
            return redirect()->intended('/dashboard');
        } elseif ($user->role === 'user' && !$request->routeIs('pengguna')) {
            return redirect()->intended('/pengguna');
        } elseif (!in_array($user->role, ['admin', 'user'])) {
            // Jika pengguna tidak memiliki peran yang sesuai, kembalikan respons yang sesuai
            return redirect()->route('login')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
