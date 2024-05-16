<?php

namespace Wame\Core\Exceptions;

use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;

class ExceptionHandler extends Exception
{
    public function __invoke(Exception $exception, Request $request): Application|Response|ContractsApplication|ResponseFactory|null
    {
        if ($exception instanceof WameException) {
            return response([
                'code' => $exception->getMessage(),
                'message' => __($exception->getMessage()),
            ], $exception->getCode());
        }

        return null;
    }
}
