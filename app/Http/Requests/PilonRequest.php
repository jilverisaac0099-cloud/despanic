<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PilonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        return [
            'number' => 'string|required|min:2|max:50|unique:pilons,number,' . $this->route('pilon'),
            'weight' => 'numeric|required|min:0',
            'assembly_date' => 'date|required',
            'status' => 'string|nullable|min:3|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'number.string' => 'El número de pilón solo permite caracteres.',
            'number.required' => 'El número de pilón es requerido.',
            'number.min' => 'El mínimo de caracteres es 2.',
            'number.max' => 'El máximo de caracteres es 50.',
            'number.unique' => 'Este número de pilón ya está registrado en el sistema.',

            'weight.numeric' => 'El peso debe ser un número.',
            'weight.required' => 'El peso del pilón es requerido.',
            'weight.min' => 'El peso no puede ser negativo.',

            'assembly_date.date' => 'El campo debe ser una fecha válida.',
            'assembly_date.required' => 'La fecha de armado es requerida.',

            'status.string' => 'El estado solo permite caracteres.',
            'status.min' => 'El estado debe tener al menos 3 caracteres.',
            'status.max' => 'El estado no puede superar los 50 caracteres.',
        ];
    }
}
