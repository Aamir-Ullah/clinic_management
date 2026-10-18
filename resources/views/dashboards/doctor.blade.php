@extends('layouts.app')

@section('title', 'Doctor Dashboard')
@section('page-title', 'Doctor Dashboard')
@section('page-description', 'Your clinical workspace and practice overview.')

@section('content')
    <div class="card dashboard-welcome mb-4">
        <div class="card-body p-4 p-lg-5">
            <span class="badge bg-light text-primary mb-3">DOCTOR PORTAL</span>
            <h2 class="fw-bold mb-2">Welcome, Dr. {{ auth()->user()->name }}!</h2>
            <p class="text-muted mb-0">
                Your workspace for managing your practice and patient appointments.
            </p>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="dashboard-icon bg-primary-subtle text-primary mb-3">
                        <i class="bi bi-calendar2-week"></i>
                    </div>
                    <h5 class="fw-semibold">Appointments</h5>
                    <p class="text-body-secondary small mb-0">
                        Upcoming appointments and booking management will be available here.
                    </p>
                    <span class="badge text-bg-light border mt-3">Coming next</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="dashboard-icon bg-success-subtle text-success mb-3">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h5 class="fw-semibold">My Schedule</h5>
                    <p class="text-body-secondary small mb-0">
                        Working days, available hours and consultation slots will be configured here.
                    </p>
                    <span class="badge text-bg-light border mt-3">Coming next</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="dashboard-icon bg-info-subtle text-info mb-3">
                        <i class="bi bi-person-lines-fill"></i>
                    </div>
                    <h5 class="fw-semibold">Patient Records</h5>
                    <p class="text-body-secondary small mb-0">
                        Authorized patient information and visit history will be available in this module.
                    </p>
                    <span class="badge text-bg-light border mt-3">Coming next</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card dashboard-card">
        <div class="card-header bg-body py-3">
            <h5 class="card-title fw-semibold mb-0">
                <i class="bi bi-clipboard2-pulse text-primary me-2"></i>
                Practice Overview
            </h5>
        </div>
        <div class="card-body">
            <p class="text-body-secondary mb-0">
                Your appointment schedule, consultation details and patient records will appear here
                once their respective modules are implemented.
            </p>
        </div>
    </div>
@endsection
