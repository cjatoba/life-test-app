<?php

namespace App\Services;

use App\Models\Contact;

class ContactService
{
    public function __construct(private Contact $repository)
    {
    }

    public function store(array $data)
    {
        return $this->repository->create($data);
    }
}