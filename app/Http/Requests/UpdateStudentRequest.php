<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cui' => 'required|integer|digits:13',
            'student_personal_code' => 'required|max:10',
            'name' => 'required|max:50|string',
            'lastname' => 'required|max:50|string',
            'birthdate' => 'required|date',
            'incharge' => 'required|max:80|string',
            'phone_incharge' => 'required|integer',
            'address' => 'required|string|max:200',
            'status_student' => '',
            'degree_id' => '',
        ];
    }
}
