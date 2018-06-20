<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Handler extends ExceptionHandler
{
    use ApiResponser;
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
     * @param \Exception $exception Exception
     *
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request   Request
     * @param \Exception               $exception Exception
     *
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->route() != null) {
            if ($request->route()->getPrefix() === 'api') {
                // error 404
                if ($exception instanceof ModelNotFoundException) {
                    $code = Response::HTTP_NOT_FOUND;
                    $message = __('api.error_404');
                    return $this->errorResponse($message, $code);
                }
            }
        }
        if ($exception instanceof AuthenticationException) {
            $code = Response::HTTP_UNAUTHORIZED;
            $message = __('login.user.unauthorised');
            return $this->errorResponse($message, $code);
        }
        return parent::render($request, $exception);
    }
}
