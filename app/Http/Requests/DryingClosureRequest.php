<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DryingClosureRequest extends FormRequest
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
            'extended_date' => "date|nullable",
            'pickup_date' => "date|nullable",
            'weight_gold' => "decimal:0,2|required|min:1|max:10",
            'weight_damp' => "decimal:0,2|required|min:1|max:10",
            'weight_dry' => "decimal:0,2|required|min:1|max:10",
            'loss_humedity' => "decimal:0,2|required|min:1|max:10",
            'percentage_loss' => "decimal:0,2|required|min:1|max:5",
            'bales_total' => "integer|required|min:1",
            'weight_remnant' => "decimal:0,2|required|min:1|max:10",
            'hours_total' => "decimal:0,2|required|min:1|max:8",
            'final_status' => "string|required|min:1|max:50",
            'date_cloused' => "date|required",
        ];
    }

    public function messages(): array
    {
        return [
            'drying_reception_id' => 'required|exists:drying_receptions,id',
            'drying_reception_id.required' => 'El campo es requerido',

            'extended_date.date' => 'El campo solo permite fecha',
            'pickup_date.date' => 'El campo solo permite fecha',

            'weight_gold.decimal' => 'El campo peso oro solo permite un máximo de 2 decimales',
            'weight_gold.required' => 'El campo es requerido',
            'weight_gold.min' => 'El minimo permitido es 1',
            'weight_gold.max' => 'El maximo permitido es 10',

            'weight_damp.decimal' => 'El campo peso húmedo solo permite un máximo de 2 decimales',
            'weight_damp.required' => 'El campo es requerido',
            'weight_damp.min' => 'El minimo permitido es 1',
            'weight_damp.max' => 'El maximo permitido es 10',

            'weight_dry.decimal' => 'El campo peso seco solo permite un máximo de 2 decimales',
            'weight_dry.required' => 'El campo es requerido',
            'weight_dry.min' => 'El minimo permitido es 1',
            'weight_dry.max' => 'El maximo permitido es 10',

            'loss_humedity.decimal' => 'El campo pérdida de humedad solo permite un máximo de 2 decimales',
            'loss_humedity.required' => 'El campo es requerido',
            'loss_humedity.min' => 'El minimo permitido es 1',
            'loss_humedity.max' => 'El maximo permitido es 10',

            'percentage_loss.decimal' => 'El campo porcentaje de pérdida solo permite un máximo de 2 decimales',
            'percentage_loss.required' => 'El campo es requerido',
            'percentage_loss.min' => 'El minimo permitido es 1',
            'percentage_loss.max' => 'El maximo permitido es 5',

            'bales_total.integer' => 'El campo total de fardos solo permite números enteros',
            'bales_total.required' => 'El campo es requerido',
            'bales_total.min' => 'El valor mínimo permitido es 1',

            'weight_remnant.decimal' => 'El campo peso remanente solo permite un máximo de 2 decimales',
            'weight_remnant.required' => 'El campo es requerido',
            'weight_remnant.min' => 'El minimo permitido es 1',
            'weight_remnant.max' => 'El maximo permitido es 10',

            'hours_total.decimal' => 'El campo total de horas solo permite un máximo de 2 decimales',
            'hours_total.required' => 'El campo es requerido',
            'hours_total.min' => 'El minimo permitido es 1',
            'hours_total.max' => 'El maximo permitido es 8',

            'final_status.string' => 'El campo estado final solo permite caracteres',
            'final_status.required' => 'El campo es requerido',
            'final_status.min' => 'El minimo de caracteres es 1',
            'final_status.max' => 'El maximo de caracteres es 50',

            'date_cloused.date' => 'El campo solo permite fecha',
            'date_cloused.required' => 'El campo es requerido',
        ];
    }
}
