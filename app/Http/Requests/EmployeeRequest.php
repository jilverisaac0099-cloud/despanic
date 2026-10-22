<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'employee_code'=>'string|required|min:3|max:50|unique:employees,employee_code,' . $this->route('employee'),
            'full_name'=>'string|required|min:3|max:150',
            'job_position'=>'string|required|min:3|max:100',
            'state'=>'string|nullable|min:3|max:20',
        ];
    }

    public function messages():array
    {
        return[

            'employee_code.string'=>'El codigo solo permite caracteres',
            'employee_code.required'=>'El campo es requerido',
            'employee_code.min'=>'El minimo de caracteres es 3',
            'employee_code.max'=>'El maximo de caracteres es 50',
            'employee_code.unique'=>'El codigo debe ser unico',

            'full_name.string'=>'El nombre solo permite caracteres',
            'full_name.required'=>'El campo es requerido',
            'full_name.min'=>'El minimo de caracteres es 3',
            'full_name.max'=>'El maximo de caracteres es 150',

            'job_position.string'=>'El cargo solo permite caracteres',
            'job_position.required'=>'El campo es requerido',
            'job_position.min'=>'El minimo de caracteres es 3',
            'job_position.max'=>'El maximo de caracteres es 100',

            'state.string'=>'El estado solo permite caracteres',
            'state.min'=>'El minimo de caracteres es 3',
            'state.max'=>'El maximo de caracteres es 20',

        ];
    }
}
