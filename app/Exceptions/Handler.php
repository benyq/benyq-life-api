<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
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
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return $this->handle($request, $exception);
    }

    public function handle(Request $request, Exception $e)
    {
        $msg = $e->getMessage();
        $code = $e->getCode() ? $e->getCode() : -10086;
        if ($e instanceof UnauthorizedHttpException) {
            $msg = '登录已过期，请重新登录';
            $code = -101;
        }
        $data = [];
        $data['code'] = $code;
        $data['msg'] = $msg;
        $data['file'] = $e->getFile();
        $data['line'] = $e->getLine();

        return response()->json($data);
    }

}
