<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'flights_id' => ['required','exists:flights,id'],
            'seats' => ['required','integer','min:1'],
        ];
    }

    public function messages(): array {
        return [
            'flight_id.required' => 'Debe seleccionar un vuelo.',
            'flight_id.exists' => 'El vuelo seleccionado no existe',
            'seats.required' => 'Debe indicar la cantidad de asientos',
            'seats.integer' => 'La cantidad de caracteres debe ser un número entero.',
            'seats.min' => 'La cantidad mínima de asientos es 1.'
        ];
    }
}
