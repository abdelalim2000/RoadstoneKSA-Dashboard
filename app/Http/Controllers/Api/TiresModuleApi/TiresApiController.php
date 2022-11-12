<?php

namespace App\Http\Controllers\Api\TiresModuleApi;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tires\TireDetailsResource;
use App\Http\Resources\Tires\TiresResource;
use App\Models\CarType;
use App\Models\Tire;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TiresApiController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $tires = Tire::query()->with(['media', 'tire_features'])->get();
        return TiresResource::collection($tires)->additional(['status' => 'OK', 'message' => 'Tires Data Retrieved Successfully']);
    }

    public function typePage(CarType $carType): AnonymousResourceCollection
    {
        $tires = Tire::query()->where('car_type_id', $carType->id)->with(['media', 'tire_features'])->get();

        if ($tires->count() == 0) {
            return TiresResource::collection(collect([]))->additional(['status' => 'ERROR', 'message' => 'No Tires Found.'], 404);
        }
        return TiresResource::collection($tires)->additional(['carType' => $carType, 'status' => 'OK', 'message' => 'Tires Data Retrieved Successfully']);
    }

    public function show(Tire $tire): AnonymousResourceCollection
    {
        $tire->load('tire_features', 'media', 'tire_designs', 'car_type', 'tire_sizes');
        return TireDetailsResource::make($tire)->additional(['status' => 'OK', 'message' => 'Tires Data Retrieved Successfully']);
    }
}
