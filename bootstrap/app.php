<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\Auth\CheckRole;
use App\Http\Middleware\RedirectIfLoggedIn;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->alias([
            'check_role' => CheckRole::class,
            'redirectIfLoggedIn' => RedirectIfLoggedIn::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
