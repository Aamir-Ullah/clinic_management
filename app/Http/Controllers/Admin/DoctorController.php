<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\Specialty;
use App\Models\User;
use App\Services\DoctorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DoctorController extends Controller
{
    public function __construct(
        private readonly DoctorService $doctorService
    ) {
    }

    public function index(): View
    {
        $doctors = $this->doctorService->getPaginatedDoctors();

        return view('admin.doctors.index', compact('doctors'));
    }

    public function create(): View
    {
        $specialties = Specialty::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $users = User::query()
            ->role('Doctor')
            ->whereDoesntHave('doctorProfile')
            ->orderBy('name')
            ->get();

        return view('admin.doctors.create', compact(
            'specialties',
            'users'
        ));
    }

    public function store(
        StoreDoctorRequest $request
    ): RedirectResponse {
        $this->doctorService->createDoctor($request->validated());

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Doctor created successfully.');
    }

    public function show(Doctor $doctor): View
    {
        $doctor = $this->doctorService->getDoctor($doctor->id);

        return view('admin.doctors.show', compact('doctor'));
    }

    public function edit(Doctor $doctor): View
    {
        $doctor = $this->doctorService->getDoctor($doctor->id);

        $specialties = Specialty::query()
            ->where('is_active', true)
            ->orWhereKey($doctor->specialty_id)
            ->orderBy('name')
            ->get();

        return view('admin.doctors.edit', compact(
            'doctor',
            'specialties'
        ));
    }

    public function update(
        UpdateDoctorRequest $request,
        Doctor $doctor
    ): RedirectResponse {
        $this->doctorService->updateDoctor(
            $doctor,
            $request->validated()
        );

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Doctor updated successfully.');
    }

    public function destroy(Doctor $doctor): RedirectResponse
    {
        return back()->with(
            'error',
            'Doctors cannot be deleted. Deactivate the doctor instead.'
        );
    }


public function toggleStatus(Doctor $doctor): RedirectResponse
{
    $newStatus = $doctor->status === 'active'
        ? 'inactive'
        : 'active';

    $this->doctorService->updateDoctor($doctor, [
        'status' => $newStatus,
    ]);

    $message = $newStatus === 'active'
        ? 'Doctor activated successfully.'
        : 'Doctor deactivated successfully.';

    return redirect()
        ->route('admin.doctors.index')
        ->with('success', $message);
}

}
