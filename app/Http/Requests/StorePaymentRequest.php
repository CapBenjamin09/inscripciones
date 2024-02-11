<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'student_id' => 'required',
            'month' => 'required',
            'comments' => 'max:255',
            'date_payment' => '',
            'buyer_number' => 'required',
            'voucher' => 'required|file|mimes:pdf,png,jpg,jpeg|max:10000'
        ];
    }
}
