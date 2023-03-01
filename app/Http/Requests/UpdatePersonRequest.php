<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $peopleId = request()->segment(3);

        return [
            'name' => 'required|string',
            'cpf' => ['required', 'string', Rule::unique('people')->ignore($peopleId)],
            'email' => ['required', 'email', Rule::unique('people')->ignore($peopleId)],
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string'
        ];
    }
}
