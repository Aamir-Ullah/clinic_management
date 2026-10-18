<?php

namespace App\Repositories;

use App\Contracts\Repositories\DoctorRepositoryInterface;
use App\Models\Doctor;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentDoctorRepository implements DoctorRepositoryInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Doctor::query()
            ->with(['user', 'specialty'])
            ->latest()
            ->paginate($perPage);
    }

    public function findById(int $id): Doctor
    {
        return Doctor::query()
            ->with(['user', 'specialty'])
            ->findOrFail($id);
    }

    public function create(array $data): Doctor
    {
        $doctor = Doctor::create($data);

        return $doctor->load(['user', 'specialty']);
    }

    public function update(Doctor $doctor, array $data): Doctor
    {
        $doctor->update($data);

        return $doctor->refresh()->load(['user', 'specialty']);
    }
}
