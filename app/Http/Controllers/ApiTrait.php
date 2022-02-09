<?php

namespace App\Http\Controllers;

use Fig\Http\Message\StatusCodeInterface as StatusCode;
use Illuminate\Http\JsonResponse;

trait ApiTrait
{
    /**
     * @param  string  $message
     * @param  array   $data
     * @param  bool    $success
     * @param  int     $code
     *
     * @return JsonResponse
     */
    public function returnApiResponse(
        string $message = '',
        $data = [],
        bool $success = true,
        int $code = 200
    ): JsonResponse {
        return response()->json([
                                    'success' => $success,
                                    'message' => $message,
                                    'data'    => $data,
                                ], $code);
    }

    /**
     * Return 200.
     *
     * @param  string  $message
     * @param  array   $data
     *
     * @return JsonResponse
     */
    public function returnSuccess(string $message = 'Success', $data = []): JsonResponse
    {
        return $this->returnApiResponse($message, $data);
    }

    /**
     * Return 400.
     *
     * @param  string  $message
     * @param  array   $data
     *
     * @return JsonResponse
     */
    public function return400Response(string $message = 'Bad request', $data = []): JsonResponse
    {
        return $this->returnApiResponse($message, $data, false, StatusCode::STATUS_BAD_REQUEST);
    }

    /**
     * Return 403.
     *
     * @param  string  $message
     * @param  array   $data
     *
     * @return JsonResponse
     */
    public function return403Response(string $message = 'Forbidden', $data = []): JsonResponse
    {
        return $this->returnApiResponse($message, $data, false, StatusCode::STATUS_FORBIDDEN);
    }

    /**
     * Return 404.
     *
     * @param  string  $message
     * @param  array   $data
     *
     * @return JsonResponse
     */
    public function return404Response(string $message = 'Not found', $data = []): JsonResponse
    {
        return $this->returnApiResponse($message, $data, false, StatusCode::STATUS_NOT_FOUND);
    }

    /**
     * Return 404.
     *
     * @param  string  $message
     * @param  array   $data
     *
     * @return JsonResponse
     */
    public function return422Response(string $message = 'Unprocessable Entity', $data = []): JsonResponse
    {
        return $this->returnApiResponse($message, $data, false, StatusCode::STATUS_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param  string  $message
     * @param  array   $data
     *
     * @return JsonResponse
     */
    public function return500Error(string $message = '', $data = []): JsonResponse
    {
        return $this->returnApiResponse($message, $data, false, StatusCode::STATUS_INTERNAL_SERVER_ERROR);
    }
}
