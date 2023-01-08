<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class ApiCustomException extends Exception
{
    public function __construct(protected $code = 404, protected string $status, protected array $data)
    {
    }

    public function report()
    {
        return false;
    }

    public function render($request): JsonResponse
    {
        return response()->json($this->getResponseData(), $this->code);
    }

    public function getResponseData(): array
    {
        return [
            'code' => $this->code,
            'status' => $this->status ?? 'Not Found',
            'data' => $this->data ?? []
        ];
    }
}
