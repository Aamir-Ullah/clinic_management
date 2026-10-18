<?php

namespace App\Contracts\Repositories;

use App\Models\Specialty;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface SpecialtyRepositoryInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator;

    public function create(array $data): Specialty;

    public function update(Specialty $specialty, array $data): Specialty;
}
