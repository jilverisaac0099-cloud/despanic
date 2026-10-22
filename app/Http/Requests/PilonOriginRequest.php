<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PilonOriginRequest extends FormRequest
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
            'lot_reception_id'=>"required",
            'pilon_id'=>"required",
            'pounds_contributed'=>"numeric|required||min:0",
        ];
    }

    public function messages():array
    {
        return[

            'lot_reception_id' => 'required|exists:lots_receptions,id',
            'pilon_id' => 'required|exists:pilons,id',

            'lot_reception_id.required'=>'El campo es requerido',

            'pilon_id.required'=>'El campo es requerido',

            'pounds_contributed.numeric'=>'El campo libras solo permite numeros',
            'pounds_contributed.required'=>'El campo es requerido',
            'pounds_contributed.min'=>'El valor minimo permitido es 0',

        ];
    }
}
