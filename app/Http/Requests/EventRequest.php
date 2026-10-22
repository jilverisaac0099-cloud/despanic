<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'type'=>"string|required||max:100",
            'date'=>"date|required",
            'observations'=>"string|nullable",
        ];
    }

    public function messages():array
    {
        return[
            
            'pilon_id' => 'required|exists:pilons,id',

            'pilon_id.required'=>'El campo es requerido',

            'type.string'=>'El campo tipo solo permite caracteres',
            'type.required'=>'El campo es requerido',
            'type.max'=>'El maximo de caracteres es 100',

            'date.date'=>'El campo solo permite fecha',
            'date.required'=>'El campo es requerido',

            'observations.string'=>'El campo observaciones solo permite caracteres',

        ];
    }
}
