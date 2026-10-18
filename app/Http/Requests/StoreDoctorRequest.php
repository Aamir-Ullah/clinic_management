<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StoreDoctorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->hasRole('Admin') ?? false;
    }

    public function rules(): array
    {
        return [
            'user_id' => [
                'required',
                'integer',
                'exists:users,id',
            ],

            'specialty_id' => [
                'required',
                'integer',
                Rule::exists('specialties', 'id')
                    ->where('is_active', true),
            ],

            'license_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique('doctors', 'license_number'),
            ],

            'phone' => ['nullable', 'string', 'max:30'],

            'qualification' => [
                'nullable',
                'string',
                'max:255',
            ],

            'experience_years' => [
                'required',
                'integer',
                'min:0',
                'max:100',
            ],

            'consultation_fee' => [
                'required',
                'numeric',
                'min:0',
                'max:99999999.99',
            ],

            'bio' => ['nullable', 'string', 'max:5000'],

            'status' => [
                'required',
                Rule::in(['active', 'inactive']),
            ],
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator): void {
                $userId = $this->input('user_id');

                if (
                    ! is_numeric($userId) ||
                    ! User::query()->whereKey($userId)->exists()
                ) {
                    return;
                }

                $eligibleUser = User::query()
                    ->whereKey($userId)
                    ->whereHas('roles', function ($query) {
                        $query->where('name', 'Doctor')
                            ->where('guard_name', 'web');
                    })
                    ->whereDoesntHave('doctorProfile')
                    ->exists();

                if (! $eligibleUser) {
                    $validator->errors()->add(
                        'user_id',
                        'Select a user with the Doctor role who does not already have a doctor profile.'
                    );
                }
            },
        ];
    }
}
