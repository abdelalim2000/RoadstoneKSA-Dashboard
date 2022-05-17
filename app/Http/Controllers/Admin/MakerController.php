<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMakerRequest;
use App\Http\Requests\StoreMakerRequest;
use App\Http\Requests\UpdateMakerRequest;
use App\Models\Maker;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MakerController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('maker_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Maker::query()->select(sprintf('%s.*', (new Maker())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'maker_show';
                $editGate = 'maker_edit';
                $deleteGate = 'maker_delete';
                $crudRoutePart = 'makers';

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
            $table->editColumn('searchable', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->searchable ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'image', 'searchable']);

            return $table->make(true);
        }

        return view('admin.makers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('maker_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.makers.create');
    }

    public function store(StoreMakerRequest $request)
    {
        $maker = Maker::create($request->all());

        if ($request->input('image', false)) {
            $maker->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $maker->id]);
        }

        return redirect()->route('admin.makers.index');
    }

    public function edit(Maker $maker)
    {
        abort_if(Gate::denies('maker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.makers.edit', compact('maker'));
    }

    public function update(UpdateMakerRequest $request, Maker $maker)
    {
        $maker->update($request->all());

        if ($request->input('image', false)) {
            if (!$maker->image || $request->input('image') !== $maker->image->file_name) {
                if ($maker->image) {
                    $maker->image->delete();
                }
                $maker->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($maker->image) {
            $maker->image->delete();
        }

        return redirect()->route('admin.makers.index');
    }

    public function show(Maker $maker)
    {
        abort_if(Gate::denies('maker_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.makers.show', compact('maker'));
    }

    public function destroy(Maker $maker)
    {
        abort_if(Gate::denies('maker_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $maker->delete();

        return back();
    }

    public function massDestroy(MassDestroyMakerRequest $request)
    {
        Maker::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('maker_create') && Gate::denies('maker_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Maker();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
