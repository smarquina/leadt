<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use ValidatesRequests;

    /**
     * @param int         $code
     * @param string|null $msg
     * @return \Illuminate\Http\JsonResponse
     */
    final protected function responseWithError(int $code, string $msg = null): JsonResponse
    {
        return response()->json([
            'message'     => $msg ?? Response::$statusTexts[$code] ?? 'Fatal error',
            'code'        => $code,
            'status_code' => $code,
            'status'      => Response::$statusTexts[$code] ?? 'Fatal error',
        ], $code);
    }

    final protected function responseSuccessful(string $msg = null, $data = null): JsonResponse
    {
        return response()->json([
            'message' => $msg ?? 'OK',
            'data'    => $data,
        ]);
    }
}
