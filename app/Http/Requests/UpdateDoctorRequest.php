<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDoctorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasRole('Admin') ?? false;
    }

    public function rules(): array
    {
        $doctor = $this->route('doctor');

        $doctorId = is_object($doctor)
            ? $doctor->id
            : $doctor;

        return [
            'specialty_id' => [
                'sometimes',
                'required',
                'integer',
                Rule::exists('specialties', 'id')
                    ->where('is_active', true),
            ],

            'license_number' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('doctors', 'license_number')
                    ->ignore($doctorId),
            ],

            'phone' => [
                'sometimes',
                'nullable',
                'string',
                'max:30',
            ],

            'qualification' => [
                'sometimes',
                'nullable',
                'string',
                'max:255',
            ],

            'experience_years' => [
                'sometimes',
                'required',
                'integer',
                'min:0',
                'max:100',
            ],

            'consultation_fee' => [
                'sometimes',
                'required',
                'numeric',
                'min:0',
                'max:99999999.99',
            ],

            'bio' => [
                'sometimes',
                'nullable',
                'string',
                'max:5000',
            ],

            'status' => [
                'sometimes',
                'required',
                Rule::in(['active', 'inactive']),
            ],
        ];
    }
}
