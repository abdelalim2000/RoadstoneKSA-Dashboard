<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Tire;
use Illuminate\Http\Request;

class SearchTires extends Controller
{
    public function searchByMaker(Request $request)
    {
        $tires = Tire::query()
            ->with(['media', 'tire_features', 'car_models'])
            ->whereHas('car_models', function ($query) use ($request) {
                $query->where('id', $request->model);
            })
            ->get();

        return view('site.search.search-maker', compact([
            'tires',
        ]));
    }

    public function searchBySize(Request $request)
    {
        $tires = Tire::query()
            ->with(['media', 'tire_features', 'tire_sizes'])
            ->whereHas('tire_sizes', function ($query) use ($request) {
                $query->where('width', $request->width);
            })
            ->whereHas('tire_sizes', function ($query) use ($request) {
                $query->where('ratio', $request->ratio);
            })
            ->whereHas('tire_sizes', function ($query) use ($request) {
                $query->where('rim_diameter', $request->rim);
            })
            ->get();

        return view('site.search.search-size', compact([
            'tires',
        ]));
    }
}
