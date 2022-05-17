<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTireDesignRequest;
use App\Http\Requests\StoreTireDesignRequest;
use App\Http\Requests\UpdateTireDesignRequest;
use App\Models\TireDesign;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TireDesignController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('tire_design_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TireDesign::query()->select(sprintf('%s.*', (new TireDesign())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'tire_design_show';
                $editGate = 'tire_design_edit';
                $deleteGate = 'tire_design_delete';
                $crudRoutePart = 'tire-designs';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'image']);

            return $table->make(true);
        }

        return view('admin.tireDesigns.index');
    }

    public function create()
    {
        abort_if(Gate::denies('tire_design_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tireDesigns.create');
    }

    public function store(StoreTireDesignRequest $request)
    {
        $tireDesign = TireDesign::create($request->all());

        if ($request->input('image', false)) {
            $tireDesign->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $tireDesign->id]);
        }

        return redirect()->route('admin.tire-designs.index');
    }

    public function edit(TireDesign $tireDesign)
    {
        abort_if(Gate::denies('tire_design_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tireDesigns.edit', compact('tireDesign'));
    }

    public function update(UpdateTireDesignRequest $request, TireDesign $tireDesign)
    {
        $tireDesign->update($request->all());

        if ($request->input('image', false)) {
            if (!$tireDesign->image || $request->input('image') !== $tireDesign->image->file_name) {
                if ($tireDesign->image) {
                    $tireDesign->image->delete();
                }
                $tireDesign->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($tireDesign->image) {
            $tireDesign->image->delete();
        }

        return redirect()->route('admin.tire-designs.index');
    }

    public function show(TireDesign $tireDesign)
    {
        abort_if(Gate::denies('tire_design_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tireDesigns.show', compact('tireDesign'));
    }

    public function destroy(TireDesign $tireDesign)
    {
        abort_if(Gate::denies('tire_design_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tireDesign->delete();

        return back();
    }

    public function massDestroy(MassDestroyTireDesignRequest $request)
    {
        TireDesign::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('tire_design_create') && Gate::denies('tire_design_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TireDesign();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
