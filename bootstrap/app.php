<?php

use App\Http\Middleware\CustomMiddleware;
use App\Http\Middleware\EnsureUserIsAuthenticated;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isUser;
use App\Http\Middleware\RedirectUser;
use App\Http\Middleware\UsersMiddleware;
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
            'auth.access'=>CustomMiddleware::class,
            'auth.custom'=>EnsureUserIsAuthenticated::class,
            'is.user'=>isUser::class,
            'is.Admin'=>isAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
