<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsStoreRequest;
use App\Models\News;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NewsStoreController extends Controller
{
    public function store(NewsStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        News::query()->create($request->validated());

        Alert::success(trans('website.message.success'), trans('website.message.success-news-message'));

        return back();
    }
}
