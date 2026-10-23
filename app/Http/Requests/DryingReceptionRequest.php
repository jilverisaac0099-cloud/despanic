<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DryingReceptionRequest extends FormRequest
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
            'destemming_clousure_id' => "required",
            'date_income' => "date|required",
            'weigth_gold' => "decimal:0,2|required||min:1|max:10",
            'weight_damp' => "decimal:0,2|required||min:1|max:10",
            'status' => "string|required||min:1|max:50",
        ];
    }

    public function messages(): array
    {
        return [
            'destemming_clousure_id' => 'required|exists:destemming_clousures,id',
            'destemming_clousure_id.required' => 'El campo es requerido',

            'date_income.date' => 'El campo solo permite fecha',
            'date_income.required' => 'El campo es requerido',

            'weigth_gold.decimal' => 'El campo peso oro solo permite un máximo de 2 decimales',
            'weigth_gold.required' => 'El campo es requerido',
            'weigth_gold.min' => 'El minimo permitido es 1',
            'weigth_gold.max' => 'El maximo permitido es 10',

            'weight_damp.decimal' => 'El campo peso húmedo solo permite un máximo de 2 decimales',
            'weight_damp.required' => 'El campo es requerido',
            'weight_damp.min' => 'El minimo permitido es 1',
            'weight_damp.max' => 'El maximo permitido es 10',

            'status.string' => 'El campo estado solo permite caracteres',
            'status.required' => 'El campo es requerido',
            'status.min' => 'El minimo de caracteres es 1',
            'status.max' => 'El maximo de caracteres es 50',
        ];
    }
}
