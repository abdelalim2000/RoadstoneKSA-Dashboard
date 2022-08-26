<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Search\AspectRatioResource;
use App\Http\Resources\Search\MakerResource;
use App\Http\Resources\Search\ModelResource;
use App\Http\Resources\Search\RimDiameterResource;
use App\Http\Resources\Search\WidthResource;
use App\Models\CarModel;
use App\Models\Maker;
use App\Models\TireSize;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TireSearchApiController extends Controller
{
    public function maker(Request $request): AnonymousResourceCollection
    {
        $makers = Maker::query()->select('id', 'name')
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->orderBy('name')
            ->get();
        return MakerResource::collection($makers);
    }

    public function model(Request $request): AnonymousResourceCollection
    {
        $models = CarModel::query()
            ->select('id', 'name')
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->where('maker_id', $request->model)
            ->get();
        return ModelResource::collection($models);
    }

    public function width(Request $request)
    {
        $width = TireSize::query()
            ->select('width')
            ->distinct()
            ->orderBy('width', 'asc')
            ->when($request->search, function ($query) use ($request) {
                $query->where('width', 'like', '%' . $request->search . '%');
            })
            ->get();
        return WidthResource::collection($width);
    }

    public function aspectRatio(Request $request)
    {
        $aspectRatio = TireSize::query()
            ->select('ratio')
            ->distinct()
            ->orderBy('ratio', 'asc')
            ->when($request->search, function ($query) use ($request) {
                $query->where('ratio', 'like', '%' . $request->search . '%');
            })
            ->get();
        return AspectRatioResource::collection($aspectRatio);
    }

    public function rimDiameter(Request $request)
    {
        $rimDiameter = TireSize::query()
            ->select('rim_diameter')
            ->distinct()
            ->orderBy('rim_diameter', 'asc')
            ->when($request->search, function ($query) use ($request) {
                $query->where('rim_diameter', 'like', '%' . $request->search . '%');
            })
            ->get();
        return RimDiameterResource::collection($rimDiameter);
    }
}
