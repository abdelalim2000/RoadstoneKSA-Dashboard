<?php

namespace App\Http\Controllers\Api\ArticleModuleApi;

use App\Http\Controllers\Controller;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ArticleApiController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $articles = Article::query()
            ->with('media', 'translations')
            ->translatedIn(request()->get('locale'))
            ->where('publish', true)
            ->get();
        return ArticleResource::collection($articles)
            ->additional(['status' => 'OK', 'message' => 'Articles Data Retrieved Successfully']);
    }

    public function show(Article $article): ArticleResource
    {
        $article->load(['media', 'translations']);
        return ArticleResource::make($article)
            ->additional(['status' => 'OK', 'message' => 'Article Data Retrieved Successfully']);
    }
}
