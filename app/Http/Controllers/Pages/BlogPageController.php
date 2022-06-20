<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    public function index(): Factory|View|Application
    {
        $articles = Article::query()->where('publish', true)->with('media')->paginate(1);
        return view('site.Blogs.blog-page', compact([
            'articles',
        ]));
    }

    public function show(Article $article): Factory|View|Application
    {
        return view('site.Blogs.blog-detail-page', compact('article'));
    }
}
