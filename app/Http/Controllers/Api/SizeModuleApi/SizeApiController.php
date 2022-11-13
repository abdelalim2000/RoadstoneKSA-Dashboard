<?php

namespace App\Http\Controllers\Api\SizeModuleApi;

use App\Http\Controllers\Controller;
use App\Http\Resources\Size\AspectRatioResource;
use App\Http\Resources\Size\RimDiameterResource;
use App\Http\Resources\Size\WidthResource;
use App\Models\TireSize;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SizeApiController extends Controller
{
    public function width(): AnonymousResourceCollection
    {
        $widths = TireSize::query()
            ->select('width')
            ->orderBy('width', 'asc')
            ->distinct()
            ->get();

        return WidthResource::collection($widths)
            ->additional(['status' => 'OK', 'message' => 'Width Retrieved Successfully']);
    }

    public function rimDiameter(): AnonymousResourceCollection
    {
        $rims = TireSize::query()
            ->select('rim_diameter')
            ->orderBy('rim_diameter', 'asc')
            ->distinct()
            ->get();

        return RimDiameterResource::collection($rims)
            ->additional(['status' => 'OK', 'message' => 'Rim Diameter Retrieved Successfully']);
    }

    public function aspectRatio(): AnonymousResourceCollection
    {
        $ratio = TireSize::query()
            ->select('ratio')
            ->orderBy('ratio', 'asc')
            ->distinct()
            ->get();

        return AspectRatioResource::collection($ratio)
            ->additional(['status' => 'OK', 'message' => 'Aspect Ratio Data Retrieved Successfully']);
    }
}
