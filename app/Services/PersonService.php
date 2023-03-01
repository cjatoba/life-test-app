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

    public function getById(int $id)
    {
        return $this->repository
                    ->where('id', $id)
                    ->findOrFail($id);
    }

    public function update(Person $person, array $data)
    {
        $personFind = $this->getById($person->id);
        
        return $personFind->update($data);
    }

    public function destroy(Person $person)
    {
        $personFind = $this->getById($person->id);

        return $personFind->delete();
    }
}