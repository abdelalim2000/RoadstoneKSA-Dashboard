<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySiteTranslationRequest;
use App\Http\Requests\StoreSiteTranslationRequest;
use App\Http\Requests\UpdateSiteTranslationRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteTranslationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('site_translation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteTranslations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('site_translation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteTranslations.create');
    }

    public function store(StoreSiteTranslationRequest $request)
    {
        $siteTranslation = SiteTranslation::create($request->all());

        return redirect()->route('admin.site-translations.index');
    }

    public function edit(SiteTranslation $siteTranslation)
    {
        abort_if(Gate::denies('site_translation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteTranslations.edit', compact('siteTranslation'));
    }

    public function update(UpdateSiteTranslationRequest $request, SiteTranslation $siteTranslation)
    {
        $siteTranslation->update($request->all());

        return redirect()->route('admin.site-translations.index');
    }

    public function show(SiteTranslation $siteTranslation)
    {
        abort_if(Gate::denies('site_translation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteTranslations.show', compact('siteTranslation'));
    }

    public function destroy(SiteTranslation $siteTranslation)
    {
        abort_if(Gate::denies('site_translation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $siteTranslation->delete();

        return back();
    }

    public function massDestroy(MassDestroySiteTranslationRequest $request)
    {
        SiteTranslation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
