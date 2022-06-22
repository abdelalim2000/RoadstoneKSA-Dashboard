<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\CarType;
use App\Models\Tire;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class TirePageController extends Controller
{
    public function index(): Factory|View|Application
    {
        $tires = Tire::query()->with(['media', 'tire_features'])->get();

        return view('site.tires.tires-page', compact([
            'tires',
        ]));
    }

    public function typePage(CarType $carType): View|Factory|RedirectResponse|Application
    {
        $tires = Tire::query()->where('car_type_id', $carType->id)->with(['media', 'tire_features'])->get();

        if ($tires->count() == 0) {
            Alert::info(trans('website.message.info'), trans('website.message.info-tire-not-found'));
            return back();
        }

        return view('site.tires.tire-type-page', compact([
            'tires',
            'carType',
        ]));
    }

    public function show(Tire $tire): Factory|View|Application
    {
        $tire->load('tire_features', 'media', 'tire_designs', 'car_type', 'tire_sizes');

        return view('site.tires.tire-detail', compact([
            'tire',
        ]));
    }
}
