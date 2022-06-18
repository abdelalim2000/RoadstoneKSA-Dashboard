<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\CarType;
use App\Models\City;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(): Factory|View|Application
    {
        $types = CarType::query()->where('active', true)->with('media')->get();
        $cities = City::query()->where('active', true)->with('media')->get();
        return view('site.home', compact([
            'types',
            'cities',
        ]));
    }
}
