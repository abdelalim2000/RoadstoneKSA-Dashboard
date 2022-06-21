<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\ContactStoreRequest;
use App\Models\Contact;
use App\Models\ContactType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactPageController extends Controller
{
    public function index(): View|Factory|RedirectResponse|Application
    {
        $types = ContactType::query()->get();

        if (count($types) == 0) {
            return back();
        }

        return view('site.contact-page', compact('types'));
    }

    public function store(ContactStoreRequest $request): RedirectResponse
    {
        Contact::query()->create($request->validated());

        Alert::success(trans('website.message.success'), trans('website.message.success-contact-message'));

        return back();
    }
}
