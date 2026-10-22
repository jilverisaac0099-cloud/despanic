<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class VeinDestemmingRequest extends FormRequest
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
            'amount_bags'=>"integer|required",
            'total_pounds'=>"numeric|required||decimal:0,2",
            'date_weighing'=>"date|required",
            'vein_destemming'=>"string|nullable||max:100",
        ];
    }

    public function messages():array
    {
        return[
            'pilon_id' => 'required|exists:pilons,id',

            'pilon_id.required'=>'El campo es requerido',

            'amount_bags.integer'=>'El campo cantidad de bolsas solo permite numeros enteros',
            'amount_bags.required'=>'El campo es requerido',

            'total_pounds.numeric'=>'El campo libras solo permite numeros',
            'total_pounds.required'=>'El campo es requerido',
            'total_pounds.decimal'=>'El campo libras solo permite un máximo de 2 decimales',

            'date_weighing.date'=>'El campo solo permite fecha',
            'date_weighing.required'=>'El campo es requerido',

            'vein_destemming.string'=>'El campo solo permite caracteres',
            'vein_destemming.max'=>'El maximo de caracteres es 100',

        ];
    }
}
