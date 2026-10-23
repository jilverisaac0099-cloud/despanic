<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DestemmingDeliveryRequest extends FormRequest
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
            'destemming_preparation_id'=>"required",
            'pilon_id'=>"required",
            'delivery_date'=>"date|required",
            'bags_delivered'=>"integer|required",
        ];
    }

    public function messages():array
    {
        return[
            'destemming_preparation_id' => 'required|exists:destemming_preparations,id',
            'destemming_preparation_id.required'=>'El campo es requerido',

            'pilon_id' => 'required|exists:pilons,id',
            'pilon_id.required'=>'El campo es requerido',

            'delivery_date.date'=>'El campo solo permite fecha',
            'delivery_date.required'=>'El campo es requerido',

            'bags_delivered.integer'=>'El campo cantidad de bolsas solo permite numeros enteros',
            'bags_delivered.required'=>'El campo es requerido',

        ];
    }
}
