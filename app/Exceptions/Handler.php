<?php

namespace App\Exceptions;

use Exception; 
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    protected $errors = [
        200 => 'OK',
        204 => 'No Content',
        304 => 'Not Modified',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Page Not Found',
        405 => 'Method Not Allowed',
        408 => 'Request Timeout',
        414 => 'URI Too Long',
        422 => 'Unprocessable Entity (Validation Error)',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        511 => 'Network Authentication Required',
    ];
    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($this->isHttpException($exception)) {
            if (view()->exists('errors.default')) {
                return response()->view('errors.default', [
                    'error_code'=>$exception->getStatusCode(),
                    'error'=>$this->errors[$exception->getStatusCode()]
                    ],
                    $exception->getStatusCode());
            }
        }
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('admin') || $request->is('admin/*')) {
            return redirect()->guest('/admin/login');
        }
        // return redirect()->guest(route('login'));
    }

}
