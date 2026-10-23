<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BalePackagingRequest extends FormRequest
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
            'bale_drying_id' => "required",
            'bale_number' => "string|required|min:1|max:50",
            'packing_date' => "date|required",
            'class_name' => "string|required|min:1|max:100",
            'provenance' => "string|required|min:1|max:100",
            'pylon_origin' => "string|nullable|min:1|max:100",
            'net_weight' => "decimal:0,2|required",
            'status_bale' => "string|required|min:1|max:50",
            'registration_date' => "date|required",
        ];
    }

    public function messages(): array
    {
        return [
            'bale_drying_id' => 'required|exists:bale_dryings,id',
            'bale_number' => 'required|string|min:1|max:50',
            'packing_date' => 'required|date',
            'class_name' => 'required|string|min:1|max:100',
            'provenance' => 'required|string|min:1|max:100',
            'pylon_origin' => 'nullable|string|min:1|max:100',
            'net_weight' => 'required|decimal:0,2',
            'status_bale' => 'required|string|min:1|max:50',
            'registration_date' => 'required|date',

            'bale_drying_id.required' => 'El campo es requerido',
            'bale_drying_id.exists' => 'El fardo de secado seleccionado no existe',

            'bale_number.required' => 'El campo es requerido',
            'bale_number.string' => 'El campo número de fardo solo permite caracteres',
            'bale_number.min' => 'El mínimo de caracteres es 1',
            'bale_number.max' => 'El máximo de caracteres es 50',

            'packing_date.required' => 'El campo es requerido',
            'packing_date.date' => 'El campo solo permite fecha',

            'class_name.required' => 'El campo es requerido',
            'class_name.string' => 'El campo nombre de clase solo permite caracteres',
            'class_name.min' => 'El mínimo de caracteres es 1',
            'class_name.max' => 'El máximo de caracteres es 100',

            'provenance.required' => 'El campo es requerido',
            'provenance.string' => 'El campo procedencia solo permite caracteres',
            'provenance.min' => 'El mínimo de caracteres es 1',
            'provenance.max' => 'El máximo de caracteres es 100',

            'pylon_origin.string' => 'El campo origen de pilón solo permite caracteres',
            'pylon_origin.min' => 'El mínimo de caracteres es 1',
            'pylon_origin.max' => 'El máximo de caracteres es 100',

            'net_weight.required' => 'El campo es requerido',
            'net_weight.decimal' => 'El campo peso neto solo permite un máximo de 2 decimales',

            'status_bale.required' => 'El campo es requerido',
            'status_bale.string' => 'El campo estado del fardo solo permite caracteres',
            'status_bale.min' => 'El mínimo de caracteres es 1',
            'status_bale.max' => 'El máximo de caracteres es 50',

            'registration_date.required' => 'El campo es requerido',
            'registration_date.date' => 'El campo solo permite fecha',
        ];
    }
}

