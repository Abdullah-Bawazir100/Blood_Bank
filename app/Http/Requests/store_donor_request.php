<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class store_donor_request extends FormRequest
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
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:Male,Female',
            'phone_number' => 'required|string|max:20',
            'whatsapp_number' => 'nullable|string|max:20',
            'governorate' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'region' => 'required|string|max:100',
            'blood_type' => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
            'chronic_disease' => 'required|in:Yes,No',
            'additional_notes' => 'nullable|string|max:2000',
        ];
    }
}
