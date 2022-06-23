<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RetailerPageController extends Controller
{
    public function index(): View|Factory|RedirectResponse|Application
    {
        $cities = City::query()
            ->where('active', true)
            ->with(['media', 'locations'])
            ->whereHas('locations', function ($query) {
                $query->where('active', true);
            })
            ->get();

        if ($cities->count() == 0) {
            Alert::info(trans('website.message.info'), trans('website.message.info-retailer-not-found'));
            return back();
        }

        return view('site.retailer-page', compact('cities'));
    }
}
