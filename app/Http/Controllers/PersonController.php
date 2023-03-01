<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Http\Resources\PersonResource;
use App\Models\Person;
use App\Services\PersonService;

class PersonController extends Controller
{
    public function __construct(private PersonService $personService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = $this->personService->getAll();

        return PersonResource::collection($people);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request)
    {
        $personData = $request->validated();

        $person = $this->personService->store($personData);

        return new PersonResource($person);
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        $person = $this->personService->show($person);

        return new PersonResource($person);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonRequest $request, Person $person)
    {
        $personData = $request->validated();

        return $this->personService->update($person, $personData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        return $this->personService->destroy($person);
    }
}
