<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTireFeatureRequest;
use App\Http\Requests\StoreTireFeatureRequest;
use App\Http\Requests\UpdateTireFeatureRequest;
use App\Models\TireFeature;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TireFeatureController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('tire_feature_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TireFeature::query()->select(sprintf('%s.*', (new TireFeature())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'tire_feature_show';
                $editGate = 'tire_feature_edit';
                $deleteGate = 'tire_feature_delete';
                $crudRoutePart = 'tire-features';

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
            $table->editColumn('icon', function ($row) {
                if ($photo = $row->icon) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'icon']);

            return $table->make(true);
        }

        return view('admin.tireFeatures.index');
    }

    public function create()
    {
        abort_if(Gate::denies('tire_feature_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tireFeatures.create');
    }

    public function store(StoreTireFeatureRequest $request)
    {
        $tireFeature = TireFeature::create($request->all());

        if ($request->input('icon', false)) {
            $tireFeature->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $tireFeature->id]);
        }

        return redirect()->route('admin.tire-features.index');
    }

    public function edit(TireFeature $tireFeature)
    {
        abort_if(Gate::denies('tire_feature_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tireFeatures.edit', compact('tireFeature'));
    }

    public function update(UpdateTireFeatureRequest $request, TireFeature $tireFeature)
    {
        $tireFeature->update($request->all());

        if ($request->input('icon', false)) {
            if (!$tireFeature->icon || $request->input('icon') !== $tireFeature->icon->file_name) {
                if ($tireFeature->icon) {
                    $tireFeature->icon->delete();
                }
                $tireFeature->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
            }
        } elseif ($tireFeature->icon) {
            $tireFeature->icon->delete();
        }

        return redirect()->route('admin.tire-features.index');
    }

    public function show(TireFeature $tireFeature)
    {
        abort_if(Gate::denies('tire_feature_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tireFeatures.show', compact('tireFeature'));
    }

    public function destroy(TireFeature $tireFeature)
    {
        abort_if(Gate::denies('tire_feature_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tireFeature->delete();

        return back();
    }

    public function massDestroy(MassDestroyTireFeatureRequest $request)
    {
        TireFeature::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('tire_feature_create') && Gate::denies('tire_feature_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TireFeature();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
