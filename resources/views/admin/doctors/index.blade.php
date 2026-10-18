@extends('layouts.app')

@section('title', 'Doctor Management')
@section('page-title', 'Doctor Management')
@section('page-description', 'Manage doctor profiles, specialties and professional details.')

@section('content')
<div class="row g-3 mb-4">
  <div class="col-12 col-md-6">
    <div class="card dashboard-card h-100">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="dashboard-icon bg-primary-subtle text-primary">
          <i class="bi bi-person-badge"></i>
        </div>
        <div>
          <div class="text-body-secondary small">Doctor Directory</div>
          <h4 class="fw-bold mb-0">{{ $doctors->total() }}</h4>
          <div class="small text-body-secondary">Total registered doctor profiles</div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-md-6">
    <div class="card dashboard-card h-100">
      <div class="card-body d-flex align-items-center gap-3">
        <div class="dashboard-icon bg-success-subtle text-success">
          <i class="bi bi-shield-check"></i>
        </div>
        <div>
          <div class="text-body-secondary small">Management Access</div>
          <h6 class="fw-bold mb-1">Administrator</h6>
          <div class="small text-body-secondary">Authorized doctor management</div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card dashboard-card">
  <div class="card-header bg-body py-3">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
      <div>
        <h5 class="card-title fw-semibold mb-1">
          <i class="bi bi-people text-primary me-2"></i>Doctor Directory
        </h5>
        <p class="text-body-secondary small mb-0">
          Review and maintain doctor records.
        </p>
      </div>

      <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg me-1"></i> Add New Doctor
      </a>
    </div>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th class="ps-4">Doctor</th>
            <th>Specialty</th>
            <th>License Number</th>
            <th>Consultation Fee</th>
            <th style="min-width: 140px;">Status</th>
            <th class="text-end pe-4">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($doctors as $doctor)
          <tr>
            <td class="ps-4">
              <div class="d-flex align-items-center gap-3">
                <div class="dashboard-icon bg-primary-subtle text-primary flex-shrink-0">
                  <i class="bi bi-person"></i>
                </div>
                <div>
                  <div class="fw-semibold">
                    {{ $doctor->user->name }}
                  </div>
                  <div class="small text-body-secondary">
                    {{ $doctor->user->email }}
                  </div>
                </div>
              </div>
            </td>
            <td>
              <span class="badge text-bg-info">
                {{ $doctor->specialty->name }}
              </span>
            </td>
            <td>
              <code>{{ $doctor->license_number }}</code>
            </td>
            <td class="fw-semibold">
              {{ number_format((float) $doctor->consultation_fee, 2) }}
            </td>
            <td>
              <form action="{{ route('admin.doctors.toggle-status', $doctor) }}"
                    method="POST"
                    class="d-inline"
                    onsubmit="return confirm('Are you sure you want to {{ $doctor->status === 'active' ? 'deactivate' : 'activate' }} this doctor?');">
                @csrf
                @method('PATCH')

                <div class="form-check form-switch mb-0">
                  <input class="form-check-input"
                         type="checkbox"
                         role="switch"
                         id="status-{{ $doctor->id }}"
                         {{ $doctor->status === 'active' ? 'checked' : '' }}
                         onchange="this.form.submit()"
                         style="cursor: pointer;">
                  <label class="form-check-label small fw-medium {{ $doctor->status === 'active' ? 'text-success' : 'text-secondary' }}"
                         for="status-{{ $doctor->id }}">
                    {{ $doctor->status === 'active' ? 'Active' : 'Inactive' }}
                  </label>
                </div>
              </form>
            </td>
            <td class="text-end pe-4">
              <div class="btn-group" role="group" aria-label="Doctor actions">
                <a href="{{ route('admin.doctors.show', $doctor) }}"
                   class="btn btn-sm btn-outline-info"
                   title="View doctor"
                   aria-label="View doctor">
                  <i class="bi bi-eye"></i>
                </a>
                <a href="{{ route('admin.doctors.edit', $doctor) }}"
                   class="btn btn-sm btn-outline-primary"
                   title="Edit doctor"
                   aria-label="Edit doctor">
                  <i class="bi bi-pencil-square"></i>
                </a>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center py-5">
              <i class="bi bi-person-plus display-5 text-body-secondary"></i>
              <h5 class="mt-3 fw-semibold">No doctors found</h5>
              <p class="text-body-secondary">
                Add a doctor profile to get started.
              </p>
              <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-1"></i>Add Doctor
              </a>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  @if ($doctors->hasPages())
  <div class="card-footer bg-body d-flex justify-content-between align-items-center flex-wrap gap-2">
    <small class="text-body-secondary">
      Showing {{ $doctors->firstItem() }}–{{ $doctors->lastItem() }}
      of {{ $doctors->total() }} doctors
    </small>
    {{ $doctors->links() }}
  </div>
  @endif
</div>
@endsection