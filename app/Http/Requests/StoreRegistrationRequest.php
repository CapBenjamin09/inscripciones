<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrationRequest extends FormRequest
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
            'student_id' => '',
            'date_registration' => '',
            'cycle' => 'required|digits:4',
            'voucher_record' => 'file|mimes:pdf,png,jpg,jpeg|max:10000',
            'paid_registration' => '',
            'comments' => 'max:255',
            'status' => '',
            'degree_id' => '',
        ];
    }
}
