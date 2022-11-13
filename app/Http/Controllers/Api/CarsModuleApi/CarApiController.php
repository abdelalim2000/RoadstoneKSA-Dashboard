<?php

namespace App\Http\Controllers\Api\CarsModuleApi;

use App\Http\Controllers\Controller;
use App\Http\Resources\Search\AspectRatioResource;
use App\Http\Resources\Search\CarModelResource;
use App\Http\Resources\Search\MakerResource;
use App\Http\Resources\Search\RimDiameterResource;
use App\Http\Resources\Search\WidthResource;
use App\Models\Maker;
use App\Models\TireSize;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Cache;

class CarApiController extends Controller
{
    public function maker(): AnonymousResourceCollection
    {
        $makers =  Maker::query()
                ->with('media')
                ->orderBy('name', 'asc')
                ->get();

        return MakerResource::collection($makers)
            ->additional(['status' => 'OK', 'message' => 'Car Makers Data Retrieved Successfully']);
    }

    public function carModel(Maker $maker)
    {
        $maker->load('models');
        return new CarModelResource($maker);
    }
}
