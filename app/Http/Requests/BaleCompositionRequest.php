<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BaleCompositionRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'drying_reception_id' => "required",
            'bale_drying_id' => "required",
            'pounds_contributed' => "decimal:0,2|required",
            'remant' => "decimal:0,2|required",
        ];
    }

    public function messages(): array
    {
        return [
            'drying_reception_id' => 'required|exists:drying_receptions,id',
            'bale_drying_id' => 'required|exists:bale_dryings,id',
            'pounds_contributed' => 'required|decimal:0,2',
            'remant' => 'required|decimal:0,2',

            'drying_reception_id.required' => 'El campo es requerido',
            'drying_reception_id.exists' => 'La recepción de secado seleccionada no existe',

            'bale_drying_id.required' => 'El campo es requerido',
            'bale_drying_id.exists' => 'El fardo de secado seleccionado no existe',

            'pounds_contributed.required' => 'El campo es requerido',
            'pounds_contributed.decimal' => 'El campo libras aportadas solo permite un máximo de 2 decimales',

            'remant.required' => 'El campo es requerido',
            'remant.decimal' => 'El campo remanente solo permite un máximo de 2 decimales',
        ];
    }
}
