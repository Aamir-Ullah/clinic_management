
@extends('layouts.app')

@section('page-title', 'Add Specialty')
@section('page-description', 'Create a new medical specialty')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create Specialty</h3>
                </div>

                <form action="{{ route('admin.specialties.store') }}"
                      method="POST">
                    @csrf

                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <strong>Please correct the following errors:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Specialty Name <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   class="form-control @error('name') is-invalid @enderror"
                                   placeholder="e.g. Cardiology"
                                   maxlength="255"
                                   required>

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">
                                Description
                            </label>

                            <textarea id="description"
                                      name="description"
                                      rows="4"
                                      maxlength="2000"
                                      class="form-control @error('description') is-invalid @enderror"
                                      placeholder="Enter specialty details">{{ old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="hidden" name="is_active" value="0">

                            <div class="form-check form-switch">
                                <input type="checkbox"
                                       class="form-check-input"
                                       id="is_active"
                                       name="is_active"
                                       value="1"
                                       @checked((bool) old('is_active', true))>

                                <label class="form-check-label" for="is_active">
                                    Active specialty
                                </label>
                            </div>

                            <small class="text-muted">
                                Only active specialties will be available when
                                creating new doctor profiles.
                            </small>

                            @error('is_active')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('admin.specialties.index') }}"
                           class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Back
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i>
                            Save Specialty
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Information</h3>
                </div>
                <div class="card-body">
                    <p>
                        <i class="bi bi-info-circle text-info me-1"></i>
                        Specialty examples include Cardiology, Dermatology,
                        Neurology and Pediatrics.
                    </p>
                    <p class="mb-0">
                        <i class="bi bi-shield-check text-success me-1"></i>
                        Specialty names must be unique.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
