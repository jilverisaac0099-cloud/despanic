<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DestemmingDrawerRequest extends FormRequest
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
            'tobacco_classes_id'=>"required",
            'number'=>"string|required||min:1|max:50",
            'pounds_tripe'=>"numeric|required||min:0|max:5000|decimal:0,2",
            'collection_date'=>"date|required",
        ];
    }

    public function messages():array
    {
        return[
            
            'pilon_id' => 'required|exists:pilons,id',
            'pilon_id.required'=>'El campo es requerido',

            'tobacco_classes_id' => 'required|exists:tobacco_classes,id',
            'tobacco_classes_id.required'=>'El campo es requerido',

            'number.string'=>'El campo numero solo permite caracteres',
            'number.required'=>'El campo es requerido',
            'number.min'=>'El minimo de caracteres es 1',
            'number.max'=>'El maximo de caracteres es 50',

            'pounds_tripe.numeric'=>'El campo libras tripa solo permite numeros',
            'pounds_tripe.required'=>'El campo es requerido',
            'pounds_tripe.min'=>'El valor minimo permitido es 0',
            'pounds_tripe.max'=>'El valor maximo permitido es 5000',
            'pounds_tripe.decimal'=>'El campo libras tripa solo permite un máximo de 2 decimales',

            'collection_date.date'=>'El campo solo permite fecha',
            'collection_date.required'=>'El campo es requerido',

        ];
    }
}
