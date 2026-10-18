<?php
namespace App\Services;
use App\Contracts\Repositories\DoctorRepositoryInterface;
use App\Models\Doctor;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DoctorService
{
    public function __construct(private readonly DoctorRepositoryInterface $doctors)
    {

    }

    public function getPaginatedDoctors(int $perPage = 15): LengthAwarePaginator
    {
        return $this->doctors->paginate($perPage);
    }

    public function getDoctor(int $id): Doctor
    {
        return $this->doctors->findById($id);
    }

    public function createDoctor(array $data): Doctor
    {
        return $this->doctors->create($data);
    }

    public function updateDoctor(
        Doctor $doctor,
        array $data
    ): Doctor {
        return $this->doctors->update($doctor, $data);
    }
}
