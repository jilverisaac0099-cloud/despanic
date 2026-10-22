<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DestemmingPreparationRequest extends FormRequest
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
            'wet_date'=>"date|required",
            'bag_quantity'=>"integer|required",
            'pound_entry'=>"numeric|required||decimal:0,2",
        ];
    }

    public function messages():array
    {
        return[

            'pilon_id' => 'required|exists:pilons,id',

            'pilon_id.required'=>'El campo es requerido',

            'wet_date.date'=>'El campo solo permite fecha',
            'wet_date.required'=>'El campo es requerido',

            'bag_quantity.integer'=>'El campo cantidad de bolsas solo permite numeros enteros',
            'bag_quantity.required'=>'El campo es requerido',

            'pound_entry.numeric'=>'El campo libras solo permite numeros',
            'pound_entry.required'=>'El campo es requerido',
            'pound_entry.decimal'=>'El campo libras solo permite un máximo de 2 decimales',

        ];
    }
}
