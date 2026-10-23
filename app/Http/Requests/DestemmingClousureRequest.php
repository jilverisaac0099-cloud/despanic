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
            'peso_gold'=>"decimal:0,2|required||min:1|max:10",
            'total_sting'=>"decimal:0,2|required||min:1|max:10",
            'total_vein'=>"decimal:0,2|required||min:1|max:10",
            'date_clousure'=>"date|required",
        ];
    }

    public function messages():array
    {
        return[

            'pilon_id' => 'required|exists:pilons,id',
            'pilon_id.required'=>'El campo es requerido',

            'peso_gold.decimal'=>'El campo peso oro solo permite un máximo de 2 decimales',
            'peso_gold.required'=>'El campo es requerido',
            'peso_gold.min'=>'El minimo permitido es 1',
            'peso_gold.max'=>'El maximo permitido es 10',

            'total_sting.decimal'=>'El campo total picadura solo permite un máximo de 2 decimales',
            'total_sting.required'=>'El campo es requerido',
            'total_sting.min'=>'El minimo permitido es 1',
            'total_sting.max'=>'El maximo permitido es 10',

            'total_vein.decimal'=>'El campo total vena solo permite un máximo de 2 decimales',
            'total_vein.required'=>'El campo es requerido',
            'total_vein.min'=>'El minimo permitido es 1',
            'total_vein.max'=>'El maximo permitido es 10',

            'date_clousure.date'=>'El campo solo permite fecha',
            'date_clousure.required'=>'El campo es requerido',

        ];
    }
}
