<?php

namespace App\Http\Controllers\Api\SettingModule;

use App\Http\Controllers\Controller;
use App\Http\Resources\Image\ImageResource;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SettingApiController extends Controller
{
    public function settingText(Request $request): JsonResponse
    {
        app()->setLocale($request->lang);

        $data = Setting::query()
            ->where('key', $request->key)
            ->listsTranslations($request->type)
            ->pluck($request->type);

        return response()->json([
            'data' => $data,
            'status' => 'OK',
            'message' => 'Record Retrieved successfully'
        ]);
    }

    public function settingImage(Request $request): ImageResource|JsonResponse
    {
        $data = Setting::with('media')
            ->where('key', $request->key)
            ->first();

        if ($request->type == 'file') {
            return response()->json([
                'data' => $data->file ? $data->file->original_url : [],
                'status' => 'OK',
                'message' => 'Record Retrieved Successfully'
            ]);
        }
        if ($request->type == 'image' && $data->image !== null) {
            return ImageResource::make($data->image);
        }

        return response()->json([
            'data' => [],
            'status' => 'OK',
            'message' => 'Record Retrieved Successfully'
        ]);
    }
}
