<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

trait HasApiResponse
{

  public static function sendResponse(bool $status, string $message, array|AnonymousResourceCollection|JsonResource $data, array $errors, array $meta, int $statusCode, array $headers = []): JsonResponse
  {
    $response = [
      'status' => $status
    ];

    if (!blank($message)) {
      $response['message'] = $message;
    }


    if (!empty($data)) {
      $response['data'] = $data;
      if ($data instanceof AnonymousResourceCollection && $data->resource instanceof LengthAwarePaginator) {
        $meta = array_merge($meta, self::getPaginationMeta($data->resource));
      }
    }


    if (!empty($errors)) {
      $response['errors'] = $errors;
    }

    if (!empty($meta)) {
      $response['meta'] = $meta;
    }


    $statusCode ??= $status ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST;


    return response()->json(
      data: $response,
      status: $statusCode,
      headers: $headers ?? []

    );
  }



  protected static function getPaginationMeta(LengthAwarePaginator $paginator): array
  {
    return [
      'pagination' => [
        'total' => $paginator->total(),
        'per_page' => $paginator->perPage(),
        'current_page' => $paginator->currentPage(),
        'last_page' => $paginator->lastPage(),
        'from' => $paginator->firstItem(),
        'to' => $paginator->lastItem(),
        'next_page_url' => $paginator->nextPageUrl(),
        'prev_page_url' => $paginator->previousPageUrl(),
      ]

    ];
  }



  public static function successResponse(string $message = '', array|JsonResource $data = [], array $meta = [], int $statusCode = 200, array $headers = []): JsonResponse
  {
    return static::sendResponse(
      status: true,
      message: $message,
      data: $data,
      errors: [],  
      meta: $meta,
      statusCode: $statusCode,
      headers: $headers
    );
  }


  public static function errorResponse(string $message = '', array $errors = [], int $statusCode = 400, array $headers = []): JsonResponse
  {

    return static::sendResponse(
      status: false,
      message: $message,
      data: [],
      errors: $errors,
      meta: [],
      statusCode: $statusCode,
      headers: $headers,
    );
  }


  public static function notFoundResponse(string $message = '')
  {
    return self::errorResponse(
      message: $message,
      errors: [],
      statusCode: Response::HTTP_NOT_FOUND,
      headers: [],
    );
  }


  protected function requestHasOnlyEmptyValues(string $message = '')
  {
      return self::errorResponse(
        message: $message,
        errors: [],
        statusCode: Response::HTTP_BAD_REQUEST,
        headers: [],
      );
  }
}
