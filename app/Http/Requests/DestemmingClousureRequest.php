<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DestemmingClousureRequest extends FormRequest
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
            'peso_gold'=>"numeric|required||min:0|max:5000|decimal:0,2",
            'total_sting'=>"numeric|required||min:0|max:5000|decimal:0,2",
            'total_vein'=>"numeric|required||min:0|max:5000|decimal:0,2",
            'date_clousure'=>"date|required",
        ];
    }

    public function messages():array
    {
        return[
            
            'pilon_id' => 'required|exists:pilons,id',
            'pilon_id.required'=>'El campo es requerido',

            'peso_gold.numeric'=>'El campo peso oro solo permite numeros',
            'peso_gold.required'=>'El campo es requerido',
            'peso_gold.min'=>'El valor minimo permitido es 0',
            'peso_gold.max'=>'El valor maximo permitido es 5000',
            'peso_gold.decimal'=>'El campo peso oro solo permite un máximo de 2 decimales',

            'total_sting.numeric'=>'El campo total picadura solo permite numeros',
            'total_sting.required'=>'El campo es requerido',
            'total_sting.min'=>'El valor minimo permitido es 0',
            'total_sting.max'=>'El valor maximo permitido es 5000',
            'total_sting.decimal'=>'El campo total picadura solo permite un máximo de 2 decimales',

            'total_vein.numeric'=>'El campo total vena solo permite numeros',
            'total_vein.required'=>'El campo es requerido',
            'total_vein.min'=>'El valor minimo permitido es 0',
            'total_vein.max'=>'El valor maximo permitido es 5000',
            'total_vein.decimal'=>'El campo total vena solo permite un máximo de 2 decimales',

            'date_clousure.date'=>'El campo solo permite fecha',
            'date_clousure.required'=>'El campo es requerido',

        ];
    }
}
