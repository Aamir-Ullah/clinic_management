@extends('layouts.app')

@section('title', 'Doctor Details')
@section('page-title', 'Doctor Profile')
@section('page-description', 'View complete professional information for this doctor.')

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.doctors.index') }}" class="btn btn-outline-secondary me-2">
            <i class="bi bi-arrow-left me-1"></i>Back to Doctors
        </a>
        <a href="{{ route('admin.doctors.edit', $doctor) }}" class="btn btn-primary">
            <i class="bi bi-pencil-square me-1"></i>Edit Profile
        </a>
    </div>

    <div class="row g-4">
        <div class="col-12 col-xl-4">
            <div class="card dashboard-card h-100">
                <div class="card-body text-center p-4">
                    <div class="dashboard-icon bg-primary-subtle text-primary mx-auto mb-3"
                         style="width:88px;height:88px;font-size:2.5rem;">
                        <i class="bi bi-person-badge"></i>
                    </div>

                    <h4 class="fw-bold mb-1">{{ $doctor->user->name }}</h4>
                    <p class="text-body-secondary mb-3">{{ $doctor->user->email }}</p>

                    <span class="badge text-bg-info px-3 py-2 mb-2">
                        {{ $doctor->specialty->name }}
                    </span>

                    <div class="mt-2">
                        @if ($doctor->status === 'active')
                            <span class="badge text-bg-success">
                                <i class="bi bi-check-circle me-1"></i>Active Doctor
                            </span>
                        @else
                            <span class="badge text-bg-secondary">
                                <i class="bi bi-pause-circle me-1"></i>Inactive Doctor
                            </span>
                        @endif
                    </div>

                    <hr class="my-4">

                    <div class="text-start">
                        <div class="small text-body-secondary mb-1">License Number</div>
                        <div class="fw-semibold mb-3">{{ $doctor->license_number }}</div>

                        <div class="small text-body-secondary mb-1">Consultation Fee</div>
                        <h4 class="fw-bold text-primary mb-0">
                            PKR {{ number_format((float) $doctor->consultation_fee, 2) }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-8">
            <div class="card dashboard-card mb-4">
                <div class="card-header bg-body py-3">
                    <h5 class="card-title fw-semibold mb-0">
                        <i class="bi bi-clipboard2-pulse text-primary me-2"></i>
                        Professional Information
                    </h5>
                </div>

                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="text-body-secondary small mb-1">Qualification</div>
                            <div class="fw-semibold">
                                {{ $doctor->qualification ?: 'Not provided' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-body-secondary small mb-1">Experience</div>
                            <div class="fw-semibold">
                                {{ $doctor->experience_years }}
                                {{ $doctor->experience_years === 1 ? 'year' : 'years' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-body-secondary small mb-1">Phone</div>
                            <div class="fw-semibold">
                                {{ $doctor->phone ?: 'Not provided' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-body-secondary small mb-1">Specialty</div>
                            <div class="fw-semibold">{{ $doctor->specialty->name }}</div>
                        </div>

                        <div class="col-12">
                            <hr>
                            <div class="text-body-secondary small mb-2">Professional Bio</div>
                            <p class="mb-0" style="white-space: pre-line;">{{ $doctor->bio ?: 'No professional bio has been added.' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card dashboard-card">
                <div class="card-header bg-body py-3">
                    <h5 class="card-title fw-semibold mb-0">
                        <i class="bi bi-clock-history text-info me-2"></i>
                        Record Information
                    </h5>
                </div>

                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="text-body-secondary small">Profile Created</div>
                            <div class="fw-semibold">{{ $doctor->created_at->format('d M Y, h:i A') }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-body-secondary small">Last Updated</div>
                            <div class="fw-semibold">{{ $doctor->updated_at->format('d M Y, h:i A') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
