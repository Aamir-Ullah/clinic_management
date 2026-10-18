
@extends('layouts.app')

@section('page-title', 'Specialties')
@section('page-description', 'Manage clinic medical specialties')

@section('content')
<div class="container-fluid">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                <i class="bi bi-heart-pulse me-1"></i>
                Specialty Management
            </h3>

            <div class="card-tools">
                <a href="{{ route('admin.specialties.create') }}"
                   class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i>
                    Add Specialty
                </a>
            </div>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close"
                            data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close"
                            data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 70px">#</th>
                            <th>Specialty Name</th>
                            <th>Description</th>
                            <th class="text-center">Doctors</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 110px">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($specialties as $specialty)
                            <tr>
                                <td>
                                    {{ $specialties->firstItem() + $loop->index }}
                                </td>

                                <td class="fw-semibold">
                                    {{ $specialty->name }}
                                </td>

                                <td>
                                    {{ $specialty->description ?: '—' }}
                                </td>

                                <td class="text-center">
                                    <span class="badge text-bg-info">
                                        {{ $specialty->doctors_count }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    @if($specialty->is_active)
                                        <span class="badge text-bg-success">
                                            Active
                                        </span>
                                    @else
                                        <span class="badge text-bg-secondary">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('admin.specialties.edit', $specialty) }}"
                                       class="btn btn-outline-primary btn-sm"
                                       title="Edit specialty">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                    No specialties found.
                                    <div class="mt-2">
                                        <a href="{{ route('admin.specialties.create') }}">
                                            Create your first specialty
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($specialties->hasPages())
            <div class="card-footer clearfix">
                {{ $specialties->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
