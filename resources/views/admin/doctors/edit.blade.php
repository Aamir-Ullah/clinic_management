@extends('layouts.app')

@section('title', 'Edit Doctor')
@section('page-title', 'Edit Doctor')
@section('page-description', 'Update the doctor’s professional information and status.')

@section('content')
    <form action="{{ route('admin.doctors.update', $doctor) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <div class="col-12 col-xl-8">
                <div class="card dashboard-card">
                    <div class="card-header bg-body py-3">
                        <h5 class="card-title fw-semibold mb-1">
                            <i class="bi bi-pencil-square text-primary me-2"></i>
                            Update Doctor Information
                        </h5>
                        <p class="small text-body-secondary mb-0">
                            Doctor ID: #{{ $doctor->id }}
                        </p>
                    </div>

                    <div class="card-body">
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Doctor Account</label>
                            <div class="form-control bg-body-secondary">
                                <i class="bi bi-person-circle me-2"></i>
                                {{ $doctor->user->name }} — {{ $doctor->user->email }}
                            </div>
                            <div class="form-text">
                                The linked account cannot be changed from this form.
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="specialty_id" class="form-label fw-semibold">
                                Specialty <span class="text-danger">*</span>
                            </label>
                            <select name="specialty_id" id="specialty_id"
                                    class="form-select @error('specialty_id') is-invalid @enderror" required>
                                <option value="">Select specialty</option>
                                @foreach ($specialties as $specialty)
                                    <option value="{{ $specialty->id }}"
                                        @selected(old('specialty_id', $doctor->specialty_id) == $specialty->id)>
                                        {{ $specialty->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('specialty_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="license_number" class="form-label fw-semibold">
                                License Number <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                <input type="text" name="license_number" id="license_number"
                                       value="{{ old('license_number', $doctor->license_number) }}"
                                       class="form-control @error('license_number') is-invalid @enderror"
                                       maxlength="255" required>
                                @error('license_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold">Phone</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                    <input type="text" name="phone" id="phone"
                                           value="{{ old('phone', $doctor->phone) }}"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           maxlength="30">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="qualification" class="form-label fw-semibold">Qualification</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-mortarboard"></i></span>
                                    <input type="text" name="qualification" id="qualification"
                                           value="{{ old('qualification', $doctor->qualification) }}"
                                           class="form-control @error('qualification') is-invalid @enderror"
                                           maxlength="255">
                                    @error('qualification')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="experience_years" class="form-label fw-semibold">
                                    Experience (years) <span class="text-danger">*</span>
                                </label>
                                <input type="number" name="experience_years" id="experience_years"
                                       value="{{ old('experience_years', $doctor->experience_years) }}"
                                       class="form-control @error('experience_years') is-invalid @enderror"
                                       min="0" max="100" required>
                                @error('experience_years')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="consultation_fee" class="form-label fw-semibold">
                                    Consultation Fee <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">PKR</span>
                                    <input type="number" name="consultation_fee" id="consultation_fee"
                                           value="{{ old('consultation_fee', $doctor->consultation_fee) }}"
                                           class="form-control @error('consultation_fee') is-invalid @enderror"
                                           min="0" max="99999999.99" step="0.01" required>
                                    @error('consultation_fee')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="bio" class="form-label fw-semibold">Professional Bio</label>
                                <textarea name="bio" id="bio" rows="4"
                                          class="form-control @error('bio') is-invalid @enderror"
                                          maxlength="5000">{{ old('bio', $doctor->bio) }}</textarea>
                                @error('bio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="status" class="form-label fw-semibold">
                                    Status <span class="text-danger">*</span>
                                </label>
                                <select name="status" id="status"
                                        class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="active"
                                        @selected(old('status', $doctor->status) === 'active')>
                                        Active
                                    </option>
                                    <option value="inactive"
                                        @selected(old('status', $doctor->status) === 'inactive')>
                                        Inactive
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-body d-flex justify-content-end gap-2 py-3">
                        <a href="{{ route('admin.doctors.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Back
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check2-circle me-1"></i>Update Doctor
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-4">
                <div class="card dashboard-card">
                    <div class="card-header bg-body py-3">
                        <h5 class="card-title fw-semibold mb-0">
                            <i class="bi bi-person-check text-success me-2"></i>Current Profile
                        </h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="dashboard-icon bg-primary-subtle text-primary mx-auto mb-3"
                             style="width:72px;height:72px;font-size:2rem;">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <h5 class="fw-bold mb-1">{{ $doctor->user->name }}</h5>
                        <p class="text-body-secondary small">{{ $doctor->user->email }}</p>
                        <hr>
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-body-secondary">Doctor ID</span>
                            <span class="fw-semibold">#{{ $doctor->id }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-body-secondary">Current status</span>
                            @if ($doctor->status === 'active')
                                <span class="badge text-bg-success">Active</span>
                            @else
                                <span class="badge text-bg-secondary">Inactive</span>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-body-secondary">Created</span>
                            <span class="fw-semibold">{{ $doctor->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
