@extends('layouts.app')

@section('title', 'Patient Dashboard')
@section('page-title', 'Patient Dashboard')
@section('page-description', 'Your personal healthcare and appointment workspace.')

@section('content')
    <div class="card dashboard-welcome mb-4">
        <div class="card-body p-4 p-lg-5">
            <span class="badge bg-light text-primary mb-3">PATIENT PORTAL</span>
            <h2 class="fw-bold mb-2">Welcome, {{ auth()->user()->name }}!</h2>
            <p class="text-muted mb-0">
                Keep track of your healthcare journey from your personal dashboard.
            </p>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="dashboard-icon bg-primary-subtle text-primary mb-3">
                        <i class="bi bi-calendar-plus"></i>
                    </div>
                    <h5 class="fw-semibold">Book Appointment</h5>
                    <p class="text-body-secondary small mb-0">
                        Select a doctor and request a consultation once appointment booking is implemented.
                    </p>
                    <span class="badge text-bg-light border mt-3">Coming next</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="dashboard-icon bg-success-subtle text-success mb-3">
                        <i class="bi bi-calendar2-check"></i>
                    </div>
                    <h5 class="fw-semibold">My Appointments</h5>
                    <p class="text-body-secondary small mb-0">
                        View upcoming, completed and cancelled appointments when the module is ready.
                    </p>
                    <span class="badge text-bg-light border mt-3">Coming next</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="dashboard-icon bg-info-subtle text-info mb-3">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <h5 class="fw-semibold">My Account</h5>
                    <p class="text-body-secondary small mb-0">
                        Your account details and profile management are planned for the patient module.
                    </p>
                    <div class="mt-3 fw-semibold">{{ auth()->user()->email }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card dashboard-card">
        <div class="card-header bg-body py-3">
            <h5 class="card-title fw-semibold mb-0">
                <i class="bi bi-heart-pulse text-primary me-2"></i>
                Your Healthcare Overview
            </h5>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-start gap-3">
                <i class="bi bi-info-circle text-primary fs-4"></i>
                <div>
                    <h6 class="fw-semibold">Your patient portal is ready</h6>
                    <p class="text-body-secondary mb-0">
                        Appointment booking and appointment history will appear here after we build
                        and connect those modules to the database.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
