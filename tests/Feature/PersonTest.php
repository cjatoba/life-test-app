<?php

namespace Tests\Feature;

use App\Models\Person;
use Tests\TestCase;

class PersonTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_people()
    {
        $response = $this->getJson('/api/people');

        $response->assertStatus(200);
    }

    public function test_get_count_people()
    {
        Person::factory()->count(10)->create();

        $response = $this->getJson('/api/people');

        $response->assertJsonCount(10, 'data');

        $response->assertStatus(200);
    }

    public function test_not_found_people()
    {
        $response = $this->getJson('/api/people/fake_value');

        $response->assertStatus(404);
    }

    public function test_get_person()
    {
        $person = Person::factory()->create();

        $response = $this->getJson("/api/people/{$person->id}");

        $response->assertStatus(200);
    }

    public function test_validations_create_person()
    {
        $response = $this->postJson('/api/people', []);

        $response->assertStatus(422);
    }

    public function test_create_person()
    {
        $response = $this->postJson('/api/people', [
            'name' => fake()->name(),
            'cpf' => fake()->cpf(),
            'email' => fake()->email(),
            'date_of_birth' => fake()->date(),
            'nationality' => fake()->country(),
        ]);

        $response->assertStatus(201);
    }

    public function test_validation_update_person()
    {
        $person = Person::factory()->create();

        $response = $this->putJson("/api/people/{$person->id}", []);

        $response->assertStatus(422);
    }

    public function test_404_update_person()
    {
        $response = $this->putJson("/api/people/fake_value", [
            'name' => fake()->name(),
            'cpf' => fake()->cpf(),
            'email' => fake()->email(),
            'date_of_birth' => fake()->date(),
            'nationality' => fake()->country(),
        ]);

        $response->assertStatus(404);
    }

    public function test_update_person()
    {
        $person = Person::factory()->create();

        $response = $this->putJson("/api/people/{$person->id}", [
            'name' => fake()->name(),
            'cpf' => fake()->cpf(),
            'email' => fake()->email(),
            'date_of_birth' => fake()->date(),
            'nationality' => fake()->country(),
        ]);

        $response->assertStatus(200);
    }

    public function test_404_delete_person()
    {
        $response = $this->deleteJson("/api/people/fake_value");

        $response->assertStatus(404);
    }

    public function test_delete_person()
    {
        $person = Person::factory()->create();

        $response = $this->deleteJson("/api/people/{$person->id}");

        $response->assertStatus(204);
    }
}
