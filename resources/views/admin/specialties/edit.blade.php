
@extends('layouts.app')

@section('page-title', 'Edit Specialty')
@section('page-description', 'Update specialty details and status')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">
                        Edit: {{ $specialty->name }}
                    </h3>
                </div>

                <form action="{{ route('admin.specialties.update', $specialty) }}"
                      method="POST">
                    @csrf
                    @method('PUT')

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
                                   value="{{ old('name', $specialty->name) }}"
                                   class="form-control @error('name') is-invalid @enderror"
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
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description', $specialty->description) }}</textarea>

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
                                       @checked((bool) old('is_active', $specialty->is_active))>

                                <label class="form-check-label" for="is_active">
                                    Active specialty
                                </label>
                            </div>

                            @error('is_active')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="alert alert-light border">
                            <div class="d-flex justify-content-between">
                                <span>Currently assigned doctors</span>
                                <strong>{{ $specialty->doctors()->count() }}</strong>
                            </div>
                            <small class="text-muted">
                                Deactivating a specialty does not delete its
                                existing doctor records.
                            </small>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('admin.specialties.index') }}"
                           class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Back
                        </a>

                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-save me-1"></i>
                            Update Specialty
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Specialty Details</h3>
                </div>
                <div class="card-body">
                    <p>
                        <strong>Created:</strong><br>
                        {{ $specialty->created_at?->format('d M Y, h:i A') ?? '—' }}
                    </p>

                    <p class="mb-0">
                        <strong>Last Updated:</strong><br>
                        {{ $specialty->updated_at?->format('d M Y, h:i A') ?? '—' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
