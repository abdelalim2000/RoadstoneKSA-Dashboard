<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Article;
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
        $articles = Article::query()->where('publish', true)->with('media')->inRandomOrder()->limit(6)->get();
        return view('site.home', compact([
            'articles',
        ]));
    }
}
