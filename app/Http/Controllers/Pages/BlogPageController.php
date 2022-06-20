<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    public function index()
    {
        return view('site.Blogs.blog-page');
    }

    public function show(Article $article)
    {
        return view('site.Blogs.blog-detail-page', compact('article'));
    }
}
