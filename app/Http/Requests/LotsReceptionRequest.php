<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LotsReceptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'producer' => 'string|required|min:3|max:100',
            'origin' => 'string|required|min:3|max:100',
            'date' => 'date|required',
            'pounds_received' => 'numeric|required|min:0',
            'remarks' => 'string|nullable|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'producer.string' => 'El productor solo permite texto.',
            'producer.required' => 'El campo productor es obligatorio.',
            'producer.min' => 'El productor debe tener al menos 3 caracteres.',
            'producer.max' => 'El productor no puede exceder los 100 caracteres.',

            'origin.string' => 'El origen solo permite texto.',
            'origin.required' => 'El campo origen es obligatorio.',
            'origin.min' => 'El origen debe tener al menos 3 caracteres.',
            'origin.max' => 'El origen no puede exceder los 100 caracteres.',

            'date.date' => 'El campo debe tener un formato de fecha válido.',
            'date.required' => 'La fecha de recepción es obligatoria.',

            'pounds_received.numeric' => 'Las libras recibidas deben ser un número (entero o decimal).',
            'pounds_received.required' => 'El campo libras recibidas es obligatorio.',
            'pounds_received.min' => 'Las libras recibidas no pueden ser un valor negativo.',

            'remarks.string' => 'Las observaciones solo permiten texto.',
            'remarks.max' => 'Las observaciones no pueden exceder los 1000 caracteres.',
        ];
    }
}

