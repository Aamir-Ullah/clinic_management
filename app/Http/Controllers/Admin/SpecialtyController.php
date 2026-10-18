<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecialtyRequest;
use App\Http\Requests\UpdateSpecialtyRequest;
use App\Models\Specialty;
use App\Services\SpecialtyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SpecialtyController extends Controller
{
    public function __construct(
        private readonly SpecialtyService $specialtyService
    ) {}

    public function index(): View
    {
        $specialties = $this->specialtyService->getPaginatedSpecialties();

        return view('admin.specialties.index', compact('specialties'));
    }

    public function create(): View
    {
        return view('admin.specialties.create');
    }

    public function store(StoreSpecialtyRequest $request): RedirectResponse
    {
        $this->specialtyService->createSpecialty($request->validated());

        return redirect()
            ->route('admin.specialties.index')
            ->with('success', 'Specialty created successfully.');
    }

    public function edit(Specialty $specialty): View
    {
        return view('admin.specialties.edit', compact('specialty'));
    }

    public function update(
        UpdateSpecialtyRequest $request,
        Specialty $specialty
    ): RedirectResponse {
        $this->specialtyService->updateSpecialty(
            $specialty,
            $request->validated()
        );

        return redirect()
            ->route('admin.specialties.index')
            ->with('success', 'Specialty updated successfully.');
    }
}