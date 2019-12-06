<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

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
        if ($exception instanceof UnauthorizedHttpException) {
            $preException = $exception->getPrevious();
            if ($preException instanceof
                \Tymon\JWTAuth\Exceptions\TokenExpiredException
            ) {
                return response()->json([
                    'errors' => ['Your Token has expired. Please login to generate new one.']
                ], $exception->getStatusCode());
            } else if ($preException instanceof
                \Tymon\JWTAuth\Exceptions\TokenInvalidException
            ) {
                return response()->json([
                    'errors' => ['Your Token is Invalid. Please login to generate new one.']
                ], $exception->getStatusCode());
            } else if ($preException instanceof
                \Tymon\JWTAuth\Exceptions\TokenBlacklistedException
            ) {
                return response()->json([
                    'errors' => ['Your Token is Blacklisted. Please use /refresh to generate new token or contact Administrator.']
                ]);
            }
            if ($exception->getMessage() === 'Token not provided') {
                return response()->json([
                    'errors' => ['Token is Empty. Please provide one.']
                ], $exception->getStatusCode());
            }
        }

        if ($exception instanceof \Illuminate\Auth\Access\AuthorizationException) {
            return response()->json([
                'errors' => ['']
            ], 500);
        }


        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            return response()->json([
                'errors' => ['Huh? How did you get here? >> Invalid Route! >> 404!!!']
            ], $exception->getStatusCode());
        }

        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            return response()->json([
                'errors' => ['You cannot access this.']
            ], 403);
        }


        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        return redirect()->guest('login');
    }
}
