<?php

namespace App\Providers;

use App\Http\Resources\Search\MakerResource;
use App\Http\Resources\Search\ModelResource;
use App\Models\CarType;
use App\Models\City;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        if (!app()->runningInConsole()) {
            View::share('types', CarType::query()->where('active', true)->with('media')->get());
            View::share('cities', City::query()->where('active', true)->with('media')->get());
            MakerResource::withoutWrapping();
            ModelResource::withoutWrapping();
        }
    }
}
