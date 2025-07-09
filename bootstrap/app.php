<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // $exceptions->render(function (MethodNotAllowedHttpException $e, Request $request) {
        //     if (
        //         ($request->is('entry/step-two-submit') || $request->is('purchase/step-two-submit'))
        //         && $request->method() === 'GET'
        //     ) {
        //         return response()->view('errors.custom_error', [], 200);
        //     }
        //     if (
        //         str_contains($e->getMessage(), 'SendGrid\Mail\Personalization') &&
        //         ($request->is('entry/step-two-submit') || $request->is('purchase/step-two-submit'))
        //     ) {
        //         return response()->view('errors.custom_error', [], 200);
        //     }

        //     return null;
        // });
        $exceptions->render(function (Throwable $e, Request $request) {
            return response()->view('errors.custom_error', [], 500);
        });
    })->create();
