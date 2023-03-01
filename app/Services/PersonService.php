<?php

namespace App\Services;

use App\Http\Resources\PersonResource;
use App\Models\Person;

class PersonService
{
    public function __construct(private Person $repository)
    {
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function store(array $data)
    {
        return $this->repository->create($data);
    }

    public function show(Person $person)
    {
        return $this->repository->findOrFail($person->id);
    }

    public function update(Person $person, array $data)
    {
        $personFind = $this->repository->findOrFail($person->id);
        $personFind->update($data);
        
        return response()->json(new PersonResource($person));
    }

    public function destroy(Person $person)
    {
        $personFind = $this->repository->findOrFail($person->id);
        $personFind->delete();
        
        return response([], 200);
    }
}