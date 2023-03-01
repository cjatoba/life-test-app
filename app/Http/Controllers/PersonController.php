<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
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
        return $this->personService->getAll();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonRequest $request)
    {
        $personData = $request->validated();

        return $this->personService->store($personData);
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return $this->personService->show($person);
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
        //
    }
}
