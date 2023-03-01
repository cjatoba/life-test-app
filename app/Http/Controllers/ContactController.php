<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Resources\ContactResource;
use Illuminate\Http\Request;
use App\Services\ContactService;

class ContactController extends Controller
{
    public function __construct(private ContactService $contactService)
    {
    }

    public function store(StoreContactRequest $request)
    {
        $contactData = $request->validated();
        
        $contact = $this->contactService->store($contactData);

        return new ContactResource($contact);
    }
}
