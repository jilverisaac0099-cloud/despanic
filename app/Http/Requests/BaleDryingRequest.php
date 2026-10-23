<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BaleDryingRequest extends FormRequest
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
            'tobacco_classes_id' => "required",
            'bale_code' => "string|required|min:1|max:50",
            'net_weight' => "decimal:0,2|required",
            'packaging_date' => "date|required",
        ];
    }

    public function messages(): array
    {
        return [
            'tobacco_classes_id' => 'required|exists:tobacco_classes,id',
            'bale_code' => 'required|string|min:1|max:50',
            'net_weight' => 'required|decimal:0,2',
            'packaging_date' => 'required|date',

            'tobacco_classes_id.required' => 'El campo es requerido',
            'tobacco_classes_id.exists' => 'La clase de tabaco seleccionada no existe',

            'bale_code.required' => 'El campo es requerido',
            'bale_code.string' => 'El campo código de fardo solo permite caracteres',
            'bale_code.min' => 'El mínimo de caracteres es 1',
            'bale_code.max' => 'El máximo de caracteres es 50',

            'net_weight.required' => 'El campo es requerido',
            'net_weight.decimal' => 'El campo peso neto solo permite un máximo de 2 decimales',

            'packaging_date.required' => 'El campo es requerido',
            'packaging_date.date' => 'El campo solo permite fecha',
        ];
    }
}
