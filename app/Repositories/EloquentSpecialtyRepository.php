<?php

namespace App\Repositories;

use App\Contracts\Repositories\SpecialtyRepositoryInterface;
use App\Models\Specialty;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentSpecialtyRepository implements SpecialtyRepositoryInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Specialty::query()
            ->withCount('doctors')
            ->orderBy('name')
            ->paginate($perPage);
    }

    public function create(array $data): Specialty
    {
        return Specialty::create($data);
    }

    public function update(Specialty $specialty, array $data): Specialty
    {
        $specialty->update($data);

        return $specialty->refresh();
    }
}
