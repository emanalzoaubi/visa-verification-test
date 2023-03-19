<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisaFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'user_id' => 'required',
            'first_name' => 'required|regex:/^[a-zA-Z]+$/',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/',
            'gender' => 'required',
            'place_of_birth' => 'required',
            'country_of_residency' => 'required',
            'place_of_issue' => 'required',
            'profession' => 'required',
            'organization' => 'required',
            'visa_duration' => 'required',
            'visa_status' => 'required',
            'date_of_birth' => 'required|date|before_or_equal:today',
            'passport_no' => 'required|regex:/^[0-9a-zA-Z]/',
            'issue_date' => 'required|date|before_or_equal:today',
            'expiry_date' => 'required|date|after_or_equal:today',
            'arrival_date' => 'required|date|after_or_equal:today',
            'personal_picture' => 'required|file|mimes:jpeg,png|max:2048',
            'passport_picture' => 'required|file|mimes:jpeg,png|max:2048',
            'traveling_with_companion' => 'required'
        ];

        if ($this->input('traveling_with_companion') == 'yes') {
            $rules['companion_first_name'] = 'required|regex:/^[a-zA-Z]+$/';
            $rules['companion_last_name'] = 'required|regex:/^[a-zA-Z]+$/';
            $rules['companion_gender'] = 'required';
            $rules['companion_place_of_birth'] = 'required';
            $rules['companion_country_of_residency'] = 'required';
            $rules['companion_place_of_issue'] = 'required';
            $rules['companion_profession'] = 'required';
            $rules['companion_organization'] = 'required';
            $rules['companion_visa_duration'] = 'required';
            $rules['companion_visa_status'] = 'required';
            $rules['companion_date_of_birth'] = 'required|date|before_or_equal:today';
            $rules['companion_passport_no'] = 'required|regex:/^[0-9a-zA-Z]/';
            $rules['companion_issue_date'] = 'required|date|before_or_equal:today';
            $rules['companion_expiry_date'] = 'required|date|after_or_equal:today';
            $rules['companion_arrival_date'] = 'required|date|after_or_equal:today';
            $rules['companion_personal_picture'] = 'required|file';
            $rules['companion_passport_picture'] = 'required|file';
        }
        return $rules;
    }
}