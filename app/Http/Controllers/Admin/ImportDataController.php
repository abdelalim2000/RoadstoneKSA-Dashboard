<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\CarModelImport;
use App\Imports\CarTypeImport;
use App\Imports\MakerImport;
use Exception;
use Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImportDataController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('import_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.importDatas.index');
    }

    public function carTypeImport(Request $request): RedirectResponse
    {
        $file = $request->file('car_type');

        $carType = new CarTypeImport;
        $carType->import($file);

        if ($carType->failures()->isNotEmpty()) {
            return redirect()->route('admin.import-datas.index')->with('failures', $carType->failures());
        }

        return redirect()->route('admin.import-datas.index')->with('success', 'Car Types Data Imported Successfully');
    }

    public function makerImport(Request $request): RedirectResponse
    {
        $file = $request->file('maker');

        $maker = new MakerImport;
        $maker->import($file);

        if ($maker->failures()->isNotEmpty()) {
            return redirect()->route('admin.import-datas.index')->with('failures', $maker->failures());
        }

        return redirect()->route('admin.import-datas.index')->with('success', 'Makers Data Imported Successfully');
    }

    public function carModelImport(Request $request): RedirectResponse
    {
        $file = $request->file('car_model');

        $carModel = new CarModelImport;
        $carModel->import($file);

        if ($carModel->failures()->isNotEmpty()) {
            return redirect()->route('admin.import-datas.index')->with('failures', $carModel->failures());
        }

        return redirect()->route('admin.import-datas.index')->with('success', 'Makers Data Imported Successfully');
    }

//    public function create()
//    {
//        abort_if(Gate::denies('import_data_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//
//        return view('admin.importDatas.create');
//    }
//
//    public function store(StoreImportDataRequest $request)
//    {
//        $importData = ImportData::create($request->all());
//
//        return redirect()->route('admin.import-datas.index');
//    }
//
//    public function edit(ImportData $importData)
//    {
//        abort_if(Gate::denies('import_data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//
//        return view('admin.importDatas.edit', compact('importData'));
//    }
//
//    public function update(UpdateImportDataRequest $request, ImportData $importData)
//    {
//        $importData->update($request->all());
//
//        return redirect()->route('admin.import-datas.index');
//    }
//
//    public function show(ImportData $importData)
//    {
//        abort_if(Gate::denies('import_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//
//        return view('admin.importDatas.show', compact('importData'));
//    }
//
//    public function destroy(ImportData $importData)
//    {
//        abort_if(Gate::denies('import_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
//
//        $importData->delete();
//
//        return back();
//    }
//
//    public function massDestroy(MassDestroyImportDataRequest $request)
//    {
//        ImportData::whereIn('id', request('ids'))->delete();
//
//        return response(null, Response::HTTP_NO_CONTENT);
//    }
}
