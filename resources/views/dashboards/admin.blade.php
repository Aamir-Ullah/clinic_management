@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('page-title', 'Admin Dashboard')
@section('page-description', 'Manage your clinic, doctors and daily operations.')

@section('content')
    <div class="card dashboard-welcome mb-4">
        <div class="card-body p-4 p-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <span class="badge bg-light text-primary mb-3">ADMINISTRATOR</span>
                    <h2 class="fw-bold mb-2">
                        Welcome back, {{ auth()->user()->name }}!
                    </h2>
                    <p class="text-muted mb-0">
                        Your central workspace for clinic administration and management.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                    <i class="bi bi-hospital" style="font-size: 5rem; opacity: .8;"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card dashboard-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="dashboard-icon bg-primary-subtle text-primary">
                        <i class="bi bi-person-badge"></i>
                    </div>
                    <div>
                        <h5 class="fw-semibold mb-1">Doctor Management</h5>
                        <p class="text-body-secondary small mb-2">
                            Manage doctor profiles and specialties.
                        </p>
                        <a href="{{ route('admin.doctors.index') }}"
                           class="btn btn-sm btn-primary">
                            Manage Doctors <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card dashboard-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="dashboard-icon bg-success-subtle text-success">
                        <i class="bi bi-calendar2-check"></i>
                    </div>
                    <div>
                        <h5 class="fw-semibold mb-1">Appointments</h5>
                        <p class="text-body-secondary small mb-0">
                            Appointment management will be connected in the next module.
                        </p>
                        <span class="badge text-bg-light border mt-2">Coming next</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card dashboard-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="dashboard-icon bg-info-subtle text-info">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <h5 class="fw-semibold mb-1">Patient Management</h5>
                        <p class="text-body-secondary small mb-0">
                            Patient records and management will be added in a later module.
                        </p>
                        <span class="badge text-bg-light border mt-2">Coming next</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card dashboard-card">
        <div class="card-header bg-body py-3">
            <h5 class="card-title fw-semibold mb-0">
                <i class="bi bi-shield-check text-primary me-2"></i>
                Administration Overview
            </h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="p-3 rounded border h-100">
                        <div class="fw-semibold mb-1">Access Control</div>
                        <p class="text-body-secondary small mb-0">
                            Role and permission protection is enabled for authorized areas.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 rounded border h-100">
                        <div class="fw-semibold mb-1">Doctor Profiles</div>
                        <p class="text-body-secondary small mb-0">
                            Create and update doctor records from Doctor Management.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 rounded border h-100">
                        <div class="fw-semibold mb-1">System Modules</div>
                        <p class="text-body-secondary small mb-0">
                            Appointment, patient and reporting modules will be developed step by step.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
