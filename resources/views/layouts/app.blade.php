<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'Dashboard') | ClinicCare</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.10.0/dist/css/adminlte.min.css">

  <style>
    .app-content-header {
      padding-bottom: 0;
    }

    .brand-link {
      text-decoration: none;
    }

    .dashboard-welcome {
      border: 0;
      border-radius: 14px;
      background: linear-gradient(115deg, #123b64, #167d9a);
      color: #fff;
    }

    .dashboard-welcome .text-muted {
      color: #d8e8f4 !important;
    }

    .dashboard-card {
      border: 0;
      border-radius: 12px;
      box-shadow: 0 3px 16px rgba(25, 42, 70, .06);
    }

    .dashboard-icon {
      width: 48px;
      height: 48px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 12px;
      font-size: 1.35rem;
    }

    .sidebar-menu .nav-link {
      border-radius: 7px;
      margin-bottom: 3px;
    }

  </style>

  @stack('styles')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

  <div class="app-wrapper">

    {{-- Top navbar --}}
    <nav class="app-header navbar navbar-expand bg-body">
      <div class="container-fluid">

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button" aria-label="Toggle sidebar">
              <i class="bi bi-list fs-4"></i>
            </a>
          </li>
          <li class="nav-item d-none d-md-block">
            <span class="nav-link fw-semibold">Clinic Management System</span>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person-circle fs-4 text-primary"></i>
              <span class="d-none d-md-inline">
                {{ auth()->user()->name }}
              </span>
              <i class="bi bi-chevron-down small"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-end shadow border-0">
              <div class="dropdown-header">
                <strong>{{ auth()->user()->name }}</strong>
                <div class="small text-body-secondary">
                  {{ auth()->user()->getRoleNames()->implode(', ') }}
                </div>
              </div>

              <div class="dropdown-divider"></div>

              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item text-danger">
                  <i class="bi bi-box-arrow-right me-2"></i>
                  Sign out
                </button>
              </form>
            </div>
          </li>
        </ul>

      </div>
    </nav>

    {{-- Sidebar --}}
    <aside class="app-sidebar bg-dark shadow" data-bs-theme="dark">

      <div class="sidebar-brand">
        @php
        $dashboardRoute = auth()->user()->hasRole('Admin')
        ? 'admin.dashboard'
        : (auth()->user()->hasRole('Doctor')
        ? 'doctor.dashboard'
        : 'patient.dashboard');
        @endphp

        <a href="{{ route($dashboardRoute) }}" class="brand-link">
          <i class="bi bi-heart-pulse-fill text-info me-2"></i>
          <span class="brand-text fw-semibold">ClinicCare</span>
        </a>
      </div>

      <div class="sidebar-wrapper">
        <nav class="mt-3">
          <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

            <li class="nav-header text-uppercase">Main Menu</li>

            @hasrole('Admin')
            <li class="nav-item">
              <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="nav-icon bi bi-speedometer2"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('admin.doctors.index') }}" class="nav-link {{ request()->routeIs('admin.doctors.*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-person-badge"></i>
                <p>Doctor Management</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('admin.specialties.index') }}" class="nav-link {{ request()->routeIs('admin.specialties.*') ? 'active' : '' }}">
                <i class="nav-icon bi bi-heart-pulse"></i>
                <p>Specialties</p>
              </a>
            </li>
            @endhasrole

            @hasrole('Doctor')
            <li class="nav-item">
              <a href="{{ route('doctor.dashboard') }}" class="nav-link {{ request()->routeIs('doctor.dashboard') ? 'active' : '' }}">
                <i class="nav-icon bi bi-speedometer2"></i>
                <p>Dashboard</p>
              </a>
            </li>
            @endhasrole

            @hasrole('Patient')
            <li class="nav-item">
              <a href="{{ route('patient.dashboard') }}" class="nav-link {{ request()->routeIs('patient.dashboard') ? 'active' : '' }}">
                <i class="nav-icon bi bi-speedometer2"></i>
                <p>Dashboard</p>
              </a>
            </li>
            @endhasrole

            <li class="nav-header text-uppercase mt-3">Account</li>
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-link w-100 border-0 bg-transparent text-start">
                  <i class="nav-icon bi bi-box-arrow-right"></i>
                  <p>Logout</p>
                </button>
              </form>
            </li>

          </ul>
        </nav>
      </div>
    </aside>

    {{-- Main content --}}
    <main class="app-main">

      <div class="app-content-header">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-sm-8">
              <h3 class="mb-1 fw-semibold">@yield('page-title', 'Dashboard')</h3>
              <p class="text-body-secondary small mb-0">
                @yield('page-description', 'Welcome to your clinic workspace.')
              </p>
            </div>
            <div class="col-sm-4 text-sm-end mt-2 mt-sm-0">
              <span class="badge text-bg-light border px-3 py-2">
                <i class="bi bi-calendar3 me-1"></i>
                {{ now()->format('D, d M Y') }}
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="app-content">
        <div class="container-fluid">

          @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if (session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            <strong>Please correct the following errors:</strong>
            <ul class="mb-0 mt-2">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          @yield('content')

        </div>
      </div>
    </main>

    <footer class="app-footer">
      <div class="float-end d-none d-sm-inline">
        <span class="text-body-secondary">ClinicCare</span>
      </div>
      <strong>&copy; {{ date('Y') }} Clinic Management System.</strong>
      All rights reserved.
    </footer>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.10.0/dist/js/adminlte.min.js"></script>

  @stack('scripts')

</body>
</html>
