<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTireSizeRequest;
use App\Http\Requests\StoreTireSizeRequest;
use App\Http\Requests\UpdateTireSizeRequest;
use App\Models\Tire;
use App\Models\TireSize;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TireSizeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('tire_size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TireSize::with(['tire'])->select(sprintf('%s.*', (new TireSize())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'tire_size_show';
                $editGate = 'tire_size_edit';
                $deleteGate = 'tire_size_delete';
                $crudRoutePart = 'tire-sizes';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('width', function ($row) {
                return $row->width ? $row->width : '';
            });
            $table->editColumn('ratio', function ($row) {
                return $row->ratio ? $row->ratio : '';
            });
            $table->editColumn('rim_diameter', function ($row) {
                return $row->rim_diameter ? $row->rim_diameter : '';
            });
            $table->editColumn('load_index', function ($row) {
                return $row->load_index ? $row->load_index : '';
            });
            $table->editColumn('speed_rating', function ($row) {
                return $row->speed_rating ? $row->speed_rating : '';
            });
            $table->addColumn('tire_title', function ($row) {
                return $row->tire ? $row->tire->title : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'tire']);

            return $table->make(true);
        }

        return view('admin.tireSizes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('tire_size_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tires = Tire::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tireSizes.create', compact('tires'));
    }

    public function store(StoreTireSizeRequest $request)
    {
        $tireSize = TireSize::create($request->all());

        return redirect()->route('admin.tire-sizes.index');
    }

    public function edit(TireSize $tireSize)
    {
        abort_if(Gate::denies('tire_size_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tires = Tire::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tireSize->load('tire');

        return view('admin.tireSizes.edit', compact('tireSize', 'tires'));
    }

    public function update(UpdateTireSizeRequest $request, TireSize $tireSize)
    {
        $tireSize->update($request->all());

        return redirect()->route('admin.tire-sizes.index');
    }

    public function show(TireSize $tireSize)
    {
        abort_if(Gate::denies('tire_size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tireSize->load('tire');

        return view('admin.tireSizes.show', compact('tireSize'));
    }

    public function destroy(TireSize $tireSize)
    {
        abort_if(Gate::denies('tire_size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tireSize->delete();

        return back();
    }

    public function massDestroy(MassDestroyTireSizeRequest $request)
    {
        TireSize::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
