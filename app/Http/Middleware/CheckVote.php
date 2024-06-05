<?php

namespace App\Http\Middleware;

use App\Models\AuthApp;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckVote
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    function handle(Request $request, Closure $next)
    {
        // $user = Auth::user();
        // if ($user && $user->votes()->exists()) {
        //     return redirect()->route('vote.index')->with('error', 'Anda sudah melakukan vote.');
        // }

        // return $next($request);
    }
}
