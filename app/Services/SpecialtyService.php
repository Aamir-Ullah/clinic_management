<?php

namespace App\Services;

use App\Contracts\Repositories\SpecialtyRepositoryInterface;
use App\Models\Specialty;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SpecialtyService
{
    public function __construct(
        private readonly SpecialtyRepositoryInterface $specialties
    ) {}

    public function getPaginatedSpecialties(int $perPage = 15): LengthAwarePaginator
    {
        return $this->specialties->paginate($perPage);
    }

    public function createSpecialty(array $data): Specialty
    {
        return $this->specialties->create($data);
    }

    public function updateSpecialty(Specialty $specialty, array $data): Specialty
    {
        return $this->specialties->update($specialty, $data);
    }
}
