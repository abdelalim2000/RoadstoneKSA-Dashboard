<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyImportDataRequest;
use App\Http\Requests\StoreImportDataRequest;
use App\Http\Requests\UpdateImportDataRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImportDataController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('import_data_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.importDatas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('import_data_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.importDatas.create');
    }

    public function store(StoreImportDataRequest $request)
    {
        $importData = ImportData::create($request->all());

        return redirect()->route('admin.import-datas.index');
    }

    public function edit(ImportData $importData)
    {
        abort_if(Gate::denies('import_data_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.importDatas.edit', compact('importData'));
    }

    public function update(UpdateImportDataRequest $request, ImportData $importData)
    {
        $importData->update($request->all());

        return redirect()->route('admin.import-datas.index');
    }

    public function show(ImportData $importData)
    {
        abort_if(Gate::denies('import_data_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.importDatas.show', compact('importData'));
    }

    public function destroy(ImportData $importData)
    {
        abort_if(Gate::denies('import_data_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $importData->delete();

        return back();
    }

    public function massDestroy(MassDestroyImportDataRequest $request)
    {
        ImportData::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
