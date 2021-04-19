<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {

       
        if ($exception instanceof MethodNotAllowedHttpException) {            
            return response()->json(["message" => "The specified method for the request is invalid"],405);
        }

        if ($exception instanceof NotFoundHttpException) {            
            return response()->json(["message" => "The specified URL cannot be found"],404);
        }

        if ($exception instanceof HttpException) {           
            return response()->json(["message" => $exception->getMessage()],$exception->getStatusCode());
        }

        if ($exception instanceof ModelNotFoundException) {
           
            return response()->json(["message" => $exception->getModel()." not found"],404);
        }

        
        return parent::render($request, $exception);
    }
}
