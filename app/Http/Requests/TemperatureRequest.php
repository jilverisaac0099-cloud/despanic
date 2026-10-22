<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TemperatureRequest extends FormRequest
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
            'pilon_id'=>"required",
            'date_time'=>"date|required",
            'temperature_fahrenheit'=>"numeric|required||min:0|max:200",
        ];
    }

    public function messages():array
    {
        return[
            
            'pilon_id' => 'required|exists:pilons,id',

            'pilon_id.required'=>'El campo es requerido',

            'date_time.date'=>'El campo solo permite fecha y hora',
            'date_time.required'=>'El campo es requerido',

            'temperature_fahrenheit.numeric'=>'El campo temperatura solo permite numeros',
            'temperature_fahrenheit.required'=>'El campo es requerido',
            'temperature_fahrenheit.min'=>'El valor minimo permitido es 0',
            'temperature_fahrenheit.max'=>'El valor maximo permitido es 200',

        ];
    }
}