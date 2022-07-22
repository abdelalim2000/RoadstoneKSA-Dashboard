<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTireRequest;
use App\Http\Requests\StoreTireRequest;
use App\Http\Requests\UpdateTireRequest;
use App\Models\CarModel;
use App\Models\CarType;
use App\Models\Tire;
use App\Models\TireDesign;
use App\Models\TireFeature;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Cache;

class TireController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('tire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {


            $query = Tire::query()
                ->with(['media', 'car_type'])
                ->withTranslation()
                ->get();
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'tire_show';
                $editGate = 'tire_edit';
                $deleteGate = 'tire_delete';
                $crudRoutePart = 'tires';

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
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });
            $table->editColumn('thumb', function ($row) {
                if ($photo = $row->thumb) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->addColumn('car_type_name', function ($row) {
                return $row->car_type ? $row->car_type->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'thumb', 'car_type']);

            return $table->make(true);
        }

        return view('admin.tires.index');
    }

    public function store(StoreTireRequest $request)
    {
        $tire = Tire::query()->create($request->validated());

        $tire->tire_features()->sync($request->input('tire_features', []));
        $tire->tire_designs()->sync($request->input('tire_designs', []));
        $tire->car_models()->sync($request->input('car_models', []));

        if ($request->input('breadcrumb', false)) {
            $tire->addMedia(storage_path('tmp/uploads/' . basename($request->input('breadcrumb'))))->toMediaCollection('tire_breadcrumb');
        }

        if ($request->input('thumb', false)) {
            $tire->addMedia(storage_path('tmp/uploads/' . basename($request->input('thumb'))))->toMediaCollection('tire_thumb');
        }

        if ($request->input('tire_logo', false)) {
            $tire->addMedia(storage_path('tmp/uploads/' . basename($request->input('tire_logo'))))->toMediaCollection('tire_logo');
        }

        foreach ($request->input('images', []) as $file) {
            $tire->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('tire_images');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $tire->id]);
        }

        return redirect()->route('admin.tires.index');
    }

    public function create()
    {
        abort_if(Gate::denies('tire_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tire_features = Cache::rememberForever('tire_features', function(){
            return TireFeature::query()->listsTranslations('name')->pluck('name', 'id');
        });

        $tire_designs = Cache::rememberForever('tire_designs', function(){
            return TireDesign::query()->listsTranslations('name')->pluck('name', 'id');
        });

        $car_models = Cache::rememberForever('car_models', function(){
            return CarModel::query()->pluck('name', 'id');
        });

        $car_types = Cache::rememberForever('car_types', function(){
            return CarType::query()->pluck('name', 'id');
        });

        return view('admin.tires.create', compact('car_models', 'car_types', 'tire_designs', 'tire_features'));
    }

    public function update(UpdateTireRequest $request, Tire $tire)
    {
        $tire->update($request->validated());

        $tire->tire_features()->sync($request->input('tire_features', []));
        $tire->tire_designs()->sync($request->input('tire_designs', []));
        $tire->car_models()->sync($request->input('car_models', []));

        if ($request->input('breadcrumb', false)) {
            if (!$tire->breadcrumb || $request->input('breadcrumb') !== $tire->breadcrumb->file_name) {
                if ($tire->breadcrumb) {
                    $tire->breadcrumb->delete();
                }
                $tire->addMedia(storage_path('tmp/uploads/' . basename($request->input('breadcrumb'))))->toMediaCollection('tire_breadcrumb');
            }
        } elseif ($tire->breadcrumb) {
            $tire->breadcrumb->delete();
        }

        if ($request->input('thumb', false)) {
            if (!$tire->thumb || $request->input('thumb') !== $tire->thumb->file_name) {
                if ($tire->thumb) {
                    $tire->thumb->delete();
                }
                $tire->addMedia(storage_path('tmp/uploads/' . basename($request->input('thumb'))))->toMediaCollection('tire_thumb');
            }
        } elseif ($tire->thumb) {
            $tire->thumb->delete();
        }

        if ($request->input('tire_logo', false)) {
            if (!$tire->tire_logo || $request->input('tire_logo') !== $tire->tire_logo->file_name) {
                if ($tire->tire_logo) {
                    $tire->tire_logo->delete();
                }
                $tire->addMedia(storage_path('tmp/uploads/' . basename($request->input('tire_logo'))))->toMediaCollection('tire_logo');
            }
        } elseif ($tire->tire_logo) {
            $tire->tire_logo->delete();
        }

        if (count($tire->images) > 0) {
            foreach ($tire->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $tire->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $tire->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('tire_images');
            }
        }

        return redirect()->route('admin.tires.index');
    }

    public function edit(Tire $tire)
    {
        abort_if(Gate::denies('tire_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tire_features = Cache::rememberForever('tire_features', function(){
            return TireFeature::query()->listsTranslations('name')->pluck('name', 'id');
        });

        $tire_designs = Cache::rememberForever('tire_designs', function(){
            return TireDesign::query()->listsTranslations('name')->pluck('name', 'id');
        });

        $car_models = Cache::rememberForever('car_models', function(){
            return CarModel::query()->pluck('name', 'id');
        });

        $car_types = Cache::rememberForever('car_types', function(){
            return CarType::query()->pluck('name', 'id');
        });


        $tire->load(['tire_features', 'tire_designs', 'car_models', 'car_type','media']);

        return view('admin.tires.edit', compact('car_models', 'car_types', 'tire', 'tire_designs', 'tire_features'));
    }

    public function show(Tire $tire)
    {
        abort_if(Gate::denies('tire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tire->load('tire_features', 'tire_designs', 'car_models', 'car_type');

        return view('admin.tires.show', compact('tire'));
    }

    public function destroy(Tire $tire)
    {
        abort_if(Gate::denies('tire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tire->delete();

        return back();
    }

    public function massDestroy(MassDestroyTireRequest $request)
    {
        foreach ($request->ids as $id) {
            $tire = Tire::query()->where('id', $id)->first();
            $tire->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('tire_create') && Gate::denies('tire_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Tire();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
