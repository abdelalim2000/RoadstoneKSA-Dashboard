<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContactTypeRequest;
use App\Http\Requests\StoreContactTypeRequest;
use App\Http\Requests\UpdateContactTypeRequest;
use App\Models\ContactType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContactTypeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('contact_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ContactType::query()->select(sprintf('%s.*', (new ContactType())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'contact_type_show';
                $editGate = 'contact_type_edit';
                $deleteGate = 'contact_type_delete';
                $crudRoutePart = 'contact-types';

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

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.contactTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('contact_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contactTypes.create');
    }

    public function store(StoreContactTypeRequest $request)
    {
        $contactType = ContactType::create($request->all());

        return redirect()->route('admin.contact-types.index');
    }

    public function edit(ContactType $contactType)
    {
        abort_if(Gate::denies('contact_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contactTypes.edit', compact('contactType'));
    }

    public function update(UpdateContactTypeRequest $request, ContactType $contactType)
    {
        $contactType->update($request->all());

        return redirect()->route('admin.contact-types.index');
    }

    public function show(ContactType $contactType)
    {
        abort_if(Gate::denies('contact_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contactTypes.show', compact('contactType'));
    }

    public function destroy(ContactType $contactType)
    {
        abort_if(Gate::denies('contact_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contactType->delete();

        return back();
    }

    public function massDestroy(MassDestroyContactTypeRequest $request)
    {
        ContactType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
