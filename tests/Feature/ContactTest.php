<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\Person;
use Tests\TestCase;

class ContactTest extends TestCase
{
    public function test_create_contact()
    {
        $person = Person::factory()->create();

        $response = $this->postJson('/api/contacts', [
            'person_id' => $person->id,
            'phone' => fake()->landlineNumber(false),
        ]);

        $response->assertStatus(201);
    }

    public function test_validations_create_contact()
    {
        $response = $this->postJson('/api/contacts', []);

        $response->assertStatus(422);
    }
}
