<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'date_of_birth' => $this->date_of_birth,
            'nationality' => $this->nationality,
            'contacts' => ContactResource::collection($this->whenLoaded('contacts'))
        ];
    }
}
