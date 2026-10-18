<?php
namespace App\Contracts\Repositories;

use App\Models\Doctor;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface DoctorRepositoryInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator;

    public function findById(int $id): Doctor;

    public function create(array $data): Doctor;

    public function update(Doctor $doctor, array $data): Doctor;
}
