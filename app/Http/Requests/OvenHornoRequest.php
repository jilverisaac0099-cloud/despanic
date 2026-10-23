<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OvenHornoRequest extends FormRequest
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
            'start_time' => "date_format:H:i|nullable",
            'end_time' => "date_format:H:i|nullable",
            'scheduled_hours' => "decimal:0,2|nullable",
            'average_temperature' => "decimal:0,2|nullable",
            'observations' => "string|nullable|max:1000",
        ];
    }

    public function messages(): array
    {
        return [
            'drying_reception_id' => 'required|exists:drying_receptions,id',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i',
            'scheduled_hours' => 'nullable|decimal:0,2',
            'average_temperature' => 'nullable|decimal:0,2',
            'observations' => 'nullable|string|max:1000',

            'drying_reception_id.required' => 'El campo es requerido',
            'drying_reception_id.exists' => 'La recepción de secado seleccionada no existe',

            'start_time.date_format' => 'El campo hora de inicio debe tener un formato válido (HH:MM)',
            'end_time.date_format' => 'El campo hora de fin debe tener un formato válido (HH:MM)',

            'scheduled_hours.decimal' => 'El campo horas programadas solo permite un máximo de 2 decimales',

            'average_temperature.decimal' => 'El campo temperatura promedio solo permite un máximo de 2 decimales',

            'observations.string' => 'El campo observaciones solo permite texto',
            'observations.max' => 'El máximo de caracteres permitidos es 1000',
        ];
    }
}
