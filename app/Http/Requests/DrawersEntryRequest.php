<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DrawersEntryRequest extends FormRequest
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
            'drying_reception_id' => "required",
            'number' => "string|required|min:1|max:50",
            'weight_humedity' => "decimal:0,2|required",
            'date_registration' => "date|required",
            'control_oven' => "string|nullable|min:1|max:50",
            'date_cycle' => "date|nullable",
            'start_time' => "date_format:H:i|nullable",
            'scheduled_hours' => "decimal:0,2|nullable",
            'average_temperature' => "decimal:0,2|nullable",
            'observations' => "string|nullable|max:1000",
        ];
    }

    public function messages(): array
    {
        return [
            'tobacco_classes_id' => 'required|exists:tobacco_classes,id',
            'drying_reception_id' => 'required|exists:drying_receptions,id',
            'number' => 'required|string|min:1|max:50',
            'weight_humedity' => 'required|decimal:0,2',
            'date_registration' => 'required|date',
            'control_oven' => 'nullable|string|min:1|max:50',
            'date_cycle' => 'nullable|date',
            'start_time' => 'nullable|date_format:H:i',
            'scheduled_hours' => 'nullable|decimal:0,2',
            'average_temperature' => 'nullable|decimal:0,2',
            'observations' => 'nullable|string|max:1000',

            'tobacco_classes_id.required' => 'El campo es requerido',
            'tobacco_classes_id.exists' => 'La clase de tabaco seleccionada no existe',

            'drying_reception_id.required' => 'El campo es requerido',
            'drying_reception_id.exists' => 'La recepción de secado seleccionada no existe',

            'number.required' => 'El campo es requerido',
            'number.string' => 'El campo número solo permite caracteres',
            'number.min' => 'El mínimo de caracteres es 1',
            'number.max' => 'El máximo de caracteres es 50',

            'weight_humedity.required' => 'El campo es requerido',
            'weight_humedity.decimal' => 'El campo peso húmedo solo permite un máximo de 2 decimales',

            'date_registration.required' => 'El campo es requerido',
            'date_registration.date' => 'El campo solo permite fecha',

            'control_oven.string' => 'El campo control de horno solo permite caracteres',
            'control_oven.min' => 'El mínimo de caracteres es 1',
            'control_oven.max' => 'El máximo de caracteres es 50',

            'date_cycle.date' => 'El campo solo permite fecha',

            'start_time.date_format' => 'El campo hora de inicio debe tener un formato válido (HH:MM)',

            'scheduled_hours.decimal' => 'El campo horas programadas solo permite un máximo de 2 decimales',

            'average_temperature.decimal' => 'El campo temperatura promedio solo permite un máximo de 2 decimales',

            'observations.string' => 'El campo observaciones solo permite texto',
            'observations.max' => 'El máximo de caracteres permitidos es 1000',
        ];
    }
}
