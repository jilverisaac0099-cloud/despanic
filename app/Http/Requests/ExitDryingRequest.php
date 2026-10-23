<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ExitDryingRequest extends FormRequest
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
            'tobacco_classes_id' => "required",
            'weight_dry_exit' => "decimal:0,2|required",
            'humedity_weight_entry' => "decimal:0,2|required",
            'quantity_bale' => "integer|required|min:1",
            'remnat_weight' => "decimal:0,2|required",
            'pickup_date' => "date|required",
        ];
    }

    public function messages(): array
    {
        return [
            'drying_reception_id' => 'required|exists:drying_receptions,id',
            'tobacco_classes_id' => 'required|exists:tobacco_classes,id',
            'weight_dry_exit' => 'required|decimal:0,2',
            'humedity_weight_entry' => 'required|decimal:0,2',
            'quantity_bale' => 'required|integer|min:1',
            'remnat_weight' => 'required|decimal:0,2',
            'pickup_date' => 'required|date',

            'drying_reception_id.required' => 'El campo es requerido',
            'drying_reception_id.exists' => 'La recepción de secado seleccionada no existe',

            'tobacco_classes_id.required' => 'El campo es requerido',
            'tobacco_classes_id.exists' => 'La clase de tabaco seleccionada no existe',

            'weight_dry_exit.required' => 'El campo es requerido',
            'weight_dry_exit.decimal' => 'El campo peso seco de salida solo permite un máximo de 2 decimales',

            'humedity_weight_entry.required' => 'El campo es requerido',
            'humedity_weight_entry.decimal' => 'El campo peso humedad de entrada solo permite un máximo de 2 decimales',

            'quantity_bale.required' => 'El campo es requerido',
            'quantity_bale.integer' => 'El campo cantidad de fardos solo permite números enteros',
            'quantity_bale.min' => 'El valor mínimo permitido es 1',

            'remnat_weight.required' => 'El campo es requerido',
            'remnat_weight.decimal' => 'El campo peso remanente solo permite un máximo de 2 decimales',

            'pickup_date.required' => 'El campo es requerido',
            'pickup_date.date' => 'El campo solo permite fecha',
        ];
    }
}
