<?php

namespace App\Http\Controllers\Api\RetailsModuleApi;

use App\Http\Controllers\Controller;
use App\Http\Resources\Retails\RetailsResource;
use App\Models\City;
use Illuminate\Http\Request;

class RetailsApiController extends Controller
{
    public function index()//: View|Factory|RedirectResponse|Application
    {
        $cities = City::query()
            ->where('active', true)
            ->with(['media', 'locations'])
            ->whereHas('locations', function ($query) {
                $query->where('active', true);
            })
            ->get();
        // return $cities;
        // if ($cities->count() == 0) {
        //     Alert::info(trans('website.message.info'), trans('website.message.info-retailer-not-found'));
        //     return back();
        // }

        return RetailsResource::collection($cities);
    }
}
