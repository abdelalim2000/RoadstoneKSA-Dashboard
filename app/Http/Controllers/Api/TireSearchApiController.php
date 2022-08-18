<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Search\MakerResource;
use App\Http\Resources\Search\ModelResource;
use App\Models\CarModel;
use App\Models\Maker;
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
}
