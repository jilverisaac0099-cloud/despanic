<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TobaccoClassRequest extends FormRequest
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
            'code'=>'string|required|min:3|max:50|unique:tobacco_classes,code,' . $this->route('tobacco_class'),
            'nombre'=>'string|required|min:3|max:100',
            'type'=>'string|required|min:3|max:50',
            'quality_status'=>'string|required|min:3|max:50',
            'size'=>'string|required|min:1|max:50',
        ];
    }

    public function messages():array
    {
        return[

            'code.string'=>'El codigo solo permite caracteres',
            'code.required'=>'El campo es requerido',
            'code.min'=>'El minimo de caracteres es 3',
            'code.max'=>'El maximo de caracteres es 50',
            'code.unique'=>'El codigo debe ser unico',

            'nombre.string'=>'El nombre solo permite caracteres',
            'nombre.required'=>'El campo es requerido',
            'nombre.min'=>'El minimo de caracteres es 3',
            'nombre.max'=>'El maximo de caracteres es 100',

            'type.string'=>'El tipo solo permite caracteres',
            'type.required'=>'El campo es requerido',
            'type.min'=>'El minimo de caracteres es 3',
            'type.max'=>'El maximo de caracteres es 50',

            'quality_status.string'=>'El estado de calidad solo permite caracteres',
            'quality_status.required'=>'El campo es requerido',
            'quality_status.min'=>'El minimo de caracteres es 3',
            'quality_status.max'=>'El maximo de caracteres es 50',

            'size.string'=>'El tamaño solo permite caracteres',
            'size.required'=>'El campo es requerido',
            'size.min'=>'El minimo de caracteres es 1',
            'size.max'=>'El maximo de caracteres es 50',

        ];
    }
}
