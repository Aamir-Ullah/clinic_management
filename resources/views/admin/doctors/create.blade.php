
@extends('layouts.app')

@section('title', 'Add Doctor')
@section('page-title', 'Add New Doctor')
@section('page-description', 'Create a professional profile for an existing doctor account.')

@section('content')
    <form action="{{ route('admin.doctors.store') }}" method="POST">
        @csrf

        <div class="row g-4">
            <div class="col-12 col-xl-8">
                <div class="card dashboard-card">
                    <div class="card-header bg-body py-3">
                        <h5 class="card-title fw-semibold mb-1">
                            <i class="bi bi-person-vcard text-primary me-2"></i>
                            Doctor Information
                        </h5>
                        <p class="small text-body-secondary mb-0">
                            Enter the doctor's account and professional information.
                        </p>
                    </div>

                    <div class="card-body">
                        <div class="mb-4">
                            <label for="user_id" class="form-label fw-semibold">
                                Doctor Account <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <select name="user_id" id="user_id"
                                        class="form-select @error('user_id') is-invalid @enderror" required>
                                    <option value="">Select a doctor account</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            @selected(old('user_id') == $user->id)>
                                            {{ $user->name }} — {{ $user->email }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-text">
                                Only existing accounts with the Doctor role and no doctor profile are listed.
                            </div>
                            @if ($users->isEmpty())
                                <div class="alert alert-warning mt-2 mb-0">
                                    <i class="bi bi-exclamation-triangle me-1"></i>
                                    No eligible doctor accounts found. Create or assign a Doctor account first.
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="specialty_id" class="form-label fw-semibold">
                                Specialty <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-heart-pulse"></i></span>
                                <select name="specialty_id" id="specialty_id"
                                        class="form-select @error('specialty_id') is-invalid @enderror" required>
                                    <option value="">Select specialty</option>
                                    @foreach ($specialties as $specialty)
                                        <option value="{{ $specialty->id }}"
                                            @selected(old('specialty_id') == $specialty->id)>
                                            {{ $specialty->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('specialty_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            @if ($specialties->isEmpty())
                                <div class="form-text text-danger">
                                    No active specialties are available. Add a specialty before creating a doctor.
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="license_number" class="form-label fw-semibold">
                                License Number <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                <input type="text" name="license_number" id="license_number"
                                       value="{{ old('license_number') }}"
                                       class="form-control @error('license_number') is-invalid @enderror"
                                       maxlength="255" required placeholder="Enter professional license number">
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
                                           value="{{ old('phone') }}"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           maxlength="30" placeholder="Phone number">
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
                                           value="{{ old('qualification') }}"
                                           class="form-control @error('qualification') is-invalid @enderror"
                                           maxlength="255" placeholder="e.g. MBBS, FCPS">
                                    @error('qualification')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="experience_years" class="form-label fw-semibold">
                                    Experience (years) <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                                    <input type="number" name="experience_years" id="experience_years"
                                           value="{{ old('experience_years', 0) }}"
                                           class="form-control @error('experience_years') is-invalid @enderror"
                                           min="0" max="100" required>
                                    @error('experience_years')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="consultation_fee" class="form-label fw-semibold">
                                    Consultation Fee <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">PKR</span>
                                    <input type="number" name="consultation_fee" id="consultation_fee"
                                           value="{{ old('consultation_fee', '0.00') }}"
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
                                          maxlength="5000"
                                          placeholder="Write a brief professional introduction...">{{ old('bio') }}</textarea>
                                @error('bio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Maximum 5,000 characters.</div>
                            </div>

                            <div class="col-md-6">
                                <label for="status" class="form-label fw-semibold">
                                    Status <span class="text-danger">*</span>
                                </label>
                                <select name="status" id="status"
                                        class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="active" @selected(old('status', 'active') === 'active')>
                                        Active
                                    </option>
                                    <option value="inactive" @selected(old('status') === 'inactive')>
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
                            <i class="bi bi-x-lg me-1"></i>Cancel
                        </a>
                        <button type="submit" class="btn btn-primary"
                                @disabled($users->isEmpty() || $specialties->isEmpty())>
                            <i class="bi bi-check2-circle me-1"></i>Save Doctor
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-4">
                <div class="card dashboard-card">
                    <div class="card-header bg-body py-3">
                        <h5 class="card-title fw-semibold mb-0">
                            <i class="bi bi-info-circle text-info me-2"></i>Before Saving
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-3 mb-3">
                            <i class="bi bi-person-check text-primary fs-4"></i>
                            <div>
                                <div class="fw-semibold">Doctor account</div>
                                <div class="small text-body-secondary">
                                    Select an existing user who has the Doctor role.
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mb-3">
                            <i class="bi bi-patch-check text-success fs-4"></i>
                            <div>
                                <div class="fw-semibold">Unique license</div>
                                <div class="small text-body-secondary">
                                    Each doctor must have a unique license number.
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <i class="bi bi-heart-pulse text-danger fs-4"></i>
                            <div>
                                <div class="fw-semibold">Active specialty</div>
                                <div class="small text-body-secondary">
                                    Select an available specialty from the list.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
