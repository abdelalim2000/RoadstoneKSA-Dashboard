<?php

namespace App\Http\Controllers\Api\TiresModuleApi;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tires\TireCardResource;
use App\Http\Resources\Tires\TireDetailsResource;
use App\Models\CarType;
use App\Models\Tire;
use Illuminate\Http\Request;
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
        $tire->load('tire_features', 'media', 'tire_designs', 'tire_sizes', 'locations');
        return TireDetailsResource::make($tire)
            ->additional(['status' => 'OK', 'message' => 'Tire Data Retrieved Successfully']);
    }

    public function searchTypeModel(Request $request): AnonymousResourceCollection
    {
        $tires = Tire::query()
            ->when($request->car_type_id, function ($query) use ($request) {
                return $query->where('car_type_id', $request->car_type_id);
            })
            ->when($request->car_model_id, function ($query) use ($request) {
                return $query->whereHas("car_models", function ($builder) use ($request) {
                    $builder->where('car_model_id', $request->car_model_id);
                });
            })
            ->get();

        return TireCardResource::collection($tires)
            ->additional(['status' => 'OK', 'message' => 'Tires Data By Car Type and Model Retrieved Successfully']);
    }

    public function searchSize(Request $request): AnonymousResourceCollection
    {
        $tires = Tire::query()
            ->when($request->width, function ($query) use ($request) {
                return $query->whereHas('tire_sizes', function ($builder) use ($request) {
                    $builder->where('width', $request->width);
                });
            })
            ->when($request->rim_diameter, function ($query) use ($request) {
                return $query->whereHas('tire_sizes', function ($builder) use ($request) {
                    $builder->where('rim_diameter', $request->rim_diameter);
                });
            })
            ->when($request->ratio, function ($query) use ($request) {
                return $query->whereHas('tire_sizes', function ($builder) use ($request) {
                    $builder->where('ratio', $request->ratio);
                });
            })
            ->get();

        return TireCardResource::collection($tires)
            ->additional(['status' => 'OK', 'message' => 'Tires Data BySize Retrieved Successfully']);
    }
}
