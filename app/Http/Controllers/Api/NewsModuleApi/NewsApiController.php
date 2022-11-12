<?php

namespace App\Http\Controllers\Api\NewsModuleApi;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsApi\NewsStoreRequest;
use App\Models\News;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class NewsApiController extends Controller
{
    public function store(NewsStoreRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            News::query()->create($request->validated());

            DB::commit();
            return response()->json(['status' => 'OK', 'message' => 'Congratulations you have successfully subscribed to our news']);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 'ERROR', 'message' => 'Something went wrong, Please try again']);
        }
    }
}
