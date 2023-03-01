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
        return $this->repository
                    ->with('contacts')
                    ->get();
    }

    public function store(array $data)
    {
        return $this->repository->create($data);
    }

    public function getById(int $id)
    {
        return $this->repository
                    ->where('id', $id)
                    ->with('contacts')
                    ->firstOrFail();
    }

    public function update(Person $person, array $data)
    {
        $personFind = $this->getById($person->id);
        
        return $personFind->update($data);
    }

    public function destroy(Person $person)
    {
        $personFind = $this->getById($person->id);

        foreach ($personFind->contacts as $contact) {
            $contact->delete();
        }

        return $personFind->delete();
    }
}