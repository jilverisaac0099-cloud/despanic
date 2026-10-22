<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LotsDetailRequest extends FormRequest
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
            'lots_reception_id'=>"required",
            'cut_number'=>"string|required||min:1|max:50",
            'pounds'=>"numeric|required||min:0",
            'quality'=>"string|required||min:3|max:50",
        ];
    }

    public function messages():array
    {
        return[
            'lots_reception_id' => 'required|exists:lots_reception,id',
            'cut_number' => 'required|string|max:50',

            'cut_number.string'=>'El numero de corte solo permite caracteres',
            'cut_number.required'=>'El campo es requerido',
            'cut_number.min'=>'El minimo de caractesres es 1',
            'cut_number.max'=>'El maximo de caracteres es 50',

            'pounds.numeric'=>'El campo libras solo permite numeros',
            'pounds.required'=>'El campo es requerido',
            'pounds.min'=>'El valor minimo permitido es 0',

            'quality.string'=>'El campo calidad solo permite caracteres',
            'quality.required'=>'El campo es requerido',
            'quality.min'=>'El minimo de caractesres es 3',
            'quality.max'=>'El maximo de caracteres es 50',

        ];
    }
}
