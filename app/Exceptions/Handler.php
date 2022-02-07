<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        // if ($exception instanceof AccessDeniedHttpException) {
        //     return response(view('errors.404'), 404);
        // }
        // return parent::render($request, $exception);

        // 404 page when a model is not found
        if ($exception instanceof ModelNotFoundException) {
            return response()->view('errors.404', [], 404);
        }

        // custom error message
        if ($exception instanceof \ErrorException) {
            return response()->view('errors.500', [], 500);
        } else {
            return parent::render($request, $exception);
        }

        return parent::render($request, $exception);
    }
}
