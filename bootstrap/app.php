<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'redirect.role' => \App\Http\Middleware\RedirectBasedOnRole::class,]);
        $middleware->alias([
            'check.voted' => \App\Http\Middleware\CheckVote::class,]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
