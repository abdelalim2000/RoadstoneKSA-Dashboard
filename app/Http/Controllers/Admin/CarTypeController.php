<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCarTypeRequest;
use App\Http\Requests\StoreCarTypeRequest;
use App\Http\Requests\UpdateCarTypeRequest;
use App\Models\CarType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CarTypeController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('car_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CarType::query()->select(sprintf('%s.*', (new CarType())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'car_type_show';
                $editGate = 'car_type_edit';
                $deleteGate = 'car_type_delete';
                $crudRoutePart = 'car-types';

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
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
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
            $table->editColumn('breadcrumb', function ($row) {
                if ($photo = $row->breadcrumb) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->active ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'image', 'breadcrumb', 'active']);

            return $table->make(true);
        }

        return view('admin.carTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('car_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carTypes.create');
    }

    public function store(StoreCarTypeRequest $request)
    {
        $carType = CarType::create($request->all());

        if ($request->input('image', false)) {
            $carType->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($request->input('breadcrumb', false)) {
            $carType->addMedia(storage_path('tmp/uploads/' . basename($request->input('breadcrumb'))))->toMediaCollection('breadcrumb');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $carType->id]);
        }

        return redirect()->route('admin.car-types.index');
    }

    public function edit(CarType $carType)
    {
        abort_if(Gate::denies('car_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carTypes.edit', compact('carType'));
    }

    public function update(UpdateCarTypeRequest $request, CarType $carType)
    {
        $carType->update($request->all());

        if ($request->input('image', false)) {
            if (!$carType->image || $request->input('image') !== $carType->image->file_name) {
                if ($carType->image) {
                    $carType->image->delete();
                }
                $carType->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($carType->image) {
            $carType->image->delete();
        }

        if ($request->input('breadcrumb', false)) {
            if (!$carType->breadcrumb || $request->input('breadcrumb') !== $carType->breadcrumb->file_name) {
                if ($carType->breadcrumb) {
                    $carType->breadcrumb->delete();
                }
                $carType->addMedia(storage_path('tmp/uploads/' . basename($request->input('breadcrumb'))))->toMediaCollection('breadcrumb');
            }
        } elseif ($carType->breadcrumb) {
            $carType->breadcrumb->delete();
        }

        return redirect()->route('admin.car-types.index');
    }

    public function show(CarType $carType)
    {
        abort_if(Gate::denies('car_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.carTypes.show', compact('carType'));
    }

    public function destroy(CarType $carType)
    {
        abort_if(Gate::denies('car_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carType->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarTypeRequest $request)
    {
        CarType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('car_type_create') && Gate::denies('car_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CarType();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
