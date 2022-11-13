<?php

namespace App\Http\Controllers\Api\CarsModuleApi;

use App\Http\Controllers\Controller;
use App\Http\Resources\Search\CarTypeResource;
use App\Http\Resources\Search\MakerResource;
use App\Http\Resources\Search\ModelResource;
use App\Models\CarModel;
use App\Models\CarType;
use App\Models\Maker;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CarApiController extends Controller
{
    public function types(): AnonymousResourceCollection
    {
        $types = CarType::query()
            ->with('media')
            ->where('active', true)
            ->get();

        return CarTypeResource::collection($types)
            ->additional(['status' => 'OK', 'message' => 'Car Types Data Retrieved Successfully']);
    }

    public function maker(): AnonymousResourceCollection
    {
        $makers = Maker::query()
            ->orderBy('name', 'asc')
            ->get();

        return MakerResource::collection($makers)
            ->additional(['status' => 'OK', 'message' => 'Car Makers Data Retrieved Successfully']);
    }

    public function carModel(Maker $maker): AnonymousResourceCollection
    {
        $models = CarModel::query()->where('maker_id', $maker->id)->get();
        return ModelResource::collection($models)
            ->additional(['status' => 'OK', 'message' => 'Car Models Data Retrieved Successfully']);
    }
}
