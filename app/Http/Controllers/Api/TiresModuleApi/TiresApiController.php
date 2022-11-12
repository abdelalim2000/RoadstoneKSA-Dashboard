<?php

namespace App\Http\Controllers\Api\TiresModuleApi;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tires\TireCardResource;
use App\Http\Resources\Tires\TireDetailsResource;
use App\Models\CarType;
use App\Models\Tire;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TiresApiController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $tires = Tire::query()
            ->with(['media', 'translations', 'tire_features.translations'])
            ->translatedIn(request()->get('locale') ?? 'en')
            ->get();
        return TireCardResource::collection($tires)
            ->additional(['status' => 'OK', 'message' => 'Tires Data Retrieved Successfully']);
    }

    public function typePage(CarType $carType): AnonymousResourceCollection
    {
        $tires = Tire::query()
            ->where('car_type_id', $carType->id)
            ->with(['media', 'tire_features'])
            ->translatedIn(request()->get('locale') ?? 'en')
            ->get();
        
        return TireCardResource::collection($tires)
            ->additional(['status' => 'OK', 'message' => 'Tires Data By Car Type Retrieved Successfully']);
    }

    public function show(Tire $tire): TireDetailsResource
    {
        $tire->load('tire_features', 'media', 'tire_designs', 'tire_sizes');
        return TireDetailsResource::make($tire)
            ->additional(['status' => 'OK', 'message' => 'Tire Data Retrieved Successfully']);

    }
}
