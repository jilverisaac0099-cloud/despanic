<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LotsDetailRequest extends FormRequest
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
            'lots_reception_id' => 'required|exists:lots_receptions,id',
            'cut_number'        => 'required|string|min:1|max:50',
            'pounds'            => 'required|numeric|min:0',
            'quality'           => 'required|string|min:3|max:50',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'lots_reception_id.required' => 'El campo de recepción de lote es requerido.',
            'lots_reception_id.exists'   => 'La recepción de lote seleccionada no es válida.',

            'cut_number.required'        => 'El campo es requerido',
            'cut_number.string'          => 'El número de corte solo permite caracteres',
            'cut_number.min'             => 'El mínimo de caracteres es 1',
            'cut_number.max'             => 'El máximo de caracteres es 50',

            'pounds.required'            => 'El campo es requerido',
            'pounds.numeric'             => 'El campo libras solo permite números',
            'pounds.min'                 => 'El valor mínimo permitido es 0',

            'quality.required'           => 'El campo es requerido',
            'quality.string'             => 'El campo calidad solo permite caracteres',
            'quality.min'                => 'El mínimo de caracteres es 3',
            'quality.max'                => 'El máximo de caracteres es 50',
        ];
    }
}
