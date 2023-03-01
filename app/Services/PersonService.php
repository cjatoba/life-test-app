<?php

namespace App\Services;

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
}