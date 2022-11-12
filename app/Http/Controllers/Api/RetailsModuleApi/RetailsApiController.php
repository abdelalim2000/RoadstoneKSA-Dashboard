<?php

namespace App\Http\Controllers\Api\RetailsModuleApi;

use App\Http\Controllers\Controller;
use App\Http\Resources\Retails\RetailsResource;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RetailsApiController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $cities = City::query()
            ->where('active', true)
            ->with(['media', 'locations'])
            ->whereHas('locations', function ($query) {
                $query->where('active', true);
            })
            ->get();

        return RetailsResource::collection($cities)->additional(['status' => 'OK', 'message' => 'Retails Data Retrieved Successfully']);
    }
}
