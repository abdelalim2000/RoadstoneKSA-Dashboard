<?php

namespace App\Http\Controllers\Api\ContactModuleApi;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactApi\ContactStoreRequest;
use App\Http\Resources\Contact\ContactTypeResource;
use App\Models\Contact;
use App\Models\ContactType;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class ContactApiController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $types = ContactType::with('translations')
            ->translatedIn(request()->get('locale') ?? 'en')
            ->get();

        return ContactTypeResource::collection($types)
            ->additional(['status' => 'OK', 'message' => 'Contact Type Data Retrieved Successfully']);
    }

    public function store(ContactStoreRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            Contact::query()->create($request->validated());

            DB::commit();

            return response()->json(['status' => 'OK', 'message' => 'Your Message Sent successfully, Will contact you as soon as possible'], 200);
        } catch (Exception $e) {

            DB::rollBack();
            return response()->json(['status' => 'ERROR', 'message' => 'Something went wrong, please try again'], 500);
        }
    }
}
