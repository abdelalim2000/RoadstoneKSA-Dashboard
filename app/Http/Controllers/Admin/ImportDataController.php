<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ArticleImport;
use App\Imports\CarModelImport;
use App\Imports\CarTypeImport;
use App\Imports\CityImport;
use App\Imports\LocationImport;
use App\Imports\MakerImport;
use App\Imports\NewsImport;
use App\Imports\TireDesignImport;
use App\Imports\TireFeatureImport;
use App\Imports\TireImport;
use App\Imports\TireSizeImport;
use Exception;
use Gate;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImportDataController extends Controller
{
    public function index(): Factory|View|Application
    {
        abort_if(Gate::denies('import_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.importDatas.index');
    }

    public function carTypeImport(Request $request): RedirectResponse
    {
        if (!$request->file('car_type')) {
            return back()->with('error', 'Please upload file first');
        }

        $carType = new CarTypeImport;
        $carType->import($request->file('car_type'));

        if ($carType->failures()->isNotEmpty()) {
            return redirect()->route('admin.import-datas.index')->with('failures', $carType->failures());
        }

        return redirect()->route('admin.import-datas.index')->with('success', 'Car Types Data Imported Successfully');
    }

    public function makerImport(Request $request): RedirectResponse
    {
        if (!$request->file('maker')) {
            return back()->with('error', 'Please upload file first');
        }

        $maker = new MakerImport;
        $maker->import($request->file('maker'));

        if ($maker->failures()->isNotEmpty()) {
            return redirect()->route('admin.import-datas.index')->with('failures', $maker->failures());
        }

        return redirect()->route('admin.import-datas.index')->with('success', 'Makers Data Imported Successfully');
    }

    public function carModelImport(Request $request): RedirectResponse
    {
        if (!$request->file('car_model')) {
            return back()->with('error', 'Please upload file first');
        }

        $carModel = new CarModelImport;
        $carModel->import($request->file('car_model'));

        if ($carModel->failures()->isNotEmpty()) {
            return redirect()->route('admin.import-datas.index')->with('failures', $carModel->failures());
        }

        return redirect()->route('admin.import-datas.index')->with('success', 'Car Models Data Imported Successfully');
    }

    public function tireFeatureImport(Request $request): RedirectResponse
    {
        if (!$request->file('tire_feature')) {
            return back()->with('error', 'Please upload file first');
        }

        $tireFeature = new TireFeatureImport;
        $tireFeature->import($request->file('tire_feature'));

        if ($tireFeature->failures()->isNotEmpty()) {
            return redirect()->route('admin.import-datas.index')->with('failures', $tireFeature->failures());
        }

        return redirect()->route('admin.import-datas.index')->with('success', 'Tire Features Data Imported Successfully');
    }

    public function tireDesignImport(Request $request): RedirectResponse
    {
        if (!$request->file('tire_design')) {
            return back()->with('error', 'Please upload file first');
        }

        $tireDesign = new TireDesignImport;
        $tireDesign->import($request->file('tire_design'));

        if ($tireDesign->failures()->isNotEmpty()) {
            return redirect()->route('admin.import-datas.index')->with('failures', $tireDesign->failures());
        }

        return redirect()->route('admin.import-datas.index')->with('success', 'Tire Design Data Imported Successfully');
    }

    public function tireImport(Request $request): RedirectResponse
    {
        if (!$request->file('tire')) {
            return back()->with('error', 'Please upload file first');
        }

        $tire = new TireImport;
        $tire->import($request->file('tire'));

        if ($tire->failures()->isNotEmpty()) {
            return redirect()->route('admin.import-datas.index')->with('failures', $tire->failures());
        }

        return redirect()->route('admin.import-datas.index')->with('success', 'Tires Data Imported Successfully');
    }

    public function tireSizeImport(Request $request): RedirectResponse
    {
        if (!$request->file('tire_size')) {
            return back()->with('error', 'Please upload file first');
        }

        $tire = new TireSizeImport;
        $tire->import($request->file('tire_size'));

        if ($tire->failures()->isNotEmpty()) {
            return redirect()->route('admin.import-datas.index')->with('failures', $tire->failures());
        }

        return redirect()->route('admin.import-datas.index')->with('success', 'Tire Sizes Data Imported Successfully');
    }

    public function articleImport(Request $request): RedirectResponse
    {
        if (!$request->file('article')) {
            return back()->with('error', 'Please upload file first');
        }

        $article = new ArticleImport;
        $article->import($request->file('article'));

        if ($article->failures()->isNotEmpty()) {
            return redirect()->route('admin.import-datas.index')->with('failures', $article->failures());
        }

        return redirect()->route('admin.import-datas.index')->with('success', 'Articles Data Imported Successfully');
    }

    public function cityImport(Request $request): RedirectResponse
    {
        if (!$request->file('city')) {
            return back()->with('error', 'Please upload file first');
        }

        $city = new CityImport;
        $city->import($request->file('city'));

        if ($city->failures()->isNotEmpty()) {
            return redirect()->route('admin.import-datas.index')->with('failures', $city->failures());
        }

        return redirect()->route('admin.import-datas.index')->with('success', 'Cities Data Imported Successfully');
    }

    public function locationImport(Request $request): RedirectResponse
    {
        if (!$request->file('location')) {
            return back()->with('error', 'Please upload file first');
        }

        $location = new LocationImport;
        $location->import($request->file('location'));

        if ($location->failures()->isNotEmpty()) {
            return redirect()->route('admin.import-datas.index')->with('failures', $location->failures());
        }

        return redirect()->route('admin.import-datas.index')->with('success', 'Locations Data Imported Successfully');
    }

    public function newsImport(Request $request): RedirectResponse
    {
        if (!$request->file('news')) {
            return back()->with('error', 'Please upload file first');
        }

        $news = new NewsImport;
        $news->import($request->file('news'));

        if ($news->failures()->isNotEmpty()) {
            return redirect()->route('admin.import-datas.index')->with('failures', $news->failures());
        }

        return redirect()->route('admin.import-datas.index')->with('success', 'News Data Imported Successfully');
    }
}
