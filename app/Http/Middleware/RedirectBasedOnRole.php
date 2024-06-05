<?php

namespace App\Http\Middleware;

use App\Models\AuthApp;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnRole
{
    function handle(Request $request, Closure $next)
    {
        {
            if (Auth::check()) {
                $user = Auth::user();
                if ($user->role === 'admin') {
                    return redirect('/dashboard');
                } elseif ($user->role === 'user') {
                    return redirect('/');
                }
            }
            return $next($request);
        }
}
}