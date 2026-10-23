<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DetailedDestemmingRequest extends FormRequest
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
            'destemming_delivery_id'=>"required",
            'tobacco_classes_id'=>"required",
            'detailed_week'=>"string|nullable||max:50",
            'days'=>"integer|required",
            'pounds_tripe'=>"numeric|required||decimal:0,2",
            'pounds_sting'=>"numeric|required||decimal:0,2",
            'registration_date'=>"date|required",
        ];
    }

    public function messages():array
    {
        return[
            
            'destemming_delivery_id' => 'required|exists:destemming_deliverys,id',
            'destemming_delivery_id.required'=>'El campo es requerido',

            'tobacco_classes_id' => 'required|exists:tobacco_classes,id',
            'tobacco_classes_id.required'=>'El campo es requerido',

            'detailed_week.string'=>'El campo semana detallada solo permite caracteres',
            'detailed_week.max'=>'El maximo de caracteres es 50',

            'days.integer'=>'El campo dias solo permite numeros enteros',
            'days.required'=>'El campo es requerido',

            'pounds_tripe.numeric'=>'El campo libras tripa solo permite numeros',
            'pounds_tripe.required'=>'El campo es requerido',
            'pounds_tripe.decimal'=>'El campo libras tripa solo permite un máximo de 2 decimales',

            'pounds_sting.numeric'=>'El campo libras picadura solo permite numeros',
            'pounds_sting.required'=>'El campo es requerido',
            'pounds_sting.decimal'=>'El campo libras picadura solo permite un máximo de 2 decimales',

            'registration_date.date'=>'El campo solo permite fecha',
            'registration_date.required'=>'El campo es requerido',

        ];
    }
}
